<?php

$expected_text = "ITI_PHP_intern";
//$expected_text= $_REQUEST["sentence"];
$input_text = $_REQUEST["checkedSentence"];
$gender = $_REQUEST["gender"];
$firstName = $_REQUEST["firstName"];
$lastName = $_REQUEST["lastName"];
$address = $_REQUEST["address"];
$skills = $_REQUEST["skills"];
$depart = $_REQUEST["department"];
if ($input_text === $expected_text) {
    echo "welcome $gender : $firstName $lastName <br><br>  Please review your information <br><br>";
    echo "Name: $firstName $lastName <br>";
    echo "Address: $address <br>";
    echo "<br>Your Skills: <ul>";
    foreach ($skills as $key => $value) {
        echo "<li>$value</li>";
    }
    echo "</ul><br>";
    echo "Department: $depart";

    
} else {
    header("Location: http://localhost/php/");
    exit; 
    //echo "Incorrect!";
  }


?>