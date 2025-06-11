<?php
require_once 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    $role = 'donor';
    $food_type = $_POST['food_type'];

    try {
        $stmt = $conn->prepare("INSERT INTO users (name, email, role, lat, lng, food_type) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$name, $email, $role, $lat, $lng, $food_type]);


        echo "<script>alert('Donor registered successfully!');</script>";
    } catch (PDOException $e) {
        echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Donor Registration</title>
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
      background: green;
      color: white;
      border: none;
      cursor: pointer;
    }
  </style>
</head>
<body>

<form method="POST" action="" onsubmit="return captureLocation()">
  <h2>Donor Registration</h2>
  <input type="text" name="name" placeholder="Full Name" required>
  <input type="email" name="email" placeholder="Email" required>
  <input type="hidden" name="lat" id="lat">
  <input type="hidden" name="lng" id="lng">
  <input type="text" name="food_type" placeholder="Type of food" required>
  <button type="submit">Register as Donor</button>
</form>

<script>
document.querySelector("form").addEventListener("submit", function (e) {
  e.preventDefault(); // Prevent default form submission

  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function (position) {
      document.getElementById("lat").value = position.coords.latitude;
      document.getElementById("lng").value = position.coords.longitude;

      // Submit the form manually after setting location
      e.target.submit();
    }, function (error) {
      alert("Please allow location access to proceed.");
    });
  } else {
    alert("Geolocation is not supported by your browser.");
  }
});
</script>


</body>
</html>
