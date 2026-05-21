<?php declare(strict_types=1);
ob_start();
/**
 * Vercel entry for dashboard and other .php pages outside /api/.
 * Routes in vercel.json rewrite /path/to/page.php → /api/router.php?file=path/to/page.php
 */

require_once __DIR__ . '/../includes/auth_cookie.php';
require_once __DIR__ . '/../includes/app.php';
app_session_start();

$file = isset($_GET['file']) ? (string) $_GET['file'] : '';
$file = str_replace('\\', '/', $file);
$file = ltrim($file, '/');

if (
    $file === ''
    || !str_ends_with($file, '.php')
    || str_contains($file, '..')
    || preg_match('#(^|/)(includes|PHPMailer|SimpleExcel)(/|$)#i', $file) === 1
) {
    http_response_code(404);
    echo 'Not found';
    exit;
}

$root = dirname(__DIR__);
$path = $root . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $file);

if (!is_file($path)) {
    http_response_code(404);
    echo 'Not found';
    exit;
}

$_SERVER['SCRIPT_NAME'] = '/' . $file;
require $path;
