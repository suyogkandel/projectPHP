<?php
//create connection
$con = mysqli_connect("localhost","root","","projectphp");
// $qry = "CREATE TABLE students(
//     id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
//     name VARCHAR(20),
//     phone VARCHAR(20),
//     address VARCHAR(50)
// )";

$qry ="CREATE TABLE subjects(
    id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
    subject VARCHAR(40),
    fullmark INT,
    passmark INT
)";

if(mysqli_query($con, $qry)){
    echo "Table Created Successfully";
}
else{
    echo "Error : " . mysqli_error($con);
}

mysqli_close($con);
?>