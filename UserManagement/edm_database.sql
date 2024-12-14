-- Create the database
CREATE DATABASE edm;

-- Use the database
USE edm;

-- Create Users table
-- CREATE TABLE IF NOT EXISTS user (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     user VARCHAR(255) NOT NULL,
--     pass VARCHAR(255) NOT NULL,
--     email VARCHAR(255) NOT NULL
-- );
---------------------------------------------
////new////
CREATE TABLE IF NOT EXISTS user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user VARCHAR(255) NOT NULL,
    pass VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') NOT NULL DEFAULT 'user'
);
------------------------------------------------
-- Create Items table
CREATE TABLE Items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    quantity INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create Transactions table
CREATE TABLE Transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    item_id INT NOT NULL,
    quantity INT NOT NULL,
    type ENUM('purchase', 'sale') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES user(id),
    FOREIGN KEY (item_id) REFERENCES Items(id)
);





ALTER TABLE user
ADD COLUMN role ENUM('admin', 'user') NOT NULL DEFAULT 'user';