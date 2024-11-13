
<?php
include "connection.php";

if(isset($_GET['id'])){
    
    $id = $_GET['id'];
    $sql = "SELECT * FROM accounts WHERE id = '$id' ";
    $fetch = mysqli_query($con,$sql);
    $data = mysqli_fetch_array($fetch);
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

       <h4 class="text-1">here you can Update Account Information</h4>
        
       <form action="php-update-account.php" method="POST" class="form-special">
       
       <!-- deal with id inputthat hidden -->
        
       <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
       <label for="fname">Account Owner:</label>
        <input type="text" id="fname" name="owner" value="<?php echo $data["account_owner"]; ?>"><br>
    
        <label for="lname">Account Id:</label>
        <input type="text" id="lname" name="accI" value="<?php echo $data["account_id"]; ?>"><br>
         
        <label for="lname">Account Type:</label>
        <input type="text" id="lname" name="type" value="<?php echo $data['account_type']; ?>"><br>

        <label for="lname">Beginning Amount:</label>
        <input type="text" id="lname" name="amount" value="<?php echo $data['beginning_amount']; ?>"><br>

        <input type="submit" value="update account" name="update-account" class="add-client" style="width: 200px;text-transform:capitalize">

       </form>
       </section>

      <script src="../main.js"></script>

</body>
</html>