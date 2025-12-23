<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pickles</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./pickles.css">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/loading.css">

  <style>
    /* Popup Overlay */

  
  </style>
</head>

<body data-loggedin="<?php echo isset($_SESSION['mobile']) ? 'true' : 'false'; ?>"> 
<div class="preloader" id="preloader">
    <div class="spinner"><img src="./images/loader.gif" alt="" width="400px"></div>
</div>
<div class="menu-bar-d" id="menuBar">
    <div class="top-bar">
      <div class="it">
      <a href="./login.php"><i class="bi bi-person"></i></a>

        <a href="./fav.php"><i class="bi bi-heart"></i></a>
        <a href="./cart.php"><i class="bi bi-cart2"></i></a>
      </div>
      <i class="bi bi-x" id="closeMenu" style="font-size: 1.5rem; cursor: pointer;"></i>
    </div>

    <div class="men-list">
      <li>Home</li>
      <li>Veg Pickles</li>
      <li>Non Pickles</li>
      <li>About Us</li>
      <li>Contact Us</li>
    </div>
  </div>
<nav id="navb">
            <img src="./images/2.png" alt="logo" width="150px">
            <div class="navbar">
                <a href="">Home</a>
                <a href="">Veg Pickles</a>
                <a href="">Non Veg Pickles</a>
                <a href="">About Us</a>
                <a href="">Contact Us</a>


               <div class="ani">
                <a href="./fav.php"> <i class="bi bi-heart"></i></a>

                <a href="./cart.php"><i class="bi bi-cart2"></i></a>

                <div class="hover-box">
    <a href="./login.php" class="c-t"><i class="bi bi-person"></i></a>

    <div class="cust-details">
      <div class="list-c">
        <li><a href="#"><i class="bi bi-person"></i><span>My Profile</span> </a></li>
        <li><a href="#"><i class="bi bi-house"></i><span>My Address</span> </a></li>
        <li><a href="#"><i class="bi bi-box"></i> <span>My Order</span></a></li>
        <li><a href="#"><i class="bi bi-cart"></i><span> My Cart</span></a></li>
        <li><a href="#"><i class="bi bi-heart"></i> <span>Wishlist</span></a></li>
        <li><a href="#"><i class="bi bi-box-arrow-right"></i><span>Log Out</span> </a></li>
      </div>
    </div>
    
  </div>
                </div>

            </div>
            <div class="menu" id="openMenu"><i class="bi bi-list" style="font-size: 1.5rem; cursor: pointer;"></i></div>            

</nav>
<section class="page1" style="padding-top:14vh">

  <div class="d">
    <h2 style="text-align:center">Pickles</h2>

  <div class="pickles-c">
    <div class="fliter" style="display: flex;  gap: 1rem; justify-content: center; align-items: center; margin-top: 2rem;"> 
      <input type="checkbox"><label for="">Veg Pickles</label>
      <input type="checkbox"><label for="">Non Veg Pickles</label>
    </div>
    <div class="bestcartt">
      <div id="product-container" style="flex-wrap: wrap;" class="bestcart"></div>

      
    </div>
  </div>
</section>

<!-- Customers Reviews -->
<section class="page6">
  <h1 style="text-align: center;">Customers Reviews</h1>
  <div class="customer-r" style="margin-top: 2rem;">
    <div class="customer-info">
      <div class="testimonial-card">
        <div class="profile"><img src="https://i.pravatar.cc/100" alt="Profile"><span class="profile-name">Mila Kunis</span></div>
        <div class="stars">⭐⭐⭐⭐⭐</div>
        <p class="text">Click edit button to change this text...</p>
      </div>
      <!-- Duplicate testimonials -->
    </div>
  </div>

  <!-- Footer -->
  <div class="footer-info">
    <div class="footer-img">
      <img src="./images/footer-img.png" alt="">
      <p>Lorem ipsum dolor sit amet...</p>
      <img src="./images/fess.png" alt="" width="300px" style="margin-top:3rem;">
    </div>
    <div class="footer-right">
      <h2>Quick Links</h2>
      <li>About</li><li>Cart</li><li>Checkout</li><li>Contact</li><li>My Account</li><li>Shop</li>
      <h2>Site Links</h2>
      <li>Privacy Policy</li><li>Shipping Details</li><li>Offers Coupons</li><li>Terms & Conditions</li>
    </div>
  </div>
  <div class="footer-i" style="color: white;">
    <h3>Copyright @ 2025 | Juvvallapalem handmade pickles</h3>
    <div class="footer-icon">
      <i class="bi bi-instagram"></i><i class="bi bi-youtube"></i>
    </div>
  </div>
</section>

<!-- Popups -->
<div class="popup-overlay" id="popupOverlay"></div>

<!-- Cart Popup -->
<div id="cartPopup" class="popup-overlay">
    <div class="popup">
        <button class="close-btn">&times;</button> 
        <img src="./images/tick.png" alt="Success" class="check-icon"> <!-- Add a green check icon here -->
        <div class="popup-content">
            <h2>Item Added to Cart!</h2>
            <p>Proceed to checkout?</p>
            <a href="cart.php" id="goToCart" class="btn-cartt">Go to Cart</a>
        </div>
    </div>
</div>
<!-- Favorite Popup -->
<div id="favoritePopup" class="favorite-popup-overlay">
    <div class="favorite-popup">
        <button class="close-fav-btn">&times;</button>
        <img src="./images/tick.png" alt="Added to Favorite" class="check-icon">
        <div class="popup-content">
            <h2>Added to Favorites!</h2>
            <p>Check your favorite list.</p>
            <a href="favorites.php" class="favorite-btn">Go to Favorites</a>
        </div>
    </div>
</div>

<!-- Favorite Button in Product Card -->

<div id="loginPopup" class="login-popup">
    <div class="login-popup-content">
      <span class="close-login-btn">&times;</span>
      <p>⚠️ Please login to continue</p>
      <a href="login.php" class="btn-login">Login</a>
    </div>
  </div>

<!-- JS Logic -->
<script src="js/pickles_product.js"></script>
  
</script>
<script src="./js/scroll.js"></script>
<script src="js/ani.js"></script>




</body>
</html>