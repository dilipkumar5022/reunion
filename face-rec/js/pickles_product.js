document.addEventListener("DOMContentLoaded", () => {
    const isLoggedIn = document.body.dataset.loggedin === "true";
    const loginPopup = document.getElementById("loginPopup");
    const closeLoginBtn = document.querySelector(".close-login-btn");
  
    const requireLogin = (callback) => {
      if (!isLoggedIn) {
        loginPopup.style.display = "block";
      } else {
        callback();
      }
    };
  
    if (closeLoginBtn) {
      closeLoginBtn.addEventListener("click", () => {
        loginPopup.style.display = "none";
      });
    }
  
    // Wait for fetch to finish rendering the cards
    fetch("api/price.php")
      .then(res => res.json())
      .then(data => {
        if (data.success) {
          let html = "";
          data.data.forEach(row => {
            html += `
            <div class="product-card" data-id="${row.id}" data-price-250="${row.price1}" data-price-500="${row.price2}" data-price-1000="${row.price3}">
              <div class="product-image">
                  <img src="./images/non-veg.png" alt="Mango Pickles" width="100%">
              </div>
              <div class="product-details">
                  <p class="category" data-id="${row.id}">Mango Pickles</p>
                  <p class="price"><span style="font-size:15px;font-weight:bolder;">₹ </span><span class="price-value">${row.price1}</span></p>
                  <p>Lorem ipsum dolor sit amet...</p>
                  <div class="qu">
                      <select class="quality">
                          <option value="">Select Quantity</option>
                          <option value="250">250 grms</option>
                          <option value="500">500 grms</option>
                          <option value="1000">1 kg</option>
                      </select>
                      <button class="btn-cart bt-f" onclick="favoriteLogic(${row.id})"><i class="bi bi-heart"></i></button>
                  </div>
                  <button class="btn-cart btn-cart-t"><i class="bi bi-cart2" onclick="addToCart(${row.id})"></i></button>
                  <button class="btn-buy">BUY</button>
              </div>
            </div>`;
          });
  
          document.getElementById("product-container").innerHTML = html;
  
          // ✅ Attach listeners AFTER cards are rendered
          attachProductEvents();
        } else {
          document.getElementById("product-container").innerHTML = "<p>No products available.</p>";
        }
      });
  
    function attachProductEvents() {
      document.querySelectorAll(".product-details").forEach(card => {
        const cartButton = card.querySelector(".btn-cart-t");
        const buyButton = card.querySelector(".btn-buy");
        const quantitySelect = card.querySelector(".quality");
        const priceDisplay = card.querySelector(".price-value");
        const cartPopup = document.getElementById("cartPopup");
        const closeCartPopup = document.querySelector(".close-btn");
        const favoritePopup = document.getElementById("favoritePopup");
        const closeFavoriteBtn = document.querySelector(".close-fav-btn");
        const favoriteButton = card.querySelector(".bt-f");
        const id = card.closest(".product-card").dataset.id;
  
        // Quantity selector to update price
        quantitySelect.addEventListener("change", () => {
          const val = quantitySelect.value;
          const price = card.closest(".product-card").getAttribute(`data-price-${val}`);
          if (price) priceDisplay.textContent = `${price}.00`;
        });
  
        // Add to cart
        if (cartButton) {
          cartButton.addEventListener("click", () => {
            requireLogin(async () => {
              const val = quantitySelect.value;
              const productId = card.querySelector(".category").dataset.id;
  
              if (!val) return alert("⚠️ Please select a quantity before adding to cart!");
  
              try {
                const response = await fetch("/pickles/api/add_cart.php", {
                  method: "POST",
                  headers: { "Content-Type": "application/json" },
                  body: JSON.stringify({
                    id: productId,
                    quantity: val,
                    chi: "add_cart"
                  })
                });
  
                const data = await response.json();
                if (data.success) {
                  cartPopup.style.display = "flex";
                  setTimeout(() => cartPopup.style.display = "none", 5000);
                } else {
                  alert("❌ " + data.message);
                }
              } catch (err) {
                console.error("Request failed:", err);
                alert("❌ Something went wrong!");
              }
            });
          });
        }
  
        // Close cart popup
        if (closeCartPopup) {
          closeCartPopup.addEventListener("click", () => {
            cartPopup.style.display = "none";
          });
        }
  
        // Add to favorites
        if (favoriteButton) {
          favoriteButton.addEventListener("click", () => {
            requireLogin(async () => {
              const productId = card.querySelector(".category").dataset.id;
  
              try {
                const res = await fetch('/pickles/api/favorite.php', {
                  method: 'POST',
                  headers: { 'Content-Type': 'application/json' },
                  body: JSON.stringify({ id: productId })
                });
  
                const data = await res.json();
                if (data.success) {
                  favoritePopup.style.display = "flex";
                  setTimeout(() => favoritePopup.style.display = "none", 5000);
                } else {
                  alert("❌ " + data.message);
                }
              } catch (err) {
                console.error("⚠️ Request failed:", err);
                alert("❌ Something went wrong!");
              }
            });
          });
        }
  
        // Close favorite popup
        if (closeFavoriteBtn) {
          closeFavoriteBtn.addEventListener("click", () => {
            favoritePopup.style.display = "none";
          });
        }
  
        // Buy now
        buyButton.addEventListener("click", () => {
          requireLogin(async () => {
              const val = quantitySelect.value;
              const productId = card.querySelector(".category").dataset.id;
      
              if (!val) return alert("⚠️ Please select a quantity before buying!");
      
              try {
                  const response = await fetch("/pickles/api/add_cart.php", {
                      method: "POST",
                      headers: { "Content-Type": "application/json" },
                      body: JSON.stringify({
                          id: productId,
                          quantity: val,
                          chi: "add_cart"
                      })
                  });
      
                  const data = await response.json();
                  console.log(data); // Log response for debugging
      
                  if (data.success) {
                      // Proceed to checkout page if added to cart successfully
                      window.location.href = "checkout.php";
                  } else {
                      alert("❌ " + data.message);
                  }
              } catch (err) {
                  console.error("Request failed:", err);
                  alert("❌ Something went wrong!");
              }
          });
      });
      });
    }
  });