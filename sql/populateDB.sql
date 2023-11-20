INSERT INTO users2 (username, password, email, name, bio, is_admin, is_blocked)
VALUES
  ('john_doe', 'securepass', 'john.doe@example.com', 'John Doe', 'A software developer', false, false),
  ('alice_smith', 'password123', 'alice.smith@example.com', 'Alice Smith', 'A graphic designer', false, false),
  ('bob_jones', 'pass456', 'bob.jones@example.com', 'Bob Jones', 'An accountant', false, false),
  ('emma_white', 'secretword', 'emma.white@example.com', 'Emma White', 'A marketing specialist', false, false),
  ('mike_miller', 'mikempass', 'mike.miller@example.com', 'Mike Miller', 'A project manager', false, false),
  ('sara_jackson', 'sarapass', 'sara.jackson@example.com', 'Sara Jackson', 'A data scientist', false, false),
  ('peter_adams', 'peterpass', 'peter.adams@example.com', 'Peter Adams', 'A UX designer', false, false),
  ('lisa_carter', 'lisapass', 'lisa.carter@example.com', 'Lisa Carter', 'A social media manager', false, false),
  ('kevin_brown', 'kevinpass', 'kevin.brown@example.com', 'Kevin Brown', 'A financial analyst', false, false),
  ('natalie_green', 'nataliepass', 'natalie.green@example.com', 'Natalie Green', 'An HR specialist', false, false),
  ('steven_hill', 'stevenpass', 'steven.hill@example.com', 'Steven Hill', 'A content writer', false, false),
  ('julia_wilson', 'juliapass', 'julia.wilson@example.com', 'Julia Wilson', 'A software engineer', false, false),
  ('ryan_smith', 'ryanpass', 'ryan.smith@example.com', 'Ryan Smith', 'A product manager', false, false),
  ('amanda_clark', 'amandapass', 'amanda.clark@example.com', 'Amanda Clark', 'An event planner', false, false),
  ('daniel_roberts', 'danielpass', 'daniel.roberts@example.com', 'Daniel Roberts', 'A business analyst', false, false),
  ('olivia_davis', 'oliviapass', 'olivia.davis@example.com', 'Olivia Davis', 'A UI designer', false, false),
  ('matthew_hall', 'matthewpass', 'matthew.hall@example.com', 'Matthew Hall', 'A sales representative', false, false),
  ('emily_jones', 'emilypass', 'emily.jones@example.com', 'Emily Jones', 'A project coordinator', false, false),
  ('jason_martin', 'jasonpass', 'jason.martin@example.com', 'Jason Martin', 'A software architect', false, false),
  ('linda_morris', 'lindapass', 'linda.morris@example.com', 'Linda Morris', 'An office manager', false, false),
  ('brian_wilson', 'brianpass', 'brian.wilson@example.com', 'Brian Wilson', 'A network engineer', false, false),
  ('natalie_cruz', 'nataliepass', 'natalie.cruz@example.com', 'Natalie Cruz', 'A communications specialist', false, false),
  ('robert_garcia', 'robertpass', 'robert.garcia@example.com', 'Robert Garcia', 'A software tester', false, false),
  ('michelle_lee', 'michellepass', 'michelle.lee@example.com', 'Michelle Lee', 'A systems analyst', false, false),
  ('brandon_king', 'brandonpass', 'brandon.king@example.com', 'Brandon King', 'A web developer', false, false),
  ('susan_miller', 'susanpass', 'susan.miller@example.com', 'Susan Miller', 'An executive assistant', false, false),
  ('jacob_richardson', 'jacobpass', 'jacob.richardson@example.com', 'Jacob Richardson', 'A database administrator', false, false),
  ('emma_scott', 'emmapass', 'emma.scott@example.com', 'Emma Scott', 'A customer support representative', false, false),
  ('alexander_hill', 'alexpass', 'alexander.hill@example.com', 'Alexander Hill', 'A mobile app developer', false, false),
  ('sophia_wright', 'sophiapass', 'sophia.wright@example.com', 'Sophia Wright', 'An IT consultant', false, false),
  ('david_hernandez', 'davidpass', 'david.hernandez@example.com', 'David Hernandez', 'A front-end developer', false, false),
  ('amy_martin', 'amypass', 'amy.martin@example.com', 'Amy Martin', 'A user experience specialist', false, false),
  ('bryan_anderson', 'bryanpass', 'bryan.anderson@example.com', 'Bryan Anderson', 'A software architect', false, false),
  ('christina_smith', 'christinapass', 'christina.smith@example.com', 'Christina Smith', 'A marketing coordinator', false, false),
  ('eric_collins', 'ericpass', 'eric.collins@example.com', 'Eric Collins', 'A project manager', false, false),
  ('laura_ward', 'laurapass', 'laura.ward@example.com', 'Laura Ward', 'An art director', false, false),
  ('timothy_davis', 'timothypass', 'timothy.davis@example.com', 'Timothy Davis', 'A technical writer', false, false),
  ('melissa_ross', 'melissapass', 'melissa.ross@example.com', 'Melissa Ross', 'An HR manager', false, false),
  ('nathan_wood', 'nathanpass', 'nathan.wood@example.com', 'Nathan Wood', 'A systems administrator', false, false),
  ('sophie_harris', 'sophiepass', 'sophie.harris@example.com', 'Sophie Harris', 'A content strategist', false, false),
  ('jeremy_thompson', 'jeremypass', 'jeremy.thompson@example.com', 'Jeremy Thompson', 'A software engineer', false, false),
  ('natalie_brown', 'nataliepass', 'natalie.brown@example.com', 'Natalie Brown', 'A social media specialist', false, false),
  ('michael_green', 'michaelpass', 'michael.green@example.com', 'Michael Green', 'A UI/UX designer', false, false),
  ('rebecca_ward', 'rebeccapass', 'rebecca.ward@example.com', 'Rebecca Ward', 'A software developer', false, false);

