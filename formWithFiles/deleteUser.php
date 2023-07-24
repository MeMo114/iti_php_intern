<?php
session_start();

// Check if the user is logged in
if (!$_SESSION['logged']) {
  // Redirect the user to the login page
  header('Location: login.php');
  exit;
}

?>
<?php
$userName = $_GET["userName"];
$users=file('usersData.txt');
foreach ($users as $key => $user) {
    $userData = explode(':',$user);
    if( $userName == $userData[0]){
        unset($users[$key]);
        break;
    }
}
$usersFile= fopen('usersData.txt', 'w');

foreach ($users as $key => $value) {
    fwrite($usersFile, $value);
}
fclose($usersFile);
header("Location:users.php");
?>