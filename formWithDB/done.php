<?php
//include('connection.php');
include('DB.php');

$errors = array();

if(!isset($_REQUEST["name"]) or empty($_REQUEST["name"])){
    $errors['name'] = " name is required.";
}

if(!isset($_REQUEST["email"]) or empty($_REQUEST["email"])){
    $errors['email'] = " email is required. ";
}
else{
    if (!filter_var($_REQUEST["email"], FILTER_VALIDATE_EMAIL)) {$errors['email']= "Invalid email address";}
   // if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $_REQUEST["email"])) {$errors['email']= "Invalid email address";}
}

if(!isset($_REQUEST["password"]) or empty($_REQUEST["password"])){
    $errors['password'] = " password is required. ";
   
}
else {
    if (!strlen($_REQUEST["password"]) == 8 or  !preg_match('/^[a-z0-9_]+$/',$_REQUEST["password"])){$errors['password'] = "invalid password"; }
}
if(!isset($_REQUEST["confirmPassword"]) or empty($_REQUEST["confirmPassword"])){
    $errors['confirmPassword'] = " confirmPassword is required. ";
}
else{
    if($_REQUEST["confirmPassword"]!= $_REQUEST["password"] ){ $errors['confirmPassword'] = " confirmPassword should match password. ";}
}

if(!isset($_REQUEST["roomNo"]) or empty($_REQUEST["roomNo"])){
    $errors['roomNo'] = " roomNo is required. ";
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
        //var_dump($formErrors);
        header("Location:index.php?errors=$formErrors");

        exit();
}
    
else{
    $users= array(
        'name' => $_REQUEST["name"],
        'email' => $_REQUEST["email"],
        'password' => $_REQUEST["password"],
        'roomNo' => $_REQUEST["roomNo"],
        'Ext' => $_REQUEST["ext"]
    );
    //var_dump($users);
    //$img = $imgNewName; 


    
    // $sql ="insert into users(name,email,password,roomNo,Ext) values( :name, :email, :password, :roomNo, :Ext);";
    // $stmt = $db->prepare($sql);

    // $stmt-> bindParam(':name',$name);
    // $stmt-> bindParam(':email',$email);
    // $stmt-> bindParam(':password',$password);
    // $stmt-> bindParam(':roomNo',$roomNo);
    // $stmt-> bindParam(':Ext',$Ext);
    
    // $stmt->execute();

    $db = new DB();
    $dbConn = $db->connect('root', '2002');
    $db->insert($dbConn,'users',$users);
       
    header("Location:users.php");
    exit; 
           
}
 

$db=null;
?> 