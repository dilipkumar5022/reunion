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
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <link rel="stylesheet" href="./css/checkout.css">
    <link rel="stylesheet" href="./css/loading.css">

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


        <div class="cart-info">
            <div class="tab">
                <div class="address-header">
                    <h2>DELIVERY ADDRESS</h2>
                </div>
                <div class="address-container" id="address-con"></div>
                <!-- //address-details-page -->
                <script>
function loadAddresses() {
  fetch("api/address.php")
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        const container = document.getElementById("address-con");
        container.innerHTML = "";

        data.data.forEach(item => {
          container.innerHTML += `
            <div class="address-details">
              <input type="radio" name="address" value="${item.id}">
              <ol>
                  <li style="margin-bottom: 0.7rem;">
                      <span style="margin-right: 1rem; font-weight: bold">${item.name}</span>
                      <span style="margin-right: 1rem; font-weight: bold">${item.mobile}</span>
                  </li>
                  <li><span>${item.address} </span></li>
                  <li><span>${item.city}, ${item.state} - ${item.pincode}</span></li>
              </ol>
              <div class="a-l">
                <i class="bi bi-trash delete-icon" data-id="${item.id}" style="cursor:pointer;" onclick="deleteAddress(event)"></i>
              </div>
            </div>
            <hr>
          `;
        });
      } else {
        console.error("Failed to fetch addresses");
      }
    })
    .catch(error => {
      console.error("Error:", error);
    });
}

// Call it once when page loads
loadAddresses();
</script>
                <div class="add-address"  style="position:relative; padding: 30px 10px" >
                    <i class="bi bi-plus" onclick="showAddressInfo()" style="border:1px solid black; margin-right:20px; border-radius:5px; "  ></i><h2> ADD ADDRESS</h2><i  class='bx bx-x co' onclick="closeAddressInfo()" style="position:absolute; right:20px; display:none;"></i>
                </div>
                <div class="address-info" style="display:none;">
                <form class="address-form" onsubmit="submitAddress(event)">
  <div class="row">
    <input type="text" name="name" placeholder="Name" required>
    <input type="text" name="mobile" placeholder="10-digit mobile number" required>
  </div>
  <div class="row">
    <input type="text" name="pincode" placeholder="Pincode" required>
    <input type="text" name="locality" placeholder="Locality" required>
  </div>
  <div class="row full">
    <input type="text" name="address" placeholder="Address (Area and Street)" required>
  </div>
  <div class="row">
    <input type="text" name="city" placeholder="City/District/Town" required>
    <input type="text" name="state" placeholder="State" required>
  </div>
  <div class="row">
    <input type="text" name="landmark" placeholder="Landmark (Optional)">
    <input type="text" name="altPhone" placeholder="Alternate Phone (Optional)">
  </div>
  <button class="add-btn" type="submit">Add Address</button>
</form>
</div>


                <!-- cart-page -->
                <div class="address-header">
                    <h2>ORDER DETAILS</h2>
                </div>
                <div class="tabb">
                <div class="cart-list" id="cartList"></div>
            </div>
<!-- //end -->
            </div>
            <div class="pay-info">
                <div class="payment-info">
                    <h2>PRICE DETAILS</h2>
                    <div class="f-m">
                        <li>
                            <h3 id="priceItems">Price ( 3 Items)</h3><span  id="priceValue">₹0</span>
                        </li>
                        <li>
                            <h3>Delivery Charges</h3><span> ₹50</span>
                        </li>

                    </div>
                    <div class="f-e">
                        <li>
                            <h3 style="color: #59812F ;">Total Amount</h3><span id="totalAmount" style="font-size: large;">$0</span>
                        </li>

                    </div>

                </div>
                <button class="placeorder" onclick="getValuesBtn()">Payment</button>
            </div>
        </div>



        <section class="page6">



            <div class="footer-info">
                <div class="footer-img">
                    <img src="./images/footer-img.png" alt="">
                    <p>Lorem ipsum, dolor sit amet consectetureprehenderit odit cupiditate distinctio maiores
                        voluptatibus, officiis quaerat deleniti aliquid ex hic delectus accusantium soluta error
                        aspernatur tempore corporis? Minima delectus quos id eveniet quae praesentium deserunt placeat,
                        totam quod inventore adipisci.</p>
                    <img src="./images/fess.png" alt="" width="300px" style="margin-top:3rem ;">

                </div>
                <!-- <div class="footer-middle">
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
        </div> -->
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
                               
                                const initialQty = item.count;
                                const fin = initialQty * item.price;
                                const initialPrice = fin;

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

            function getValuesBtn() {
    const items = document.querySelectorAll(".getvalue");
    let cartData = [];

    items.forEach(item => {
        const id = item.querySelector(".idd") ? item.querySelector(".idd").textContent.trim() : '';
        const quantity = item.querySelector(".quality") ? item.querySelector(".quality").value : '';
        const count = item.querySelector(".qty") ? item.querySelector(".qty").value : '';

        if (id && quantity && count) {
            cartData.push({ id: id, quantity: quantity, count: count });
        } else {
            console.error("Missing data for item:", item);
        }
    });

    console.log(cartData);

    fetch('api/checkc.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ cart_data: cartData })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            window.location.href = "hello.php";
        } else {
            console.error('Error from API:', data.message);
            alert('Error updating cart');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error sending data');
    });
}

function showAddressInfo() {
    const addressForm = document.querySelector('.address-info');
    const closeInfo = document.querySelector('.co');

    if (addressForm) {
      addressForm.style.display = 'block';
    }
    if(closeInfo){
        closeInfo.style.display = 'block';
 
    }
  }
  function closeAddressInfo() {
    const addressForm = document.querySelector('.address-info');
    const closeInfo = document.querySelector('.co');

    if (addressForm) {
      addressForm.style.display = 'none';
    }
    if(closeInfo){
        closeInfo.style.display = 'none';
 
    }
  }
  function submitAddress(event) {
  event.preventDefault();

  const form = event.target;
  const formData = new FormData(form);
  const addressFo = document.querySelector('.address-info');
  const closeInf = document.querySelector('.co');

  fetch("api/address.php", {
    method: "POST",
    body: formData
  })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
      alert("Address added successfully!");
      form.reset();
      addressFo.style.display = 'none';
      closeInf.style.display = 'none';

      loadAddresses(); // 🔥 Refresh the address list
    } else {
      alert("Failed to add address.");
    }
  })
  .catch(error => {
    console.error("Error:", error);
  });
}

function deleteAddress(event) {
  const addressId = event.target.getAttribute('data-id');

  if (confirm('Are you sure you want to delete this address?')) {
    fetch(`api/address.php?id=${addressId}`, {
      method: 'DELETE',
    })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          console.log('Address deleted successfully');
          const card = event.target.closest('.address-details');
          if (card) card.remove();
        } else {
          console.error('Error deleting address:', data.message);
        }
      })
      .catch(error => {
        console.error('Error:', error);
      });
  }
}

  </script>
      <script src="./js/scroll.js"></script>
      <script src="js/ani.js"></script>


</body>

</html>