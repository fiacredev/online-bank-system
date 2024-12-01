<!-- this code file is about withdrawing money from one account to another -->
<?php 
include "connection.php";

// php code to fetch data from database
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM accounts WHERE id ='$id' ";
    $fetch = mysqli_query($con,$sql);
    $data = mysqli_fetch_array($fetch);
}

// php codes to deal with deposing funds to account
if(isset($_POST['withdraw'])){
    
    $db_id = $_POST['db_id'];
    $transaction_type = $_POST['transaction_type'];
    $balance_data = $data['beginning_amount'];
    $balance = (int)$balance_data;
    $amount_data = $_POST['amount_withdrawed'];
    $amount = (int)$amount_data;
    $new_amount = $balance - $amount;
        
    $sql = "UPDATE accounts SET beginning_amount='$new_amount' WHERE id='$db_id' ";
    $deposit_fund = mysqli_query($con,$sql);

    if(!$deposit_fund){
        echo "error occured about deposit funds";
    }else{
        echo "funds deposited succussfully";
        header("location:withdraw_b.php");
    }
    
    // deal with transactions data
    $transaction_type = $_POST['transaction_type'];
    $transaction_acccount_owner = $data['account_owner'];
    $transaction_acccount_id = $data['account_id'];
    $transaction_amount = (int)$amount_data;
    
    $sql_transaction = "INSERT INTO transactions(account_owner,account_id,transaction_amount,transaction_type,new_account_balance) 
    VALUES('$transaction_acccount_owner','$transaction_acccount_id','$transaction_amount','$transaction_type','$new_amount')";
    
    $sql_transaction_query = mysqli_query($con,$sql_transaction);
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

       <h4 class="text-1">here you can Withdraw some funds</h4>
        
       <form action="" method="POST" class="form-special">
        
        <input type="hidden" name="db_id" value="<?php echo $data['id']; ?>" >

        <label for="lname">Amount Withdrawed:</label>
        <input type="text" id="lname" name="amount_withdrawed" placeholder="Please Enter The Amount To Be Deposited"><br>

        <label for="fname">Transaction Type:</label>
        <input type="text" id="fname" name="transaction_type" value="WITHDRAW"><br>
        
        <label for="fname">Account Id:</label>
        <input type="text" id="fname" name="firstname" value="<?php echo $data['account_id']?>" disabled><br>
        
        <input type="submit" value="withdraw fund" class="add-client" name="withdraw" style="width: 200px;text-transform:capitalize">
         
       </form>
       </section>

      <script src="../main.js"></script>

</body>
</html>