-----------------------------------------
-- Drop old schema
-----------------------------------------

DROP TABLE IF EXISTS users2 CASCADE;
DROP TABLE IF EXISTS task CASCADE; 
DROP TABLE IF EXISTS comment CASCADE; 
DROP TABLE IF EXISTS project1 CASCADE;
DROP TABLE IF EXISTS member CASCADE;
DROP TABLE IF EXISTS notifications CASCADE;
DROP TABLE IF EXISTS responsible CASCADE;
DROP TABLE IF EXISTS invited CASCADE;
DROP TABLE IF EXISTS request_join CASCADE;
DROP TABLE IF EXISTS task_notification CASCADE;
DROP TABLE IF EXISTS comment_notification CASCADE;
DROP TABLE IF EXISTS user_notification CASCADE;
DROP TABLE IF EXISTS project_notification CASCADE;
DROP TABLE IF EXISTS admin_action CASCADE;

DROP TYPE IF EXISTS task_notification_types;
DROP TYPE IF EXISTS comment_notification_types;
DROP TYPE IF EXISTS user_notification_types;
DROP TYPE IF EXISTS project_notification_types;
DROP TYPE IF EXISTS member_types;
DROP TYPE IF EXISTS priority_types;
DROP TYPE IF EXISTS completion_types;

DROP FUNCTION IF EXISTS project_search_update CASCADE;
DROP FUNCTION IF EXISTS task_search_update CASCADE;
DROP FUNCTION IF EXISTS user_search_update CASCADE;
DROP FUNCTION IF EXISTS comment_search_update CASCADE;
DROP FUNCTION IF EXISTS check_task_dates CASCADE;
DROP FUNCTION IF EXISTS check_project_invitation CASCADE;
DROP FUNCTION IF EXISTS make_project_creator_coordinator CASCADE;
DROP FUNCTION IF EXISTS notify_users_on_leave CASCADE;
DROP FUNCTION IF EXISTS block_user CASCADE;

DROP TRIGGER IF EXISTS project_search_update_trigger ON project1 CASCADE;
DROP TRIGGER IF EXISTS task_search_update_trigger ON task CASCADE;
DROP TRIGGER IF EXISTS user_search_update_trigger ON users2 CASCADE;
DROP TRIGGER IF EXISTS comment_search_update_trigger ON comment CASCADE;
DROP TRIGGER IF EXISTS trigger_check_task_dates ON task CASCADE;
DROP TRIGGER IF EXISTS trigger_default_project_coordinator ON project1 CASCADE;
DROP TRIGGER IF EXISTS tr_notify_users_on_leave ON member CASCADE;
DROP TRIGGER IF EXISTS trigger_block_user ON admin_action CASCADE;
DROP TRIGGER IF EXISTS trigger_check_project_invitation ON member CASCADE;


DROP INDEX IF EXISTS idx_user_notification CASCADE;
DROP INDEX IF EXISTS idx_user_comment CASCADE;
DROP INDEX IF EXISTS idx_priority_task CASCADE;
DROP INDEX IF EXISTS search_project_idx CASCADE;
DROP INDEX IF EXISTS search_task_idx CASCADE;
DROP INDEX IF EXISTS search_user_idx CASCADE;
DROP INDEX IF EXISTS search_comment_idx CASCADE;


-----------------------------------------
-- Types
-----------------------------------------

CREATE TYPE task_notification_types AS ENUM ('new_task', 'task_completed', 'deadline_proximity');
CREATE TYPE comment_notification_types AS ENUM ('new_comment');
CREATE TYPE user_notification_types AS ENUM ('join_accepted', 'invitation_accepted');
CREATE TYPE project_notification_types AS ENUM ('member_joined', 'member_left', 'new_coordinator', 'request_join');
CREATE TYPE member_types AS ENUM ('coordinator', 'project_member');
CREATE TYPE priority_types AS ENUM ('low', 'medium', 'high');
CREATE TYPE completion_types AS ENUM ('pending', 'in_progress', 'completed');

-----------------------------------------
-- Tables
-----------------------------------------

CREATE TABLE users2 (
    id SERIAL PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    name VARCHAR(255) NOT NULL,
    bio TEXT,
    is_admin BOOLEAN NOT NULL DEFAULT false,
    is_blocked BOOLEAN NOT NULL DEFAULT false
);

