<?php

$id = $_GET["id"];
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
        <form action="edituser.php?userid= <?php echo $id?>" method="post">
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
                <label for="password" class="form-label">password</label>
                <input type="password" name="password" class="form-control" id="password" value="<?php if (isset($data_before['password']))
                    echo $data_before['password']; ?>" name='password'>
                <span class="text-danger">
                    <?php if (isset($errors['password']))
                        echo $errors['password']; ?>
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