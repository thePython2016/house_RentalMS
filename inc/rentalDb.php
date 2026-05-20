<?php
/**
 * Shared DB helpers for form handlers — avoids mysqli_sql_exception fatals.
 */
function rentalInitDb(mysqli $conn): void
{
    mysqli_report(MYSQLI_REPORT_OFF);
}

function rentalEnsureSession(): void
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

function rentalDbError(mysqli $conn): string
{
    $err = mysqli_error($conn);
    return $err !== '' ? $err : 'Database error';
}

/** Tenant balance column — supports legacy `Amount` key from older schemas. */
function rentalTenantAmount(array $tenant, $default = '0'): string
{
    if (isset($tenant['amount'])) {
        return (string) $tenant['amount'];
    }
    if (isset($tenant['Amount'])) {
        return (string) $tenant['Amount'];
    }
    return (string) $default;
}

function rentalScriptRedirect(string $url, ?string $sessionKey = null, ?string $message = null): void
{
    rentalEnsureSession();
    if ($sessionKey !== null && $message !== null) {
        $_SESSION[$sessionKey] = $message;
    }
    echo '<script>window.location.href=' . json_encode($url) . ';</script>';
    exit;
}

function rentalAlertRedirect(string $url, string $alertMessage): void
{
    $msg = json_encode($alertMessage);
    $target = json_encode($url);
    echo "<script>alert($msg);window.location.href=$target;</script>";
    exit;
}
