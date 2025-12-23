<?php
session_start();
if (!isset($_SESSION['mobile'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/cart.css">
    <link rel="stylesheet" href="./css/loading.css">
</head>

<body>
<div class="preloader" id="preloader">
    <div class="spinner"><img src="./images/loader.gif" alt="" width="400px"></div>
</div>
<div class="menu-bar-d" id="menuBar" >
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
            <h2><i class="bi bi-cart2"></i> Cart</h2>
        </div>

        <div class="cart-info">
            <div class="tab">
                <div class="cart-list" id="cartList"></div>
            </div>

            <div class="pay-info">
                <div class="payment-info">
                    <h2>PRICE DETAILS</h2>
                    <div class="f-m">
                        <li>
                            <h3 id="priceItems">Price (0 Items)</h3><span id="priceValue" style="font-size: larger;">₹0</span>
                        </li>
                        <li>
                            <h3>Delivery Charges</h3><span style="font-size: large;">₹50</span>
                        </li>
                    </div>
                    <div class="f-e">
                        <li>
                            <h3 style="color: #59812F;">Total Amount</h3><span id="totalAmount" style="font-size: large;">₹0</span>
                        </li>
                    </div>
                </div>
                <button class="placeorder" id="getValuesBtn" >Place Order</button>
            </div>
        </div>

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





        <script>
            let cartData = [];

            document.addEventListener("DOMContentLoaded", function () {
                fetch("api/cart_data.php")
                    .then(res => res.json())
                    .then(data => {
                        if (data.success && Array.isArray(data.data)) {
                            const cartList = document.getElementById("cartList");
                            cartList.innerHTML = "";
                            cartData = data.data;

                            cartData.forEach(item => {
                                const cartItem = document.createElement("div");
                                cartItem.className = "c-list";
                                cartItem.setAttribute("data-id", item.p_id);

                                const initialQty = 1;
                                const initialPrice = item.price;

                                cartItem.innerHTML = `
                                  <div class="cart-list" id="cartList">
                                      <div class="c-list getvalue" >
                                          <img src="./images/${item.image}" alt="${item.name}" width="140px">
                                          <span class="idd" style="display:none;">${item.p_id}</span>
                                          <div class="d-p"  data-id="${item.p_id}" data-price-250="${item.price1}" data-price-500="${item.price2}" data-price-1000="${item.price3}">
                                              <h2>${item.name}</h2>
                                              <p>${item.description}</p>
                                              <div class="cart-div">
                                                  <select class="quality">
                                                      <option value="">Select Quantity</option>
                                                      <option value="250" ${item.quantity == 250 ? "selected" : ""}>250 grms</option>
                                                      <option value="500" ${item.quantity == 500 ? "selected" : ""}>500 grms</option>
                                                      <option value="1000" ${item.quantity == 1000 ? "selected" : ""}>1 kg</option>
                                                  </select>
                                                  <div class="quantity-control">
                                                      <button class="circle-btn" onclick="decrease(this, ${initialPrice})">-</button>
                                                      <input type="text" id="qty" class="qty" value="${initialQty}" readonly>
                                                      <button class="circle-btn" onclick="increase(this, ${initialPrice})">+</button>
                                                  </div>
                                                  <div class="price-l">
                                                      <h2 style="font-weight: 400; margin-left: 1rem;">₹<span class="total-price">${initialPrice}.00</span></h2>
                                                  </div>
                                              </div>
                                              <h2 class="pri" style="color: black;">₹<span class="total-price">${initialPrice}.00</span></h2>
                                          </div>
                                          <div class="c-inf">
                                              <i class="bi bi-trash delete-icon" data-id="${item.p_id}" style="cursor:pointer;"></i>
                                          </div>
                                      </div>
                                  </div>
                                `;
                                cartList.appendChild(cartItem);
                            });

                            addDeleteListeners();
                            addQuantityChangeListeners();
                            updateCartSummary();
                        } else {
                            console.error("Failed to load cart items");
                        }
                    })
                    .catch(error => console.error("Error:", error));
            });

            function addDeleteListeners() {
                document.querySelectorAll(".delete-icon").forEach(icon => {
                    icon.addEventListener("click", function () {
                        const id = this.getAttribute("data-id");
                        fetch("api/delete_cart.php", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/x-www-form-urlencoded"
                            },
                            body: `id=${id}`
                        })
                            .then(res => res.json())
                            .then(response => {
                                if (response.success) {
                                    this.closest(".c-list").remove();
                                    updateCartSummary();
                                } else {
                                    alert("Failed to delete item.");
                                }
                            })
                            .catch(error => console.error("Delete error:", error));
                    });
                });
            }

            function increase(btn, basePrice) {
                const qtyInput = btn.parentElement.querySelector(".qty");
                qtyInput.value = parseInt(qtyInput.value) + 1;
                updatePrice(btn, basePrice);
                updateCartSummary();
            }

            function decrease(btn, basePrice) {
                const qtyInput = btn.parentElement.querySelector(".qty");
                if (parseInt(qtyInput.value) > 1) {
                    qtyInput.value = parseInt(qtyInput.value) - 1;
                    updatePrice(btn, basePrice);
                    updateCartSummary();
                }
            }

            function updatePrice(btn, basePrice) {
                const qtyInput = btn.parentElement.querySelector(".qty");
                const quantity = parseInt(qtyInput.value);
                const cartItem = btn.closest(".c-list");
                const priceSpan = cartItem.querySelector(".d-p .quality");
                const selectedQty = priceSpan.value;
                const dP = cartItem.querySelector(".d-p");
                const unitPrice = parseFloat(dP.getAttribute(`data-price-${selectedQty}`)) || basePrice;
                const total = quantity * unitPrice;

                cartItem.querySelectorAll(".total-price").forEach(span => {
                    span.textContent = total.toFixed(2);
                });
            }

            function addQuantityChangeListeners() {
                document.querySelectorAll(".quality").forEach(quantitySelect => {
                    quantitySelect.addEventListener("change", () => {
                        const card = quantitySelect.closest(".d-p");
                        const val = quantitySelect.value;
                        const price = card.getAttribute(`data-price-${val}`);
                        if (price) {
                            const cartItem = quantitySelect.closest(".c-list");
                            const qty = parseInt(cartItem.querySelector(".qty").value) || 1;
                            const total = parseFloat(price) * qty;
                            cartItem.querySelectorAll(".total-price").forEach(span => {
                                span.textContent = total.toFixed(2);
                            });
                            updateCartSummary();
                        }
                    });
                });
            }

            function updateCartSummary() {
                const qtyInputs = document.querySelectorAll(".qty");
                const priceSpans = document.querySelectorAll(".pri .total-price");

                let totalItems = 0;
                let totalPrice = 0;

                qtyInputs.forEach((input, index) => {
                    const qty = parseInt(input.value);
                    const price = parseFloat(priceSpans[index].textContent);
                    totalItems += qty;
                    totalPrice += price;
                });

                document.getElementById("priceItems").innerHTML = `Price (${totalItems} Items)`;
                document.getElementById("priceValue").textContent = "₹" + totalPrice.toFixed(2);
                document.getElementById("totalAmount").textContent = "₹" + (totalPrice + 50).toFixed(2);
            }

            document.getElementById("getValuesBtn").addEventListener("click", function() {
    const items = document.querySelectorAll(".getvalue");
    let cartData = [];

    // Loop through each item and get the values
    items.forEach(item => {
        const id = item.querySelector(".idd") ? item.querySelector(".idd").textContent.trim() : '';
        const quantity = item.querySelector(".quality") ? item.querySelector(".quality").value : '';
        const count = item.querySelector(".qty") ? item.querySelector(".qty").value : '';

        // Ensure all fields are not empty before adding to cartData
        if (id && quantity && count) {
            cartData.push({ id: id, quantity: quantity, count: count });
        } else {
            console.error("Missing data for item:", item);
        }
    });

    // Debug: Check cartData
    console.log(cartData);

    // Send the data to the API using fetch
    fetch('api/checkc.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ cart_data: cartData }) // Sending the cart data as JSON
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json(); // Assuming the API responds with JSON
    })
    .then(data => {
        if (data.success) {
            // If the response indicates success, navigate to checkout.php
            window.location.href = "checkout.php";
        } else {
            // Handle error if API response indicates failure
            console.error('Error from API:', data.message);
            alert('Error updating cart');
        }
    })
    .catch(error => {
        // Handle network errors
        console.error('Error:', error);
        alert('Error sending data');
    });
});
        </script>
            <script src="./js/scroll.js"></script>
            <script src="js/ani.js"></script>


</body>
</html>