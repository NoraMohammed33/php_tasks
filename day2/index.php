<?php

if (isset($_GET['errors'])) {
    $errors = json_decode($_GET["errors"], true);
}
if (isset($_GET["dataBefore"])) {
    $data_before = json_decode($_GET["dataBefore"], true);
    //echo $data_before['gender'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="container m-4 " style="width: 400px">
        <form action=" valdiation.php" method="post">
            <div class="mb-3">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" name="firstname" class="form-control" id="firstname" name='firstname' value="<?php if (isset($data_before['firstname']))
                    echo $data_before['firstname']; ?>">
                <span class="text-danger">
                    <?php if (isset($errors['firstname']))
                        echo $errors['firstname']; ?>
                </span>
            </div>
            <div class="mb-3">
                <label for="Address" class="form-label">Last Name</label>
                <input type="text" name="lastname" class="form-control" id="lastname" name='lastname' value="<?php if (isset($data_before['lastname']))
                    echo $data_before['lastname']; ?>">
                <span class="text-danger">
                    <?php if (isset($errors['lastname']))
                        echo $errors['lastname']; ?>
                </span>
            </div>
            <div class="justify-content-between mb-2 mt-2">
                <label for="gender">Gender:</label>
                <input type="radio" name="gender" value="male" <?php if (isset($data_before['gender']) && $data_before['gender'] == "male")
                    echo "checked";?>>Male
                <input type="radio" name="gender" value="female" <?php if (isset($data_before['gender']) && $data_before['gender'] == "female")
                    echo "checked";?>> Female
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">password</label>
                <input type="password" name="password" class="form-control" id="password" value="<?php if (isset($data_before['password']))
                    echo $data_before['password']; ?>" name='password'>
                <span class="text-danger">
                    <?php if (isset($errors['password']))
                        echo $errors['password']; ?>
                </span>
            </div>
            <div class="mb-3 ">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                <button type="reset" name="rest" class="btn btn-primary ">Rest</button>
            </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>