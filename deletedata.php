<?php
$con = mysqli_connect("localhost","root","","projectphp");

if($con == false){
    die ("Error : " . mysqli_connect_error());
}

$qry = "DELETE FROM students WHERE id=1";

if(mysqli_query($con, $qry)){
    echo "Data deleted successfully";
}
else{
    echo "Error on Action : " . mysqli_error($con);
}

mysqli_close($con);
?>