<?php
include('connection.php');

$name = $_POST['name'];
$password = $_POST['password'];
//var_dump($password);

$sql ="select * from users where name=:myName";// AND password=:myPass";
$stmt = $db->prepare($sql);
$stmt-> bindParam(':myName',$name);
//$stmt->bindParam(':myPass', $passWord);


$stmt->execute();

//$users = $stmt->fetchall(PDO::FETCH_ASSOC);
//var_dump($users);

if($stmt->rowCount() > 0){
    session_start();
    $_SESSION['userName'] = $name;
    $_SESSION['logged'] = true;

    header('location:users.php');
}else{
    header('location:login.php?error=Invalid username or password');
}
?>

