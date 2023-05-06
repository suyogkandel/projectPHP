<?php
$con = mysqli_connect("localhost","root","","projectphp");

if($con == false){
    die ("Error : " . mysqli_connect_error());
}

$qry = "UPDATE students SET name='Shyam',phone='1234567890' WHERE id=2";

if(mysqli_query($con, $qry)){
    echo "Data updated successfully";
}
else{
    echo "Error on Action : " . mysqli_error($con);
}

mysqli_close($con);
?>