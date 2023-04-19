<?php
$firstName=$_POST["firstname"];
$lastName=$_POST["lastname"];
$addres=$_POST["Address"];
$gender=$_POST["gender"];
$country=$_POST["country"];
$department=$_POST["department"];
$skill=$_POST["skills"];
$password =$_POST["password"];
$count = count($skill);


if ($gender=="male")
{
    echo "Thanks Mr ". $firstName ." ". $lastName;
    echo "<br>";
}
else{
    echo "Thanks Miss ". $firstName ." ". $lastName;
    echo "<br>";
}
echo "Please Review Your Information ";
echo "<br>";
echo "Name: $firstName $lastName  " ;
echo "<br>";
echo "Address: $addres";
echo "<br>";
echo "Your Skills : ";
for($i=0 ; $i < $count; $i++) { 
    echo " $skill[$i] <br>   ";
}
echo "Department: $department";



