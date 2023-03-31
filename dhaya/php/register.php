<?php
	include 'dbconfig.php';

function newUser($conn)
{    
		$name=$_POST['fname'];
		$gender=$_POST['gender'];
		$dob=$_POST['dob'];
		$contact=$_POST['contact'];
		$email=$_POST['email'];
		$username=$_POST['username'];
		$password=$_POST['pwd'];
		$prepeat=$_POST['pwdr'];
		$sql = "INSERT INTO users (name,gender,dob,contact,email,username,password) VALUES ('$name','$gender','$dob','$contact','$email','$username','$password') ";
	if (mysqli_query($conn, $sql)) 
	{
		echo "<h2>Record created successfully!! Redirecting to login page....</h2>";
             echo "
    <script>
    window.location.href='http://localhost/dhaya/signin.html';</script>";
	} 
	else
	{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
function checkusername()
{
	include 'dbconfig.php';
	$usn=$_POST['username'];
	$sql= "SELECT * FROM users WHERE Username = '$usn'";

	$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)!=0)
		{
			echo "<script>alert('Username already exists!!')</script>";
			echo "
			<script>
			window.location.href='http://localhost/dhaya/register.html';</script>";

		}
		else if($_POST['pwd']!=$_POST['pwdr'])
		{

			echo"Passwords don't match";
		}
		else if(isset($_POST['signup']))
		{ 
			newUser($conn);
		}

}
if(isset($_POST['signup']))
{	
	if(!empty($_POST['username']) && !empty($_POST['pwd']) &&!empty($_POST['fname']) &&!empty($_POST['dob'])&& !empty($_POST['gender']) &&!empty($_POST['email']) && !empty($_POST['contact']))
			checkusername();
}
?>
