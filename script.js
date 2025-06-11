// script.js

document.addEventListener("DOMContentLoaded", () => {
    const loginForm = document.querySelector(".login-form");
    const signupForm = document.querySelector(".signup-form");
    const forgotForm = document.querySelector(".forgot-form");

    if (loginForm) {
        loginForm.addEventListener("submit", () => {
            setTimeout(() => {
                alert("Login submitted! If your credentials are correct, you’ll be redirected.");
            }, 100);
        });
    }

    if (signupForm) {
        signupForm.addEventListener("submit", () => {
            setTimeout(() => {
                alert("Signup submitted! You’ll be redirected to login if successful.");
            }, 100);
        });
    }

    if (forgotForm) {
        forgotForm.addEventListener("submit", () => {
            setTimeout(() => {
                alert("If the email exists, a reset link would be sent (simulated).");
            }, 100);
        });
    }
});
