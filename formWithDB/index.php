<?php

    $errors= array();
    if(isset($_GET['errors'])){
        $errors = json_decode($_GET['errors'],true);
       //var_dump($errors);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>addUser</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="container">
        <h2>Add User</h2><br>
        <form action="done.php" method="post" enctype="multipart/form-data" >
            <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" placeholder="Enter name" name="name" class="form-control">
            <span > <?php if(isset($errors['name'])){echo $errors['name'];} ?> </span>
            <br><br>

            <label for="email">Email:</label>
            <input type="text" id="email" placeholder="Enter email" name="email" class="form-control">
            <span > <?php if(isset($errors['email'])){echo $errors['email'];} ?> </span>
            <br><br>

            </div>

            <div class="form-group">
               
                <label for="password">Password:</label>
                <input type="password" id="password" placeholder="Enter password" name="password" class="form-control">
                <span > <?php if(isset($errors['password'])){echo $errors['password'];} ?> </span>
                <br><br>

                <label for="confirmPassword">Confirm Password:</label>
                <input type="password" id="confirmPassword" placeholder="Enter confirmPassword" name="confirmPassword" class="form-control">
                <span > <?php if(isset($errors['confirmPassword'])){echo $errors['confirmPassword'];} ?> </span>
                <br><br>
            </div>

            <div class="form-group">
                <label for="roomNo">Room No:</label>
                <select id="roomNo" name="roomNo" class="form-control">
                <option value="" disabled selected >roomNo</option>
                <option value="Application1">Application1</option>
                <option value="Application2">Application2</option>
                <option value="Cloud">Cloud</option>
                </select> 
                <span > <?php if(isset($errors['roomNo'])){echo $errors['roomNo'];} ?> </span>
                <br><br>
             </div>
            
             <div class="form-group">
                <label for="ext">Ext.:</label>
                <input type="text" id="ext" placeholder="Enter ext" name="ext" class="form-control">
                <span > <?php if(isset($errors['ext'])){echo $errors['ext'];} ?> </span>
                <br><br>
             </div>

            <div class="form-group">
                <label for="image">Profile Picture:</label>
                <input type="file" class="form-control" name="image">
                <span > <?php if(isset($errors['image'])){echo $errors['image'];} ?> </span>
           
            </div>

            <br><br>
            <button type="submit" class="btn btn-default">Submit</button>
            <input type="reset" class="btn btn-default" value="Reset">
            
        </form>
    </div>
</body>
</html>

