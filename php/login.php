<!DOCTYPE html>
<html>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="../style.css" />
<link rel="stylesheet" href="../assets/Bootstrap icon/icons/bootstrap-icons.css">
<style>
    .form button{
        width:100px;
        height:30px;
        margin-left:20px;
        margin-top:10px;
        border-radius:5px;
        border:none;
        font-size:13px;
        text-transform:capitalize;
        font-weight:bold;
        background-color:#ff0000;
        color:#fff;
    }
    .form button a{
        color:#fff;
        text-decoration:none;
    }
    
    form h1{
     color:#4747d1;
    }

    form{
    margin-top: 10%;
    margin-left:370px;      
}

form label{
    text-transform: capitalize;
    font-family: cursive;
    font-weight: bold;
}
input[type=password], select {
    width: 400px;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }
  
  input[type=submit] {
    width: 100px;
    height: 45px;
    background-color:#4747d1;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    /* margin-left: 50px; */
    font-size: 18px;
  }
  
  input[type=submit]:hover {
    background-color: #89a88b;
  }


</style>
</head>
<body>

<?php

include "connection.php";
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['username'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `admin_ok` WHERE User_Name='$username'
and Password='$password'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['username'] = $username;
            // Redirect user to index.php
	    header("Location: dashboard.php");
         }else{
	echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a>
</div>";
	}
    }else{
?>
<div class="form">
    <button class="bi bi-arrow-return-left"> <a href="../index.html">go back</a></button>
<form action="" method="post" name="login">
<h1>Log In</h1>
<input type="text" name="username" placeholder="Username" required /><br>
<input type="password" name="password" placeholder="Password" required />
<br>
<input name="submit" type="submit" value="Login" />
</form>
</div>
<?php } ?>
</body>
</html>
