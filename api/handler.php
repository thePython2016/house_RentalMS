<?php
// /user/includes/login_auth.php

/**
 * Handles the user authentication process securely using PDO Prepared Statements.
 *
 * @param PDO $db The active database connection object passed from index.php
 * @return array An array containing 'success' status and either 'user' data or an 'error' message.
 */
function app_handle_login(PDO $db) {
    // 1. Check if the required POST data is present
    if (!isset($_POST['username']) || !isset($_POST['password'])) {
        return [
            'success' => false, 
            'error' => 'Please provide both a username and password.'
        ];
    }

    // 2. Grab inputs (No db_escape needed! Prepared statements handle security)
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    try {
        // 3. Prepare the SQL statement using placeholders (?) to prevent SQL Injection
        $stmt = $db->prepare("SELECT id, username, password_hash FROM users WHERE username = ? LIMIT 1");
        
        // 4. Execute the statement by passing the unsafe input data separately
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // 5. Verify the user exists and the password matches the stored hash
        if ($user && password_verify($password, $user['password_hash'])) {
            
            // Log the user in (Example using native PHP Sessions)
            if (!function_exists('app_session_start')) {
                require_once __DIR__ . '/../includes/app.php';
            }
            app_session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            // Strip the sensitive password hash before returning user data
            unset($user['password_hash']);
            
            return [
                'success' => true, 
                'user' => $user
            ];
        } else {
            return [
                'success' => false, 
                'error' => 'Invalid username or password.'
            ];
        }

    } catch (PDOException $e) {
        // Handle any database connection or query errors gracefully
        return [
            'success' => false, 
            'error' => 'Database error occurred. Please try again later.'
        ];
    }
}