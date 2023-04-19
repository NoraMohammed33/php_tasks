<?php
//var_dump($_POST);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';

echo "<h1>Save user  </h1>";

$user_email = $_POST["email"];
$user_password = $_POST["password"];
$errors = [];
$formdata = [];
$logged_in = false;

if ($errors) {
    $string_error = json_encode($errors);
    $url = "Location:login_form.php?errors={$string_error}";

    if ($formdata) {
        $data_before = json_encode($formdata);
        $url .= "&dataBefore={$data_before}";
    }
    header($url);
} else {
    try {
        $users = file('users.txt');
        foreach ($users as $index => $user) {
            $users_data = explode(':', $user);
            if ($users_data[2] == $user_email) {
                if ($users_data[3] == $user_password) {
                    $logged_in = true;
                }
            }
        }
        if ($logged_in) {
            session_start();
            $_SESSION['email'] = $user_email;
            $_SESSION['login'] = true;
            header("Location:user_home.php");
        } else {
            $errors['password'] = 'invalid password or email';
            $string_error = json_encode($errors);
            header("Location:login_form.php?errors={$string_error}");
            }
        }
    catch (Exception $e) {
        echo $e->getMessage();
    }
}