
<?php 
include "connection.php";

$sql = "SELECT * FROM admin_ok";
$fetch = mysqli_query($con,$sql);
$data = mysqli_fetch_array($fetch);

// codes to deal with updating data in databases

if(isset($_POST['update-client'])){

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $account_number = $_POST['accN'];

  $sql = "UPDATE admin_ok SET All_Names = '$name',Email='$email',Password ='$password',
  Account_Number = '$account_number'";

  $update = mysqli_query($con,$sql);

  if($update){
    // echo "data updated successfully";
  }else{
    echo "errro occured through updating data in database";
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
      
       <div class="info">

      <div class="card">
        
      <h2 class="text-4">Information about admin account</h2>

      <img src="../assets/img/ish.jpg" alt="Avatar" >
      <div class="container">

      <h4><label for="">Name:</label><b><?php echo $data['All_Names']?></b></h4> 
      <h4><label for="">email:</label><b><?php echo $data['Email']?></b></h4> 
      <h4><label for="">Password:</label><b><?php echo $data['Password']?></b></h4> 
      <h4><label for="">account number:</label><b><?php echo $data['Account_Number']?></b></h4> 
      </div>
      </div>

      <form action="" method="POST">
        
        <h4 class="text-1">here you can update information about your account...</h4>

        <label for="fname">Enter Names:</label>
        <input type="text" id="fname" name="name" value="<?php echo $data['All_Names']; ?>"><br>

        <label for="fname">Enter Email:</label>
        <input type="text" name="email" value="<?php echo $data['Email']; ?>"><br>
    
        <label for="lname">Password:</label>
        <input type="text" name="password" value="<?php echo  $data['Password']; ?>"><br>
        
        <label for="lname"> Account number:</label>
        <input type="text" name="accN" value="<?php echo $data["Account_Number"]?>"><br>

        <input type="submit" value="Update" name="update-client">

      </form>
      
      </div>

      <script src="../main.js"></script>

</body>
</html>