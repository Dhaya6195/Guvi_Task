<?php
session_start();
$error=''; 

if (isset($_POST['login'])) {
if (empty($_POST['uname']) || empty($_POST['psw'])) {
$error = "Username or Password is invalid";
}
else
{
	include 'dbconfig.php';
	$username=$_POST['uname'];
	$password=$_POST['psw'];
	$query = mysqli_query($conn,"select * from users where password='$password' AND username='$username'");
	$rows = mysqli_fetch_assoc($query);
	$num=mysqli_num_rows($query);
	
    if ($num == 1) {
        $_SESSION['username']=$rows['username'];
        $_SESSION['user']=$rows['name'];
        echo "<script>window.location.href='http://localhost/dhaya/profile.html';</script>";
    } 
    else 
    {
        $error = "Username or Password is invalid";
        echo "<script>alert('$error')</script>";
    }
	mysqli_close($conn); 
}
}
?>