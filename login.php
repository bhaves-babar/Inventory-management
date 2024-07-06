<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="ut.css">
    <!-- <link rel="stylesheet" href="pro.css"> -->
    <style>
        nav {
    width: 100vw;
    height: 10vh;
    background-color: #4796BD;
}
.login-info{
    width: 60vw;
    height: 65vh;
    border: 3px solid black;
    border-radius: 5px;
    margin-top: 20px;
    display: flex;
}
.loginl{
    width: 50%;
    margin: 50px;
    border-radius: 10px;
    background-image: url("loginimg.jpg");
    background-repeat: no-repeat;
    background-size:500px;
    background-position:inherit;
    
}
.loginr{
    width: 50%;
}
.logintext{
    width: 260px;
    height: 30px;
    margin: 10px;
    border-radius:8px;
    padding: 5px;
    border: none;
    background-color:#d6d6d6;
}
.loginbut{
    width: 220px;
    height: 30px;
    margin: 30px;
    border-radius:8px;
    border: none;
    background-color: #4796BD;
}
.formlo{
    grid-template-rows:1fr  ;
    justify-items: center;
}

    </style>
</head>
<body>
    <header>
        <nav>
            <!-- we will add here logo -->
        </nav>
    </header>
    <main class="flex center">
        <div class="cont">
            <div class="loginimg">
                <img src="" alt="">
            </div>
            <div class="login-info">
                <div class="loginl flex center">
                    <!-- <img class="imglogin" src="loginimg.jpg" width="100%" alt=""> -->
                </div>
                <div class="loginr flex center">
                 
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="grid formlo" >
                    <h2>Login</h2>
                <input type="text" class="logintext" name="id" id="" placeholder="Enter Id" required>
                <input type="password"class="logintext" name="pass" id="" placeholder="Password" required>
                <input type="submit" name="s" class="loginbut">
                 </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
<?php
if(isset($_POST['s']))
{
session_start(); 

$id =$_POST['id'];
$pass =$_POST['pass'];

$con = mysqli_connect("localhost","root","", "project");
if (!$con) {
    die('could not connect to database' . mysqli_error());
}

$qu = "SELECT * FROM admin WHERE id='$id' AND pass='$pass'";
$q = mysqli_query($con, $qu);

if (mysqli_num_rows($q) > 0) {
    $row = mysqli_fetch_array($q);
    $_SESSION['id'] = $row['id'];
    $_SESSION['name'] = $row['name'];

    header("Location: home.php");
    exit;
}
else
{
    echo "Invalid username or password";
}
mysqli_close($con);
}
?>