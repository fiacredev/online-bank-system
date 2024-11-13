
<?php 
include "connection.php";

if(isset($_POST['update-account'])){
    
    $id = $_POST['id'];
    $account_owner = $_POST["owner"];
    $account_id = $_POST["accI"];
    $account_type = $_POST["type"];
    $password = $_POST["password"];
    $amount = $_POST["amount"];

    $sql = "UPDATE accounts SET account_owner='$account_owner',account_id='$account_id',account_type='$account_type'
    ,beginning_amount='$amount' WHERE id ='$id' ";

    $update = mysqli_query($con,$sql);

    if($update){
        echo "data inserted successffuly";
        header("location:manage-account.php");
    }else{
        echo "data failed to be inserted";
    }
}
?>