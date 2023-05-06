<?php
include('dbopen.php');

$qry = "SELECT * FROM students";

if(!$result = mysqli_query($con, $qry)){
    echo "Error on Action" . mysqli_error($con);
}
include('dbclose.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

    <div class="fixed hidden top-0 bottom-0 left-0 right-0 bg-blue-500 bg-opacity-50 brakdrop-blur-sm" id="addstudent">
        <div class="w-5/12 bg-white text-gray-500 mx-auto mt-20 pb-4 rounded shawdow-md relative">
            <h2 class="text-black text-center font-bold text-2xl py-4">Add Student</h2>

            <span onclick="hideModal()" class="text-black cursor-pointer absolute top-2 right-2 bg-gray-200 py-1 px-2 rounded-lg">X</span>

            <form action="" method="POST" class="w-10/12 mx-auto text-center">
                <input type="text" placeholder="Full Name" name="name" class="bg-gray-200 w-full rounded-lg p-1 m-2 focus:outline-none">
                <input type="text" placeholder="Phone Number" name="phone" class="bg-gray-200 w-full rounded-lg p-1 m-2 focus:outline-none">
                <input type="text" placeholder="Address" name="address" class="bg-gray-200 w-full rounded-lg p-1 m-2 focus:outline-none">

                <input type ="submit" name="submit" class="bg-blue-600 hover:bg-blue-700 cursor-pointer text-white w-1/2 rounded-lg p-1 m-2">
            </form>
        </div>
    </div>
    <h1 class="text-center font-bold text-4xl mt-10">Our Students</h1>
    <p class="text-center text-gray-500 mb-10">See the list of our students</p>

    <div class="text-right mx-32">
        <a onclick="showModal()" class="bg-blue-500 p-2 rounded text-white hover:bg-blue-600 cursor-pointer">Add Student</a>
    </div>
    <div class="grid grid-cols-4 gap-4 mt-5 px-20">

    <?php
    while($row =mysqli_fetch_assoc($result)){
    ?>

        <div class="bg-green-200 rounded-lg shadow-sm hover:shadow-md cursor-pointer p-3">
            <p>ID: <?php echo $row['id'];?></p>
            <p>Name: <?php echo $row ['name'];?></p>
            <p>Phone: <?php echo $row ['phone'];?></p>
            <p>Address: <?php echo $row ['address'];?></p>
            <a class="bg-blue-600 text-white px-1 rounded" href="editstudent.php?userid=<?php echo $row['id']; ?>">Edit</a>
            <a onclick="return confirm('Are you sure to delete?');" class="bg-red-600 text-white px-1 rounded" href="students.php?userid=<?php echo $row['id']; ?>">Delete</a>
        </div>
        <?php
        }
        ?>
    </div>

    <script>
        function showModal(){
            document.getElementById('addstudent').classList.remove('hidden');
            //document.getElementById('addstudent').style.display="block";
        }

        function hideModal(){
            document.getElementById('addstudent').classList.add('hidden');
        }
    </script>
</body>
</html>

<?php
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $add=$_POST['address'];

    include 'dbopen.php';
    $qry="INSERT INTO students (name,phone,address) VALUES('$name','$phone','$add')";
    if(mysqli_query($con, $qry)){
        echo '<script>alert("Data inserted successfully"); window.location.href="students.php";</script>';
    }
    else{
        echo 'Error';
    }

    include 'dbclose.php';
}
?>

<?php
if(isset($_GET['userid']))
{
    $id=$_GET['userid'];
    include 'dbopen.php';
    $qry="DELETE FROM students WHERE id=$id";
    if(mysqli_query($con, $qry)){
        echo '<script>alert("Data deleted successfully"); window.location.href="students.php";</script>';
    }
    else{
        echo 'Error';
    }

    include 'dbclose.php';
}
?>