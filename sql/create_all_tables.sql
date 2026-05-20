-- Full local schema for houserentaldb (also auto-applied via inc/ensureSchema.php)
USE houserentaldb;

SOURCE create_regions_table.sql;
SOURCE create_message_tables.sql;

CREATE TABLE IF NOT EXISTS tenants (
  startDate DATE DEFAULT NULL,
  mobileNumber VARCHAR(30) NOT NULL,
  email VARCHAR(255) DEFAULT NULL,
  houseNumber VARCHAR(50) DEFAULT NULL,
  firstname VARCHAR(100) DEFAULT NULL,
  middlename VARCHAR(100) DEFAULT NULL,
  lastname VARCHAR(100) DEFAULT NULL,
  gender VARCHAR(20) DEFAULT NULL,
  kinPhone VARCHAR(30) DEFAULT NULL,
  address VARCHAR(255) DEFAULT NULL,
  endDate DATE DEFAULT NULL,
  amount DECIMAL(12, 2) NOT NULL DEFAULT 0,
  contract VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (mobileNumber)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS rentalFees (
  id INT NOT NULL AUTO_INCREMENT,
  houseNumber VARCHAR(50) NOT NULL,
  rentalFee DECIMAL(12, 2) NOT NULL DEFAULT 0,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS rentalPayments (
  paymentNumber VARCHAR(50) NOT NULL,
  amount DECIMAL(12, 2) NOT NULL DEFAULT 0,
  mobileNumber VARCHAR(30) NOT NULL,
  PRIMARY KEY (paymentNumber)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS account (
  username VARCHAR(50) NOT NULL,
  password VARCHAR(255) NOT NULL,
  level VARCHAR(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (username)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT IGNORE INTO account (username, password, level) VALUES
('admin', 'admin', '1'),
('tenant', 'tenant', '2');
