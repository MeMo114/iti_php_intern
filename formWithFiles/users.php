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
    $users= file("usersData.txt");
   // var_dump($users);
//$gender:$firstName:$lastName:$address:$country:$allSkills
    echo "<table class='table'>
    <tr>
    
        <th>Title</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>Country</th>
        <th>Skills</th>
        <th >Profile Picture</th> 
        <th>Edit</th>
        <th>Delete</th>
    </tr>";
    foreach ($users as  $value) {
        $user = explode(':',$value);
        echo "<tr>";
        foreach ($user as  $key=>$val) {
            if($key<2 or $key==9) continue;
            echo "<td>$val</td>";
        }
        echo "<td> <img src='$user[9]' height='50' > </td>";
        echo "<td> <a href='editUser.php?userName={$user[0]}' class='btn btn-warning'>Edit</a></td>";
        echo "<td> <a href='deleteUser.php?userName={$user[0]}' class='btn btn-danger'>Delete</a></td>";
        echo "</tr>";
    }
     
    echo"</table>";
?>