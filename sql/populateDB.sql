-- Populating user table
INSERT INTO users (name, username, password, email, bio)
VALUES 
('Alice', 'alice123', 'pass1234', 'alice@example.com', 'I am a project manager.'),
('Bob', 'bob456', 'bobpass', 'bob@example.com', 'I love coding!'),
('Charlie', 'charlie789', 'charliepass', 'charlie@example.com', 'Design enthusiast.'),
('David', 'david234', 'davidpass', 'david@example.com', 'Music lover.'),
('Eva', 'eva567', 'evapass', 'eva@example.com', 'Outdoor enthusiast.'),
('Frank', 'frank890', 'frankpass', 'frank@example.com', 'Gamer and developer.'),
('Grace', 'grace1234', 'gracepass', 'grace@example.com', 'Bookworm and writer.'),
('Helen', 'helen567', 'helenpass', 'helen@example.com', 'Art and photography.'),
('Ivy', 'ivy890', 'ivypass', 'ivy@example.com', 'Science and tech enthusiast.'),
('Karen', 'karen456', 'karenpass', 'karen@example.com', 'Travel and adventure.'),
('Jack', 'jack123', 'jackpass', 'jack@example.com', 'Fitness and nutrition.'),
('Liam', 'liam789', 'liampass', 'liam@example.com', 'Film and cinema lover.'),
('Mia', 'mia123', 'miapass', 'mia@example.com', 'Fashion and style.'),
('Noah', 'noah456', 'noahpass', 'noah@example.com', 'Coding and robotics.'),
('Olivia', 'olivia789', 'oliviapass', 'olivia@example.com', 'Music and instruments.'),
('Peter', 'peter123', 'peterpass', 'peter@example.com', 'Outdoor sports.'),
('Quinn', 'quinn456', 'quinnpass', 'quinn@example.com', 'Photography and art.'),
('Rachel', 'rachel789', 'rachelpass', 'rachel@example.com', 'Science and research.'),
('Sam', 'sam123', 'sampass', 'sam@example.com', 'Food and cooking.'),
('Tom', 'tom456', 'tompass', 'tom@example.com', 'History and archaeology.'),
('Ursula', 'ursula123', 'ursulapass', 'ursula@example.com', 'Nature and hiking enthusiast.'),
('Victor', 'victor456', 'victorpass', 'victor@example.com', 'Chess and strategy games.'),
('Wendy', 'wendy789', 'wendypass', 'wendy@example.com', 'Writing and literature.'),
('Xander', 'xander123', 'xanderpass', 'xander@example.com', 'Computers and coding.'),
('Zane', 'zane789', 'zanepass', 'zane@example.com', 'Fitness and bodybuilding.'),
('Yara', 'yara456', 'yarapass', 'yara@example.com', 'Art and painting.'),
('Ava', 'ava123', 'avapass', 'ava@example.com', 'Yoga and meditation.'),
('Ben', 'ben456', 'benpass', 'ben@example.com', 'Automobiles and racing.'),
('Cara', 'cara789', 'carapass', 'cara@example.com', 'Dance and choreography.'),
('Dylan', 'dylan123', 'dylanpass', 'dylan@example.com', 'History and archaeology.'),
('Ella', 'ella456', 'ellapass', 'ella@example.com', 'Music and singing.'),
('Felix', 'felix789', 'felixpass', 'felix@example.com', 'Gardening and plants.'),
('Gina', 'gina123', 'ginapass', 'gina@example.com', 'Movies and film.'),
('Hank', 'hank456', 'hankpass', 'hank@example.com', 'Cooking and culinary arts.'),
('Iris', 'iris789', 'irispass', 'iris@example.com', 'Hiking and outdoor activities.'),
('Jake', 'jake123', 'jakepass', 'jake@example.com', 'Science and astronomy.'),
('Kylie', 'kylie456', 'kyliepass', 'kylie@example.com', 'Fashion and design.'),
('Liam', 'liam69', 'liampass', 'liam69@example.com', 'Animals and wildlife.'),
('Megan', 'megan123', 'meganpass', 'megan@example.com', 'Travel and adventure.'),
('Nate', 'nate456', 'natepass', 'nate@example.com', 'Soccer and sports.');

-- Populating project table
INSERT INTO project (name, description, date_created)
VALUES 
('Website Development', 'Develop a new company website.', '2023-10-20'),
('Mobile App', 'Develop a mobile application for e-commerce.', '2023-09-15'),
('Data Analysis Project', 'Analyze customer data for insights.', '2023-08-05'),
('Marketing Campaign', 'Plan and execute a marketing campaign.', '2023-07-12'),
('Inventory Management', 'Develop a system for inventory tracking.', '2023-06-25'),
('Research Paper', 'Conduct research and write a research paper.', '2023-05-18'),
('Event Planning', 'Plan and organize a company event.', '2023-04-29'),
('Graphic Design Project', 'Create branding materials and graphics.', '2023-03-14'),
('Community Outreach', 'Engage in community outreach programs.', '2023-02-27'),
( 'Quality Assurance', 'Ensure product quality through testing.', '2023-01-10');

