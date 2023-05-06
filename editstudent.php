<?php
$id=$_GET['userid'];
include 'dbopen.php';

$qry= "SELECT * FROM students WHERE id=$id";
if($result = mysqli_query($con, $qry))
{
    $row=mysqli_fetch_assoc($result);
}

include 'dbclose.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT STUDENT</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <h2 class="text-center text-2xl font-bold my-3">Edit Student Details</h1>
    <form action="" method="POST" class="w-6/12 mx-auto text-center">
        <input type ="hidden" name="userid" value="<?php echo $row['id'];?>">
        <input type="text" placeholder="Full Name" name="name" class="bg-gray-200 w-full rounded-lg p-1 m-2 focus:outline-none" value="<?php echo $row ['name']; ?>">
        <input type="text" placeholder="Phone Number" name="phone" class="bg-gray-200 w-full rounded-lg p-1 m-2 focus:outline-none" value="<?php echo $row ['phone']; ?>">
        <input type="text" placeholder="Address" name="address" class="bg-gray-200 w-full rounded-lg p-1 m-2 focus:outline-none" value="<?php echo $row ['address']; ?>">

        <input type="submit" name="update" value="Update" placeholder="Full Name" class="bg-blue-600 hover:bg-blue-700 cursor-pointer text-white w-1/2 rounded-lg p-1 m-2">
        <a href="students.php" class="bg-red-600 hover:bg-red-700 inline-block cursor-pointer text-white w-1/2 rounded-lg p-1 m-2">Exit</a>
    </form>
</body>
</html>

<?php
if(isset($_POST['update']))
{
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $add=$_POST['address'];
    $id=$_POST['userid'];

    include 'dbopen.php';
    $qry="UPDATE students SET name='$name',phone='$phone', address='$address' WHERE id=$id";

    if(mysqli_query($con, $qry)){
        echo '<script>alert("Data updated successfully"); window.location.href="students.php";</script>';
    }
    else{
        echo 'Error';
    }

    include 'dbclose.php';
}
?>