<?php
include "connection.php";

if(isset($_POST['update-client'])){
  
    $id = $_POST['id'];
    $name = $_POST['name'];
    $number = $_POST['number'];
    $contact = $_POST['contact'];
    $national_id = $_POST['n_id'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];

    $sql = "UPDATE clients SET clientName = '$name',clientNumber = '$number',contact='$contact',
    national_id = '$national_id',email='$email',address='$address',password='".md5($password)."' WHERE id = '$id' ";
    $update = mysqli_query($con,$sql);

    if($update){
        echo "data updated successfuly";
        header("location:manage-client.php");
    }else{
        echo "error occured through updating data";
    }
}

?>