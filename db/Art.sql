-- Switch to the desired database
DROP DATABASE IF EXISTS artdb;
CREATE DATABASE artdb;
USE artdb;  -- Replace with your actual database name

-- Users Table
CREATE TABLE `users` (
  `user_id` INT(11) NOT NULL AUTO_INCREMENT,  -- AUTO_INCREMENT to automatically generate user IDs
  `fname` VARCHAR(50) NOT NULL,
  `lname` VARCHAR(50) NOT NULL,
  `email` VARCHAR(100) NOT NULL UNIQUE,  -- Ensure email is unique
  `password` VARCHAR(255) NOT NULL,
  `role` TINYINT(4) DEFAULT 2,  -- Default role can be '2' for regular user
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  -- Fix: Correct timestamp default
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,  -- Fix: Automatically update on changes
  PRIMARY KEY (`user_id`)  -- Ensure user_id is the primary key
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Artwork Table
CREATE TABLE `Artwork` (
    `artwork_id` INT AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(100) NOT NULL,
    `description` TEXT,
    `art_type` ENUM('painting', 'sculpture', 'photography', 'digital', 'other') NOT NULL,
    `price` DECIMAL(10, 2),
    `image_path` VARCHAR(255),  -- URL or file path for the artwork image/media
    `artist_id` INT,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`artist_id`) REFERENCES `users`(`user_id`) ON DELETE SET NULL  -- Fix: Correct table name to `users`
);

-- Marketplace Table
CREATE TABLE `Marketplace` (
    `transaction_id` INT AUTO_INCREMENT PRIMARY KEY,
    `item_description` TEXT,
    `seller_id` INT NOT NULL,
    `buyer_id` INT,
    `artwork_id` INT NOT NULL,
    `price` DECIMAL(10, 2) NOT NULL,
    `transaction_status` ENUM('pending', 'completed', 'canceled') DEFAULT 'pending',
    `transaction_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`seller_id`) REFERENCES `users`(`user_id`) ON DELETE CASCADE,
    FOREIGN KEY (`buyer_id`) REFERENCES `users`(`user_id`) ON DELETE SET NULL,
    FOREIGN KEY (`artwork_id`) REFERENCES `Artwork`(`artwork_id`) ON DELETE CASCADE
);

<<<<<<< HEAD



CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `contact_messages` (
  `message_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `message_content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `likes` (
  `like_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `artwork_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
=======

