// Select form and inputs
const form = document.querySelector("form");
const emailInput = document.querySelector("input[type='email']");
const passwordInput = document.querySelector("input[type='password']");

// Listen for submit
form.addEventListener("submit", function (event) {
  const email = emailInput.value;
  const password = passwordInput.value;

  // Check if email is empty
  if (email === "") {
    alert("Please enter your email.");
    event.preventDefault();
    return;
  }

  // Check password length
  if (password.length < 8) {
    alert("Password must be at least 8 characters long.");
    event.preventDefault();
    return;
  }

  // Success
  alert("Login successful!");
});
