
<form class='addinfo' action='<?php echo $_SERVER['PHP_SELF']; ?>' method='get'>
    <h3>Remove Product From Inventory</h3>
    Id:<input type='text' name='id'>
    <input type='submit' name='s'>
</form>
<?php
    echo "<link rel='stylesheet' type='text/css' href='ut.css'>";
    if (isset($_GET['s'])){
        $id = $_GET['id'];

        function removeItem($id)
        {   
            $con = mysqli_connect("localhost", "root", "", "project");
            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            }
            
            $id = mysqli_real_escape_string($con, $id);
            
            $q1 = mysqli_query($con, "DELETE FROM product WHERE pid='$id'");
            if ($q1) {
                echo "Item removed";
            } else {
                echo "Error removing item: " . mysqli_error($con);
            }

            mysqli_close($con);
        }
        removeItem($id);
    }
?>

