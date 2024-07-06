<?php
    $a=$_GET['tra'];
    echo "<link rel='stylesheet' type='text/css' href='ut.css'>";
    function all()
    {
        $con=mysqli_connect("localhost","root","","project");

        if (!$con)
        {
            die('could not connect to database' . mysqli_connect_error());
        }
        $q1="select * from billorder";
        $q=mysqli_query($con,$q1);
        echo"<h2>Transaction Details</h2>";
        echo "<table class='tb'>";
        echo "<tr><th>Transaction ID</th><th>Total Amount</th><th>Payment Method</th><th>Bill By</th><th>Customer Name</th><th>Date</th></tr>";
        while($row = mysqli_fetch_array($q))
        {
            echo "<tr><td>".$row['oid']."</td><td>".$row['amount']."</td><td>".$row['pay_method']."</td><td>".$row['id']."</td><td>".$row['cname']."</td><td>".$row['bdate']."</td></tr>";
        }
        echo "</table>";

        mysqli_close($con);
    }
    if($a==1)
    {       
            all();
    }
    else if($a==2){    
        header("Location: trans1.php");
                
    }
?>