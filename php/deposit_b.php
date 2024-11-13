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
        }
        .manage-client .text-1{
            text-align:center;
            font-size:20px;
            text-transform:capitalize;
            margin-bottom:27px;
        }
        table{
          margin-left:70px;
        }
        td a{
          text-decoration:none;
          text-transform:uppercase;
          font-size:13px;
          font-weight:bold;
          background-color: #ff0000;
          padding:5px;
          color:#fff;
          border-radius:3px;
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
 
    <section class="manage-client">
       
       <h4 class="text-1">Click On Depose to raise funds...</h4>

       <div class="column">
    
      <table>
      <tr>
        <th class="xoo">Count</th>
        <th>Account owner</th>
        <th>Account Id</th>
        <th>Account Type</th>
        <th>Password</th>
        <th>Amount ($)</th>
        <th>Date Created</th>
        <th>Action</th>
      </tr>

      <?php 
      
      $sql = "SELECT * FROM accounts";
      $fetch = mysqli_query($con,$sql);
      $count = 1;
      
      if(mysqli_num_rows($fetch) > 0){
        while($row =  mysqli_fetch_array($fetch)){

      ?>

      <tr>
        <td><?php echo $count++ ?></td>
        <td><?php echo $row["account_owner"]; ?></td>
        <td><?php echo $row["account_id"]; ?></td>
        <td><?php echo $row["account_type"]?></td>
        <td><?php echo $row["password"];?></td>
        <td><?php echo $row["beginning_amount"];?></td>
        <td><?php echo $row["date_created"];?></td>
        <!-- deal with actions like delete and updated -->
        <td><a href="deposit.php?id=<?php echo $row['id']; ?>" class="bi bi-arrow-up" style="background-color:#0033cc;"> deposit funds</a></td>
      </tr>
    
       <?php 
         }
        }
       ?>

    </table>
  </div>
  
  </section>
      <script src="../main.js"></script>

</body>
</html>