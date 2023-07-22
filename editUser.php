<?php
$userName = $_GET["userName"];
//var_dump($userName);

$users=file('usersData.txt');
foreach ($users as $key => $user) {
    $userData = explode(':',$user);
    if( $userName == $userData[0]){
        //unset($users[$key]);
        $gender = $userData[1];
        $firstName = $userData[2];
        $lastName = $userData[3];
        $address = $userData[4];
        $country = $userData[5];
        $allSkills = $userData[6];

        echo "
            <form method='post' action='saveUser.php'>
                <input type='hidden' name='userName' value='$userName'>
                <div class='form-group'>
                    <label for='gender'>Gender:</label>
                    <input type='text' class='form-control' id='gender' name='gender' value='$gender'>
                </div>
                <div class='form-group'>
                    <label for='firstName'>First Name:</label>
                    <input type='text' class='form-control' id='firstName' name='firstName' value='$firstName'>
                </div>
                <div class='form-group'>
                    <label for='lastName'>Last Name:</label>
                    <input type='text' class='form-control' id='lastName' name='lastName' value='$lastName'>
                </div>
                <div class='form-group'>
                    <label for='address'>Address:</label>
                    <input type='text' class='form-control' id='address' name='address' value='$address'>
                </div>
                <div class='form-group'>
                    <label for='country'>Country:</label>
                    <input type='text' class='form-control' id='country' name='country' value='$country'>
                </div>
                <div class='form-group'>
                    <label for='allSkills'>Skills:</label>
                    <input type='text' class='form-control' id='allSkills' name='allSkills' value='$allSkills'>
                </div>
                <button type='submit' class='btn btn-primary'>Save</button>
            </form>
            ";

            break;
    }
}

?>