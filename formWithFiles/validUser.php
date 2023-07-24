<?php

$userName = $_POST['userName'];
$password = $_POST['password'];

$data = file('usersData.txt');

foreach ($data as  $value) {
    $user = explode(':',$value);
    $log=false;
    foreach ($user as $key => $value) {
        if($userName == $user[0] and $password == $user[1]){
            $log=true;
        }
    }
   
}
if($log){
    session_start();
    $_SESSION['userName'] = $userName;
    $_SESSION['logged'] = true;

    header('location:users.php');
}else{
    header('location:login.php?error=Invalid username or password');
}
?>

