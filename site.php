<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Waste Food Management</title>
  <link rel="stylesheet" href="styles1.css">
</head>
<body>

  <!-- Navigation Bar -->
  <header>
    <nav>
      <ul>
        <li><a href="#home">Home</a></li>
        <li><a href="exp.html">Map</a></li>
        <li><a href="index.html">Login</a></li>
        <li><a href="#available-donors">Available Donors</a></li>
        <li><a href="#requested-receivers">Requested Receivers</a></li>
        <li><a href="contact.html">Contact</a></li>
        <li><a href="aboutus.html">About Us</a></li>
      </ul>
    </nav>
  </header>

  <!-- Home Section -->
  <section id="home">
    <h1>Welcome to Waste Food Management</h1>
    <p>Helping communities by redistributing surplus food.</p>
  </section>

  <!-- Image Slideshow Section -->
  <section id="image-slideshow-section">
    <h2>Our Works</h2>
    
    <!-- Slideshow Container -->
    <div class="slideshow-container">
        <!-- Slide 1 -->
        <div class="mySlides fade">
            <img src="ab.jpg" alt="Image 1" style="width:100%">
        </div>
        <!-- Slide 2 -->
        <div class="mySlides fade">
            <img src="b.jpg" alt="Image 2" style="width:100%">
        </div>
        <!-- Slide 3 -->
        <div class="mySlides fade">
            <img src="c.jpg" alt="Image 3" style="width:100%">
        </div>
    </div>
  
    <style>
      /* Slideshow Styles */
      #image-slideshow-section {
          padding: 40px;
          text-align: left;
          background-color: #f9f9f9;
      }
  
      .slideshow-container {
          position: relative;
          max-width: 100%;
          margin: auto;
          overflow: hidden;
      }
  
      .mySlides {
          display: none;
      }
  
      img {
          width: 80%;
          height: 500px;
      }
  
      .fade {
          animation-name: fade;
          animation-duration: 2s;
      }
  
      @keyframes fade {
          from { opacity: 0.4; }
          to { opacity: 1; }
      }
    </style>
  
    <script>
      let slideIndex = 0;
      showSlides();
  
      function showSlides() {
          let slides = document.getElementsByClassName("mySlides");
  
          // Hide all slides
          for (let i = 0; i < slides.length; i++) {
              slides[i].style.display = "none";  
          }
  
          // Increment the slide index
          slideIndex++;
  
          // If we've gone past the last slide, reset to the first one
          if (slideIndex > slides.length) {
              slideIndex = 1;
          }    
  
          // Show the current slide
          slides[slideIndex-1].style.display = "block";  
  
          // Change image every 5 seconds
          setTimeout(showSlides, 5000);
      }
    </script>
  </section>
  


  <!-- Login Section -->
<section id="login">
    
  </section>
  

  <!-- Available Donors Section -->
  <section id="available-donors">
    <h2>Available Donors</h2>
    <p>List of food donors who are available to give surplus food.</p>
    <ul>
      <li>Donor 1: Available for donation</li>
      <li>Donor 2: Available for donation</li>
      <!-- Add more donors here -->
    </ul>
  </section>

  <!-- Requested Receivers Section -->
  <section id="requested-receivers">
    <h2>Requested Receivers</h2>
    <p>List of people who need food donations.</p>
    <ul>
      <li>Receiver 1: Needs food urgently</li>
      <li>Receiver 2: Needs food urgently</li>
      <!-- Add more receivers here -->
    </ul>
  </section>

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
  

  <script src="script.js"></script>
</body>
</html>
