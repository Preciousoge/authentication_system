 <?php session_start(); 
require_once('functions/alerts.php');
require_once('functions/redirect.php');
require_once('functions/token.php');
require_once('functions/email.php');


// collect data

$errorCount = 0;


$email = $_POST['email'] !="" ? $_POST['email'] : $errorCount++;

$_SESSION ['email'] = $email;


if($errorCount > 0){

	$session_error = "You have"   .  $errorCount  .   " error";

	if($errorCount > 1) {
		$session_error .= "s";
	}

	$session_error .= " in your submisson" ;
	
	set_alert('error',$session_error);

	redirect_to(" forgot.php");


}else {
 	
 	$allUsers = scandir("db/users/");
 	
 	$countAllUsers = count($allUsers);
 	
 	for($counter = 0; $counter < $countAllUsers; $counter++) {
		
		$currentUser = $allUsers[$counter];

		if($currentUser == $email. ".json") {
			//send mail and redirect to reset password page

			//generate token starts here
			$token = generate_token();


			//token generation ends here




			$subject = "Password Reset Link";
			$message = "A password reset  has been initiated from your account. if you did not send this, ignore this message, otherwise, visit :localhost/projects/php/pas/reset.php?token=" . $token;
			
			$headers = "From: no-reply@snh.org" . "\r\n" .
			
			"CC: preciousoge98@gmail.com";

			file_put_contents("db/token/" . $email. ".json",json_encode(['token'=> $token]));


			
         send_mail($subject,$message,$email);

         die();

        }
        
    }
    set_alert('error',"Email not registered with us ERR: " . $email);
   
    redirect_to("forgot.php");

}

