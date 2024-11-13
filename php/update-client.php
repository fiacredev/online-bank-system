
<?php

include "connection.php";

if(isset($_GET['id'])){

    $id = $_GET['id'];
    $sql = "SELECT * FROM clients WHERE id = '$id' ";
    $fetch = mysqli_query($con,$sql);
    $data = mysqli_fetch_array($fetch);

// deal with updating data in database

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

       <h4 class="text-1">here you can update client</h4>

       <form action="php-update-client.php" method="POST" class="form-special">

       <input type="hidden" name="id" value="<?php echo $id; ?>">

       <label for="fname">Client Name:</label>
        <input type="text" id="fname" name="name" value="<?php echo $data["clientName"];    ?>"><br>
    
        <label for="lname">client Number:</label>
        <input type="text" id="lname" name="number" value="<?php echo $data["clientNumber"]; ?>"><br>
         
        <label for="lname">Contact:</label>
        <input type="text" id="lname" name="contact" value="<?php echo $data["contact"]; ?>"><br>

        <label for="lname">National Id:</label>
        <input type="text" id="lname" name="n_id" value="<?php echo $data["national_id"]; ?>"><br>

        <label for="lname">Email:</label>
        <input type="text" id="lname" name="email" value="<?php echo $data["email"]; ?>"><br>

        <label for="lname">Address:</label>
        <input type="text" id="lname" name="address" value="<?php echo $data["address"]; ?>"><br>

        <input type="submit" value="update client" name="update-client" class="add-client" style="width: 200px;text-transform:capitalize">

       </form>
       </section>

      <script src="../main.js"></script>

</body>
</html>

<?php } ?>