<?php include_once('lib/header.php');
 ?>


<h3>Reset Password here </h3>
<p> Provide the email address associated with your account</p>

<form action="processforget.php" method="POST">

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
		<button type="submit"> Send Reset Code
			
		</button>
	

</form>



	<?php

 include_once('lib/footer.php');
 ?>