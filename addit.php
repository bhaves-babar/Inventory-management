
<form class='addinfo' action="<?php $_SERVER['PHP_SELF'] ?>" method='get'>
    <h3>Enter Product Details</h3>
    
    Product Name:<input type='text' name="nm" required>
    Price:<input type='number' name=pri required placeholder="Enter Price in RS"><br>
    Size: <input type='text'name=si required placeholder="Enter Size in Grams"> 
    Enter Quentitys:<input type=number name=q required><br> 
     <input type='submit' name="s">
</form>
<?php
    echo "<link rel='stylesheet' type='text/css' href='ut.css'>";
if (isset($_GET['s'])){
    $name=$_GET['nm'];
    $size=$_GET['si'];
    $qu=$_GET['q'];
    $pri=$_GET['pri'];
    
    function additem($name,$size,$pri,$qu)
    {   
        $con=mysqli_connect("localhost","root","","project");

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }

        $name = mysqli_real_escape_string($con, $name);
        $size = mysqli_real_escape_string($con, $size);
        $pri = mysqli_real_escape_string($con, $pri);
        $qu = mysqli_real_escape_string($con, $qu);

        $sql = "INSERT INTO product (pname, size, price,quentity) VALUES ('$name', '$size', '$pri', '$qu')";
        if(mysqli_query($con, $sql)){
            echo "Records added successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
        }

        mysqli_close($con);
    }

    additem($name,$size,$pri,$qu);
}
?>