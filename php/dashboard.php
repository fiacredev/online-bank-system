<?php 

// deal with limiting some access to the system
session_start();
if(!isset($_SESSION["username"])){
header("location:login.php");
exit();
}

include "connection.php";

// php codes to retrieve number of accounts in the database;
$sql = "SELECT COUNT(*) AS row_count FROM accounts";
$sql_statement = mysqli_query($con,$sql);
$fetch_sql_statement = mysqli_fetch_array($sql_statement);
$data_sql_statement = $fetch_sql_statement['row_count'];

// php codes to retrieve number of transafers occured in the system
$sql = "SELECT COUNT(*) AS  transfers_count FROM transactions WHERE transaction_type='TRANSFER'";
$sql_transfer_statement = mysqli_query($con,$sql);
$fetch_transfer_statement = mysqli_fetch_array($sql_transfer_statement);
$data_transfer_statement = $fetch_transfer_statement['transfers_count'];

// php codes to retrieve number of withdraws occured in the system
$sql = "SELECT COUNT(*) AS  withdraws_count FROM transactions WHERE transaction_type='WITHDRAW'";
$sql_withdraw_statement = mysqli_query($con,$sql);
$fetch_withdraw_statement = mysqli_fetch_array($sql_withdraw_statement);
$data_withdraw_statement = $fetch_withdraw_statement['withdraws_count'];

// php codes to retrieve number of deposits occured in the system
$sql = "SELECT COUNT(*) AS  deposits_count FROM transactions WHERE transaction_type='DEPOSIT'";
$sql_deposit_statement = mysqli_query($con,$sql);
$fetch_deposit_statement = mysqli_fetch_array($sql_deposit_statement);
$data_deposit_statement = $fetch_deposit_statement['deposits_count'];

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
        table{
            margin-left:120px;
        }
        .logout{
          margin-left:30px;
          width: 100px;
          height:30px;
          border:none;
          font-size:15px;
          text-transform:capitalize;
          font-weight:bold;
          border-radius:5px;
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

        <h2 class="bi bi-journals">finacial reports</h2>
        <a href="deposit_info.php">deposit dash</a>
        <a href="withdraw_info.php">withdraw dash</a>
        <a href="transfer_info.php">transfer dash</a>
        <a href="settings.php">system settings</a>

        <form action="logout.php" method="POST">
        <button type="submit" class="bi bi-arrow-bar-left logout"> logout</button>
        </form>

       </div>
      
       <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>

       <section class="dash">

        <h3 class="text-1">admin dashboard iBank system</h3>
        
        
        <div class="basic-modules">

            <div class="box">
                <h3 class="bi bi-arrow-up-circle"></h3>
                <div class="module">
                <h6>deposit</h6><br>
                <h6><?php echo $data_deposit_statement; ?></h6>
                </div>
            </div>

            <div class="box">
                <h3 class="bi bi-arrow-down-circle"></h3>
                <div class="module">
                <h6>withdraws</h6><br>
                <h6><?php echo $data_withdraw_statement;?></h6>
                </div>
            </div>

            <div class="box">
                <h3 class="bi bi-shuffle"></h3>
                <div class="module">
                <h6>transfers</h6><br>
                <h6><?php echo $data_transfer_statement;?></h6>
                </div>
            </div>

            <div class="box">
                <h3 class="bi bi-file-earmark-person-fill"></h3>
                <div class="module">
                <h6>accounts</h6><br>
                <h6><?php echo $data_sql_statement;?></h6>
                </div>
            </div>  

        </div>

        <h4 class="txt-1">latest system transactions occured</h4>

        <!-- deal with transactions table -->

      <div class="column">
      <table>

      <tr>
        <th>Count</th>
        <th>Account Owner</th>
        <th>Account Id</th>
        <th>Transaction Amount</th>
        <th>Transaction Type</th>
        <th>Date Occured</th>
        <th>New Account Balance</th>
      </tr>
      <?php 
      
      $count = 1;
      $sql = "SELECT * FROM transactions";
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
        <td><?php echo $row['new_account_balance'];?></td>
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