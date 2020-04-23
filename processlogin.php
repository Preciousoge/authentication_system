   <?php session_start();
   require_once('functions/redirect.php');
   require_once('functions/alerts.php');

$errorCount = 0;

$email = $_POST['email'] !="" ? $_POST['email'] : $errorCount++;
$password = $_POST['password'] !="" ? $_POST['password'] : $errorCount++;


$_SESSION ['email'] = $email;

if($errorCount > 0){

	$session_error = "You have"   .  $errorCount  .   " error";

	if($errorCount > 1) {
		$session_error .= "s";
	}

	$session_error .= " in your submisson" ;
	$_SESSION["error"] = $session_error;


	
	redirect_to(" login.php");
	}
else {


	$currentUser = find_user($email);


 	
 		 
 		 if($currentUser){

 			//check Password


 		 	$userString = file_get_contents("db/users/". $currentUser);  
 			$userObject = json_decode($userString);
 			$passwordFromDB =  $userObject->password;


 			$passwordFromUser = password_verify($password, $passwordFromDB);

 			if($passwordFromDB == $passwordFromUser){
 			

 				$_SESSION['loggedIn'] = $userObject->id;
 				$_SESSION['email'] = $userObject->email;
 				
 				$_SESSION['fullname'] = $userObject->first_name  .   "   "   .   $userObject->last_name;
 				$_SESSION['role'] = $userObject->designation;
 				
 				switch ($_SESSION['role']){
 					case 'medicalTeam':
 					redirect_to('medicalTeam.php');
 					break;
 					case "patient"
 					redirect_to('medicalTeam.php');
 					break;
 					case "medicalDirector"
 					redirect_to('superAdmin.php');
 					break;
 					default:
 					redirect_to('dashboard.php');
 				}
 					
				redirect_to(" dashboard.php");
 					


 				die();
			} 			
 			
 		 			
 		}	

}

 	set_alert('error', "Invalid Email or password" );
			redirect_to("  login.php");
			die(); 
 


?>
 