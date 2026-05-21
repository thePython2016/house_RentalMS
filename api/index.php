<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Load .env file for local development
if (file_exists(__DIR__ . '/../.env')) {
    $lines = file(__DIR__ . '/../.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos($line, '=') !== false && strpos($line, '#') !== 0) {
            putenv($line);
        }
    }
}

session_start();
define("BASE_URL", "/rental/");

$conn = new mysqli(
    getenv('MYSQL_ADDON_HOST'),
    getenv('MYSQL_ADDON_USER'),
    getenv('MYSQL_ADDON_PASSWORD'),
    getenv('MYSQL_ADDON_DB'),
    (int)getenv('MYSQL_ADDON_PORT')
);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$login_error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = trim($_POST['username'] ?? "");
    $password = trim($_POST['password'] ?? "");

    if ($username === "" || $password === "") {
        $login_error = "Please enter both username and password.";
    } else {
        $stmt = $conn->prepare("SELECT password, level FROM account WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();

        if ($row) {
            $passwordMatches = false;

            // Check if password is plain text (not yet hashed)
            if (!str_starts_with($row['password'], '$2y$')) {
                // Plain text — compare directly
                if ($password === $row['password']) {
                    $passwordMatches = true;

                    // Upgrade to hashed password in DB
                    $newHash = password_hash($password, PASSWORD_DEFAULT);
                    $update = $conn->prepare("UPDATE account SET password = ? WHERE username = ?");
                    $update->bind_param("ss", $newHash, $username);
                    $update->execute();
                    $update->close();
                }
            } else {
                // Already hashed — use password_verify
                if (password_verify($password, $row['password'])) {
                    $passwordMatches = true;
                }
            }

            if ($passwordMatches) {
                session_regenerate_id(true);
                $_SESSION['id'] = $username;
                $_SESSION['level'] = $row['level'];

                if ($row['level'] == "1") {
                    header("Location: " . BASE_URL . "dashboard/dashboard.php");
                    exit;
                }
                if ($row['level'] == "2") {
                    header("Location: " . BASE_URL . "tenant/tenant-details.php");
                    exit;
                }
            }
        }

        $login_error = "Invalid username or password.";
    }
}
$conn->close();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login – Rental System</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="/rental/css/style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body>
<div class="card">
  <div class="logo-wrap">
    <img src="/rental/img/logo3.png" alt="Logo">
  </div>
  <h1>Welcome Back</h1>
  <p class="subtitle">Sign in to the Rental Management System</p>

  <?php if ($login_error !== ""): ?>
    <div class="error-box">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
      <?php echo htmlspecialchars($login_error); ?>
    </div>
  <?php endif; ?>

  <form action="index.php" method="POST" autocomplete="off">
    <div class="field">
      <label for="username">Account Type</label>
      <select name="username"  required>
        <option value="" disabled selected>Select your role…</option>
        <option value="admin">Property Owner</option>
        <option value="tenant">Tenant</option>
      </select>
    </div>

    <div class="field">
      <label for="password">Password</label>
      <div class="password-wrap">
        <input type="password" name="password" id="password" placeholder="Enter your password" required autocomplete="current-password">
        <button type="button" class="toggle-pw" id="togglePassword" aria-label="Toggle password visibility">
          <svg id="eyeIcon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
            <circle cx="12" cy="12" r="3"/>
          </svg>
        </button>
      </div>
    </div>

    <button type="submit" name="login" class="btn-login">Sign In</button>
  </form>

  <hr class="divider">
  <p class="footer-note">
    Forgot your password?<br>
    Please contact your administrator.
  </p>
</div>

<script>
  const toggleBtn = document.getElementById('togglePassword');
  const passwordInput = document.getElementById('password');
  const eyeIcon = document.getElementById('eyeIcon');

  const eyeOpen  = `<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>`;
  const eyeSlash = `<line x1="1" y1="1" x2="23" y2="23"/><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/><path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/></line>`;

  let visible = false;
  toggleBtn.addEventListener('click', () => {
    visible = !visible;
    passwordInput.type = visible ? 'text' : 'password';
    eyeIcon.innerHTML = visible ? eyeSlash : eyeOpen;
  });
</script>
</body>
</html>