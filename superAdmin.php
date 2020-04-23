<?php include_once('lib/header.php');
require_once ('functions/redirect.php');
require_once ('functions/users.php');
re

if(!is_user_loggedIn()){
redirect_to("login.php");
}
?> 

<h3> Dashboard</h3>

Welcome, <?php echo $_SESSION['fullname'] ?>
You are logged in as <?php echo $_SESSION['role'] ?>,  
and your ID is <?php echo $_SESSION['loggedIn']?>.





	<?php

 include_once('lib/footer.php');
 ?>