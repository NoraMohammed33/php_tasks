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
    <div class="container m-4 " style="width: 500px">
        <form method="POST" action=" valdiation.php" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label"> Name</label>
                <input type="text" name="name" class="form-control" id="name" value="<?php if (isset($data_before['name']))
                    echo $data_before['name']; ?>" name='name'>
                <span class="text-danger">
                    <?php if (isset($errors['name']))
                        echo $errors['name']; ?>
                </span>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" id="email" value="<?php if (isset($data_before['email']))
                    echo $data_before['email']; ?>" name='email'>
                <span class="text-danger">
                    <?php if (isset($errors['email']))
                        echo $errors['email']; ?>
                </span>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" value="<?php if (isset($data_before['password']))
                    echo $data_before['password']; ?>" name='password'>
                <span class="text-danger">
                    <?php if (isset($errors['password']))
                        echo $errors['password']; ?>
                </span>
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="confirm_password" name="confirm_password" class="form-control" id="confirm_password" value="<?php if (isset($data_before['confirm_password']))
                    echo $data_before['confirm_password']; ?>" name='confirm_password'>
                <span class="text-danger">
                    <?php if (isset($errors['confirm_password']))
                        echo $errors['confirm_password']; ?>
                </span>
            </div>
            <div class="d-flex justify-content-between mb-3">
                <label for="room">Room Number</label>
                <select name="room" id="room">
                    <option value="Application1">Application1</option>
                    <option value="Application2">Application2</option>
                    <option value="cloud">cloud</option>
                </select>
            </div>
            <div class="d-flex justify-content-between mb-3">
                <lable for="image" class=" form-lable">profile photo</lable>
                <input type="file" name="image" id=" image">
            </div>
            <div class=" mb-3">
                <input type="submit" value="Register" name="submit" class="btn btn-primary w-25" />
                <input type="rest" value="Rest" name="rest" class="btn btn-primary w-25" />

            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>