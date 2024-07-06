<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admin</title>
    <link rel="stylesheet" href="ut.css">
    <style>
            .add-admin {
        width: 300px;
        margin: 40px auto;
    }
    .add-admin input[type="text"],
    .add-admin-typ {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }
    .admin-add-submit {
        width: 100%;
        padding: 10px;
        background-color:#4796BD;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    .admin-add-submit:hover {
        background-color: #0056b3;
    }
    </style>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="add-admin">
        Enter Name:<input type="text" name="nm" class="add-admin-name">
        Enter Password:<input type="text" name="pass" class="add-admin-pass">
        Selecte Admin type
        
        <select name="adty" class="add-admin-typ">
            <option value="">Select</option>
            <option value="Master-Admin">Master-Admin</option>
            <option value="Ass-Admin">Ass-Admin</option>
        </select>
        <input type="submit" class="admin-add-submit" value="Add Admin" name="s">
    </form>
</body>
</html>
<?php
if(isset($_POST['s']))
{
    $nm=$_POST['nm'];
    $pass=$_POST['pass'];
    $ty=$_POST['adty'];
    echo"$nm<br> $pass <br>$ty";
    function addadmin($nm,$pass,$ty)
    {   
        $con=mysqli_connect("localhost","root","","project");

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }

        $nm = mysqli_real_escape_string($con, $nm);
        $pass = mysqli_real_escape_string($con, $pass); 
        $ty = mysqli_real_escape_string($con, $ty);
        
        $sql = "INSERT INTO admin (name,pass,deg) VALUES ('$nm', '$pass','$ty')";
        if(mysqli_query($con, $sql)){
            echo "Records added successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
        }

        mysqli_close($con);
    }

    addadmin($nm,$pass,$ty);    
}
?>