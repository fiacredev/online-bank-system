
<?php 

include "connection.php";
if(isset($_POST['transfer'])){
   
   $amount_transfered = (int)$_POST['amount'];
   $sender_id = $_POST['myAccId'];
   $receiver_id = $_POST['receiver'];

   // deal with retrieving sender data
   $sql_retrieve_sender_data = "SELECT * FROM accounts WHERE account_id = '$sender_id'";
   $fetch_sender = mysqli_query($con,$sql_retrieve_sender_data);
   $sender_data = mysqli_fetch_array($fetch_sender);
   $sender_balance = (int)$sender_data["beginning_amount"];

   //deal with transaction data
   $transaction_acccount_owner = $sender_data["account_owner"];
   $transaction_acccount_id = $sender_data["account_id"];
   $transaction_amount = (int)$_POST['amount'];
   $transaction_type = $_POST['type'];

   //deal with retrieving receiver data
   $sql_retrive_receiver_data = "SELECT * FROM accounts WHERE account_id = '$receiver_id' ";
   $fetch = mysqli_query($con,$sql_retrive_receiver_data);
   $receiver_data = mysqli_fetch_array($fetch);
   $receiver_balance = (int)$receiver_data['beginning_amount'];
   
   $new_sender_balance = $sender_balance - $amount_transfered;
   $new_receiver_balance = $receiver_balance + $amount_transfered;
   
   $sql_transaction = "INSERT INTO transactions(account_owner,account_id,transaction_amount,transaction_type) 
   VALUES('$transaction_acccount_owner','$transaction_acccount_id','$transaction_amount','$transaction_type')";

   $sql_sender = "UPDATE accounts SET beginning_amount = '$new_sender_balance' WHERE account_id ='$sender_id'";
   $sql_receiver = "UPDATE accounts SET beginning_amount='$new_receiver_balance' WHERE account_id ='$receiver_id'";
   
   $sql_transaction_info = mysqli_query($con,$sql_transaction);
   $update_sender_balance = mysqli_query($con,$sql_sender);
   $update_receiver_balance = mysqli_query($con,$sql_receiver);

   if($update_sender_balance && $update_receiver_balance){ 
    echo "transfer made successfuly";
    header("location:transfer_b.php");
   }else{
    echo "error occured through transfering funds";
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
            margin-bottom:40px;
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

       <h4 class="text-1">here you can transfer some funds</h4>
        
       <form action="" method="POST" class="form-special">
        
        <input type="hidden" name="p_id" value="<?php echo $data['id']; ?>">
        
        <label for="fname">Amount Transfered:</label>
        <input type="text" id="fname" name="amount" placeholder="enter amount to be transfered"><br>

        <label for="fname">Sender Account Id:</label>
        <input type="text" id="fname" name="myAccId" placeholder="Enter Sender Account Id"><br>

        <label for="fname">Receiver Account Id:</label>
        <input type="text" id="fname" name="receiver" placeholder="Receiver Account Id"><br>

        <label for="fname">transaction Type :</label>
        <input type="text" id="fname" name="type" value="TRANSFER" ><br>

        <input type="submit" value="transfer funds" name="transfer" class="add-client" style="width: 200px;text-transform:capitalize">

       </form>
       </section>

      <script src="../main.js"></script>

</body>
</html>