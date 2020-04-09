<? include_once('lib/header.php');

if(!isset($_SESSION['loggedIn'])){
	header("location: login.php");

?> 

<h3> Dashboard</h3>

Welcome, <?php echo $_SESSION['fullname']; ?> 
You are logged in as <?php echo $_SESSION['role']; ?>,  
and your ID is <?php echo $_SESSION['loggedIn']; ?>.






<p>

		<a href="index.php">Home</a> |
		<a href="logout.php"> Logout </a> |
		<a href="forgot.php"> Reset Password</a>
	</p>

</body>
</html>