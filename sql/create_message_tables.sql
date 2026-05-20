-- Run in phpMyAdmin or: mysql -u root houserentaldb < create_message_tables.sql
USE houserentaldb;

CREATE TABLE IF NOT EXISTS sentSMS (
  message_id VARCHAR(50) NOT NULL,
  date DATETIME NOT NULL,
  sender VARCHAR(100) NOT NULL,
  receiver TEXT NOT NULL,
  subject VARCHAR(255) DEFAULT NULL,
  message TEXT NOT NULL,
  PRIMARY KEY (message_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS sent (
  message_id VARCHAR(50) NOT NULL,
  date DATETIME NOT NULL,
  sender VARCHAR(100) NOT NULL,
  receiver VARCHAR(255) NOT NULL,
  subject VARCHAR(255) DEFAULT NULL,
  message TEXT NOT NULL,
  PRIMARY KEY (message_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
