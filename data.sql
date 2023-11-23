USE db101;
CREATE TABLE accounts
(
   ID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
   Name varchar(60),
   Number int UNIQUE,
   Pin int,
   Amount int
);
