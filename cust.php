<?php
    $a=$_GET['cust'];
    echo "<link rel='stylesheet' type='text/css' href='ut.css'>";
    function all()
    {
        $con=mysqli_connect("localhost","root","","project");

        if (!$con)
        {
            die('could not connect to database' . mysqli_connect_error());
        }
        $q1="select * from customer";
        $q=mysqli_query($con,$q1);
        
        echo"<h2>Customer Details</h2>";
        echo "<table class='tb'>";
        echo"<tr><th>Customer ID</th><th>Name</th><th>Phone No</th></tr>";

        while($row = mysqli_fetch_array($q))
        {
            echo "<tr><td>".$row['cid']."</td><td>".$row['cname']."</td><td>".$row['phno']."</td></tr>";
        }
        echo "</table>";

        mysqli_close($con);
    }
    if($a==1)
    {       
            all();
    }
    else{
        header("Location: cust1.php");
    }
?>