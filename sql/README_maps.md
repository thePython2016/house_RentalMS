# Google Maps setup (local XAMPP)

1. Copy `inc/config.example.php` to `inc/config.local.php`.
2. Set `GOOGLE_MAPS_API_KEY` to your key from [Google Cloud Console](https://console.cloud.google.com/google/maps-apis).
3. Enable **Maps JavaScript API** for the project.
4. Under API key restrictions, add HTTP referrer: `http://localhost/*`
5. Open http://localhost/rental/dashboard/map.php (after login).

Do not commit `inc/config.local.php` — it is listed in `.gitignore`.
