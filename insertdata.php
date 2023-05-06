<?php
$con = mysqli_connect("localhost", "root", "","projectphp");
if($con == false){
    die ("Error on connection" . mysqli_connect_error());
}

$qry = "INSERT INTO students(name,phone,address) VALUES('RAM','9866465678','Chitwan')";

if(mysqli_query($con,$qry)){
    echo "Data inserted successfully";
}
else{
    echo "Error on Action" . mysqli_error($con);
}
mysqli_close($con);
?>