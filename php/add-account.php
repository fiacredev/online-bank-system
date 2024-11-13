
<?php
include "connection.php";

if(isset($_POST['add-account'])){

    $account_owner = $_POST["owner"];
    $account_id = $_POST["accI"];
    $account_type = $_POST["type"];
    $password = $_POST["password"];
    $amount = $_POST["amount"];
    $transaction_code = $_POST["code"];

    $sql = "INSERT INTO accounts (account_owner,account_id,account_type,password,beginning_amount) 
    VALUES('$account_owner','$account_id','$account_type','".md5($password)."','$amount')";

    $insert = mysqli_query($con,$sql);

    if($insert){
        echo "data inserted successfuly ";
        header("location:manage-account.php");
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

       <h4 class="text-1">here you can create account</h4>
        
       <form action="" method="POST" class="form-special">
       
       <label for="fname">Account Owner:</label>
        <input type="text" id="fname" name="owner" placeholder="Enter your Account Owner"><br>
    
        <label for="lname">Account Id:</label>
        <input type="text" id="lname" name="accI" placeholder="Enter your Id"><br>
         
        <label for="lname">Account Type:</label>
        <input type="text" id="lname" name="type" placeholder="Enter your Account Type"><br>

        <label for="lname">Password:</label>
        <input type="text" id="lname" name="password" placeholder="Enter your Password"><br>

        <label for="lname">Beginning Balance:</label>
        <input type="text" id="lname" name="amount" placeholder="Enter your Beginning Balance"><br>

        <label for="lname">Transaction Code:</label>
        <input type="text" id="lname" name="code" placeholder="Enter your Transaction Code"><br>

        <input type="submit" value="create account" name="add-account" class="add-client" style="width: 200px;text-transform:capitalize">

       </form>
       </section>

      <script src="../main.js"></script>

</body>
</html>