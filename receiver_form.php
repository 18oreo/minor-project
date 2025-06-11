<?php
require_once 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $food_type = trim($_POST['food_type']);
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    $role = 'receiver';

    try {
        $stmt = $conn->prepare("INSERT INTO users (name, email, role, food_type, lat, lng) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$name, $email, $role, $food_type, $lat, $lng]);

        echo "<script>alert('Receiver registered successfully!'); window.location.href='dashboard.php';</script>";
    } catch (PDOException $e) {
        echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Receiver Registration</title>
  <style>
    form {
      max-width: 400px;
      margin: 50px auto;
      padding: 20px;
      background: #f4f4f4;
      border-radius: 10px;
      box-shadow: 0 0 10px #ccc;
    }

    input, button {
      width: 100%;
      margin-bottom: 10px;
      padding: 10px;
      border-radius: 5px;
    }

    button {
      background: #2980b9;
      color: white;
      border: none;
      cursor: pointer;
    }
  </style>
</head>
<body>

<form method="POST" action="" onsubmit="return captureLocation()">
  <h2>Receiver Registration</h2>
  <input type="text" name="name" placeholder="Full Name" required>
  <input type="email" name="email" placeholder="Email" required>
  <input type="text" name="food_type" placeholder="Type of Food Needed" required>
  <input type="hidden" name="lat" id="lat">
  <input type="hidden" name="lng" id="lng">
  <button type="submit">Register as Receiver</button>
</form>

<script>
function captureLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      document.getElementById('lat').value = position.coords.latitude;
      document.getElementById('lng').value = position.coords.longitude;
      document.forms[0].submit();
    }, function(error) {
      alert("Please allow location access to proceed.");
    });
    return false;
  } else {
    alert("Geolocation is not supported by your browser.");
    return false;
  }
}
</script>

</body>
</html>