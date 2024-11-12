-- Switch to the desired database
drop database if exists Artdb;
create database Artdb;
USE Artdb;  -- Replace with your actual database name



CREATE TABLE Users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    bio TEXT,
    profile_picture VARCHAR(255), -- URL or file path for profile picture
    user_type ENUM('artist', 'buyer', 'enthusiast') NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    contact_info VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Artwork Table
CREATE TABLE Artwork (
    artwork_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    art_type ENUM('painting', 'sculpture', 'photography', 'digital', 'other') NOT NULL,
    price DECIMAL(10, 2),
    image_path VARCHAR(255), -- URL or file path for the artwork image/media
    artist_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (artist_id) REFERENCES Users(user_id) ON DELETE SET NULL
);

-- Marketplace Table
CREATE TABLE Marketplace (
    transaction_id INT AUTO_INCREMENT PRIMARY KEY,
    item_description TEXT,
    seller_id INT NOT NULL,
    buyer_id INT,
    artwork_id INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    transaction_status ENUM('pending', 'completed', 'canceled') DEFAULT 'pending',
    transaction_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (seller_id) REFERENCES Users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (buyer_id) REFERENCES Users(user_id) ON DELETE SET NULL,
    FOREIGN KEY (artwork_id) REFERENCES Artwork(artwork_id) ON DELETE CASCADE
);

-- Comments/Reviews Table
CREATE TABLE Comments (
    comment_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    artwork_id INT NOT NULL,
    rating INT CHECK (rating BETWEEN 1 AND 5),
    comment_text TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (artwork_id) REFERENCES Artwork(artwork_id) ON DELETE CASCADE
);