# real-time-pay

============> Create table user_tbl <============
CREATE TABLE user_tbl (
    user_id INT(11) PRIMARY KEY AUTO_INCREMENT,
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
