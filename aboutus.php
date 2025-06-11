<?php
// aboutus.php - About Us Page with Developer Photos and Animations
$developers = [
    ['name' => 'Arindam ', 'image' => 'IMG_20240826_074942.jpg'],
    ['name' => 'Anisha Saha', 'image' => 'WhatsApp Image 2025-04-08 at 5.51.54 PM.jpeg'],
    ['name' => 'Avinah Kumar Yadav', 'image' => 'a'],
    ['name' => 'Payel Rakshit', 'image' => 'WhatsApp Image 2025-04-09 at 10.36.32 AM.jpeg'],
    ['name' => 'Manish Singh', 'image' => 'WhatsApp Image 2025-04-09 at 10.25.50 AM.jpeg'],
    ['name' => 'Nisa Pramanick', 'image' => 'WhatsApp Image 2025-04-09 at 10.37.41 AM.jpeg'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>About Us - Waste Food Management</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');

    /* Reset & base */
    * {
      box-sizing: border-box;
    }
    body {
      margin: 0;
      font-family: 'Montserrat', sans-serif;
      background: linear-gradient(135deg,rgb(5, 106, 15) 0%,rgb(125, 223, 26) 100%);
      color: #fff;
      display: flex;
      flex-direction: column;
      align-items: center;
      min-height: 100vh;
      padding: 50px 20px;
    }

    h1 {
      font-size: 3rem;
      margin-bottom: 10px;
      text-shadow: 2px 2px 8px rgba(0,0,0,0.4);
      animation: fadeSlideDown 1s ease forwards;
      opacity: 0;
    }

    p.description {
      max-width: 650px;
      font-size: 1.25rem;
      margin-bottom: 50px;
      text-align: center;
      color: #dfe6fd;
      animation: fadeSlideDown 1s ease forwards;
      animation-delay: 0.3s;
      opacity: 0;
    }

    /* Grid container */
    .dev-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 40px;
      width: 100%;
      max-width: 1000px;
      animation: fadeSlideUp 1s ease forwards;
      animation-delay: 0.5s;
      opacity: 0;
    }

    /* Each developer card */
    .dev-card {
      background: rgba(255,255,255,0.15);
      border-radius: 15px;
      padding: 20px;
      text-align: center;
      box-shadow: 0 10px 25px rgba(0,0,0,0.15);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      cursor: default;
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
    }
    .dev-card:hover {
      transform: translateY(-10px) scale(1.05);
      box-shadow: 0 15px 40px rgba(0,0,0,0.3);
    }

    .dev-photo {
      width: 140px;
      height: 140px;
      border-radius: 50%;
      object-fit: cover;
      border: 4px solid rgba(255,255,255,0.6);
      margin-bottom: 15px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.3);
      transition: border-color 0.3s ease;
    }
    .dev-card:hover .dev-photo {
      border-color: #ffd700;
    }

    .dev-name {
      font-weight: 700;
      font-size: 1.3rem;
      text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
      color: #fff;
    }

    /* Animations */
    @keyframes fadeSlideDown {
      0% { opacity: 0; transform: translateY(-30px); }
      100% { opacity: 1; transform: translateY(0); }
    }
    @keyframes fadeSlideUp {
      0% { opacity: 0; transform: translateY(30px); }
      100% { opacity: 1; transform: translateY(0); }
    }

    /* Animate each card individually */
    <?php for($i=1; $i<=6; $i++): ?>
    .dev-card:nth-child(<?= $i ?>) {
      animation: fadeSlideUp 0.7s ease forwards;
      animation-delay: <?= 0.5 + ($i * 0.3) ?>s;
      opacity: 0;
    }
    <?php endfor; ?>

    /* Responsive */
    @media (max-width: 480px) {
      h1 {
        font-size: 2.2rem;
      }
      p.description {
        font-size: 1.1rem;
      }
      .dev-photo {
        width: 110px;
        height: 110px;
      }
    }
  </style>
</head>
<body>

  <h1>Meet Our Developers</h1>
  <p class="description">
    We are a passionate team dedicated to reducing food waste by connecting donors with those in need. 
    Here's the talented team behind the Waste Food Management System.
  </p>

  <div class="dev-grid">
    <?php foreach ($developers as $dev): ?>
      <div class="dev-card" tabindex="0" aria-label="Developer <?= htmlspecialchars($dev['name']) ?>">
        <img src="<?= htmlspecialchars($dev['image']) ?>" alt="Photo of <?= htmlspecialchars($dev['name']) ?>" class="dev-photo" />
        <div class="dev-name"><?= htmlspecialchars($dev['name']) ?></div>
      </div>
    <?php endforeach; ?>
  </div>

</body>
</html>
