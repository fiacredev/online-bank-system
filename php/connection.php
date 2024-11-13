<?php

$server= "localhost";
$username="root";
$password="";
$database="obs";

$con = mysqli_connect($server,$username,$password,$database);

if(!$con){
    echo "error occured through having connection";
}else{
    // echo "connection made successfuly";
}

?>
