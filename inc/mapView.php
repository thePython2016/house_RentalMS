<?php
/** @var string $mapsApiKey */
/** @var array $regions */
/** @var bool $mapsKeyConfigured */
$regionsJson = json_encode($regions, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
?>
<div id="map-fallback" class="alert alert-warning m-3" role="alert" style="display:none;">
  <strong>Map unavailable.</strong>
  <span id="map-fallback-message"></span>
  <p class="mb-0 mt-2 small text-muted">
    Add your key in <code>inc/config.local.php</code> (copy from <code>inc/config.example.php</code>).
    Enable <em>Maps JavaScript API</em> in Google Cloud Console and allow <code>http://localhost/*</code> as an HTTP referrer.
  </p>
</div>
<div id="map"></div>
<style>
  #map {
    height: 70vh;
    min-height: 400px;
    width: 100%;
    background: #e9ecef;
  }
</style>
<script>
(function () {
  var regionsData = <?php echo $regionsJson ?: '[]'; ?>;
  var apiKeyConfigured = <?php echo $mapsKeyConfigured ? 'true' : 'false'; ?>;

  function showMapFallback(message) {
    var el = document.getElementById('map-fallback');
    var msg = document.getElementById('map-fallback-message');
    var mapEl = document.getElementById('map');
    if (msg) {
      msg.textContent = message;
    }
    if (el) {
      el.style.display = 'block';
    }
    if (mapEl) {
      mapEl.style.display = 'none';
    }
  }

  window.gm_authFailure = function () {
    showMapFallback('Google rejected the API key (invalid, expired, or referrer not allowed).');
  };

  window.initMap = function () {
    if (typeof google === 'undefined' || !google.maps) {
      showMapFallback('Google Maps library did not load.');
      return;
    }
    var mapEl = document.getElementById('map');
    if (!mapEl) {
      return;
    }
    var tanzania = { lat: -6.369028, lng: 34.888822 };
    var map = new google.maps.Map(mapEl, {
      zoom: 6,
      center: tanzania,
      mapTypeControl: true,
      streetViewControl: false
    });
    var houseIcon = {
      url: 'https://img.icons8.com/office/40/FFBB00/home--v1.png',
      scaledSize: new google.maps.Size(30, 30)
    };
    regionsData.forEach(function (region) {
      var lat = parseFloat(region.lat);
      var lng = parseFloat(region.lon);
      if (isNaN(lat) || isNaN(lng)) {
        return;
      }
      var marks = region.marks != null ? String(region.marks) : '0';
      new google.maps.Marker({
        position: { lat: lat, lng: lng },
        map: map,
        icon: houseIcon,
        label: marks,
        title: region.name + ': ' + marks + ' house(s)'
      });
    });
    var fallback = document.getElementById('map-fallback');
    if (regionsData.length === 0 && fallback) {
      fallback.className = 'alert alert-info m-3';
      document.getElementById('map-fallback-message').textContent =
        'Map loaded. No region markers yet — add houses to update counts.';
      fallback.style.display = 'block';
    } else if (fallback) {
      fallback.style.display = 'none';
    }
  };

  if (!apiKeyConfigured) {
    showMapFallback('No Google Maps API key configured.');
    return;
  }

  window.setTimeout(function () {
    if (typeof google === 'undefined' || !google.maps) {
      showMapFallback('Google Maps timed out loading. Check your API key and network.');
    }
  }, 12000);
})();
</script>
<?php if ($mapsKeyConfigured): ?>
<script
  src="https://maps.googleapis.com/maps/api/js?key=<?php echo htmlspecialchars($mapsApiKey, ENT_QUOTES, 'UTF-8'); ?>&amp;loading=async&amp;callback=initMap"
  async
  defer
></script>
<?php endif; ?>
