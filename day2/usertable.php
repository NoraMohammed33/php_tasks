<?php
echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';
echo '<link rel="stylesheet" type="text/css" href="table.css">';

echo "<div class='container  fs-2'  >";
echo "<h1> Welcome to All Users page  </h1>";
try {
    $filedata = file('customer.txt');
    echo "
        <table class='table table-striped table-bordered table-hover'>
        <tr class='table-secondary'>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Gender</th>
        <th>Password</th>
        <th>Edit</th>
        <th>Delete</th>
        </tr>";
    foreach ($filedata as $data) 
    {
        echo "<tr>";
        $user_data = explode(':', $data);
        foreach ($user_data as $user_info) {
            echo "<td> {$user_info} </td>";
        }
        echo " <td> <a class='btn btn-warning' href='editform.php?id={$user_data[0]}'> Edit</a></td>
                <td> <a class='btn btn-danger' href='deleteuser.php?id={$user_data[0]}'> Delete</a></td>
                </tr>";
    }
    echo '</table>';
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
<a href="index.php" class="btn btn-primary">Add New User</a>