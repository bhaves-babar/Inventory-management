<style>
.upass {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 300px;
            background-color: #f9f9f9;
        }

        .chpass {
            margin-bottom: 10px;
            padding: 8px;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .chpass:focus {
            outline: none;
            border-color: #4796BD;
        }

        .chpass[type="submit"] {
            background-color: #4796BD;
            color: white;
            cursor: pointer;
        }

        .chpass[type="submit"]:hover {
            background-color: #357ebd;
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
<form class='upass' method=post action="<?php echo $_SERVER['PHP_SELF'];?>">
    Entern Old Password<br>
    <input type='pass' name='opass' class='chpass' required>
    Enter New Password <br>
    <input type='pass' name='npass' class='chpass' required>
    <input type='submit' name=s>
</from>

<?php
if(isset($_POST['s']))
{
    session_start();
    $id = $_SESSION['id'];
    $opass = $_POST['opass'];
    $npass = $_POST['npass'];

    function update($id, $npass)
    {   
        $con = mysqli_connect("localhost", "root", "", "project");
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $id = mysqli_real_escape_string($con, $id);
        $un = mysqli_real_escape_string($con, $npass);

        $q1 = mysqli_query($con, "UPDATE admin SET pass='$npass' WHERE id='$id'");
        if ($q1) {
          
            echo "<br>Password updated successfully!";
            
        } else {
            echo "Error updating record: " . mysqli_error($con);
        }
        mysqli_close($con);
    }

    function check($id, $opass, $npass)
    {   
        $con = mysqli_connect("localhost", "root", "", "project");

        if (!$con)
        {
            die('Could not connect to database: ' . mysqli_connect_error());
        }
        $query = "SELECT pass FROM admin WHERE id = ?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, 's', $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) 
        {
            $row = mysqli_fetch_assoc($result);
            $password_from_db = $row['pass'];

            if ($password_from_db == $opass)
            {
                update($id,$npass);
            } 
            else 
            {
                echo "Old password doesn't match!";
            }
        } 
        else 
        {
            echo "User ID not found!";
        }
        mysqli_close($con);
    }
    check($id, $opass, $npass);
}
?>
