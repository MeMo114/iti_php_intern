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
        <h2>Registration Form</h2><br>
        <form action="done.php" method="post">
            <div class="form-group">
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" placeholder="Enter firstName" name="firstName" class="form-control">
            <span > <?php if(isset($errors['firstName'])){echo $errors['firstName'];} ?> </span>
            <br><br>
            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" placeholder="Enter lastName" name="lastName" class="form-control">
            <span > <?php if(isset($errors['lastName'])){echo $errors['lastName'];} ?> </span>
            <br><br>

            <label for="email">Email:</label>
            <input type="text" id="email" placeholder="Enter email" name="email" class="form-control">
            <span > <?php if(isset($errors['email'])){echo $errors['email'];} ?> </span>
            <br><br>

            <label for="address">Address:</label>
            <textarea id="address" placeholder="Enter Address" name="address" rows="4" cols="40" class="form-control"></textarea>
            <span > <?php if(isset($errors['address'])){echo $errors['address'];} ?> </span>

            <br><br>
            </div>

            <label for="country">Country:</label>
            <select id="country" name="country" class="form-control">
            <option value="" disabled selected >country</option>
            <option value="USA">United States</option>
            <option value="CAN">Canada</option>
            <option value="MEX">Mexico</option>
            <option value="GBR">United Kingdom</option>
            <option value="FRA">France</option>
            <option value="GER">Germany</option>
            </select> 
            <span > <?php if(isset($errors['country'])){echo $errors['country'];} ?> </span>

            <br><br>

            <label>Gender:</label>
            <label for="male" class="radio-inline"><input type="radio" id="male" name="gender" value="Mr"> Male</label>
            <label for="female" class="radio-inline"><input type="radio" id="female" name="gender" value="Miss"> Female</label><br>
            <span > <?php if(isset($errors['gender'])){echo $errors['gender'];} ?> </span>

            <br><br>
            
            <label>Skills:</label>
            <div class="checkbox">               
                <label for="html"> <input type="checkbox" id="html" name="skills[]" value="HTML"> HTML</label>            
                <label for="css"><input type="checkbox" id="css" name="skills[]" value="CSS"> CSS</label><br>            
                <label for="javascript"><input type="checkbox" id="javascript" name="skills[]" value="JavaScript"> JavaScript</label>
                <label for="python"><input type="checkbox" id="python" name="skills[]" value="Python"> Python</label><br>
                <span > <?php if(isset($errors['skills'])){echo $errors['skills'];} ?> </span>
                <br><br>
            </div>

            <div class="form-group">
                <label for="userName">UserName:</label>
                <input type="text" id="userName" placeholder="Enter userName" name="userName"class="form-control">
                <span > <?php if(isset($errors['userName'])){echo $errors['userName'];} ?> </span>
                <br><br>
                <label for="password">Password:</label>
                <input type="password" id="password" placeholder="Enter password" name="password" class="form-control">
                <span > <?php if(isset($errors['password'])){echo $errors['password'];} ?> </span>

                <br><br>
            </div>


            <label for="department" >Department:</label>
            <input type="text" id="department" name="department" value="Open Source" readonly style="opacity: 0.5;" class="form-control"><br><br>
            
            <label for="checkedSentence">Re-Enter this sentence:</label>
            <label for="checkedSentence" > <h3 name="sentence" style="font-family: Arial, sans-serif;">ITI_PHP_intern</h3> </label>
            <input type="text" id="checkedSentence" placeholder="Enter checkedSentence" name="checkedSentence" class="form-control">
            <span > <?php if(isset($errors['checkedSentence'])){echo $errors['checkedSentence'];} ?> </span>


            <br><br>
            <button type="submit" class="btn btn-default">Submit</button>
            <input type="reset" class="btn btn-default" value="Reset">
            
        </form>
    </div>
</body>
</html>

