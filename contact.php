<?php
require_once 'db_connect.php'; // Connect to DB

$name = $email = $message = $rating = "";
$success = $error = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);
    $rating = (int) $_POST["rating"];

    if ($name && $email && $message && $rating >= 1 && $rating <= 5) {
        try {
            $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, message, rating) VALUES (?, ?, ?, ?)");
            $stmt->execute([$name, $email, $message, $rating]);
            $success = "Thank you! Your message and rating have been submitted.";
            $name = $email = $message = "";
            $rating = "";
        } catch (PDOException $e) {
            $error = "Database error: " . $e->getMessage();
        }
    } else {
        $error = "All fields are required and rating must be between 1 and 5.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Us - Waste Food Management</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f4f4;
      padding: 20px;
    }

    .container {
      max-width: 700px;
      background: white;
      margin: 50px auto;
      padding: 30px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      border-radius: 10px;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #2c3e50;
    }

    form input, form textarea, form select {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    form button {
      background-color: #27ae60;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 5px;
      width: 100%;
      cursor: pointer;
    }

    form button:hover {
      background-color: #219150;
    }

    .info {
      margin-top: 30px;
      padding-top: 20px;
      border-top: 1px solid #ddd;
    }

    .info h3 {
      color: #34495e;
    }

    .success, .error {
      padding: 10px;
      margin-bottom: 20px;
      text-align: center;
      border-radius: 5px;
    }

    .success {
      background-color: #dff0d8;
      color: #3c763d;
    }

    .error {
      background-color: #f2dede;
      color: #a94442;
    }

    iframe {
      width: 100%;
      height: 300px;
      border: none;
      margin-top: 20px;
      border-radius: 10px;
    }

    /* Star Rating Styles */
    .rating-stars {
      display: flex;
      justify-content: center;
      gap: 5px;
      margin-bottom: 15px;
    }

    .rating-stars input {
      display: none;
    }

    .rating-stars label {
      font-size: 25px;
      color: #ccc;
      cursor: pointer;
      transition: color 0.2s;
    }

    .rating-stars input:checked ~ label,
    .rating-stars label:hover,
    .rating-stars label:hover ~ label {
      color: #f1c40f;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Contact Us</h2>

  <?php if ($success): ?>
    <div class="success"><?= $success ?></div>
  <?php elseif ($error): ?>
    <div class="error"><?= $error ?></div>
  <?php endif; ?>

  <form method="POST" action="">
    <input type="text" name="name" placeholder="Your Name" value="<?= htmlspecialchars($name) ?>" required>
    <input type="email" name="email" placeholder="Your Email" value="<?= htmlspecialchars($email) ?>" required>
    <textarea name="message" rows="5" placeholder="Your Message" required><?= htmlspecialchars($message) ?></textarea>

    <div class="rating-stars">
      <input type="radio" id="star5" name="rating" value="5" required><label for="star5">&#9733;</label>
      <input type="radio" id="star4" name="rating" value="4"><label for="star4">&#9733;</label>
      <input type="radio" id="star3" name="rating" value="3"><label for="star3">&#9733;</label>
      <input type="radio" id="star2" name="rating" value="2"><label for="star2">&#9733;</label>
      <input type="radio" id="star1" name="rating" value="1"><label for="star1">&#9733;</label>
    </div>

    <button type="submit">Send Message</button>
  </form>

  <div class="info">
    <h3>Our Contact Information</h3>
    <p><strong>Email:</strong> support@wastefoodmanagement.com</p>
    <p><strong>Phone:</strong> +91-8697900630</p>
    <p><strong>Working Hours:</strong> Mon - Fri: 9 AM - 6 PM</p>

    <h3>Our Location</h3>
    <p>Panchrokhi, Sugandha, Hooghly, West Bengal</p>
    
    <iframe src="https://www.google.com/maps?q=Hooghly,West+Bengal&output=embed"></iframe>
  </div>
</div>

</body>
</html>