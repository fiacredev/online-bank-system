<?php 
include "connection.php";
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
            margin-bottom:70px;
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

       <h4 class="text-1">here you can Manage Your Company System Settings</h4>
        
       <form action="" method="POST" class="form-special">
        
        <input type="hidden" name="db_id" value="<?php echo $data['id']; ?>" >

        <label for="lname">Company Name:</label>
        <input type="text" id="lname" name="c_name" placeholder="Please Enter The Amount To Be Deposited"><br>

        <label for="fname">Company Tagline:</label>
        <input type="text" id="fname" name="c_tagline" value="WITHDRAW"><br>
        
        <label for="fname">Company Logo:</label>
        <input type="file" id="fname" name="c_logo" style="margin-bottom:20px;margin-top:20px" value="<?php echo $data['account_id']?>" disabled><br>
        
        <input type="submit" value="Update Setting" class="add-client" name="withdraw" style="width: 200px;text-transform:capitalize">
         
       </form>
       </section>

      <script src="../main.js"></script>

</body>
</html>