DROP DATABASE IF EXISTS cubscout;
CREATE DATABASE IF NoT EXISTS cubscout;
GRANT ALL PRIVILEGES ON cubscout.* to 'assist'@'localhost' identified by 'scoutpw';
USE cubscout;
CREATE TABLE popcorn_sales(
	id int NOT NULL auto_increment,
	firstname VARCHAR(25),
	lastname VARCHAR(30),
	product varchar(50) DEFAULT NULL,
	quantity int(11) DEFAULT NULL,
	price decimal(5,2) DEFAULT NULL,
	PRIMARY KEY (id)
);