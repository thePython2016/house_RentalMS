<?php
/**
 * App configuration. Do not put real API keys in this file.
 * Copy inc/config.example.php to inc/config.local.php and set your keys there.
 */
if (is_readable(__DIR__ . '/config.local.php')) {
    require __DIR__ . '/config.local.php';
}

if (!defined('GOOGLE_MAPS_API_KEY')) {
    $envKey = getenv('GOOGLE_MAPS_API_KEY');
    define('GOOGLE_MAPS_API_KEY', $envKey !== false ? trim((string) $envKey) : '');
}
