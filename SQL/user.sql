create DATABASE blog;

use blog;

CREATE TABLE `user` (
	Id int AUTO_INCREMENT PRIMARY KEY,
    Login varchar(50),
    Email varchar(50),
    `Password` varchar(50),
    `urlAvatar` varchar(255),
    `Role` varchar(50) DEFAULT 'follower'
);

CREATE TABLE record (
	Id int AUTO_INCREMENT PRIMARY KEY,
    Id_autor int,
    `Date` varchar(25),
    Status varchar(25),
    Text longtext,
    `Like` int,
	`DisLike` int
)


CREATE TABLE `COMMENT` (
    Id int AUTO_INCREMENT Primary key,
    IdAutor int,
    IdRecord int,
    `Date` varchar(25),
    Status boolean,
    Text longtext,
    `Like` int,
    `DisLike` int)