INSERT INTO project1 (id_creator, name, description, is_public, date_created)
VALUES
  (1, 'Project Alpha', 'A simple project for testing', true, '2023-01-15'),
  (2, 'Project Beta', 'An experimental project with new features', true, '2023-02-20'),
  (3, 'Project Gamma', 'A small project to demonstrate functionality', true, '2023-03-10'),
  (4, 'Project Delta', 'A project to explore different technologies', true, '2023-04-05'),
  (5, 'Project Epsilon', 'A collaborative project among team members', true, '2023-05-18'),
  (6, 'Project Zeta', 'A side project for additional testing', true, '2023-06-23'),
  (7, 'Project Eta', 'A non-public project with specific goals', true, '2023-07-30'),
  (8, 'Project Theta', 'A project for internal use only', true, '2023-08-12'),
  (9, 'Project Iota', 'A short-term project with a focused scope', true, '2023-09-05'),
  (10, 'Project Kappa', 'A restricted-access project for special tasks', true, '2023-10-02');

INSERT INTO member (id_user, id_project, role)
VALUES
  (1, 2, 'project_member'),
  (1, 3, 'project_member'),
  (1, 4, 'project_member'),
  (11, 1, 'project_member'),
  (12, 1, 'project_member'),
  (13, 1, 'project_member'),
  (14, 2, 'project_member'),
  (15, 2, 'project_member'),
  (16, 2, 'project_member'),
  (17, 3, 'project_member'),
  (18, 3, 'project_member'),
  (19, 3, 'project_member'),
  (20, 4, 'project_member'),
  (21, 4, 'project_member'),
  (22, 4, 'project_member'),
  (23, 5, 'project_member'),
  (24, 5, 'project_member'),
  (25, 5, 'project_member'),
  (26, 6, 'project_member'),
  (27, 7, 'project_member'),
  (28, 8, 'project_member'),
  (29, 9, 'project_member'),
  (30, 10, 'project_member');

