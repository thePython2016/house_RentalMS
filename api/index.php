<?php
<?php
session_start();
define("BASE_URL", "/");

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

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
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
        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT password, level FROM account WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();

        if ($row && password_verify($password, $row['password'])) {
            // Regenerate session ID to prevent session fixation
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
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --bg:       #0b1120;
      --surface:  #111827;
      --border:   #1e2d45;
      --accent:   #3b82f6;
      --accent2:  #06b6d4;
      --text:     #f1f5f9;
      --muted:    #94a3b8;
      --danger:   #f87171;
      --radius:   14px;
    }

    body {
      min-height: 100vh;
      background: var(--bg);
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'DM Sans', sans-serif;
      color: var(--text);
      overflow: hidden;
    }

    /* animated background blobs */
    body::before, body::after {
      content: '';
      position: fixed;
      border-radius: 50%;
      filter: blur(80px);
      opacity: 0.25;
      animation: drift 12s ease-in-out infinite alternate;
      pointer-events: none;
    }
    body::before {
      width: 500px; height: 500px;
      background: radial-gradient(circle, #3b82f6, transparent 70%);
      top: -150px; left: -150px;
    }
    body::after {
      width: 400px; height: 400px;
      background: radial-gradient(circle, #06b6d4, transparent 70%);
      bottom: -100px; right: -100px;
      animation-delay: -6s;
    }
    @keyframes drift {
      from { transform: translate(0, 0) scale(1); }
      to   { transform: translate(40px, 30px) scale(1.08); }
    }

    .card {
      position: relative;
      z-index: 1;
      background: var(--surface);
      border: 1px solid var(--border);
      border-radius: calc(var(--radius) * 1.5);
      padding: 48px 44px 40px;
      width: 100%;
      max-width: 420px;
      box-shadow: 0 24px 64px rgba(0,0,0,0.5);
      animation: slideUp 0.5s cubic-bezier(.22,.68,0,1.2) both;
    }
    @keyframes slideUp {
      from { opacity: 0; transform: translateY(32px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    .logo-wrap {
      display: flex;
      justify-content: center;
      margin-bottom: 28px;
    }
    .logo-wrap img {
      width: 72px;
      height: 72px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid var(--border);
      box-shadow: 0 0 0 6px rgba(59,130,246,0.12);
    }

    h1 {
      font-family: 'DM Serif Display', serif;
      font-size: 1.75rem;
      text-align: center;
      margin-bottom: 6px;
      background: linear-gradient(135deg, var(--text), var(--muted));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
    .subtitle {
      text-align: center;
      font-size: 0.85rem;
      color: var(--muted);
      margin-bottom: 32px;
    }

    .field { margin-bottom: 18px; }
    label {
      display: block;
      font-size: 0.78rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      color: var(--muted);
      margin-bottom: 7px;
    }

    select, input {
      width: 100%;
      background: var(--bg);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      color: var(--text);
      font-family: 'DM Sans', sans-serif;
      font-size: 0.95rem;
      padding: 11px 14px;
      outline: none;
      transition: border-color 0.2s, box-shadow 0.2s;
      appearance: none;
      -webkit-appearance: none;
    }
    select { background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%2394a3b8' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E"); background-repeat: no-repeat; background-position: right 14px center; padding-right: 36px; }
    select option { background: #1e2d45; }
    select:focus, input:focus {
      border-color: var(--accent);
      box-shadow: 0 0 0 3px rgba(59,130,246,0.18);
    }

    .password-wrap { position: relative; }
    .password-wrap input { padding-right: 44px; }
    .toggle-pw {
      position: absolute;
      right: 13px;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
      color: var(--muted);
      cursor: pointer;
      padding: 4px;
      line-height: 1;
      transition: color 0.2s;
    }
    .toggle-pw:hover { color: var(--text); }

    .btn-login {
      width: 100%;
      margin-top: 8px;
      padding: 13px;
      border: none;
      border-radius: var(--radius);
      background: linear-gradient(135deg, var(--accent), var(--accent2));
      color: #fff;
      font-family: 'DM Sans', sans-serif;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      letter-spacing: 0.03em;
      transition: opacity 0.2s, transform 0.15s, box-shadow 0.2s;
      box-shadow: 0 4px 20px rgba(59,130,246,0.35);
    }
    .btn-login:hover  { opacity: 0.92; transform: translateY(-1px); box-shadow: 0 6px 28px rgba(59,130,246,0.45); }
    .btn-login:active { transform: translateY(0); opacity: 1; }

    .error-box {
      display: flex;
      align-items: center;
      gap: 8px;
      background: rgba(248,113,113,0.1);
      border: 1px solid rgba(248,113,113,0.3);
      border-radius: var(--radius);
      color: var(--danger);
      font-size: 0.875rem;
      padding: 11px 14px;
      margin-bottom: 18px;
      animation: shake 0.4s ease;
    }
    @keyframes shake {
      0%,100%{ transform: translateX(0); }
      20%    { transform: translateX(-6px); }
      40%    { transform: translateX(6px); }
      60%    { transform: translateX(-4px); }
      80%    { transform: translateX(4px); }
    }

    .divider { border: none; border-top: 1px solid var(--border); margin: 28px 0 18px; }
    .footer-note {
      text-align: center;
      font-size: 0.82rem;
      color: var(--muted);
      line-height: 1.6;
    }

    @media (max-width: 480px) {
      .card { padding: 36px 24px 28px; }
    }
  </style>
</head>
<body>
<div class="card">
  <div class="logo-wrap">
    <img src="/img/logo3.png" alt="Logo">
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
      <select name="username" id="username" required>
        <option value="" disabled selected>Select your role…</option>
        <option value="Admin">Property Owner</option>
        <option value="Tenant">Tenant</option>
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