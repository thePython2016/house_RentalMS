-- Run in phpMyAdmin or: mysql -u root houserentaldb < create_regions_table.sql
USE houserentaldb;

CREATE TABLE IF NOT EXISTS regions (
  name VARCHAR(100) NOT NULL,
  lat DECIMAL(10, 6) NOT NULL,
  lon DECIMAL(10, 6) NOT NULL,
  marks INT NOT NULL DEFAULT 0,
  PRIMARY KEY (name)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT IGNORE INTO regions (name, lat, lon, marks) VALUES
('Mwanza', -2.516400, 32.917500, 0),
('Arusha', -3.386900, 36.683000, 0),
('Dar es Salaam', -6.792400, 39.208300, 0),
('Dodoma', -6.163000, 35.751600, 0),
('Kilimanjaro', -3.066700, 37.350000, 0),
('Mbeya', -8.900000, 33.450000, 0),
('Tabora', -5.016700, 32.800000, 0),
('Geita', -2.866700, 32.166700, 0),
('Kagera', -1.331700, 31.812200, 0);

-- Houses table (used when adding properties)
CREATE TABLE IF NOT EXISTS houses (
  houseNumber VARCHAR(50) NOT NULL,
  region VARCHAR(100) NOT NULL,
  district VARCHAR(100) NOT NULL,
  physicalAddress VARCHAR(255) NOT NULL,
  rentalFee DECIMAL(12, 2) NOT NULL DEFAULT 0,
  attachment VARCHAR(255) DEFAULT NULL,
  name VARCHAR(100) DEFAULT NULL,
  PRIMARY KEY (houseNumber)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