INSERT INTO task (id_creator, id_project, name, label, is_completed, date_created, due_date, priority)
VALUES
  (1, 1, 'Task 1', 'Label A', false, '2023-01-15', '2023-02-01', 'high'),
  (1, 1, 'Task 2', 'Label B', false, '2023-02-20', '2023-03-10', 'medium'),
  (12, 1, 'Task 3', 'Label C', false, '2023-03-10', '2023-04-05', 'low'),
  (2, 2, 'Task 4', 'Label A', false, '2023-04-05', '2023-05-18', 'medium'),
  (14, 2, 'Task 5', 'Label B', false, '2023-05-18', '2023-06-23', 'high'),
  (15, 2, 'Task 6', 'Label C', false, '2023-06-23', '2023-07-30', 'low'),
  (3, 3, 'Task 7', 'Label A', false, '2023-07-30', '2023-08-12', 'medium'),
  (3, 3, 'Task 8', 'Label B', false, '2023-08-12', '2023-09-05', 'high'),
  (3, 3, 'Task 9', 'Label C', false, '2023-09-05', '2023-10-02', 'low'),
  (4, 4, 'Task 10', 'Label A', false, '2023-10-02', '2023-11-08', 'medium'),
  (21, 4, 'Task 11', 'Label B', false, '2023-11-08', '2023-12-15', 'high'),
  (22, 4, 'Task 12', 'Label C', false, '2023-11-15', '2023-12-02', 'low'),
  (5, 5, 'Task 13', 'Label A', false, '2023-01-02', '2023-02-28', 'medium'),
  (25, 5, 'Task 14', 'Label B', false, '2023-02-28', '2023-03-18', 'high'),
  (25, 5, 'Task 15', 'Label C', false, '2023-03-18', '2023-04-25', 'low'),
  (6, 6, 'Task 16', 'Label A', false, '2023-04-25', '2023-05-30', 'medium'),
  (6, 6, 'Task 17', 'Label B', false, '2023-05-30', '2023-06-10', 'high'),
  (6, 6, 'Task 18', 'Label C', false, '2023-06-10', '2023-07-15', 'low'),
  (7, 7, 'Task 19', 'Label A', false, '2023-07-15', '2023-08-22', 'medium'),
  (27, 7, 'Task 20', 'Label B', false, '2023-08-22', '2023-09-05', 'high'),
  (27, 7, 'Task 21', 'Label C', false, '2023-09-05', '2023-10-12', 'low'),
  (8, 8, 'Task 22', 'Label A', false, '2023-10-12', '2023-11-18', 'medium'),
  (8, 8, 'Task 23', 'Label B', false, '2023-11-18', '2023-12-25', 'high'),
  (28, 8, 'Task 24', 'Label C', false, '2023-12-25', '2024-01-05', 'low'),
  (9, 9, 'Task 25', 'Label A', false, '2024-01-05', '2024-02-15', 'medium'),
  (9, 9, 'Task 26', 'Label B', false, '2024-02-15', '2024-03-01', 'high'),
  (9, 9, 'Task 27', 'Label C', false, '2024-03-01', '2024-04-10', 'low'),
  (10, 10, 'Task 28', 'Label A', false, '2024-04-10', '2024-05-20', 'medium'),
  (10, 10, 'Task 29', 'Label B', false, '2024-05-20', '2024-06-05', 'high'),
  (30, 10, 'Task 30', 'Label C', false, '2024-06-05', '2024-07-15', 'low'); 

INSERT INTO comment (id_user, id_task, content, date)
VALUES
  (1, 1, 'Comment 1 for Task 1', '2023-01-20'),
  (2, 4, 'Comment 2 for Task 4', '2023-04-08'),
  (3, 7, 'Comment 3 for Task 7', '2023-07-15'),
  (4, 10, 'Comment 4 for Task 10', '2023-10-25'),
  (5, 13, 'Comment 5 for Task 13', '2023-02-14'),
  (6, 16, 'Comment 6 for Task 16', '2023-05-02'),
  (7, 19, 'Comment 7 for Task 19', '2023-08-18'),
  (8, 22, 'Comment 8 for Task 22', '2023-11-05'),
  (9, 25, 'Comment 9 for Task 25', '2024-02-22'),
  (10, 28, 'Comment 10 for Task 28', '2024-05-10');
  

INSERT INTO admin_action (id_admin, id_user, is_blocking, justification)
VALUES
  (31, 34, true, 'User 34 violated community guidelines.'),
  (32, 35, false, 'User 35 had a temporary suspension lifted.'),
  (33, 36, true, 'User 36 engaged in inappropriate behavior.');

INSERT INTO responsible (id_user, id_task)
VALUES
  (1, 1),
  (11, 2),
  (12, 3),
  (2, 4),
  (14, 5),
  (15, 6),
  (3, 7),
  (17, 8),
  (18, 9),
  (4, 10),
  (11, 11),
  (21, 12),
  (22, 13),
  (12, 14),
  (24, 15),
  (25, 16),
  (13, 17),
  (28, 18),
  (29, 19),
  (14, 20);

INSERT INTO invited (id_user, id_project)
VALUES
  (11, 1),
  (12, 1),
  (13, 1),
  (14, 2),
  (15, 2),
  (16, 2),
  (17, 3),
  (18, 3),
  (19, 3),
  (20, 4),
  (21, 4),
  (22, 4),
  (23, 5),
  (24, 5),
  (25, 5),
  (26, 6),
  (27, 7),
  (28, 8),
  (29, 9),
  (30, 10);

