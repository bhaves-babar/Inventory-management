<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .spec {
    width: 400px;
    margin: 20px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
}
.spec input[type='text'],
.spec input[type='number'] {
    width: calc(100% - 10px);
    margin: 5px 0;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
}
.spec input[type='submit'] {
    width: 100%;
    margin-top: 10px;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #4796BD;
    color: #fff;
    cursor: pointer;
}
.spec input:required {
    border-color: #4796BD;
}
.spec input:invalid {
    border-color: #4796BD;
}
.spec input:invalid+span::after {
    content: ' *';
    color: #4796BD;
}
    </style>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method='get' class='spec'>
        Enter Transaction Id <input type='text' name='traid'class='spcdet' required>
        <input type='submit' class='spcdet-sub' name="s">
    </form>   
</body>
</html>

 
<?php
if(isset($_GET['s']))
{
    $val = $_GET['traid'];
    echo "<link rel='stylesheet' type='text/css' href=ut.css>";
    function spec($val)
    {
        $con = mysqli_connect("localhost", "root", "", "project");
        if (!$con)
        {
            die('Could not connect to database: ' . mysqli_connect_error());
        }
        $q1 = "SELECT * FROM billorder WHERE oid=?";
        $stmt = mysqli_prepare($con, $q1);
        mysqli_stmt_bind_param($stmt, 'i', $val);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        echo "<table class='tb'>";
        echo "<tr><th>Transaction ID</th><th>Total Amount</th><th>Payment Method</th><th>Bill By</th><th>Customer Name</th><th>Date</th></tr>";
        
        while ($row = mysqli_fetch_assoc($result))
        {
            echo "<tr><td>".$row['oid']."</td><td>".$row['amount']."</td><td>".$row['pay_method']."</td><td>".$row['id']."</td><td>".$row['cname']."</td><td>".$row['bdate']."</td></tr>";
         
        }
        echo "</table>";

        mysqli_close($con);
    }

    spec($val);
}
?>
