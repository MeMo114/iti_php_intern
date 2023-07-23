<?php

$errors = array();

if(!isset($_REQUEST["firstName"]) or empty($_REQUEST["firstName"])){
    $errors['firstName'] = " first name is required.";
}
if(!isset($_REQUEST["lastName"]) or empty($_REQUEST["lastName"])){
    $errors['lastName'] = " last name is required. ";
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
if(!isset($_REQUEST["checkedSentence"]) or empty($_REQUEST["checkedSentence"])){
    $errors['checkedSentence'] = " checkedSentence is required. ";
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
    $address = $_REQUEST["address"];
    $skills = $_REQUEST["skills"];
    $depart = $_REQUEST["department"];
    $country = $_REQUEST["country"];
    $userName = $_REQUEST["userName"]; 
    $password = $_REQUEST["password"]; 
    
    if ($input_text === $expected_text) {
        $allSkills=implode(',',$skills);
        $data = "$userName:$password:$gender:$firstName:$lastName:$address:$country:$allSkills\n";
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