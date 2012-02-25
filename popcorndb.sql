DROP DATABASE IF EXISTS cubScout;
CREATE DATABASE IF NoT EXISTS cubScout;
GRANT ALL PRIVILEGES ON cubScout.* to 'assist'@'localhost' identified by 'scoutpw';
USE cubScout;
CREATE TABLE popcorn_sales(
	id int NOT NULL auto_increment,
	firstname VARCHAR(25),
	lastname VARCHAR(30),
	product varchar(50) DEFAULT NULL,
	quantity int(11) DEFAULT NULL,
	price decimal(5,2) DEFAULT NULL,
	PRIMARY KEY (id)
);