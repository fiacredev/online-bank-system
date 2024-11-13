
<?php

include "connection.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql =  "DELETE FROM accounts WHERE id ='$id' ";
    $delete = mysqli_query($con,$sql);

    if($delete){
        echo "data deleted successfully from database";
        header("location:manage-account.php");
    }else{
        echo "error occured through deleting data from database";
    }
}
?>