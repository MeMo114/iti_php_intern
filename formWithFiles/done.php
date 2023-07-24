<?php

$errors = array();

if(!isset($_REQUEST["firstName"]) or empty($_REQUEST["firstName"])){
    $errors['firstName'] = " first name is required.";
}
if(!isset($_REQUEST["lastName"]) or empty($_REQUEST["lastName"])){
    $errors['lastName'] = " last name is required. ";
}
if(!isset($_REQUEST["email"]) or empty($_REQUEST["email"])){
    $errors['email'] = " email is required. ";
}
else{
    if (!filter_var($_REQUEST["email"], FILTER_VALIDATE_EMAIL)) {$errors['email']= "Invalid email address";}
   // if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $_REQUEST["email"])) {$errors['email']= "Invalid email address";}
}
if(!isset($_REQUEST["address"]) or empty($_REQUEST["address"])){
    $errors['address'] = " address is required."; 
}
if(!isset($_REQUEST["gender"]) or empty($_REQUEST["gender"])){
    $errors['gender'] = " gender is required.";

 }if(!isset($_REQUEST["skills"]) or empty($_REQUEST["skills"])){
    $errors['skills'] = " at least one skill is required. ";

}
if(!isset($_REQUEST["country"]) or empty($_REQUEST["country"])){
    $errors['country'] = " country is required. ";

}
if(!isset($_REQUEST["userName"]) or empty($_REQUEST["userName"])){
    $errors['userName'] = " userName is required. ";
}
if(!isset($_REQUEST["password"]) or empty($_REQUEST["password"])){
    $errors['password'] = " password is required. ";
}
else {
    if (!strlen($_REQUEST["password"]) == 8 or  !preg_match('/^[a-z0-9_]+$/',$_REQUEST["password"])){$errors['password'] = "invalid password";}
}
if(!isset($_REQUEST["checkedSentence"]) or empty($_REQUEST["checkedSentence"])){
    $errors['checkedSentence'] = " checkedSentence is required. ";
}

// image
if(!isset($_FILES['image']) or empty($_FILES['image']['name'])){
    $errors['image'] = " image is required. ";

}else{
    $imgName= $_FILES['image']['name'];
    $imgTmpName= $_FILES['image']['tmp_name'];

    $ext = pathinfo($imgName)['extension'];

    $imgNewName = "images/".time().".".$ext;

    if(in_array($ext, array('jpg','mpeg','png','jpeg'))){
        move_uploaded_file($imgTmpName,$imgNewName);
    }else{
        $errors['image'] = " invalid extension for image . ";
    }
}

if(count($errors) > 0){
        $formErrors=json_encode($errors);
        var_dump($formErrors);
        header("Location:addUser.php?errors=$formErrors");

        exit();
}
    
    else{
    $expected_text = "ITI_PHP_intern";
    //$expected_text= $_REQUEST["sentence"];
    $input_text = $_REQUEST["checkedSentence"];
    $gender = $_REQUEST["gender"];
    $firstName = $_REQUEST["firstName"];
    $lastName = $_REQUEST["lastName"];
    $email = $_REQUEST["email"];
    $address = $_REQUEST["address"];
    $skills = $_REQUEST["skills"];
    $depart = $_REQUEST["department"];
    $country = $_REQUEST["country"];
    $userName = $_REQUEST["userName"]; 
    $password = $_REQUEST["password"];
    $img = $imgNewName; 
    
    if ($input_text === $expected_text) {
        $allSkills=implode(',',$skills);
        $data = "$userName:$password:$gender:$firstName:$lastName:$email:$address:$country:$allSkills:$img\n";
        $file = "usersData.txt";
        $handle = fopen($file, "a");
        fwrite($handle, $data);
        fclose($handle);
       
        header("Location:users.php");
        exit; 
        
    } else {
        header("Location:addUser.php");
        exit; 
        
    }
    
}
 


?> 