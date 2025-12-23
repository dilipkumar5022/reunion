<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Invoice as PDF</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script>
        // Function to fetch the order data and download the invoice PDF
        function fetchAndDownloadInvoice(orderId) {
            // Make AJAX request to fetch order data
            fetch(`api/invoice.php`)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert("Error fetching order details.");
                    } else {
                        // Generate the PDF for the invoice
                        generateInvoicePDF(data);
                    }
                })
                .catch(error => {
                    alert("An error occurred while fetching the data.");
                    console.log(error);
                });
        }

        // Function to generate the invoice PDF
        function generateInvoicePDF(orderData) {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();
            doc.setFontSize(16);
            doc.text('Invoice for Order ID: ' + orderData.order_id, 10, 10);
            doc.setFontSize(12);
            doc.text('Product Name: ' + orderData.name, 10, 20);
            doc.text('Description: ' + orderData.description, 10, 30);
            doc.text('Quantity: ' + orderData.quantity + ' gms', 10, 40);
            doc.text('Count: ' + orderData.count, 10, 50);
            doc.text('Price: ₹ ' + orderData.amount, 10, 60);
            doc.text('Order Date: ' + new Date(orderData.create_date).toLocaleDateString(), 10, 70);
            let statusText = orderData.status == 1 ? 'Shipped' : 'Pending for Shipping';
            doc.text('Status: ' + statusText, 10, 80);
            doc.save('invoice_' + orderData.order_id + '.pdf');
        }
    </script>
</head>
<body>
    <!-- Button to trigger the invoice download -->
    <button onclick="fetchAndDownloadInvoice('OD123456987652435723')">Download Invoice</button>
</body>
</html>