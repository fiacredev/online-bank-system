
<?php 

session_start();
// deal with destroying all of the sessions
if(session_destroy()){
    header("location:login.php");
}

?>