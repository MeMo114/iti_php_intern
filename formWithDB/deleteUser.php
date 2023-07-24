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
$userID = $_GET["userID"];
$sql ="delete from users WHERE id=:id";
$stmt = $db->prepare($sql);
$stmt-> bindParam(':id',$userID);

$stmt->execute();
header("Location:users.php");
?>