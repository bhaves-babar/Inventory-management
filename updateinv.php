
<form class='addinfo' action='<?php echo $_SERVER['PHP_SELF']; ?>' method='get'>
    <h3>Update Product Price</h3>
    Id:<input type='text' name='id' required>
    Price:<input type='number' name='pri' required>
    <input type='submit' name='s'>
</form>
<?php
    echo "<link rel='stylesheet' type='text/css' href='ut.css'>";
    if (isset($_GET['s'])){
        $id = $_GET['id'];
        $pri = $_GET['pri'];

        function updateitem($id, $pri)
        {   
            $con = mysqli_connect("localhost", "root", "", "project");
            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $id = mysqli_real_escape_string($con, $id);
            $pri = mysqli_real_escape_string($con, $pri);

            $q1 = mysqli_query($con, "UPDATE product SET price='$pri' WHERE pid='$id'");
            if ($q1) {
                echo "Record updated successfully.";
            } else {
                echo "Error updating record: " . mysqli_error($con);
            }
            mysqli_close($con);
        }
        updateitem($id, $pri);
    }
?>
