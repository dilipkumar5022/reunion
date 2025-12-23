<!DOCTYPE html>
<html>
<head>
  <title>Cart Data</title>
  <meta charset="UTF-8">
</head>
<body>
  <h1>Cart Details</h1>
  <table border="1" id="cartTable">
    <thead>
      <tr>
        <th>Product ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Image</th>
        <th>Selected Quantity</th>
        <th>Price</th>
        <th>Price1</th>
        <th>Price2</th>
        <th>Price3</th>
      </tr>
    </thead>
    <tbody></tbody>
  </table>

  <script>
    fetch("pickles/api/cart.php")
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          const tableBody = document.querySelector("#cartTable tbody");
          data.cart_data.forEach(item => {
            const row = document.createElement("tr");

            row.innerHTML = `
              <td>${item.product_id}</td>
              <td>${item.name}</td>
              <td>${item.description}</td>
              <td><img src="${item.image}" alt="${item.name}" width="50" /></td>
              <td>${item.quantity}</td>
              <td>${item.price}</td>
              <td>${item.price1}</td>
              <td>${item.price2}</td>
              <td>${item.price3}</td>
            `;

            tableBody.appendChild(row);
          });
        } else {
          alert("Failed to load cart data");
        }
      })
      .catch(error => {
        console.error("Error fetching data:", error);
      });
  </script>
</body>
</html>