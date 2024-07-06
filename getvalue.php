
<?php
session_start();
$id=$_SESSION['id'];   // bill table
$totalAmount = $_GET['totalAmount']; // bill table
$pm=$_GET['pm'];    //bill table

$name=$_GET['custname']; // cust table && bill table
$currentDate = date("Y-m-d"); // bill table
$ph=$_GET['custph'];    // cust table



function addcust($name,$ph,$id)
{   
    $con=mysqli_connect("localhost","root","","project");

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    $name = mysqli_real_escape_string($con, $name);
    $ph = mysqli_real_escape_string($con, $ph);
    $id = mysqli_real_escape_string($con, $id);

    $sql = "INSERT INTO customer (cname,phno,id) VALUES ('$name','$ph','$id')";
    if(mysqli_query($con, $sql)){

    } else{
        die("ERROR: Could not able to execute $sql. " . mysqli_error($con));
    }
    mysqli_close($con);
}
function addinv($totalAmount,$pm,$id,$name,$currentDate,$ph)
{   
    $con=mysqli_connect("localhost","root","","project");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
    $totalAmount = mysqli_real_escape_string($con, $totalAmount);
    $pm = mysqli_real_escape_string($con, $pm);
    $id = mysqli_real_escape_string($con, $id);
    $name = mysqli_real_escape_string($con, $name);
    

    $sql = "INSERT INTO billorder (amount,pay_method,id,cname,bdate) VALUES ('$totalAmount', '$pm', '$id', '$name','$currentDate')";
    if(mysqli_query($con, $sql)){
        addcust($name,$ph,$id);
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }
    mysqli_close($con);
}
addinv($totalAmount,$pm,$id,$name,$currentDate,$ph);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill Generation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
        }

        h1, h2, h3 {
            text-align: center;
        }
        .total {
            margin-top: 20px;
            text-align: right;
        }

        .total span {
            font-weight: bold;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Invoice</h1>
    <p>Customer Name:  <?php echo"$name"; ?></p>
    <p>Date:  <?php echo"$currentDate"; ?></p>
    <p>Phone No:  <?php echo"$ph"; ?></p>
    <div class="total">
        <span>Total Amount:</span> <?php echo"$totalAmount"; ?>
    </div>

    <div class="footer">
        <p>Thank you for your purchase!</p>
    </div>
</div>
</body>
</html>