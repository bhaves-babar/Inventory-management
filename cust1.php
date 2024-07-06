
<head>
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
        Enter Customer Id <input type='text' name='custid'class='spcdet' required>
        <input type='submit' class='spcdet-sub' name="s">
    </form>   
</body>
</html>

<?php
if(isset($_GET['s']))
{
    $val = $_GET['custid'];
    echo "<link rel='stylesheet' type='text/css' href='ut.css'>";
    function spec($val)
    {
        $con = mysqli_connect("localhost", "root", "", "project");

        if (!$con)
        {
            die('Could not connect to database: ' . mysqli_connect_error());
        }

        $q1 = "SELECT * FROM customer WHERE cid=?";

        $stmt = mysqli_prepare($con, $q1);

        mysqli_stmt_bind_param($stmt, 's', $val);

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        echo "<table class='tb'>";
        echo "<tr><th>Customer ID</th><th>Name</th><th>Phone No</th></tr>";
        
        while ($row = mysqli_fetch_assoc($result))
        {
            echo "<tr><td>".$row['cid']."</td><td>".$row['cname']."</td><td>".$row['phno']."</td></tr>";
        }
        echo "</table>";
        mysqli_close($con);
    }
    spec($val);
}
?>
