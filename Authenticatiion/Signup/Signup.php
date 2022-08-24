<?php
$server_name="localhost";
$fullname="root";
$password="";
$database_name="shop_house";


$conn=mysqli_connect($server_name,$fullname,$password,$database_name);
//now check the connection
if(!$conn)
{
die("Connection Failed:" . mysqli_connect_error());

}

if(isset($_POST['save']))
{
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = $_POST['password'];
$phonenumber= $_POST['phonenumber'];
$storename= $_POST['storename'];
$gender= $_POST['gender'];

$sql_query = "INSERT INTO usersignup(fullname,email,password,phonenumber,storename,gender)
VALUES ('$fullname','$email','$password','$phonenumber','$storename','$gender')";

if (mysqli_query($conn, $sql_query))
{
     header("Location: ./login/index.php");
     echo "saved";
     exit();
}
else
     {
echo "Error: " . $sql . "" . mysqli_error($conn);
}
mysqli_close($conn);
}
?>
