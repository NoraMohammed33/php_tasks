<?php
//var_dump($_POST);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';

echo "<h1>Save user  </h1>";

$firstName=$_POST["firstname"];
$lastName=$_POST["lastname"];
$password =$_POST["password"];
$gender =$_POST["gender"];

$errors = [];
$formdata = [];

if(empty($firstName) and isset($firstName)){
    $errors['firstname']= 'firstName is required';
}else {
    $formdata["firstname"] = $firstName;
}
if(empty($lastName) and isset($lastName)){
    $errors['lastname'] = 'lastName is required';
} else {
    $formdata["lastname"] = $lastName;
}
if(empty($password) and isset($password)){
    $errors['password'] = 'password is required';
} else {
    $formdata["password"] = $password;
}
if(empty($gender) and isset($gender)){
    $errors['gender'] = 'gender is required';
} else {
    $formdata["gender"] = $gender;
}

if($errors){
    $string_error = json_encode($errors);
    $url = "Location:index.php?errors={$string_error}";
    
    if($formdata){
        $data_before = json_encode($formdata);
        $url .= "&dataBefore={$data_before}";
    }
    header($url);
}
else{
    try
    {
        $filedata = fopen('customer.txt','a');
        $id = time();
        $user_data = "{$id}:{$firstName}:{$lastName}:{$gender}:{$password}".PHP_EOL;
        fwrite($filedata,$user_data);
        fclose($filedata);
        header('Location: usertable.php');
    }
    catch(Exception $e )
    {
        echo $e->getMessage();
    }
}