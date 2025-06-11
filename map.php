<?php
// map.php - Leaflet.js + OpenStreetMap integration with database
require_once 'db_connect.php'; // Make sure this connects using PDO

// Initialize arrays
$donors = [];
$receivers = [];

try {
    // Fetch donors
    $stmt = $conn->prepare("SELECT name, lat, lng FROM users WHERE role = 'donor'");
    $stmt->execute();
    $donors = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Fetch receivers
    $stmt = $conn->prepare("SELECT name, lat, lng FROM users WHERE role = 'receiver'");
    $stmt->execute();
    $receivers = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Map - Waste Food Management</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
    }

    header {
      background-color: #2c3e50;
      padding: 10px 20px;
      color: white;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .logo img {
      height: 50px;
    }

    nav ul {
      list-style: none;
      display: flex;
      gap: 20px;
      padding: 0;
      margin: 0;
    }

    nav ul li a {
      color: white;
      text-decoration: none;
      font-weight: bold;
      transition: transform 0.2s ease-in-out;
    }

    nav ul li a:hover {
      transform: scale(1.1);
      color: #f1c40f;
    }

    #map {
      height: 90vh;
      width: 100%;
    }
  </style>
</head>
<body>

  <!-- Header & Navigation -->
  <header>
    <div class="logo">
      <img src="logo.png" alt="Logo">
    </div>
    <nav>
      <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="#">Map</a></li>
        <li><a href="#donors">Available Donors</a></li>
        <li><a href="#receivers">Available Receivers</a></li>
        <li><a href="aboutus.php">About Us</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
    </nav>
  </header>

  <!-- Leaflet Map Section -->
  <div id="map"></div>

  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <script>
    const map = L.map('map').setView([22.5726, 88.3639], 13); // Default center: Kolkata

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; OpenStreetMap contributors',
      maxZoom: 19
    }).addTo(map);

    // Donors from PHP
    const donors = <?php echo json_encode($donors); ?>;
    donors.forEach(donor => {
      L.marker([donor.lat, donor.lng], {
        icon: L.icon({
          iconUrl: 'https://maps.google.com/mapfiles/ms/icons/green-dot.png',
          iconSize: [32, 32]
        })
      }).addTo(map).bindPopup("Donor: " + donor.name);
    });

    // Receivers from PHP
    const receivers = <?php echo json_encode($receivers); ?>;
    receivers.forEach(receiver => {
      L.marker([receiver.lat, receiver.lng], {
        icon: L.icon({
          iconUrl: 'https://maps.google.com/mapfiles/ms/icons/red-dot.png',
          iconSize: [32, 32]
        })
      }).addTo(map).bindPopup("Receiver: " + receiver.name);
    });

    // User Location
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        const userLatLng = [position.coords.latitude, position.coords.longitude];
        L.marker(userLatLng, {
          icon: L.icon({
            iconUrl: 'https://maps.google.com/mapfiles/ms/icons/blue-dot.png',
            iconSize: [32, 32]
          })
        }).addTo(map).bindPopup("You are here").openPopup();
        map.setView(userLatLng, 14);
      }, function() {
        alert("Location access denied. Showing default area.");
      });
    } else {
      alert("Geolocation not supported by this browser.");
    }
  </script>
</body>
</html>