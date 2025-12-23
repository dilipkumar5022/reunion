<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
</head>
<body>
    <div id="order-container"></div>

    <script>
    fetch('all_api.php')
      .then(response => response.json())
      .then(data => {
        if (data.html) {
            document.getElementById('order-container').innerHTML = data.html;
        } else {
            document.getElementById('order-container').innerHTML = '<p>No orders found.</p>';
        }
      })
      .catch(error => {
        console.error('Error:', error);
        document.getElementById('order-container').innerHTML = '<p>Failed to load orders.</p>';
      });
    </script>
</body>
</html>