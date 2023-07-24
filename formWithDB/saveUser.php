<?php
include('connection.php');
?>

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
$userID = $_REQUEST['userID'];

$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$roomNo = $_REQUEST['roomNo'];
$Ext = $_REQUEST['Ext'];

$sql ="update users set name=:name, email=:email, roomNo=:roomNo, Ext=:Ext where id=:id;";
$stmt = $db->prepare($sql);

$stmt-> bindParam(':name',$name);
$stmt-> bindParam(':email',$email);
$stmt-> bindParam(':roomNo',$roomNo);
$stmt-> bindParam(':Ext',$Ext);
$stmt-> bindParam(':id',$userID);
    
$stmt->execute();
       
header("Location:users.php");

exit;


?>