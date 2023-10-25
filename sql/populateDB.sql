-- Populating user table
INSERT INTO user (name, username, password, email, bio)
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
('Liam', 'liam789', 'liampass', 'liam@example.com', 'Animals and wildlife.'),
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
INSERT INTO task (id_creator, id_priority, name, label, date_created, due_date)
VALUES 
(1, 1, 'Landing Page Design', 'Design', '2023-10-21', '2023-11-10'),
(2, 1, 'Backend API', 'Development', '2023-09-17', '2023-10-15'),
(3, 2, 'Content Writing', 'Content', '2023-08-05', '2023-09-02'),
(4, 2, 'Database Optimization', 'Development', '2023-07-18', '2023-08-12'),
(5, 3, 'Testing and QA', 'Quality Assurance', '2023-06-30', '2023-07-28'),
(6, 1, 'Marketing Campaign', 'Marketing', '2023-05-22', '2023-06-10');
(7, 3, 'User Interface Design', 'Design', '2023-04-15', '2023-05-12'),
(8, 3, 'Mobile App Development', 'Development', '2023-03-08', '2023-04-05'),
(9, 2, 'Data Analysis', 'Analysis', '2023-02-02', '2023-03-01'),
(10, 1, 'Social Media Marketing', 'Marketing', '2023-01-15', '2023-02-10'),
(11, 1, 'Content Management', 'Content', '2022-12-20', '2023-01-18'),
(12, 2, 'Inventory Tracking', 'Inventory', '2022-11-05', '2022-12-02'),
(13, 1, 'Customer Support', 'Support', '2022-10-10', '2022-11-07'),
(14, 3, 'Event Planning', 'Planning', '2022-09-14', '2022-10-12'),
(15, 1, 'Quality Assurance Testing', 'Quality Assurance', '2022-08-12', '2022-09-09'),
(16, 2, 'Product Design', 'Design', '2022-07-15', '2022-08-10'),
(17, 2, 'Sales Strategy', 'Sales', '2022-06-18', '2022-07-15'),
(18, 1, 'Product Launch', 'Launch', '2022-05-22', '2022-06-19'),
(19, 3, 'Market Research', 'Research', '2022-04-26', '2022-05-24'),
(20, 1, 'Budget Planning', 'Finance', '2022-03-29', '2022-04-26'),
(21, 3, 'Web Development', 'Development', '2022-02-10', '2022-03-10'),
(22, 1, 'Video Production', 'Media', '2022-01-18', '2022-02-15'),
(23, 2, 'SEO Optimization', 'SEO', '2021-12-20', '2022-01-17'),
(24, 2, 'Employee Training', 'Training', '2021-11-22', '2021-12-19'),
(25, 3, 'Data Migration', 'Data', '2021-10-25', '2021-11-22'),
(26, 1, 'Customer Surveys', 'Surveys', '2021-09-27', '2021-10-25'),
(27, 2, 'Project Management', 'Management', '2021-08-30', '2021-09-27'),
(28, 1, 'Product Prototyping', 'Prototyping', '2021-07-31', '2021-08-28'),
(29, 3, 'Social Media Campaign', 'Marketing', '2021-07-02', '2021-07-30'),
(30, 1, 'Document Translation', 'Translation', '2021-06-05', '2021-07-03');

-- Populating priority table
INSERT INTO priority (id_task, priority_type)
VALUES 
(1, 'High'),
(2, 'Medium'),
(3, 'Low'),
(4, 'High'),
(5, 'Medium'),
(6, 'Low'),
(7, 'High'),
(8, 'Medium'),
(9, 'Low'),
(10, 'High'),
(11, 'Medium'),
(12, 'Low'),
(13, 'High'),
(14, 'Medium'),
(15, 'Low'),
(16, 'High'),
(17, 'Medium'),
(18, 'Low'),
(19, 'High'),
(20, 'Medium'),
(21, 'Low'),
(22, 'High'),
(23, 'Medium'),
(24, 'Low'),
(25, 'High'),
(26, 'Medium'),
(27, 'Low'),
(28, 'High'),
(29, 'Medium'),
(30, 'Low');

-- Populating comment table
INSERT INTO comment (id_task, content, date)
VALUES 
(1, 'The design looks good.', '2023-10-22'),
(2, 'API is now functional.', '2023-09-29'),
(3, 'The analysis is complete.', '2023-08-10'),
(4, 'Optimized the database queries.', '2023-07-22'),
(5, 'Completed testing phase.', '2023-06-15'),
(6, 'Planning the event schedule.', '2023-05-01'),
(7, 'Working on graphic designs.', '2023-04-14'),
(8, 'Outreach activities are ongoing.', '2023-03-20'),
(9, 'Quality assurance checks done.', '2023-02-12'),
(10, 'Finalizing product prototype.', '2023-01-25'),
(11, 'Social media campaign launch.', '2022-12-30'),
(12, 'Research paper editing.', '2022-11-11'),
(13, 'Testing the mobile app.', '2022-10-14'),
(14, 'Preparing for a product launch.', '2022-09-19'),
(15, 'Data analysis in progress.', '2022-08-27');

-- Populating member table
INSERT INTO member (id_user, id_project, member_type)
VALUES 
(1, 1, 'project_member'),
(2, 1, 'project_member'),
(3, 2, 'coordinator'),
(4, 2, 'project_member'),
(5, 3, 'project_member'),
(6, 3, 'project_member'),
(7, 4, 'coordinator'),
(8, 4, 'project_member'),
(9, 5, 'coordinator'),
(10, 5, 'project_member'),
(11, 6, 'project_member'),
(12, 7, 'coordinator'),
(13, 8, 'project_member'),
(14, 9, 'project_member'),
(15, 10, 'project_member'),
(16, 10, 'coordinator'),
(17, 11, 'project_member'),
(18, 12, 'project_member'),
(19, 13, 'project_member'),
(20, 13, 'project_member');

-- Populating admin table
INSERT INTO admin (id_user)
VALUES 
(1);

-- Populating notification table
INSERT INTO notification (id_user, date)
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
(1, 1, 'New Task'),
(2, 2, 'Task Completed');

-- Populating comment_notification table
INSERT INTO comment_notification (id, id_comment, notification_type)
VALUES 
(1, 1, 'New Comment'),
(2, 2, 'Comment Reply');

-- Populating user_notification table
INSERT INTO user_notification (id, id_user, notification_type)
VALUES 
(1, 1, 'Mentioned'),
(2, 2, 'Assigned');

-- Populating project_notification table
INSERT INTO project_notification (id, id_project, notification_type)
VALUES 
(1, 1, 'New Project'),
(2, 2, 'Project Update');
