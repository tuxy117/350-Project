DROP DATABASE IF EXISTS cubscout;
CREATE DATABASE IF NOT EXISTS cubscout;
GRANT ALL PRIVILEGES ON cubscout.* to 'assist'@'localhost' identified by 'scoutpw';
USE cubscout;
CREATE TABLE popcorn_sales(
	sales_id int NOT NULL auto_increment,
	firstname VARCHAR(25),
	lastname VARCHAR(30),
	product varchar(50) DEFAULT NULL,
	quantity int(11) DEFAULT NULL,
	price decimal(5,2) DEFAULT NULL,
	PRIMARY KEY (sales_id)
);

CREATE TABLE scout (
  scout_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name varchar(50) NOT NULL,
  sales_id INT NOT NULL,
  CONSTRAINT popcorn_sales_sales_id_fk FOREIGN KEY (sales_id) REFERENCES popcorn_sales (sales_id)
);