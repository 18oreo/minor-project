<?php include 'db.php'; ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows) {
        echo "<script>alert('Password reset link would be sent to email in a real app');</script>";
    } else {
        $error = "Email not found";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password | Waste Food</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <form method="POST" class="form forgot-form">
        <h2>Forgot Password</h2>
        <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
        <input type="email" name="email" placeholder="Email" required>
        <button type="submit">Send Reset Link</button>
        <a href="index.php">Back to Login</a>
    </form>
</div>
<script src="script.js"></script>
</body>
</html>
