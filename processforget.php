<?php session_start();

// collect data

$errorCount = 0;


$email = $_POST['email'] !="" ? $_POST['email'] : $errorCount++;

$_SESSION ['email'] = $email;


if($errorCount > 0){
	$_SESSION["error"] = "You have"   .  $errorCount  .   " errors in your submission" ;
	header("location: forgot.php");

} else {
 	
 	$allUsers = scandir("db/users/");
 	
 	$countAllUsers = count($allUsers);
 	
 	for($counter = 0; $counter < $countAllUsers; $counter++) {
		
		$currentUser = $allUsers[$counter];

		if($currentUser == $email. "json") {
			//echo "Baba, you go dey alright  ";
			

			
			$subject = "Password Reset Link";
			$txt = "A password reset request has been initiated from your account. if you did not send this, ignore this message, otherwise, visit :localhost/pas/reset.php";
			
			$headers = "From: no-reply@giftregistry.com" . "\r\n" .
			
			"CC: somebodyelse@example.com";

			$try = mail($email,$subject,$txt,$headers);

			if($try){ $_SESSION["message"] = "Password reset link has been sent to your email:" . $email ;
			header("location:login.php");
	

			} else{
				$_SESSION["error"] = "Something went wrong, we could not send password rest to " . $email ;
	
				header("location:forgot.php");
			}

			die();









		}


	}

	$_SESSION["error"] = "Email not registered with us Err" . $email ;
	header("location: forgot.php");
	
}


