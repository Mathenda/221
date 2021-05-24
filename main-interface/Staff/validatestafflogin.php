<?php
session_start();

$title = "login";
$servername = "127.0.0.1";
$userna = "root";
$passwo = "57074";
$db = new mysqli($servername, $userna,$passwo, 'voting_DB');

if(isset($_POST)){
    $username = mysqli_real_escape_string($db, $_POST['fname']); 
    $pass = mysqli_real_escape_string($db, $_POST['pass']); 
    $check_u = "SELECT * FROM staff WHERE staff_ID='$username' and staff_password='$pass'";
    
    if($get_u = mysqli_query($db, $check_u)){
        $_SESSION["user"] = $username;
        header("Location: staffhome.php");
    }else{
        $Nerror = "username does not exist";
        $username = "error";
        $_SESSION["user"] = "username/password does not match";
        header("Location: stafflogin.php");
    }

    $db->close();
}
?>