-- Populating task table
INSERT INTO task (id_creator, name, label, date_created, due_date)
VALUES 
(1, 'Landing Page Design', 'Design', '2023-10-21', '2023-11-10'),
(1, 'Backend API', 'Development', '2023-09-17', '2023-10-15'),
(1, 'Content Writing', 'Content', '2023-08-05', '2023-09-02'),
(5, 'Database Optimization', 'Development', '2023-07-18', '2023-08-12'),
(6, 'Testing and QA', 'Quality Assurance', '2023-06-30', '2023-07-28'),
(6, 'Marketing Campaign', 'Marketing', '2023-05-22', '2023-06-10'),
(10, 'User Interface Design', 'Design', '2023-04-15', '2023-05-12'),
(8, 'Mobile App Development', 'Development', '2023-03-08', '2023-04-05'),
(9, 'Data Analysis', 'Analysis', '2023-02-02', '2023-03-01'),
(12, 'Social Media Marketing', 'Marketing', '2023-01-15', '2023-02-10'),
(11, 'Content Management', 'Content', '2023-12-20', '2024-01-18'),
(23, 'Inventory Tracking', 'Inventory', '2023-11-05', '2023-12-02'),
(14, 'Customer Support', 'Support', '2023-10-10', '2023-11-07');


-- Populating priority table
INSERT INTO priority (id_task, priority_type)
VALUES 
(1, 'high'),
(2, 'medium'),
(3, 'low'),
(4, 'high'),
(5, 'medium'),
(6, 'low'),
(7, 'high'),
(8, 'medium'),
(9, 'low'),
(10, 'high'),
(11, 'medium'),
(12, 'low'),
(13, 'high');

-- Populating comment table
INSERT INTO comment (id_task, content, date)
VALUES 
(1, 'The design looks good.', '2023-10-22'),
(2, 'API is now functional.', '2023-09-29'),
(2, 'The analysis is complete.', '2023-08-10'),
(2, 'Optimized the database queries.', '2023-07-22'),
(5, 'Completed testing phase.', '2023-06-15'),
(6, 'Planning the event schedule.', '2023-05-01'),
(7, 'Working on graphic designs.', '2023-04-14'),
(8, 'Outreach activities are ongoing.', '2023-03-20'),
(8, 'Quality assurance checks done.', '2023-02-12'),
(13, 'Testing the mobile app.', '2022-10-14');

-- Populating member table
INSERT INTO member (id_user, id_project, member_type)
VALUES 
(1, 1, 'project_member'),
(2, 1, 'project_member'),
(3, 1, 'coordinator'),
(4, 2, 'project_member'),
(5, 2, 'project_member'),
(7, 2, 'coordinator'),
(8, 3, 'project_member'),
(10, 3, 'project_member'),
(9, 3, 'coordinator'),
(11, 4, 'project_member'),
(13, 4, 'project_member'),
(12, 4, 'coordinator'),
(14, 5, 'project_member'),
(15, 5, 'project_member'),
(25, 5, 'coordinator'),
(17, 6, 'coordinator'),
(21, 7, 'coordinator'),
(30, 8, 'coordinator'),
(8, 9, 'coordinator'),
(20, 10, 'coordinator');


-- Populating admin table
INSERT INTO admins (id_user)
VALUES 
(1);

-- Populating notification table
INSERT INTO notifications (id_user, date)
VALUES 
(1, '2023-10-21'),
(2, '2023-09-16'),
(3, '2023-08-05'),
(4, '2023-07-12'),
(5, '2023-06-25'),
(6, '2023-05-18'),
(7, '2023-04-29'),
(8, '2023-03-14'),
(9, '2023-02-27'),
(10, '2023-01-10');

-- Populating responsible table
INSERT INTO responsible (id_user, id_task)
VALUES 
(1, 1),
(2, 2);

-- Populating everyone table
INSERT INTO everyone (id_user, id_notification)
VALUES 
(1, 1),
(2, 2);

-- Populating creator table
INSERT INTO creator (id_user, id_project)
VALUES 
(1, 1),
(2, 2);

-- Populating invited table
INSERT INTO invited (id_user, id_project)
VALUES 
(3, 1),
(3, 2);

-- Populating request_join table
INSERT INTO request_join (id_user, id_project)
VALUES 
(3, 2);

-- Populating user_comment table
INSERT INTO user_comment (id_user, id_comment)
VALUES 
(3, 1),
(2, 2);

-- Populating task_notification table
INSERT INTO task_notification (id, id_task, notification_type)
VALUES 
(1, 1, 'new_task'),
(2, 2, 'task_completed');

-- Populating comment_notification table
INSERT INTO comment_notification (id, id_comment, notification_type)
VALUES 
(1, 1, 'new_comment');

-- Populating user_notification table
INSERT INTO user_notification (id, id_user, notification_type)
VALUES 
(1, 1, 'join_accepted');

-- Populating project_notification table
INSERT INTO project_notification (id, id_project, notification_type)
VALUES 
(1, 1, 'member_joined');

