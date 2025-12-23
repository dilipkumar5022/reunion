<?php session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
 .lo-icon {
            height: 200px;
            position: fixed;
            bottom: 20px;
            right: 10px;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            gap: 4px;
            transition: transform 0.5s ease;
        }

        .lo-icon.hide {
            transform: translateX(150%); /* move to right outside screen */
        }

        .lo-icon img {
            width: 50px;
        }
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #AAFE2A;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 10000;
        }

        /* Spinner styles */
       
    </style>
</head>

<body data-loggedin="<?php echo isset($_SESSION['mobile']) ? 'true' : 'false'; ?>"> 
<div class="preloader" id="preloader">
    <div class="spinner"><img src="./images/loader.gif" alt="" width="400px"></div>
</div>
<div class="lo-icon" id="socialIcons">
    <img src="images/whatapp.png" alt="WhatsApp">
    <img src="images/youtube.png" alt="YouTube">
    <img src="images/facebook.png" alt="Facebook">
    <img src="images/inst.png" alt="Instagram">
</div>
<script>
    const socialIcons = document.getElementById('socialIcons');

    window.addEventListener('scroll', function() {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        const windowHeight = window.innerHeight;
        const tenVH = windowHeight * 0.1; // 10% of viewport height

        if (scrollTop >= tenVH) {
            // After scrolling more than 10vh
            socialIcons.classList.add('hide');
        } else {
            // Still in first 10vh
            socialIcons.classList.remove('hide');
        }
    });
