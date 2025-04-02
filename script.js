// Listen for form submission to handle login
document.getElementById('login-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission

    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    // Basic login check (you can replace this with your actual authentication)
    if (username === "user" && password === "password123") {
        alert("Login Successful!");
        // Store login status in local storage (or sessionStorage)
        localStorage.setItem('loggedIn', true);
        
        // Redirect the user to the home page after successful login or any other condition
        window.location.href = "site.html"; // Replace "site.html" with the URL of your home page if different
    } else {
        alert("Invalid Username or Password");
        // Optionally, redirect to the login page again if login fails
        window.location.href = "index.html"; // Replace with the correct login page URL if necessary
    }
});

// Handle Forgot Password button click
document.querySelector('.forgot-password-btn').addEventListener('click', function() {
    alert("Redirecting to Forgot Password page...");
    // Redirect to the forgot password page (you can replace it with the actual URL)
    window.location.href = "forgot-password.html"; // Replace with your forgot password page
});

// Handle Sign Up button click
document.querySelector('.signup-btn').addEventListener('click', function() {
    alert("Redirecting to Sign Up page...");
    // Redirect to the sign-up page (you can replace it with the actual URL)
    window.location.href = "signup.html"; // Replace with your sign-up page URL
});

// Check if the user is logged in when accessing a restricted page (for example, the home page)
window.addEventListener('load', function() {
    if (!localStorage.getItem('loggedIn')) {
        alert("You are not logged in. Redirecting to the Sign In page.");
        // Redirect the user to the login page if they are not logged in
        window.location.href = "index.html"; // Replace with your actual login page URL
    }
});
