<?php
    session_start();
    if(isset($_SESSION['id']))
    {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="ut.css">
   <link rel="stylesheet" href="pro.css">
</head>
<body>
    <header>
        <nav class="homenav">
            <div class="lo">
            <!-- we will add here logo -->
            <?php
            if(isset($_SESSION['name'])) {
                // User is logged in, display logout button
                echo "<form class=logout-butt action='logout.php' method='post'>";
                echo "<input type='submit' value='Logout'>";
                echo "</form>";
            }
        ?>
        </div>
        </nav>
    </header>
    <main class="flex">
        <div class="left">
            <ul class="menu-list">
                <li><button class="libut" onClick="changeContent('1')">Home</button></li>
                <li><button class="libut" onClick="changeContent('2')">Transaction</button></li>
                <li><button class="libut" onClick="changeContent('3')">Inventory</button></li>
                <li><button class="libut" onClick="changeContent('4')">Customer</button></li>
                <li><button class="libut" onClick="changeContent('5')">Billing</button></li>
            </ul>
        </div>
        <div class="right" id="di">
          <iframe class="frame" src="admin.php" id="fr" frameborder="0"></iframe>
        </div>
    </main>
</body>
<script>
    function changeContent(val) {
    var contentElement = document.getElementById("fr");
    console.log(val)

    switch (val) {
        case '1':
        contentElement.src = "admin.php";
            break;
            case '2':
        contentElement.src = "trans.html";        
            break;
            case '3':
        contentElement.src = "Inventory.html";        
            break;
            case '4':
        contentElement.src = "c.html";     
            break;
            case '5':
        contentElement.src = "bill.php";        
            break;
        
        default:
            break;
    }
}
</script>
</html>
<?php
    }
    // add else part to redirect to login page
?>