<?php
include "connection.php";

if(isset($_POST['add-client'])){

    // $name = stripslashes($_POST['name']);
    // $name = mysqli_real_escape_string($con,$name);
    $name = $_POST['name'];
    $number = $_POST['number'];
    $contact = $_POST['contact'];
    $id = $_POST['id'];
    // $email = stripslashes($_POST['email']);
    // $email = mysqli_real_escape_string($con,$email);
    $email = $_POST['email'];
    // $password = stripslashes($_POST['password']);
    // $password = mysqli_real_escape_string($con,$password);
    $password = $_POST['password'];
    $address = $_POST['address'];

    $query = "INSERT INTO clients (clientName,clientNumber,contact,national_id,email,password,address)
    VALUES('$name','$number','$contact','$id','$email','".md5($password)."','$address')";
   
   $insert = mysqli_query($con,$query);

   if($insert){
    echo "data inserted successfully";
   }else{
    echo "error occured through inserting data in database";
   }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../assets/Bootstrap icon/icons/bootstrap-icons.css">
    <style>
        .form-special{
            text-align:center;
            margin-top:7px;
        }
        .add-client .text-1{
            text-align:center;
            font-size:20px;
            text-transform:capitalize;
        }
        label{
            text-transform:capitalize;
        }
    </style>
</head>
<body class="portal">

    <div id="mySidenav" class="sidenav">

        <h3 class="text-1">internet banking</h3>        

    <div class="profile">    
        <img src="../assets/img/team.jpg" alt=""><h3 class="text-2">profile</h3>
    </div>

        <a href="" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="dashboard.php">dashboard</a>
        <a href="account.php">account</a>

        <h2 class="bi bi-person-lines-fill"> Clients</h2>
        <a href="add-client.php">+add Client</a>
        <a href="manage-client.php">manage client</a>

        <h2 class="bi bi-bank2"> accounts</h2>
        <a href="add-account.php">+add account</a>
        <a href="manage-account.php">manage acc</a>

        <h2 class="bi bi-journal-bookmark"> finances</h2>
        <a href="deposit_b.php">deposit</a>
        <a href="withdraw_b.php">withdraw</a>
        <a href="transfer_b.php">transfer</a>

        <h3 class="text-3">advanced module</h3>

        <h2 class="bi bi-journals"> finacial reports</h2>
        <a href="deposit_info.php">deposit dash</a>
        <a href="withdraw_info.php">withdraw dash</a>
        <a href="transfer_info.php">transfer dash</a>

        <a href="">system settings</a>
        
        <h2 class="text-3">logout</h2>

       </div>
      
       <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
    

       <section class="add-client">

       <h4 class="text-1">here you can add client</h4>
        
       <form method="POST" action="" class="form-special">

       <label for="fname">client name:</label>
        <input type="text" id="fname" name="name" placeholder="Enter Client Names"><br>
    
        <label for="lname">client number:</label>
        <input type="text" id="lname" name="number" placeholder="Enter Client Number"><br>
         
        <label for="lname">contact:</label>
        <input type="text" id="lname" name="contact" placeholder="Enter Client Contact"><br>

        <label for="lname">national id no:</label>
        <input type="text" id="lname" name="id" placeholder="Enter National Id"><br>

        <label for="lname">email:</label>
        <input type="text" id="lname" name="email" placeholder="Enter Client Email"><br>

        <label for="lname">address:</label>
        <input type="text" id="lname" name="address" placeholder="Enter Client Address"><br>

        <input type="submit" name="add-client" value="add client" class="add-client" style="width: 200px;text-transform:capitalize">

       </form>
       </section>

      <script src="../main.js"></script>

</body>
</html>