<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';

echo "<div class='container fs-4'  >";
echo "<h1>Delete user </h1>";

$user_id = $_GET["id"];

include 'connect.php';
try {
    $db = connect_to_db();
    if ($db) {
        $query = "delete from `noor`.`users` where id=$user_id";
        $select_stmt = $db->prepare($query);
        $res = $select_stmt->execute();

        if ($select_stmt->rowCount()) {
            header("Location:usertable.php");
           // echo "<h1>deleted successfully</h1>";
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}