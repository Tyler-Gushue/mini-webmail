CREATE DATABASE IF NOT EXISTS email_db;
use email_db;

CREATE TABLE IF NOT EXISTS login (

    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL

);

CREATE TABLE IF NOT EXISTS user_info (

    email VARCHAR(255) PRIMARY KEY,
    firstName VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL

);

CREATE TABLE IF NOT EXISTS emails (

    id INT AUTO_INCREMENT PRIMARY KEY,
    senderEmail VARCHAR(255) NOT NULL,
    recipientEmail VARCHAR(255) NOT NULL,
    emailSubject TEXT,
    emailContent TEXT,
    timeSent DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (senderEmail) REFERENCES user_info(email),
    FOREIGN KEY (recipientEmail) REFERENCES user_info(email)

);

INSERT INTO login (email, password) VALUES 

    ("sunny.mailer@example.com", "$2y$10$rE8SzD0uc3sU4M6I4rKFrOQMZ4Xh8oRKfO34LiVpoFGPdTqg4oTpG"),
    ("jane.the.reader@example.com", "$2y$10$dm/ltrBvZ1UVGDLWNb3csuEQbDS.Z6JiAbIjpq9kCplvu5vuOdlGK"),
    ("quiet.quokka@example.com", "$2y$10$DKGL4fXV08oxHtuw3INnueUns8DxDygPUug1S5vd.qx50TvW8fC7a"),
    ("timmy.travels@example.com", "$2y$10$1KApAmfA5G1fgokp148cbuw8R658DBSB81GRB1tBk/6ZNxqAfRzrO"),
    ("coffee.codes@example.com", "$2y$10$.K0vpQhXFWGHgN75bOTKie24jpSCHndEt3gBt4Mtt9v3s0VxbZbvW");



INSERT INTO user_info (email, firstName, lastName) VALUES

    ("sunny.mailer@example.com", "Sunny", "Mailer"),
    ("jane.the.reader@example.com", "Jane", "Booker"),
    ("quiet.quokka@example.com", "Quinn", "Quill"),
    ("timmy.travels@example.com", "Timmy", "Miles"),
    ("coffee.codes@example.com", "Cora", "Beans");

INSERT INTO emails (senderEmail, recipientEmail, emailSubject, emailContent) VALUES

    ("sunny.mailer@example.com", "jane.the.reader@example.com", "Meeting Reminder", "Hi Jane, just a reminder about our meeting tomorrow at 10am."),
    ("sunny.mailer@example.com", "timmy.travels@example.com", "Trip Photos", "Hey Timmy! Just uploaded the trip photos. Check them out."),
    ("sunny.mailer@example.com", "quiet.quokka@example.com", "Code Review", "Can you review the latest changes on the project repo?"),

    ("jane.the.reader@example.com", "sunny.mailer@example.com", "Re: Meeting Reminder", "Thanks Sunny, I’ll be there!"),
    ("coffee.codes@example.com", "sunny.mailer@example.com", "Need Help with Login", "Hey Sunny, can you help me figure out the login bug?"),
    ("timmy.travels@example.com", "sunny.mailer@example.com", "Lunch?", "You free for lunch this week?");    



