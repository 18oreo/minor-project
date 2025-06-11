<?php
// home.php - Homepage for Waste Food Management System
require_once 'db_connect.php';

// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['accept_request'])) {
        $donorEmail = $_POST['donor_email'];
        $receiverEmail = $_POST['receiver_email'];

        $stmt = $conn->prepare("INSERT INTO donor_receiver_requests (donor_email, receiver_email, status) VALUES (?, ?, 'accepted')");
        $stmt->execute([$donorEmail, $receiverEmail]);
    }

    if (isset($_POST['confirm_received'])) {
        $donorEmail = $_POST['donor_email'];
        $receiverEmail = $_POST['receiver_email'];

        $stmt = $conn->prepare("UPDATE donor_receiver_requests SET status='received' WHERE donor_email=? AND receiver_email=?");
        $stmt->execute([$donorEmail, $receiverEmail]);
        // Fetch accepted requests
        $stmtAccepted = $conn->query("SELECT * FROM donor_receiver_requests WHERE status = 'accepted'");
        $acceptedRequests = $stmtAccepted->fetchAll();

    }
}
try {
    // Fetch Receivers
    $stmtReceivers = $conn->query("SELECT name, email, food_type, created_at FROM users WHERE role = 'receiver' ORDER BY created_at DESC");
    $receivers = $stmtReceivers->fetchAll();

    // Fetch Donors
    $stmtDonors = $conn->query("SELECT name, email, food_type, created_at FROM users WHERE role = 'donor' ORDER BY created_at DESC");
    $donors = $stmtDonors->fetchAll();

} catch (PDOException $e) {
    echo "<p>Error loading data: " . $e->getMessage() . "</p>";
    $receivers = [];
    $donors = [];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Waste Food Management - Home</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #ffffff;
    }

    header {
      background-color: #2c3e50;
      padding: 10px 20px;
      color: white;
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
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

    #hero {
      padding: 60px 20px;
      text-align: center;
    }

    #hero h1 {
      font-size: 2.5em;
      color: #2c3e50;
      margin-bottom: 20px;
    }

    #hero p {
      font-size: 1.2em;
      color: #34495e;
    }

    #works {
      margin: 40px auto;
      padding: 20px;
      max-width: 1000px;
      text-align: center;
    }

    #works h2 {
      font-size: 2em;
      margin-bottom: 20px;
      color: #2c3e50;
    }

    .slideshow-container {
      position: relative;
      width: 100%;
      max-width: 100%;
      overflow: hidden;
      margin: auto;
    }

    .slide {
      display: none;
      width: 100%;
      animation: fade 2s ease-in-out;
    }

    .slide img {
      width: 100%;
      height: 400px;
      object-fit: cover;
      border-radius: 10px;
    }
    /* Styling for footer1 */
#footer1 {
  background-color: #333; /* Dark background */
  color: white;
  padding: 30px;
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
  align-items: flex-start;
}

#footer1 .logo,
#footer1 .contact,
#footer1 .location {
  flex: 1;
  padding: 10px;
  max-width: 33%; /* Ensuring the sections take equal space */
}

#footer1 img {
  max-width: 100px; /* Adjust logo size */
  height: auto;
}

/* Styling for footer2 (centered at the bottom) */
#footer2 {
  background-color: #4CAF50; /* Green background */
  color: white;
  text-align: center;
  padding: 20px;
  position: absolute;
  left: 50%;
  /* Adjust this value to control vertical positioning */
  transform: translateX(-50%);
  width: 100%; /* Ensures it stretches across the entire width of the screen */
}

