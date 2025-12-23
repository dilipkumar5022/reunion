<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Login Secure</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="./css/loading.css">

    <script>
        async function getCSRFToken() {
            const res = await fetch('api/crf_token.php');
            const data = await res.json();
            document.getElementById('csrf_token').value = data.csrf_token;
        }

        async function login(event) {
            event.preventDefault();
            const mobile = document.getElementById('mobile').value;
            const password = document.getElementById('password').value;
            const csrf_token = document.getElementById('csrf_token').value;

            const res = await fetch('api/login.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ mobile, password, csrf_token })
            });

            const data = await res.json();
            const msg = document.getElementById('message');
            msg.style.color = data.success ? 'green' : 'red';
            msg.innerText = data.message;

            if (data.success) {
                window.location.href = 'index.php';
            }
        }

        window.onload = getCSRFToken;
    </script>
</head>
<body>
<div class="preloader" id="preloader">
    <div class="spinner"><img src="./images/loader.gif" alt="" width="400px"></div>
</div>
<div class="login-container">
    <div class="login-page">
        <img src="./images/2.png" alt="Logo" class="login-logo">
        <div class="login-c">
            <h1>Welcome back!</h1>
            <p>Please enter your details</p>

            <form onsubmit="login(event)">
                <label>Mobile</label><br>
                <input type="text" id="mobile" placeholder="Enter your mobile number.." required><br>

                <label>Password</label><br>
                <input type="password" id="password" placeholder="Enter your password.." required><br>

                <input type="hidden" id="csrf_token" value="">

                <a href="#">Forgot Password</a><br>
                <button type="submit">Sign in</button>
            </form>

            <p id="message"></p>
            <p class="pd">Don't have an account? <a href="./signup.html">Sign up</a></p>
            <img src="./images/non-veg.png" alt="" class="non-p">
        </div>
    </div>
    <div class="login-img">
        <img src="./images/cart.png" alt="" width="500px">
    </div>
</div>
<script src="js/ani.js"></script>

</body>
</html>