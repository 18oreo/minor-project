<?php include 'db.php'; ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $email = $_POST['email'];
    $pass = md5($_POST['password']);

    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $user, $email, $pass);

    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        $error = "Signup failed!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup | Waste Food</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <form method="POST" class="form signup-form">
        <h2>Sign Up</h2>
        <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Register</button>
        <a href="index.php">Back to Login</a>
    </form>
</div>
<script src="script.js"></script>
</body>
</html>