/* Map Section */
#map-container {
  height: 500px;
  background-color: #e0e0e0;
  display: flex;
  align-items: center;
  justify-content: center;
  }
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

    @keyframes fade {
      from {opacity: 0.4;}
      to {opacity: 1;}
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
        <li><a href="#">Home</a></li>
        <li><a href="map.php">Map</a></li>
        <li><a href="donor_form.php">Available Donors</a></li>
        <li><a href="receiver_form.php">Available Receivers</a></li>
        <li><a href="aboutus.php">About Us</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
    </nav>
  </header>

  <!-- Hero Section -->
  <section id="hero">
    <h1>Welcome to Waste Food Management</h1>
    <p>Connecting food donors with those in need, reducing waste and hunger.</p>
  </section>

  <!-- Works Slideshow Section -->
  <section id="works">
    <h2>Our Works</h2>
    <div class="slideshow-container">
      <div class="slide">
        <img src="ab.jpg" alt="Work Image 1">
      </div>
      <div class="slide">
        <img src="b.jpg" alt="Work Image 2">
      </div>
      <div class="slide">
        <img src="c.jpg" alt="Work Image 3">
      </div>
    </div>
  </section>
 <!-- Available Donors Section -->
<section id="available-donors">
  <h2>Available Donors</h2>
  <p>List of food donors who are available to give surplus food:</p>

  <?php if (count($donors) > 0): ?>
    <ul>
      <?php 
        $donorCount = 1;
        foreach ($donors as $donor): 
      ?>
        <li>
  <strong><?= $donorCount++ ?>. <?= htmlspecialchars($donor['name']) ?></strong> 
  (<?= htmlspecialchars($donor['email']) ?>) – 
  Has: <em><?= htmlspecialchars($donor['food_type']) ?></em> 
  [<?= date("M d, Y h:i A", strtotime($donor['created_at'])) ?>]

  <!-- Accept Proposal Button -->
  <form method="POST" style="display:inline;" onsubmit="return handleAccept('<?= htmlspecialchars($donor['name']) ?>')">
  <input type="hidden" name="donor_email" value="<?= htmlspecialchars($donor['email']) ?>">
  <input type="hidden" name="receiver_email" value="receiver@example.com"> <!-- Replace with actual -->
  <button type="submit" name="accept_request" class="accept-btn">Accept Proposal</button>
</form>
</li>
      <?php endforeach; ?>
    </ul>
  <?php else: ?>
    <p>No donors registered yet.</p>
  <?php endif; ?>
</section>


<!-- Requested Receivers Section -->
<section id="requested-receivers">
  <h2>Available Receivers</h2>
  <p>Below are people who recently registered to receive food:</p>

 <?php if (count($receivers) > 0): ?>
  <ul>
    <?php 
      $receiverCount = 1;
      foreach ($receivers as $receiver): 
    ?>
      <li>
        <strong><?= $receiverCount++ ?>. <?= htmlspecialchars($receiver['name']) ?></strong> 
        (<?= htmlspecialchars($receiver['email']) ?>) – 
        Wants: <em><?= htmlspecialchars($receiver['food_type']) ?></em> 
        [<?= date("M d, Y h:i A", strtotime($receiver['created_at'])) ?>]

        <!-- Accept Proposal Form (Donor hardcoded for now, or fetched from session) -->
        <form method="POST" style="display:inline;" onsubmit="return handleAccept('<?= htmlspecialchars($receiver['name']) ?>')">
  <input type="hidden" name="donor_email" value="donor@example.com"> <!-- Replace with logged-in donor -->
  <input type="hidden" name="receiver_email" value="<?= htmlspecialchars($receiver['email']) ?>">
  <button type="submit" name="accept_request" class="accept-btn">Accept Proposal</button>
</form>
      </li>
    <?php endforeach; ?>
  </ul>
<?php else: ?>
  <p>No receivers registered yet.</p>
<?php endif; ?>


  <!-- About Us Section -->
  <section id="about-us">
    <footer id="footer1">
      <!-- Logo Section -->
      <div class="logo">
        <img src="logo.png" alt="Logo">
        <p>We are dedicated to reducing food waste by connecting donors with receivers in need.</p>
      </div>
      
      <!-- Contact Details Section -->
      <div class="contact">
        <h2>Contact Us</h2>
        <p>Email: code.arindam189@gmail.com</p>
        <p>Phone: +91 8697900630</p>
      </div>
      
      <!-- Location Section -->
      <div class="location">
        <h2>Location</h2>
        <p>Panchrokhi, Sugandha, Hooghly</p>
      </div> 
    </footer>
  </section>
  
  <!-- Footer 2 (aligned to the middle) -->
  <footer id="footer2">
    <p>&copy; 2025 Waste Food Management. All rights reserved.</p>
  </footer>

  <script>
    // Slideshow functionality
    let slideIndex = 0;
    showSlides();

    function showSlides() {
      let slides = document.getElementsByClassName("slide");
      for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      slideIndex++;
      if (slideIndex > slides.length) { slideIndex = 1; }
      slides[slideIndex-1].style.display = "block";
      setTimeout(showSlides, 4000);
    }
  </script>
  <script>
  // Handle alert + UI update
  function handleAccept(name) {
    alert(`${name} accepted your request!`);

    // Change button color and disable all accept buttons related to this action
    const buttons = document.querySelectorAll(".accept-btn");
    buttons.forEach(btn => {
      btn.style.backgroundColor = "#4CAF50"; // green
      btn.style.color = "#fff";
      btn.style.cursor = "not-allowed";
      btn.disabled = true;
      btn.textContent = "Accepted";
    });

    // Let the form submit
    return true;
  }

  // Optional: style the accept buttons by default
  document.addEventListener("DOMContentLoaded", function() {
    const buttons = document.querySelectorAll(".accept-btn");
    buttons.forEach(btn => {
      btn.style.backgroundColor = "#3498db"; // blue
      btn.style.color = "#fff";
      btn.style.padding = "5px 10px";
      btn.style.border = "none";
      btn.style.borderRadius = "5px";
      btn.style.fontWeight = "bold";
    });
  });
</script>

  

</body>
</html>