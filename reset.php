 	<?php include_once('lib/header.php');
	 require_once('functions/alerts.php');
	 require_once('functions/users.php');


	 if(!is_user_loggedIn() && !is_token_set()){
	 	$_SESSION['error'] = "You are not authorized to view that page";
	 	header("Location:login.php");
	 }

	?>

		<h3>Reset Password here </h3>
		<p> Reset password associated with your account : [email]</p>

		<form action="processreset.php" method="POST">

			<p>
				<?php  print_alert();?>

			</p>

			<?php
				
				if (is_user_loggedIn()) {?>
			
			<input 

					<?php
						if (is_token_set_in_session()){
							
							echo "value='" . $_SESSION['token'] . "'";
						
						}else{
							echo "value='" . $_GET['token'] . "'";
						}             
					  ?>
						
						type="hidden" name= "token" value="<?php echo $_GET['token']?>" />
			<?php } ?>
			
			<p>
				
				
					<label> Email</label> <br/>
					<input 
						<?php              
						if(isset($_SESSION['email'])){
							echo "value=" . $_SESSION['email'];                                                     
						}               
						?>

					type="email" name="email" placeholder="Email" />

			</p>

			<p>
				
				
					<label>Enter New Password</label> <br/>
					<input type="password" name="password" placeholder="Password" />

			</p>

			<p>
				<button type="submit"> Reset Password</button>
			

		</form>



		<?php

	 include_once('lib/footer.php');
	 ?>