# real-time-pay

============> Create table user_tbl <============

CREATE TABLE user_tbl (
user_id INT PRIMARY KEY AUTO_INCREMENT,
first_name VARCHAR(100) NOT NULL,
last_name VARCHAR(100) NOT NULL,
phone VARCHAR(50) NOT NULL,
email VARCHAR(100) NOT NULL,
password VARCHAR(225) NOT NULL,
image_path VARCHAR(225) NOT NULL,
created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
updated_at TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
token VARCHAR(225) NOT NULL,
tokenExp DATE NULL DEFAULT NULL,
qrcode VARCHAR(225) NOT NULL
);

============> End create table user_tbl <============

============> Create table account_tbl <============

CREATE TABLE account_tbl (
account_id INT PRIMARY KEY AUTO_INCREMENT,
user_id INT NOT NULL,
account_number_eg VARCHAR(20) NOT NULL,
account_number_kh VARCHAR(20) NOT NULL,
balance_eg FLOAT NOT NULL,
balance_kh FLOAT NOT NULL,
created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
);

============> End create table account_tbl <============

============> Create table payment_tbl <============

CREATE TABLE payment_tbl (
payment_id INT PRIMARY KEY AUTO_INCREMENT,
user_id INT NOT NULL,
account_id INT NOT NULL,
account_number VARCHAR(20) NOT NULL,
description VARCHAR(50) NOT NULL,
amount FLOAT NOT NULL,
receiver VARCHAR(100) NOT NULL,
receiver VARCHAR(100) NOT NULL,
status VARCHAR(50) NOT NULL,
balance_r_d VARCHAR(10) NOT NULL,
payment_date DATE NOT NULL
);

============> End create table payment_tbl <============

============> Create table history_accNum_tbl <============

CREATE TABLE history_accNum_tbl (
history_accNum_id int PRIMARY KEY AUTO_INCREMENT,
user_id INT NOT NULL,
account_number VARCHAR(20),
user_name VARCHAR(255),
history_accNum_date TIMESTAMP NULL DEFAULT NULL,
created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
);

============> Create table history_accNum_tbl <============
