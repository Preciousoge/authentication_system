<?php include_once('lib/header.php');


if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
	//redirect to dashboard
	header("location:dashboard.php");
}
 
 
// include_once('lib/header.php');
 
 ?>
	
	<p><strong> Welcome, Please Register</strong></p>
	
	<p>All Fields are required</p>

	<form method="POST" action="processregister.php" >
	<p>
		<?php
		 
		 if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
		 	echo "<span style='color:red'>" . $_SESSION['error'] . "</span>";	 

			session_destroy();
		 }
		

		?>

	</p>


	<p>
		
		
			<label> First Name</label> <br/>
			<input 
			<?php

			if (isset($_SESSION['first_name']) && !empty($_SESSION['first_name'])) {
		 	echo "value=" . $_SESSION['first_name'];
		 	//$_SESSION['first_name'] ="";
		 	}	 

		 	?>
			type="text" name="first_name" placeholder="First Name" >

	</p>


	<p>
		
		
			<label> Last Name</label> <br/>
			<input 
			<?php

			if (isset($_SESSION['last_name']) && !empty($_SESSION['last_name'])) {
		 	echo "value=" . $_SESSION['last_name'];
		 }

			?>


			type="text" name="last_name" placeholder="Last Name" >

	</p>


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
		

			<label> Gender</label> <br/>
			<select name="gender" >
				<option value="">Select One</option>
				<option
				<?php

			if (isset($_SESSION['gender']) && $_SESSION['gender'] == 'Male') {
		 	echo "selected" ;
		 }

			?>


				>Male</option>
				<option

				<?php

			if (isset($_SESSION['gender']) && $_SESSION['gender'] == 'Female') {
		 	echo "selected" ;
		 }

			?>

				>Female</option>

			</select>

	</p>

	
	<p>
		
		
			<label> Designation</label> <br/>
			<select name="designation" >
				<option value="">Select One</option>
				<option
				<?php

			if (isset($_SESSION['designation']) && $_SESSION['designation'] == 'Vendor') {
		 	echo "selected" ;
		 }

			?>

				>Vendor</option>
				<option
				<?php

			if (isset($_SESSION['designation']) && $_SESSION['designation'] == 'User') {
		 	echo "selected" ;
		 }

			?>


				>User</option>
				<option

				<?php

			if (isset($_SESSION['designation']) && $_SESSION['designation'] == 'Guest') {
		 	echo "selected" ;
		 }

			?>


				>Guest</option>

			</select>



	</p>

	<p>
		
		
			<label> Department</label> <br/>
			<input 
			<?php

			if (isset($_SESSION['department']) && !empty($_SESSION['department'])) {
		 	echo "value=" . $_SESSION['department'];
		 }

			?>



			type="text" name="department" placeholder="Department" >

	</p>
	
	<p>
		<button type="register">
			Register
		</button>






	</form>

	<?php

 include_once('lib/footer.php');
 ?>