CREATE TABLE project1 (
    id SERIAL PRIMARY KEY,
    id_creator INT NOT NULL REFERENCES users2(id),
    name VARCHAR(255) NOT NULL,
    description TEXT,
    is_public BOOLEAN NOT NULL DEFAULT false,
    date_created DATE NOT NULL
);

CREATE TABLE task (
    id SERIAL PRIMARY KEY,
    id_creator INT NOT NULL REFERENCES users2(id),
    id_project INT NOT NULL REFERENCES project1(id),
    name VARCHAR(255) NOT NULL,
    label VARCHAR(255) NOT NULL,
    completion completion_types NOT NULL DEFAULT 'pending',
    date_created DATE NOT NULL,
    due_date DATE NOT NULL CHECK (due_date >= date_created),
    priority priority_types NOT NULL
);

CREATE TABLE comment (
    id SERIAL PRIMARY KEY,
    id_user INT NOT NULL REFERENCES users2(id),
    id_task INT NOT NULL REFERENCES task(id),
    content TEXT NOT NULL,
    date TIMESTAMP NOT NULL
);

CREATE TABLE member (
    id SERIAL PRIMARY KEY,
    id_user INT NOT NULL REFERENCES users2(id),
    id_project INT NOT NULL REFERENCES project1(id),
    role member_types NOT NULL
);

CREATE TABLE notifications (
    id SERIAL PRIMARY KEY,
    id_user INT NOT NULL REFERENCES users2(id),
    date TIMESTAMP NOT NULL,
    seen BOOLEAN NOT NULL DEFAULT false
);

CREATE TABLE responsible (
    id_user INT NOT NULL REFERENCES users2(id),
    id_task INT NOT NULL REFERENCES task(id),
    PRIMARY KEY (id_user, id_task)
);

CREATE TABLE invited (
    id_user INT NOT NULL REFERENCES users2(id),
    id_project INT NOT NULL REFERENCES project1(id),
    PRIMARY KEY (id_user, id_project)
);

CREATE TABLE request_join (
    id_user INT NOT NULL REFERENCES users2(id),
    id_project INT NOT NULL REFERENCES project1(id),
    PRIMARY KEY (id_user, id_project)
);

CREATE TABLE task_notification (
    id INT PRIMARY KEY REFERENCES notifications (id),
    id_task INT NOT NULL REFERENCES task(id),
    notification_type task_notification_types NOT NULL
);

CREATE TABLE comment_notification (
    id INT PRIMARY KEY REFERENCES notifications (id),
    id_comment INT NOT NULL REFERENCES comment(id),
    notification_type comment_notification_types NOT NULL
);

CREATE TABLE user_notification (
    id INT PRIMARY KEY REFERENCES notifications (id),
    id_user INT NOT NULL REFERENCES users2(id),
    notification_type user_notification_types NOT NULL
);

CREATE TABLE project_notification (
    id INT PRIMARY KEY REFERENCES notifications (id),
    id_project INT NOT NULL REFERENCES project1(id),
    notification_type project_notification_types NOT NULL
);

CREATE TABLE admin_action (
    id SERIAL PRIMARY KEY,
    id_admin INT NOT NULL REFERENCES users2(id),
    id_user INT NOT NULL REFERENCES users2(id),
    is_blocking BOOLEAN NOT NULL,
    justification TEXT NOT NULL
);

--IDX01
CREATE INDEX idx_user_notification ON notifications USING btree (id_user);  

CLUSTER notifications USING idx_user_notification;

--IDX02
CREATE INDEX idx_user_comment ON comment USING btree (id_task);   

CLUSTER comment USING idx_user_comment;

--IDX03
CREATE INDEX idx_priority_task ON task (is_completed, priority);

--IDX03
-- Add column to group to store computed ts_vectors.
ALTER TABLE project1
ADD COLUMN tsvectors TSVECTOR;

-- Create a function to automatically update ts_vectors.
CREATE FUNCTION project_search_update() RETURNS TRIGGER AS $$
BEGIN
 IF TG_OP = 'INSERT' THEN
        NEW.tsvectors = (
         setweight(to_tsvector('english', NEW.name), 'A') ||
         setweight(to_tsvector('english', NEW.description), 'B')
        );
 END IF;
 IF TG_OP = 'UPDATE' THEN
         IF (NEW.name <> OLD.name OR NEW.description <> OLD.description) THEN
           NEW.tsvectors = (
             setweight(to_tsvector('english', NEW.description), 'A') ||
             setweight(to_tsvector('english', NEW.description), 'B')
           );
         END IF;
 END IF;
 RETURN NEW;
