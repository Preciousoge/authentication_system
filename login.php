
<?php include_once('lib/header.php');

if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
	//redirect to dashboard
	header("location:dashboard.php");}

 //include_once('lib/header.php');

?>
	
	<form method="POST" action="processlogin.php" >

	<p>
		<?php
		 if (isset($_SESSION["message"]) && !empty($_SESSION["message"])) {
		 	echo "<span style='color:green'>" . $_SESSION["message"] . "</span>";	 

			session_destroy();
		 }
		

		?>


	</p>


<h3>Login Form</h3>
<p>
		
		
			<label> Email</label> <br/>
			<input 
			<?php

			if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {
		 	echo "value=" . $_SESSION['email'];
		 }

			?>



			type="email" name="email" placeholder="Email"  >

	</p>

	<p>
		
		
			<label> Password</label> <br/>
			<input type="password" name="password" placeholder="Password" >

	</p>

	<p>
		<button type="login">
			Login
		</button>






	</form>

	
	<?php

 include_once('lib/footer.php');
 ?>