<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';

echo "<div class='container fs-4'  >";
echo "<h1>Edit user </h1>";

$userid = $_GET["userid"];
$user_name = $_POST["name"];
$user_email = $_POST["email"];
$user_password = $_POST["password"];
$user_image = $_POST['image'];
$user_room = $_POST["room"];

include 'connect.php';
try {
    $db = connect_to_db();
    if ($db) {
        $select_query = "update `noor`.`users`  set `name`=:name, `email`=:email ,`password`=:password,`image`=:image  where id=:id";
        $stmt = $db->prepare($select_query);
        $stmt->bindParam(':name', $user_name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $user_email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $user_password, PDO::PARAM_STR);
        $stmt->bindParam(':image', $user_image, PDO::PARAM_STR);
        $stmt->bindParam(':id', $userid, PDO::PARAM_INT);
        $res = $stmt->execute();

        if ($stmt->rowCount()) {
            echo "<h1>data <span class='fs-3 bg-success text-warning'>edited</span> successfully</h1>";
            header("Location:usertable.php");
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}