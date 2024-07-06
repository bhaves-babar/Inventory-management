<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Billing Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        .bill-form,
        .cust-det {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            width: 80%;
            max-width: 600px;
        }

        .product {
            margin-bottom: 10px;
        }

        .prinfo {
            display: inline-block;
            width: 200px;
            color: #333;
        }

        .input {
            width: 80px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        #totalAmount {
            margin-top: 20px;
            font-weight: bold;
            color: #333;
            text-align: center;
        }

        input[type="text"],
        input[type="number"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #ff7f50; 
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            width: 100%;
            display: block;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background-color: #ff6347; 
        }
    </style>
    <script>
        function calculateTotal() {
            var total = 0;
            var products = document.getElementsByClassName('product');
            for (var i = 0; i < products.length; i++) {
                var price = parseFloat(products[i].getAttribute('data-price'));
                var quantity = parseInt(document.getElementById('quantity_' + products[i].getAttribute('data-id')).value);
                total += price * quantity;
            }
            document.getElementById('totalAmount').innerText = 'Total Amount: ' + total.toFixed(2);
        }
        function calculateTotalAndSubmit() {
            var total = 0;
            var products = document.getElementsByClassName('product');
            for (var i = 0; i < products.length; i++) {
                var price = parseFloat(products[i].getAttribute('data-price'));
                var quantity = parseInt(document.getElementById('quantity_' + products[i].getAttribute('data-id')).value);
                total += price * quantity;
            }
            document.getElementById('totalAmountInput').value = total.toFixed(2);
        }
    </script>
</head>
<body>
    <h2>Billing Form</h2>

    <form class="bill-form">
        <?php
            $conn = mysqli_connect("localhost", "root", "", "project");
            $query = "SELECT pid, pname, price FROM product";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='product' data-id='" . $row['pid'] . "' data-price='" . $row['price'] . "'>";
                echo "<span class='prinfo'>" . $row['pname'] . " (" . $row['price'] . " each)</span>";
                echo "<input class='input' type='number' id='quantity_" . $row['pid'] . "' value='0' min='0' onchange='calculateTotal()'>";
                echo "</div>";
            }
            mysqli_close($conn);
        ?>
    </form>
    <div id="totalAmount" name="totalAmount">Total Amount: 0</div>
    <form action="getvalue.php" class="cust-det" method="get">
        <h3>Enter Customer Details</h3>
        <input type="text" name="custname" placeholder="Name" required><br>
        <input type="number" name="custph" placeholder="Phone No" required><br>
        <h4>Select Payment Method</h4>
        <input type=radio name=pm value=Cash>Cash
        <input type=radio name=pm value=UPI>UPI
        <input type="hidden" id="totalAmountInput" name="totalAmount">
        <input type="submit" value="Submit" onclick="calculateTotalAndSubmit()">
    </form>
</body>
</html>