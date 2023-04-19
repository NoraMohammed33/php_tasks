<?php
class Database{
    const DB_HOST = "localhost";
    const DB_USER = "root";
    const DB_PASSWORD = "";
    const DB_DATABASE = "noor";
    static function connect()
    {
        try {
            $dsn = 'mysql:dbname=noor;host=127.0.0.1;port=3306;';
            $db = new PDO($dsn,self::DB_USER, self::DB_PASSWORD);
            echo"gehad";
            return $db;
            } 
        catch (Exception $e) {
            echo $e->getMessage();
            }
    }
    static function insert($table_name, $name, $email, $password, $image)
    {
        $db = self::connect();
        if ($db) {
            $queryInsert = "Insert into `noor`.`$table_name`(name,email,password,image)values(?,?,?,?);";
            $insert_stmt = $db->prepare($queryInsert);
            $insert_stmt->execute(["$name", "$email", "$password", "$image"]);
            $res = $insert_stmt->rowCount();
            $id = $db->lastInsertId();
        }
    }

    static function edit($table_name, $id, $name, $email, $password)
    {
        $db = self::connect();
        if ($db) {
            $select_query = "update `noor`.`$table_name`  set `name`=:name, `email`=:email ,`password`=:password  where id=:id";
            $stmt = $db->prepare($select_query);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $res = $stmt->execute();
            if ($stmt->rowCount()) {
                header("Location:usertable.php");
            }
        }
    }
    static function select ($table_name){
        try {
            $db = self::connect();
            if ($db) {
                $query = "select * from `$table_name`";
                $select_stmt = $db->prepare($query);
                $res = $select_stmt->execute();
                $data = $select_stmt->fetchAll(PDO::FETCH_ASSOC);
                echo "<table class='table'> 
                    <tr>
                            <th>ID</th>  
                            <th>Name</th>  
                            <th>Email</th>
                            <th>Password</th>
                            <th>image path</th>
                            <th>Edit</th>
                            <th>Delete</th>
                    </tr>";
                foreach ($data as $row) {
                    echo "<tr>";
                    foreach ($row as $element) {
                        echo "<td>{$element} </td>";
                    }
                    echo " <td> <a href='editform.php?id={$row['id']}' class='btn btn-warning'> Edit </a> </td>";
                    echo " <td> <a href='deleteuser.php?id={$row['id']}' class='btn btn-danger'> Delete </a> </td>";
                    echo "</tr>";
                }
                echo "</table>";
                }
            }
        catch (Exception $e) {
                echo $e->getMessage();
            }
    }
    static function delete($table_name, $id)
    {
        try {
            $db = self::connect();
            if ($db) {
                $query = "delete from `noor`.`users` where id=$id";
                $select_stmt = $db->prepare($query);
                $res = $select_stmt->execute();
                if ($select_stmt->rowCount()) {
                    header("Location:usertable.php");
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}