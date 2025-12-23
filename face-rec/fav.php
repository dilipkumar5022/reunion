<?php
session_start();
if (!isset($_SESSION['mobile'])) {
    header("Location: login.php");
    exit;
}
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favorite</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/fav.min.css">
    <link rel="stylesheet" href="./css/loading.css">

    <style>
        .popup-overlay {
    display: none;
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 999;
}

.popup {
    background: #fff;
    padding: 2rem;
    width: 300px;
    text-align: center;
    border-radius: 10px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.close-btn {
    position: absolute;
    top: 5px;
    right: 10px;
    font-size: 20px;
    cursor: pointer;
    background: none;
    border: none;
}

.check-icon {
    width: 50px;
    margin-bottom: 1rem;
}

.btn-cartt {
    display: inline-block;
    margin-top: 1rem;
    padding: 8px 16px;
    background: green;
    color: white;
    border-radius: 5px;
    text-decoration: none;
}
    </style>
</head>
<body>
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
<section class="page1" style="padding-top: 14vh;">
        <div class="d">
            <h2><i class="bi bi-heart"></i> Favorite</h2>
        </div>

        <div class="cart-info">
            <div class="tab">
                <div class="cart-list" id="favorites-container">Loading...</div>
            </div>
        </div>
    </section>

    <section class="page6">
            <div class="footer-info">
                <div class="footer-img">
                    <img src="./images/footer-img.png" alt="">
                    <p>Lorem ipsum dolor sit amet consectetur...</p>
                    <img src="./images/fess.png" alt="" width="300px" style="margin-top:3rem;">
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
    

    <!-- ✅ Popup HTML -->
    <div id="cartPopup" class="popup-overlay">
        <div class="popup">
            <button class="close-btn">&times;</button> 
            <img src="./images/tick.png" alt="Success" class="check-icon">
            <div class="popup-content">
                <h2>Item Added to Cart!</h2>
                <p>Proceed to checkout?</p>
                <a href="cart.php" id="goToCart" class="btn-cartt">Go to Cart</a>
            </div>
        </div>
    </div>
</div>

    <!-- ✅ JavaScript -->
    <script>
    // Load favorites
    fetch('api/favorite_list.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            csrf_token: "<?php echo $_SESSION['csrf_token']; ?>"
        })
    })
    .then(response => response.json())
    .then(data => {
        const container = document.getElementById("favorites-container");
        if (data.success && data.favorites.length > 0) {
            container.innerHTML = '';
            data.favorites.forEach(item => {
                container.innerHTML += `
                <div class="cart-list">
                    <div class="c-list">
                        <img src="images/${item.image}" alt="${item.name}">
                        <div class="d-p">
                            <h2>${item.name}</h2>
                            <p>${item.description}</p>
                            <div class="cart-div">
                                <div class="price-l">
                                    <h2>₹ ${item.price}</h2>
                                </div>
                            </div>
                            <h2 class="pri" style="color: black;">₹ ${item.price}</h2>
                        </div>
                        <div class="c-inf">
                            <i class="bi bi-cart2" data-id="${item.id}"></i>
                        </div>
                        <div class="c-ind">
                            <i class="bi bi-trash" data-id="${item.fid}"></i>
                        </div>
                    </div>
                </div>`;
            });
        } else {
            container.innerHTML = "<p>No favorites yet.</p>";
        }
    });

    // Trash icon delete
    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('bi-trash')) {
            const id = e.target.getAttribute('data-id');
            if (!confirm("Remove this from favorites?")) return;

            fetch('api/delete.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ id: id, chi: "fav_delete" })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    const productElement = e.target.closest('.cart-list');
                    productElement.remove();
                } else {
                    alert("Delete failed: " + data.message);
                }
            })
            .catch(error => {
                console.error("Delete error:", error);
            });
        }
    });

    // Cart icon add
    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('bi-cart2')) {
            const id = e.target.getAttribute('data-id');

            fetch('api/add_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    id: id,
                    chi: "fav_add_cart"
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    const popup = document.getElementById('cartPopup');
                    popup.style.display = 'block';

                    // Auto-hide popup after 3 seconds (optional)
                    setTimeout(() => {
                        popup.style.display = 'none';
                    }, 3000);
                } else {
                    alert("Failed: " + data.message);
                }
            })
            .catch(err => console.error("Error:", err));
        }
    });

    // Popup close button
    document.querySelector('.close-btn').addEventListener('click', function () {
        document.getElementById('cartPopup').style.display = 'none';
    });
    </script>
        <script src="./js/scroll.js"></script>
        <script src="js/ani.js"></script>


</body>
</html>