<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';

echo "<div class='container fs-4'  >";
echo "<h1>Edit user </h1>";

$userid = $_GET["userid"];
$firstName = $_POST["firstname"];
$lastName = $_POST["lastname"];
$password = $_POST["password"];
$gender = $_POST["gender"];
//var_dump($gender);

$users = file('customer.txt');

foreach ($users as $index => $user) {
    $users_data = explode(':', $user);
    if ($users_data[0] == $userid) {
        $users_data[1] = $firstName;
        $users_data[2] = $lastName;
        $users_data[3] = $gender;
        $users_data[4] = $password;
        $users_data = implode(':', $users_data);
        //var_dump($users_data);
        $users[$index] = $users_data.PHP_EOL;
    }
}

//var_dump($users);

$fileobj = fopen("customer.txt", 'w');
foreach ($users as $user) {
    fwrite($fileobj, $user);
}
fclose($fileobj);

header("Location:usertable.php");


// $users = file('customer.txt');

// $fileobj = fopen("customer.txt", 'w');

// foreach ($users as $index => $user) {

//     $user_data = explode(':', $user);
//     if ($user_data[0] == $userid) {
//         $user_data = "{$userid}:{$firstName}:{$lastName}:{$gender}:{$password}".PHP_EOL;
//         fwrite($fileobj, $user_data);
//     }
//     else{
//         fwrite($fileobj, $user);
//     }
// }
// fclose($fileobj);