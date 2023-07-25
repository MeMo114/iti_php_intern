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

// $sql ="select * from users where id=?";
// $stmt = $db->prepare($sql);
// $stmt-> bindParam(1,$userID);

// $stmt->execute();

// $users = $stmt->fetchall(PDO::FETCH_ASSOC);

$db = new DB();
$dbConn = $db->connect('root', '2002');
$users = $db->select($dbConn,'users', $userID);

//var_dump($users);

$name = $users[0]['name'] ;
$email = $users[0]['email'] ;
$roomNo = $users[0]['roomNo'] ;
$Ext = $users[0]['Ext'] ;

echo "<div class='container'>
<h2>Add User</h2><br>
<form action='saveUser.php' method='post' enctype='multipart/form-data' >
    <div class='form-group'>
    <input type='hidden' name='userID' value=$userID>
    <label for='name'>Name:</label>
    <input type='text' id='name'  name='name' class='form-control 'value=$name>  
    <br><br>

    <label for='email'>Email:</label>
    <input type='text' id='email' name='email' class='form-control' value=$email>
    <br><br>

    </div>

    <div class='form-group'>
        <label for='roomNo'>Room No:</label>
        <select id='roomNo' name='roomNo' class='form-control' >
        <option value='' disabled selected >roomNo</option>
        <option value='Application1'>Application1</option>
        <option value='Application2'>Application2</option>
        <option value='Cloud'>Cloud</option>
        </select> 
        <br><br>
     </div>
    
     <div class='form-group'>
        <label for='ext'>Ext.:</label>
        <input type='text' id='ext' placeholder='Enter ext' name='Ext' class='form-control' value=$Ext>
        <br><br>
     </div>

    
    <br><br>
    <button type='submit' class='btn btn-default'>Save</button>
    
</form>
</div>";


