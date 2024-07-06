
<?php
    $op=$_GET['editop'];
    switch ($op) {
        case '1':
            header("Location: editun.php");
            break;
        case '2':
            header("Location: editpass.php");
            changepass();
            break;
        }
function changeun()
{
    echo"";

}
?>