END $$
LANGUAGE plpgsql;

-- Create a trigger before insert or update on group.
CREATE TRIGGER project_search_update_trigger
 BEFORE INSERT OR UPDATE ON project1
 FOR EACH ROW
 EXECUTE PROCEDURE project_search_update();


-- Finally, create a GIN index for ts_vectors.
CREATE INDEX search_project_idx ON project1 USING GIN (tsvectors);

--IDX04
-- Add column to task to store computed ts_vectors.
ALTER TABLE task
ADD COLUMN tsvectors TSVECTOR;

-- Create a function to automatically update ts_vectors.
CREATE FUNCTION task_search_update() RETURNS TRIGGER AS $$
BEGIN
 IF TG_OP = 'INSERT' THEN
        NEW.tsvectors = (
         setweight(to_tsvector('english', NEW.name), 'A') ||
         setweight(to_tsvector('english', NEW.label), 'B')
        );
 END IF;
 IF TG_OP = 'UPDATE' THEN
         IF (NEW.name <> OLD.name OR NEW.label <> OLD.label) THEN
           NEW.tsvectors = (
             setweight(to_tsvector('english', NEW.label), 'A') ||
             setweight(to_tsvector('english', NEW.label), 'B')
           );
         END IF;
 END IF;
 RETURN NEW;
END $$
LANGUAGE plpgsql;

-- Create a trigger before insert or update on task.
CREATE TRIGGER task_search_update_trigger
 BEFORE INSERT OR UPDATE ON task
 FOR EACH ROW
 EXECUTE PROCEDURE task_search_update();


-- Finally, create a GIN index for ts_vectors.
CREATE INDEX search_task_idx ON task USING GIN (tsvectors);

--IDX05
-- Add column to user to store computed ts_vectors.
ALTER TABLE users2
ADD COLUMN tsvectors TSVECTOR;

-- Create a function to automatically update ts_vectors.
CREATE FUNCTION user_search_update() RETURNS TRIGGER AS $$
BEGIN
 IF TG_OP = 'INSERT' THEN
        NEW.tsvectors = (
         setweight(to_tsvector('english', NEW.name), 'A')
        );
 END IF;
 IF TG_OP = 'UPDATE' THEN
         IF (NEW.name <> OLD.name) THEN
           NEW.tsvectors = (
             setweight(to_tsvector('english', NEW.label), 'A')
           );
         END IF;
 END IF;
 RETURN NEW;
END $$
LANGUAGE plpgsql;

-- Create a trigger before insert or update on user.
CREATE TRIGGER user_search_update_trigger
 BEFORE INSERT OR UPDATE ON users2
 FOR EACH ROW
 EXECUTE PROCEDURE user_search_update();


-- Finally, create a GIN index for ts_vectors.
CREATE INDEX search_user_idx ON users2 USING GIN (tsvectors);

--IDX06
-- Add column to comment to store computed ts_vectors.
ALTER TABLE comment
ADD COLUMN tsvectors TSVECTOR;

-- Create a function to automatically update ts_vectors.
CREATE FUNCTION comment_search_update() RETURNS TRIGGER AS $$
BEGIN
 IF TG_OP = 'INSERT' THEN
        NEW.tsvectors = (
         setweight(to_tsvector('english', NEW.content), 'A')
        );
 END IF;
 IF TG_OP = 'UPDATE' THEN
         IF (NEW.content <> OLD.content) THEN
           NEW.tsvectors = (
             setweight(to_tsvector('english', NEW.label), 'A')
           );
         END IF;
 END IF;
 RETURN NEW;
END $$
LANGUAGE plpgsql;

-- Create a trigger before insert or update on comment.
CREATE TRIGGER comment_search_update_trigger
 BEFORE INSERT OR UPDATE ON comment
 FOR EACH ROW
 EXECUTE PROCEDURE comment_search_update();


-- Finally, create a GIN index for ts_vectors.
CREATE INDEX search_comment_idx ON comment USING GIN (tsvectors);

