<?php
$userName = $_REQUEST['userName'];
$gender = $_REQUEST['gender'];
$firstName = $_REQUEST['firstName'];
$lastName = $_REQUEST['lastName'];
$address = $_REQUEST['address'];
$country = $_REQUEST['country'];
$allSkills = $_REQUEST['allSkills'];

// Read the contents of the usersData.txt file
$users = file("usersData.txt");

// Open the usersData.txt file in write mode
$file = fopen("usersData.txt", "w");

foreach($users as $user) {
    $userData = explode(':', $user);

    if($userData[0] === $userName) {
        $userData[1] = $gender;
        $userData[2] = $firstName;
        $userData[3] = $lastName;
        $userData[4] = $address;
        $userData[5] = $country;
        $userData[6] = $allSkills;

        $updatedUser = implode(':', $userData);

        fwrite($file, $updatedUser . "\n");
    } else {
        fwrite($file, $user);
    }
}

fclose($file);

header("Location: users.php");
exit;


?>