DROP DATABASE IF EXISTS cubscout;
CREATE DATABASE IF NOT EXISTS cubscout;
GRANT ALL PRIVILEGES ON cubscout.* to 'assist'@'localhost' identified by 'scoutpw';
USE cubscout;

CREATE TABLE customerOrder(
	order_id int NOT NULL auto_increment,
	total decimal(7,2) DEFAULT NULL,
	PRIMARY KEY (order_id)
);

CREATE TABLE product(
	product_id int NOT NULL auto_increment,
	name VARCHAR(40) NOT NULL,
	price decimal(5,2) DEFAULT NULL,
	PRIMARY KEY (product_id)
	);
	
INSERT INTO product(name, price)
	SELECT name, price FROM product GROUP BY name ORDER BY name;
	
CREATE TABLE scout(
	scout_id int NOT NULL auto_increment,
	Name VARCHAR(60) NOT NULL,
	Troop VARCHAR(10),
	PRIMARY KEY (scout_id)
);

CREATE TABLE buyer(
	buyer_id int NOT NULL AUTO_INCREMENT,
	name VARCHAR(60),
	scoutID INT NOT NULL,
	CONSTRAINT scout_scoutID_fk FOREIGN KEY (scoutID) REFERENCES scout(scout_id),
	orderNum INT NOT NULL,
	CONSTRAINT customerOrder_orderID_fk FOREIGN KEY (orderNum) REFERENCES customerOrder(order_id),
	PRIMARY KEY(buyer_id)
);
CREATE TABLE itemordered(
	id int NOT NULL AUTO_INCREMENT,
	orderID INT NOT NULL,
	CONSTRAINT buyer_orderNum_fk FOREIGN KEY (orderID) REFERENCES buyer(orderNum),
	productID INT NOT NULL,
	CONSTRAINT product_product_id_fk FOREIGN KEY (productID) REFERENCES product(product_id),
	quantity int,
	totalPerItem decimal(6,2),
	PRIMARY KEY (id)
);