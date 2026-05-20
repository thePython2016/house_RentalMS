<?php
/**
 * Auto-create all rental app tables + seed data for local XAMPP use.
 */
function ensureRentalSchema(mysqli $conn): void
{
    ensureRegionsAndHouses($conn);
    ensureTenantsTable($conn);
    ensureRentalFeesTable($conn);
    ensureRentalPaymentsTable($conn);
    ensureMessageTables($conn);
    ensureAccountTable($conn);
}

/** @deprecated Use ensureRentalSchema — kept for existing includes */
function ensureRegionsSchema(mysqli $conn): void
{
    ensureRentalSchema($conn);
}

function ensureRegionsAndHouses(mysqli $conn): void
{
    mysqli_query($conn, "CREATE TABLE IF NOT EXISTS regions (
        name VARCHAR(100) NOT NULL,
        lat DECIMAL(10, 6) NOT NULL,
        lon DECIMAL(10, 6) NOT NULL,
        marks INT NOT NULL DEFAULT 0,
        PRIMARY KEY (name)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

    $seedRegions = [
        ['Mwanza', -2.516400, 32.917500],
        ['Arusha', -3.386900, 36.683000],
        ['Dar es Salaam', -6.792400, 39.208300],
        ['Dodoma', -6.163000, 35.751600],
        ['Kilimanjaro', -3.066700, 37.350000],
        ['Mbeya', -8.900000, 33.450000],
        ['Tabora', -5.016700, 32.800000],
        ['Geita', -2.866700, 32.166700],
        ['Kagera', -1.331700, 31.812200],
    ];

    foreach ($seedRegions as $row) {
        $name = mysqli_real_escape_string($conn, $row[0]);
        $lat = (float) $row[1];
        $lon = (float) $row[2];
        mysqli_query(
            $conn,
            "INSERT IGNORE INTO regions (name, lat, lon, marks) VALUES ('$name', $lat, $lon, 0)"
        );
    }

    mysqli_query($conn, "CREATE TABLE IF NOT EXISTS houses (
        houseNumber VARCHAR(50) NOT NULL,
        region VARCHAR(100) NOT NULL,
        district VARCHAR(100) NOT NULL,
        physicalAddress VARCHAR(255) NOT NULL,
        rentalFee DECIMAL(12, 2) NOT NULL DEFAULT 0,
        attachment VARCHAR(255) DEFAULT NULL,
        name VARCHAR(100) DEFAULT NULL,
        PRIMARY KEY (houseNumber)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
}

function ensureTenantsTable(mysqli $conn): void
{
    mysqli_query($conn, "CREATE TABLE IF NOT EXISTS tenants (
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
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

    normalizeTenantsAmountColumn($conn);
}

/**
 * Legacy DBs used `Amount`; app expects lowercase `amount`.
 */
function normalizeTenantsAmountColumn(mysqli $conn): void
{
    $hasLower = mysqli_query($conn, "SHOW COLUMNS FROM tenants LIKE 'amount'");
    if ($hasLower && mysqli_num_rows($hasLower) > 0) {
        return;
    }
    $hasUpper = mysqli_query($conn, "SHOW COLUMNS FROM tenants LIKE 'Amount'");
    if ($hasUpper && mysqli_num_rows($hasUpper) > 0) {
        mysqli_query(
            $conn,
            'ALTER TABLE tenants CHANGE `Amount` `amount` DECIMAL(12, 2) NOT NULL DEFAULT 0'
        );
        return;
    }
    mysqli_query(
        $conn,
        'ALTER TABLE tenants ADD COLUMN amount DECIMAL(12, 2) NOT NULL DEFAULT 0'
    );
}

function ensureRentalFeesTable(mysqli $conn): void
{
    mysqli_query($conn, "CREATE TABLE IF NOT EXISTS rentalFees (
        id INT NOT NULL AUTO_INCREMENT,
        houseNumber VARCHAR(50) NOT NULL,
        rentalFee DECIMAL(12, 2) NOT NULL DEFAULT 0,
        PRIMARY KEY (id),
        KEY idx_house (houseNumber)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
}

function ensureRentalPaymentsTable(mysqli $conn): void
{
    mysqli_query($conn, "CREATE TABLE IF NOT EXISTS rentalPayments (
        paymentNumber VARCHAR(50) NOT NULL,
        amount DECIMAL(12, 2) NOT NULL DEFAULT 0,
        mobileNumber VARCHAR(30) NOT NULL,
        PRIMARY KEY (paymentNumber),
        KEY idx_mobile (mobileNumber)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
}

function ensureMessageTables(mysqli $conn): void
{
    mysqli_query($conn, "CREATE TABLE IF NOT EXISTS sentSMS (
        message_id VARCHAR(50) NOT NULL,
        date DATETIME NOT NULL,
        sender VARCHAR(100) NOT NULL,
        receiver TEXT NOT NULL,
        subject VARCHAR(255) DEFAULT NULL,
        message TEXT NOT NULL,
        PRIMARY KEY (message_id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

    mysqli_query($conn, "CREATE TABLE IF NOT EXISTS sent (
        message_id VARCHAR(50) NOT NULL,
        date DATETIME NOT NULL,
        sender VARCHAR(100) NOT NULL,
        receiver VARCHAR(255) NOT NULL,
        subject VARCHAR(255) DEFAULT NULL,
        message TEXT NOT NULL,
        PRIMARY KEY (message_id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
}

function ensureAccountTable(mysqli $conn): void
{
    mysqli_query($conn, "CREATE TABLE IF NOT EXISTS account (
        username VARCHAR(50) NOT NULL,
        password VARCHAR(255) NOT NULL,
        level VARCHAR(10) NOT NULL DEFAULT '1',
        PRIMARY KEY (username)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

    mysqli_query(
        $conn,
        "INSERT IGNORE INTO account (username, password, level) VALUES
        ('admin', 'admin', '1'),
        ('tenant', 'tenant', '2')"
    );
}

function syncRegionMarks(mysqli $conn, string $region): void
{
    $regionEsc = mysqli_real_escape_string($conn, $region);
    $countResult = mysqli_query(
        $conn,
        "SELECT COUNT(*) AS cnt FROM houses WHERE region='$regionEsc'"
    );
    if (!$countResult) {
        return;
    }
    $row = mysqli_fetch_assoc($countResult);
    $count = (int) ($row['cnt'] ?? 0);
    mysqli_query(
        $conn,
        "UPDATE regions SET marks=$count WHERE name='$regionEsc'"
    );
}