</script>
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
        <div class="d">
            <div class="slider-container">
                <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
                <div class="slider" id="slider">


                    <div class="main-body slide">
                        <div class="left">
                            <img src="./images/logo (1).png" alt="" class="img">
                        </div>
                        <div class="right">
                            <div class="m">
                                <img src="./images/leaf.png" alt="">
                                <h4>Best Quality Products</h4>
                                <h2>Join The Organic </h2>
                                <h2>Movement!</h2>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Hic perferendis
                                    consequatur, saepe mollitia perspiciatis praesentium repellendus incidunt, nobis
                                    reiciendis, veritatis dolorum deleniti blanditiis harum suscipit minima magnam
                                    voluptate. Quas, alias.</p>
                               <a href="pickles.php"> <button> <i class="bi bi-cart2"></i>
                                    SHOW NOW</button></a>
                            </div>
                        </div>
                    </div>


                    <div class="main-body slide">
                       
                        <div class="left">
                            <img src="./images/veg.png" alt="" class="im">
                        </div>
                        <div class="right">
                            <div class="m">
                                <img src="./images/leaf.png" alt="">
                                <h4>Best Quality Products</h4>
                                <h2>Join The Organic </h2>
                                <h2>Movement!</h2>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Hic perferendis
                                    consequatur, saepe mollitia perspiciatis praesentium repellendus incidunt, nobis
                                    reiciendis, veritatis dolorum deleniti blanditiis harum suscipit minima magnam
                                    voluptate. Quas, alias.</p>
                                    <a href="pickles.php"> <button> <i class="bi bi-cart2"></i>
                                    SHOW NOW</button></a>
                            </div>
                        </div>



                    </div>
                    <div class="main-body slide">
                        <div class="left">
                            <img src="./images/veg.png" alt="" class="im">
                        </div>
                        <div class="right">
                            <div class="m">
                                <img src="./images/leaf.png" alt="">
                                <h4>Best Quality Products</h4>
                                <h2>Join The Organic </h2>
                                <h2>Movement!</h2>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Hic perferendis
                                    consequatur, saepe mollitia perspiciatis praesentium repellendus incidunt, nobis
                                    reiciendis, veritatis dolorum deleniti blanditiis harum suscipit minima magnam
                                    voluptate. Quas, alias.</p>
                                    <a href="pickles.php"> <button> <i class="bi bi-cart2"></i>
                                    SHOW NOW</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="next" onclick="moveSlide(1)">&#10095;</button>
            </div>
        </div>
        <!-- <div class="checkout">
            <div class="head"><h1>Shopping Cart</h1><i class='bx bx-x'></i></div>
            <hr>
            <ol>
            <li>cart1 <i class='bx bx-x'></i></li>
            <li>cart1 <i class='bx bx-x'></i></li>
            <li>cart1 <i class='bx bx-x'></i></li>
            <li>cart1 <i class='bx bx-x'></i></li>
            <li>cart1 <i class='bx bx-x'></i></li>
        </ol>
        <button class="btn-ch">Checkout</button>
        </div>
        <div class="fav">
            <div class="fav-head"><h1>Shopping Cart</h1><i class='bx bx-x'></i></div>
            <hr>
            <ol>
            <li>cart1 <i class='bx bx-x'></i></li>
            <li>cart1 <i class='bx bx-x'></i></li>
            <li>cart1 <i class='bx bx-x'></i></li>
            <li>cart1 <i class='bx bx-x'></i></li>
            <li>cart1 <i class='bx bx-x'></i></li>
        </ol>
        <button class="btn-ch">Checkout</button>
        </div> -->
    </section>
    <!-- page2 -->
    <section class="page2">
        <div class="card">
            <span class="icon"><i class="bi bi-airplane"></i></span>
            <div class="text">
                <h2>Free Shipping</h2>
                <p>Above $5 Only</p>
            </div>
        </div>
        <div class="card">
            <span class="icon"><img src="./images/fas.png" alt="" width="70px"></i></span>
            <div class="text">
                <h2>Free Shipping</h2>
                <p>Above $5 Only</p>
            </div>
        </div>
        
        <div class="card">
            <span class="icon"><img src="./images/non.png" alt="" width="80px"></span>
            <div class="text">
                <h2>Free Shipping</h2>
                <p>Above $5 Only</p>
            </div>
        </div>
        <div class="card">
            <span class="icon"><img src="./images/or.png" alt="" width="100px"></span>
            <div class="text">
                <h2>Free Shipping</h2>
                <p>Above $5 Only</p>
            </div>
        </div>
        
        </section>
        <!-- page2 ending-->
        <!-- page3  start-->
       
        <section class="page3">
            <h2 style="text-align: center;">Best Selling Products</h2>
            <div class="image"><img src="./images/mango.png" alt="" width="100px"></div>
            <div class="bestcartt">
            <div id="product-container" style=" flex-wrap: wrap;" class="bestcart"></div>
                 <div class="dt" style="width: 100%; display: flex; justify-content: center; margin: auto;">
                <a href="pickles.php"> <button class="more" style="position: relative; right: 0px; margin-top: 2rem; animation: sliderr 1s ease-in-out;
        animation-timeline: view();
        animation-range:enter 0% cover 30%;
    ">MORE</button></a>
                    </div>
        </section>
            <!-- page3 ending -->
            
            <!-- page4 start-->
            <section class="page4">
                <div class="type">
                    <div class="image ii"><img  class="ig" src="./images/cart.png" alt="" style=" animation: show 1s ease-in-out;
        animation-timeline: view();
        animation-range: entry -80% cover 50%;
    "></div>
                    <div class="menu-type">
                        <div class="non-veg-container">
                            <img src="./images/mango.png" class="no" alt="" >
                            <div class="non-info">
                                <h2>Non Veg Pickles </h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex cupiditate natus, ea necessitatibus quod, voluptatum blanditiis dolor exercitationem, hic excepturi vel? Iste omnis maiores praesentium illum accusamus architecto sed dignissimos?</p>
                            <a href="pickles.php"><button>Shop now</button></a>
                            </div>
                        </div>
                        <div class="veg-container">
                            <img src="./images/non-veg.png" alt="" class="no" width="300px">
                            <div class="non-info">
                                <h2>Veg Pickles</h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex cupiditate natus, ea necessitatibus quod, voluptatum blanditiis dolor exercitationem, hic excepturi vel? Iste omnis maiores praesentium illum accusamus architecto sed dignissimos?</p>
                                <a href="pickles.php"><button>Shop now</button></a>
                                </div>
                        </div>
                    </div>
                    <div class="inter">
                        <h1>            <i class="bi bi-airplane-engines flight"></i>
                            Internation Shipping also avilable</h1>
                       <a href="pickles.php"> <button class="cart-btn"><i class="bi bi-cart2 ttt"></i>SHOW NOW</button></a>
                    </div>
                </div>
                
                
                </section>
                <!-- page4 ending -->

                 <!-- page5 start -->
