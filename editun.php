<html>
<head>
<style>
        .uname {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 300px;
            background-color: #f9f9f9;
        }

        .chun {
            margin-bottom: 10px;
            padding: 8px;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #4796BD;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #357CA5;
        }
        </style>
        </head>
<body>
<form class='uname' method=post action="<?php echo $_SERVER['PHP_SELF'];?>">
    Enter New User Name<br>
    <input type='text' name='un' class='chun'>
    <input type='submit' name=s>
</from>    
</body>
</html>
<?php
if(isset($_POST['s']))
{
    session_start();
    $id=$_SESSION['id'];
    
    $un=$_POST['un'];
    function uncng($id, $un)
    {   
        $con = mysqli_connect("localhost", "root", "", "project");
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $id = mysqli_real_escape_string($con, $id);
        $un = mysqli_real_escape_string($con, $un);

        $q1 = mysqli_query($con, "UPDATE admin SET name='$un' WHERE id='$id'");
        if ($q1) {
            echo "Record updated successfully.";
            echo"$id<br> $un";
        } else {
            echo "Error updating record: " . mysqli_error($con);
        }
        mysqli_close($con);
    }
    uncng($id, $un);
}
?>