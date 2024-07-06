<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Form</title>
    <link rel="stylesheet" href="ut.css">
    <style>
        .edit-form {
            width: 300px;
            margin: 10px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            background-color: #f5f5f5;
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
        .heading {
            margin: 40px;
        }
        .img {
            width: 120px;
            height: 120px;
            background-color: gray;
            border-radius: 50%;
        }
        .info-card {  
            margin: 20px;
            align-items: center;
            width: 90%;
        }
        .admin-info {
           margin:20px 
        }
        .ebut, .abut {
            margin: 10px;
            border: none;
            color: aliceblue;
            padding: 0 15px;
            border-radius: 5px;
            background-color: #4796BD;
            position: relative;
            bottom: -13px;
            left: 60px;
            font-size: 20px;
        }
    </style>
</head>
<body>

    <?php
    session_start();
    $id=$_SESSION['id'];
  
         $con = mysqli_connect("localhost", "root", "", "project");

         if (!$con)
         {
             die('Could not connect to database: ' . mysqli_connect_error());
         }
 
         $q1 = "SELECT * FROM admin WHERE id=?";
         $stmt = mysqli_prepare($con, $q1);
         mysqli_stmt_bind_param($stmt, 'i', $id);  
         mysqli_stmt_execute($stmt);
         $result = mysqli_stmt_get_result($stmt);
 
         while ($row = mysqli_fetch_assoc($result))
         {
             echo '<h1 class="heading">Profile</h1>
   
                 <div class="info-card flex ">
                     <div class="admin-info">
                         <h2 class="name">' . $row['name'] . '</h2>
                         <h3 class="id">' . $row['id'] . '</h3>
                     </div>
                     <button class="ebut" onclick="edit()">Edit</button>';
                     if($row['deg']=='Master-Admin')
                     {
                        echo'<button class="ebut" onclick="add()">Add Admin</button></div>';
                     }
         }
         mysqli_close($con);
    ?>
    <div class="ed" id="edop">
</div>
    
    <script>
        function edit() {
            let a = document.getElementById("edop");
            a.innerHTML = "<form action='edit.php' method='get' class='edit-form'><select name='editop' class=''><option value=''>Select Option</option><option value='1'>User Name</option><option value='2'>Change Password</option></select><input type='submit' value='Next>'></form>";
        }
        function add() {
            window.location.href = "addadmin.php";
        }
    </script>

</body>
</html>