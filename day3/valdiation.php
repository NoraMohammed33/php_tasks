<?php
//var_dump($_POST);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';

echo "<h1>Save user  </h1>";

$user_name=$_POST["name"];
$user_email=$_POST["email"];
$user_password =$_POST["password"];
$user_room = $_POST["room"];
$errors = [];
$formdata = [];
$pattern="/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";

if(empty($user_name) and !isset($user_name)){
    $errors['name']= 'Name is required';
}
else {
    $formdata["name"] = $user_name;
}
if(empty($user_email) and !isset($user_email)){
    $errors['email'] = 'email is required';
}
elseif(!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
        $errors['email']="invalid email ";
    } 
elseif(!preg_match($pattern,$user_email))
        {
            $errors['email']="invalid email ";
        }
else {
    $formdata["email"] = $user_email;
}
if(empty($user_password) and !isset($user_password)){
    $errors['password'] = 'password is required';
} else {
    $formdata["password"] = $user_password;
}


if($errors){
    $string_error = json_encode($errors);
    $url = "Location:register.php?errors={$string_error}";
    
    if($formdata){
        $data_before = json_encode($formdata);
        $url .= "&dataBefore={$data_before}";
    }
    header($url);
}
else{
    try
    {
        $filedata = fopen('users.txt','a');
        $id = time();
        $image_new_name = '';
        if (isset($_FILES['image']) and !empty($_FILES['image']['name'])) 
        {
            $imagename = $_FILES["image"]['name'];
            //var_dump($imagename);
            $tmp_name = $_FILES['image']['tmp_name'];
            $extension = pathinfo($imagename)['extension'];
            $image_new_name = "images/{$id}.{$extension}";
            if (in_array($extension, ['png','PNG','jpg'])) {
                try {
                    $uploaded = move_uploaded_file($tmp_name, $image_new_name);
                    var_dump($uploaded);
                }catch(Exception $e){
                    echo $e->getMessage();
                }
            }
        }
        $user_data = "{$id}:{$user_name}:{$user_email}:{$user_password}:{$user_room}:{$image_new_name}" . PHP_EOL;
        fwrite($filedata, $user_data);
        fclose($filedata);
        header('Location: login_form.php');
    }
    catch(Exception $e )
    {
        echo $e->getMessage();
    }
}