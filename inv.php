<?php
    $a=$_GET['inop'];

    echo "<link rel='stylesheet' type='text/css' href='ut.css'>";
    function all()
    {
        $con=mysqli_connect("localhost","root","","project");

        if (!$con)
        {
            die('could not connect to database' . mysqli_connect_error());
        }
        $q1="select * from product";
        $q=mysqli_query($con,$q1);
        echo"<h2>Product Details</h2>";
        echo "<table class='tb'>";
        echo"
        <tr><th>Product ID</th><th>Product Name</th><th>Size</th><th>Price</th><th>Quantity</th></tr>";
        while($row = mysqli_fetch_array($q))
        {
            echo "<tr><td>".$row['pid']."</td><td>".$row['pname']."</td><td>".$row['size']."</td><td>".$row['price']."</td><td>".$row['quentity']."</td></tr>";
        }
        echo "</table>";
        mysqli_close($con);
    }

    switch ($a) {
        case '1':
            all();
            break;
        case '2':
            header("Location: addit.php");
            exit; 
            break;
        case '3':
            header("Location: updateinv.php");
            exit; 
            break;
        case '4':
            header("Location: removeinv.php");
            exit; 
            break;
    }
?>