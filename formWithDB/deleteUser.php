<?php
//include('connection.php');
include('DB.php');
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

// $sql ="delete from users WHERE id=:id";
// $stmt = $db->prepare($sql);
// $stmt-> bindParam(':id',$userID);

// $stmt->execute();

$db = new DB();
$dbConn = $db->connect('root', '2002');
$db->delete($dbConn,'users', $userID);
header("Location:users.php");
?>