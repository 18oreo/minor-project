<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urgent Food Donation and Supply</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        header {
            background-color: #2d3b45;
            color: white;
            padding: 15px;
            text-align: center;
        }

        header h1 {
            font-size: 30px;
        }

        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }

        /* Form Section */
        .form-container {
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .form-container h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        label {
            font-weight: bold;
            display: block;
            margin: 10px 0 5px;
        }

        input, textarea, button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        textarea {
            height: 150px;
        }

       

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                width: 100%;
                padding: 0 10px;
            }

            .form-container {
                padding: 15px;
            }
        }
        .footer{
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

    </style>
</head>
<body>

    <!-- Header -->
    <header>
        <h1>Urgent Food Donation and Supply</h1>
    </header>

    <!-- Main Content Container -->
    <div class="container">
        <div class="form-container">
            <h2>Donate Food or Request Urgent Supply</h2>
            <form id="donationForm">
                <label for="name">Your Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Your Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="phone">Your Phone Number:</label>
                <input type="tel" id="phone" name="phone" required>

                <label for="donation">Food Donation Details:</label>
                <textarea id="donation" name="donation" required></textarea>

                <label for="urgentSupply">Urgent Supply Request (If any):</label>
                <textarea id="urgentSupply" name="urgentSupply"></textarea>

                <input type="submit" value="Submit Donation">
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Waste Food Management. All rights reserved.</p>
      </footer>

    <!-- JavaScript to Handle Form Data -->
    <script>
        document.getElementById("donationForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent form submission

            // Get form data
            const name = document.getElementById("name").value;
            const email = document.getElementById("email").value;
            const phone = document.getElementById("phone").value;
            const donation = document.getElementById("donation").value;
            const urgentSupply = document.getElementById("urgentSupply").value;

            // Store form data in an object
            const formData = {
                name: name,
                email: email,
                phone: phone,
                donation: donation,
                urgentSupply: urgentSupply
            };

            // Save form data (here using localStorage for demo purposes)
            localStorage.setItem("donationData", JSON.stringify(formData));

            // Notify user
            alert("Thank you for your donation! Your details have been saved.");

            // Optionally clear the form after submission
            document.getElementById("donationForm").reset();
        });
    </script>

</body>
</html>