INSERT INTO request_join (id_user, id_project)
VALUES
  (37, 1),
  (38, 2),
  (39, 3),
  (37, 4),
  (38, 5);

INSERT INTO notifications (id_user, date, seen)
VALUES
  (1, '2023-01-15 08:00:00', false),
  (2, '2023-02-20 10:30:00', false),
  (3, '2023-03-10 15:45:00', false),
  (4, '2023-04-05 12:20:00', false),
  (5, '2023-05-18 09:15:00', false),
  (6, '2023-06-23 11:30:00', false),
  (7, '2023-07-30 14:10:00', false),
  (8, '2023-08-12 16:50:00', false),
  (9, '2023-09-05 18:25:00', false),
  (10, '2023-10-02 20:40:00', false),
  (11, '2023-11-08 22:15:00', false),
  (12, '2023-12-15 23:55:00', false),
  (13, '2024-01-02 08:30:00', false),
  (14, '2024-02-28 10:00:00', false),
  (15, '2024-03-18 12:40:00', false),
  (16, '2024-04-25 14:05:00', false),
  (17, '2024-05-30 16:20:00', false),
  (18, '2024-06-10 18:35:00', false),
  (19, '2024-07-15 21:00:00', false),
  (20, '2024-08-22 22:45:00', false),
  (21, '2024-09-05 00:10:00', false),
  (22, '2024-10-12 01:25:00', false),
  (23, '2024-11-18 03:40:00', false),
  (24, '2024-12-25 05:15:00', false),
  (25, '2025-01-05 07:30:00', false),
  (26, '2025-02-15 09:55:00', false),
  (27, '2025-03-01 11:20:00', false),
  (28, '2025-04-10 13:45:00', false),
  (29, '2025-05-20 15:10:00', false),
  (30, '2025-06-05 17:25:00', false),
  (31, '2024-09-05 00:20:00', false),
  (32, '2024-10-12 01:35:00', false),
  (33, '2024-11-18 03:50:00', false),
  (34, '2024-12-25 05:25:00', false),
  (35, '2025-01-05 07:40:00', false),
  (36, '2025-02-15 10:05:00', false),
  (37, '2025-03-01 11:30:00', false),
  (38, '2025-04-10 13:55:00', false),
  (39, '2025-05-20 16:10:00', false),
  (40, '2025-06-05 18:25:00', false);

INSERT INTO comment_notification (id, id_comment, notification_type)
VALUES
  (1, 1, 'new_comment'),
  (2, 2, 'new_comment'),
  (3, 3, 'new_comment'),
  (4, 4, 'new_comment'),
  (5, 5, 'new_comment'),
  (6, 6, 'new_comment'),
  (7, 7, 'new_comment'),
  (8, 8, 'new_comment'),
  (9, 9, 'new_comment'),
  (10, 10, 'new_comment');

INSERT INTO project_notification (id, id_project, notification_type)
VALUES
  (11, 1, 'member_joined'),
  (12, 1, 'member_left'),
  (13, 2, 'new_coordinator'),
  (14, 2, 'request_join'),
  (15, 3, 'member_joined'),
  (16, 3, 'member_left'),
  (17, 1, 'new_coordinator'),
  (18, 1, 'request_join'),
  (19, 4, 'member_joined'),
  (20, 4, 'member_left'),
  (21, 4, 'new_coordinator'),
  (22, 5, 'request_join'),
  (23, 5, 'member_joined'),
  (24, 5, 'member_left'),
  (25, 5, 'new_coordinator'),
  (26, 6, 'request_join'),
  (27, 7, 'member_joined'),
  (28, 8, 'member_left'),
  (29, 8, 'new_coordinator'),
  (30, 10, 'request_join');

INSERT INTO user_notification (id, id_user, notification_type)
VALUES
  (31, 1, 'join_accepted'),
  (32, 2, 'invitation_accepted'),
  (33, 3, 'join_accepted'),
  (34, 4, 'invitation_accepted'),
  (35, 5, 'join_accepted');

INSERT INTO task_notification (id, id_task, notification_type)
VALUES
  (36, 1, 'new_task'),
  (37, 2, 'task_completed'),
  (38, 3, 'deadline_proximity'),
  (39, 4, 'new_task'),
  (40, 5, 'task_completed');
