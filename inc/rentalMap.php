<?php
require_once __DIR__ . '/config.php';

function rentalMapsApiKey(): string
{
    return defined('GOOGLE_MAPS_API_KEY') ? trim((string) GOOGLE_MAPS_API_KEY) : '';
}

function rentalMapsApiKeyConfigured(): bool
{
    $key = rentalMapsApiKey();
    if ($key === '') {
        return false;
    }
    $placeholders = ['pk.5e17739b49ba1138a9075e59fbc0738a', 'YOUR_API_KEY_HERE', 'PASTE_KEY_HERE'];
    return !in_array($key, $placeholders, true);
}

/**
 * @return list<array{name: string, lat: string|float, lon: string|float, marks: string|int}>
 */
function rentalFetchRegionsForMap(mysqli $conn): array
{
    $regions = [];
    $result = mysqli_query($conn, 'SELECT name, lat, lon, marks FROM regions ORDER BY name');
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $regions[] = $row;
        }
    }
    return $regions;
}