<section class="page5">
    <div class="about">
        <img src="./images/non-veg.png" alt="" class="about-i">

        <div class="about-img">
            <img src="./images/non-veg.png" alt="">
        </div>
        <div class="about-info">
            <h1>About As</h1>
            <p>Lorem, ipsum dolor udiandae molestiae est perspiciatis? Numquam asperiores excepturi rerum, vitae suscipit facilis voluptatem quod eveniet hic itaque reprehenderit. Illo rem doloribus provident, suscipit incidunt ipsamboriosam, quaerat quos incidunt atque rerum accusantium eveniet, esse itaque sapiente voluptatem nostrum ratione dolores temporibus officia nisi. Velit harum doloremque nisi earum, facere dolorem laborum corrupti eum quia? Repellat vero consequatur dignissimos autem doloremque, quam quae molestias sunt! Placeat neque, eaque velit totam reiciendis blanditiis explicabo, sequi culpa voluptatum accusantium rem necessitatibus earum maxime nemo aperiam. Omnis aut eaque debitis quasi libero excepturi aliquid corrupti natus eveniet, sunt repudiandae porro suscipit nobis, fuga alias a labore iusto distinctio qui voluptate! Totam a quo odit blanditiis minima fugiat officiis sit debitis nostrum exercitationem inventore reprehenderit perspiciatis repellat dolor, accusantium omnis possimus dicta quasi  </p>
        </div>
     </div>
</section> 
<!-- page5 ending -->
 
<!-- page6 start -->
<section class="page6">
    <h1 style="text-align: center;">Customers Reviews</h1>
    <div class="image"><img src="./images/mango.png" alt="" width="100px"></div>
    
    <div class="customer-r">
    <div class="customer-info">
        <div class="testimonial-card">
            <div class="profile">
                <img src="https://i.pravatar.cc/100" alt="Profile Image">
                <span class="profile-name">Mila Kunis</span>
            </div>
            <div class="stars">⭐⭐⭐⭐⭐</div>
            <p class="text">Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
           
        </div>
        <div class="testimonial-card" style="height: 400px;">
            <div class="profile">
                <img src="https://i.pravatar.cc/100" alt="Profile Image">
                <span class="profile-name">Mila Kunis</span>
            </div>
            <div class="stars">⭐⭐⭐⭐⭐</div>
            <p class="text">Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
           
        </div>
        <div class="testimonial-card">
            <div class="profile">
                <img src="https://i.pravatar.cc/100" alt="Profile Image">
                <span class="profile-name">Mila Kunis</span>
            </div>
            <div class="stars">⭐⭐⭐⭐⭐</div>
            <p class="text">Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
           
        </div>
    </div>
    </div>
    
<div class="footer-info">
    <div class="footer-img">
        <img src="./images/footer-img.png" alt="" >
        <p>Lorem ipsum, dolor sit amet consectetureprehenderit odit cupiditate distinctio maiores voluptatibus, officiis quaerat deleniti aliquid ex hic delectus accusantium soluta error aspernatur tempore corporis? Minima delectus quos id eveniet quae praesentium deserunt placeat, totam  quod inventore adipisci.</p>
        <img src="./images/fess.png" alt="" width="300px" style="margin-top:3rem ;">
    
    </div>
  
    <div class="footer-right">
        <h2>Quick Links</h2>
        <li>About</li>
        <li>Cart</li>
        <li>Checkout</li>
        <li>Contact</li>
        <li>My Account</li>
        <li>Shop</li>
        <h2>Site Links</h2>
        <li>Privacy Policy</li>
        <li>Shipping Details</li>
        <li>Offers Coupons</li>
        <li>Terms & Conditions</li>
    </div>
    
    </div>
    <div class="footer-i" style="color: white;">
    <h3>Copyright @ 2025 | Juvvallapalem handmade pickles</h3>
    <div class="footer-icon">
        <i class="bi bi-instagram"></i>
        <i class="bi bi-youtube"></i>
       
    </div>
    </div>
    </section>
    <!-- page6 ending -->
    <!-- page6 start -->
    
    <!-- page6 ending -->
    
    <!-- Popup Overlay -->
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.7/gsap.min.js"
        integrity="sha512-f6bQMg6nkSRw/xfHw5BCbISe/dJjXrVGfz9BSDwhZtiErHwk7ifbmBEtF9vFW8UNIQPhV2uEFVyI/UHob9r7Cw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <script src="./js/product.js"></script>
 <script>
    window.addEventListener('scroll', function () {
      const navbar = document.getElementById('navb');
      if (window.scrollY > 0) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }
    });
    const openMenu = document.getElementById("openMenu");
    const closeMenu = document.getElementById("closeMenu");
    const menuBar = document.getElementById("menuBar");

    openMenu.addEventListener("click", () => {
      menuBar.classList.add("active");
    });

    closeMenu.addEventListener("click", () => {
      menuBar.classList.remove("active");
    });
  </script>
        <script src="./js/script.js"></script>
<script src="js/ani.js"></script>
   

</body>

</html>