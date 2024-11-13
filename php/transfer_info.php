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
            margin-bottom:30px;
        }
        table{
          margin-left:220px;
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

        <a href="settings.php">system settings</a>
        
        <h2 class="text-3">logout</h2>

       </div>
      
      <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
 
    <section class="manage-client">
       
       <h4 class="text-1">this is all information under transfer transaction category</h4>

       <div class="column">
    
      <table>

      <tr>
        <th>Count</th>
        <th>Account Owner</th>
        <th>Account Id</th>
        <th>Transaction Amount</th>
        <th>Transaction Type</th>
        <th>Date Occured</th>
      </tr>
      <?php 
      
      $count = 1;
      $sql = "SELECT * FROM transactions WHERE transaction_type = 'TRANSFER'";
      $fetch = mysqli_query($con,$sql);

      if(mysqli_num_rows($fetch) > 0){
        while($row=mysqli_fetch_array($fetch)){
      ?>
      <tr>
        <td><?php echo $count++; ?></td>
        <td><?php echo $row['account_owner']; ?></td>
        <td><?php echo $row['account_id'];?></td>
        <td><?php echo $row['transaction_amount'];?></td>
        <td><?php echo $row['transaction_type'];?></td>
        <td><?php echo $row['date_occured'];?></td>
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