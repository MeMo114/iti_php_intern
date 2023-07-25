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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>   
</body>

<?php

// $sql ="select * from users";
// $stmt = $db->prepare($sql);

// $stmt->execute();

// $users = $stmt->fetchall(PDO::FETCH_ASSOC);

$db = new DB();
$dbConn = $db->connect('root', '2002');

$users = $db->selectAllUsers($dbConn,'users');
//var_dump($users);

    echo "<table class='table'>
    <tr>
    
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Room No</th> 
        <th>Ext.</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>";

    
    foreach ($users as $key=> $value) {
        echo "<tr>";
        foreach ($users[$key] as  $key1=>$val) {
            if($key1=='password') continue;
            echo "<td>$val</td>";
        }
        echo "<td> <a href='editUser.php?userID={$users[$key]['id']}' class='btn btn-warning'>Edit</a></td>";
        echo "<td> <a href='deleteUser.php?userID={$users[$key]['id']}' class='btn btn-danger'>Delete</a></td>";
        echo "</tr>";
    }
     
    echo"</table>";

?>