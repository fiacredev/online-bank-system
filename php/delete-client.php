<?php
include "connection.php";

if(isset($_GET['id'])){

    $id = $_GET['id'];
    $sql = "DELETE FROM clients WHERE id = '$id' ";
    $delete = mysqli_query($con,$sql);

    if($delete){
        echo "data deleted successfuly";
        header("location:manage-client.php");
    }else{
        echo "error occured through deleting data in database";
    }
}
?>

