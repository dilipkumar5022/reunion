<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Sign Up</title>
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="./css/loading.css">

</head>
<body>
<div class="preloader" id="preloader">
    <div class="spinner"><img src="./images/loader.gif" alt="" width="400px"></div>
</div>
  <div class="login-container">
    <div class="login-page">
      <img src="./images/2.png" alt="Logo" class="login-logo" />
      <div class="login-c">
        <h1>Create Your Account</h1>
        <p>Please enter your details</p>

        <label for="name">Name</label><br />
        <input type="text" id="name" placeholder="Enter your name.." required /><br />

        <label for="mobile">Mobile</label><br />
        <input type="text" id="mobile" placeholder="Enter your mobile number.." required /><br />

        <label for="password">Password</label><br />
        <input type="password" id="password" placeholder="Enter your password.." required /><br />

        <label for="confirm-password">Confirm Password</label><br />
        <input type="password" id="confirm-password" placeholder="Confirm your password.." required /><br />

        <!-- CSRF Token -->
        <input type="hidden" id="csrf_token" value="<?php session_start(); echo $_SESSION['csrf_token'] ?? ''; ?>" />

        <button onclick="register()">Sign up</button>
        <p class="pd">Already have an account? <a href="./login.html">Sign in</a></p>
        <img src="./images/non-veg.png" alt="" class="non-p" />
      </div>
    </div>
    <div class="login-img">
      <img src="./images/cart.png" alt="Cart" width="500px" />
    </div>
  </div>

  <script>
    async function register() {
      const name = document.getElementById('name').value.trim();
      const mobile = document.getElementById('mobile').value.trim();
      const password = document.getElementById('password').value;
      const confirm = document.getElementById('confirm-password').value;
      const csrf_token = document.getElementById('csrf_token').value;

      if (!name || !mobile || !password || !confirm) {
        alert("All fields are required.");
        return;
      }

      if (password !== confirm) {
        alert("Passwords do not match!");
        return;
      }

      try {
        const res = await fetch('/pickles/api/signin.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          credentials: 'include',
          body: JSON.stringify({ name, mobile, password, csrf_token })
        });

        const data = await res.json();

        if (data.success) {
          alert("Signup successful!");
          window.location.href = "login.php";
        } else {
          alert("Error: " + data.message);
        }
      } catch (err) {
        alert("Signup failed. Try again later.");
        console.error(err);
      }
    }
  </script>
  <script src="js/ani.js"></script>

</body>
</html>