--TRIGGER01
-- Create the function
CREATE FUNCTION check_task_dates() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF NEW.due_date <= NEW.date_created THEN
       RAISE EXCEPTION 'The due_date must be later than date_created.';
    END IF;
    RETURN NEW;
END;
$BODY$
LANGUAGE plpgsql;

-- Create the trigger
CREATE TRIGGER trigger_check_task_dates
    BEFORE INSERT OR UPDATE ON task
    FOR EACH ROW
    EXECUTE PROCEDURE check_task_dates();

--TRIGGER02
-- Create the function
CREATE OR REPLACE FUNCTION make_project_creator_coordinator() RETURNS TRIGGER AS $$
BEGIN
    -- Insert a new entry into the member table
    -- Set the role of the project creator to 'coordinator'
    INSERT INTO member (id_user, id_project, role)
    VALUES (NEW.id_creator, NEW.id, 'coordinator');

    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

--Create the Trigger
CREATE TRIGGER trigger_default_project_coordinator
    AFTER INSERT ON project1
    FOR EACH ROW
    EXECUTE FUNCTION make_project_creator_coordinator();

--TRIGGER03
-- Create the function
CREATE FUNCTION check_project_invitation() RETURNS TRIGGER AS
$BODY$
BEGIN
    -- Check if the project is private
    IF (SELECT is_public FROM project1 WHERE id = NEW.id_project) = false THEN

        -- Check if the user being added is NOT the project creator
        IF NEW.id_user <> (SELECT id_creator FROM project1 WHERE id = NEW.id_project) THEN
            
            -- If not the creator, check for an invitation
            IF NOT EXISTS (SELECT 1 FROM invited WHERE id_user = NEW.id_user AND id_project = NEW.id_project) THEN
                RAISE EXCEPTION 'User must receive an invitation to join a private project';
            END IF;
        END IF;
    END IF;
    RETURN NEW;
END;
$BODY$
LANGUAGE plpgsql;


-- Create the trigger
CREATE TRIGGER trigger_check_project_invitation
    BEFORE INSERT OR UPDATE ON member
    FOR EACH ROW
    EXECUTE PROCEDURE check_project_invitation();

--TRIGGER04
-- Step 1: Define the trigger function
CREATE OR REPLACE FUNCTION notify_users_on_leave()
RETURNS TRIGGER AS $$
BEGIN

  -- Insert notifications for all other users in the group
  INSERT INTO notifications (id_user, message, date)
  SELECT id_user, 
         'User with ID ' || OLD.id_user || ' has left the group.', 
         NOW()
  FROM member
  WHERE id_group = OLD.id_group AND id_user != OLD.id_user;

  RETURN NULL; -- Since it's an AFTER DELETE trigger, we don't need to return anything

END;
$$ LANGUAGE plpgsql;

-- Step 2: Create the trigger
CREATE TRIGGER tr_notify_users_on_leave
AFTER DELETE ON member
FOR EACH ROW
EXECUTE FUNCTION notify_users_on_leave();

--TRIGGER05
-- Step 1: Define the trigger function
CREATE OR REPLACE FUNCTION block_user() RETURNS TRIGGER AS $$
BEGIN
    -- Check if the action is to block the user
    IF NEW.is_blocking THEN
        -- Update the users table to set is_blocked to true for the user
        UPDATE users2 SET is_blocked = true WHERE id = NEW.id_user;
    END IF;
    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

-- Step 2: Create the trigger
CREATE TRIGGER trigger_block_user
AFTER INSERT ON admin_action
FOR EACH ROW
EXECUTE FUNCTION block_user();

/*
--TRANSACTION01
BEGIN TRANSACTION;

SET TRANSACTION ISOLATION LEVEL REPEATABLE READ;

-- Insert the new project into the `project` table
INSERT INTO project1 (name, description, is_public, date_created)
VALUES ($project_name, $project_description, $project_visibility, NOW());

-- Retrieve the ID of the newly created project
SELECT currval('project_id_seq') INTO $project_id;

-- Add the creator of the project as the default coordinator in the `member` table
INSERT INTO member (id_user, id_project, role)
VALUES ($creator_id, $project_id, 'coordinator');

-- Send a notification to the creator confirming the successful creation of the project
INSERT INTO notifications (id_user, date, seen)
VALUES ($creator_id, NOW(), false);

END TRANSACTION;
*/