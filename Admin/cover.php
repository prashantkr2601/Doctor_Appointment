<!DOCTYPE html>
<html>
<body style="background-image:url(p2.jpg)">
<link rel="stylesheet" href="main.css">
			<div class="header">
				<ul>
					<li style="float:left;border-right:none"><a href="cover.php" class="logo"><img src="cal.png" width="30px" height="30px"><strong> Skylabs </strong>Appointment Booking System</a></li>
					<li><a href="../locateus.php">Locate Us</a></li>
					<li><a href="../index.php">Home</a></li>
				</ul>
			</div>
			<div class="footer">
				<ul style="position:absolute;top:93%;background-color:black">
					<li><a href="alogin.php">Admin Login</a></li>
					<li><a href="mlogin.php">Manager Login</a></li>
				</ul>
			</div>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
window.onclick = function(event) {
    if (event.target == modal1) {
        modal1.style.display = "none";
    }
}

</script>
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

	$query = mysqli_query($conn,"select * from patient where password='$password' AND username='$username'");
	$rows = mysqli_fetch_assoc($query);
	$num=mysqli_num_rows($query);
	if ($num == 1) {
		$_SESSION['username']=$rows['username'];
		$_SESSION['user']=$rows['name'];
		header( "Refresh:1; url=ulogin.php"); 
	} 
	else 
	{
		$error = "Username or Password is invalid";
	}
	mysqli_close($conn); 
}
}
?>
</body>
</html>
