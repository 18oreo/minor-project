<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In</title>
</head>
<style>
  /* Reset some default styles */
* {
margin: 0;
padding: 0;
box-sizing: border-box;
}

body {
font-family: Arial, sans-serif;
background-color: #f4f4f4;
display: flex;
justify-content: center;
align-items: center;
height: 100vh;
}

.signin-container {
background-color: #fff;
padding: 30px;
border-radius: 8px;
box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
width: 300px;
text-align: center;
}

h2 {
margin-bottom: 20px;
font-size: 24px;
color: #333;
}

.signin-form {
display: flex;
flex-direction: column;
}

label {
margin: 10px 0 5px;
text-align: left;
font-size: 14px;
}

input[type="email"],
input[type="password"] {
padding: 10px;
margin-bottom: 15px;
border: 1px solid #ccc;
border-radius: 4px;
font-size: 16px;
}

input[type="email"]:focus,
input[type="password"]:focus {
border-color: #007bff;
outline: none;
}

button {
padding: 10px;
background-color: #007bff;
color: white;
border: none;
border-radius: 4px;
font-size: 16px;
cursor: pointer;
}

button:hover {
background-color: #0056b3;
}

p {
margin-top: 10px;
font-size: 14px;
}

a {
color: #007bff;
text-decoration: none;
}

a:hover {
text-decoration: underline;
}
</style>
<body>
  <div class="signin-container">
    <h2>Sign In</h2>
    <form class="signin-form">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required placeholder="Enter your email">
      
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required placeholder="Enter your password">
      
      <button type="submit">Sign In</button>
    </form>
    <p>Don't have an account? <a href="#">Sign Up</a></p>
  </div>
</body>
</html>
