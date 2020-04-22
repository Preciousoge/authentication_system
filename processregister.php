<?php session_start();
	require_once('functions/users.php');
	require_once('functions/redirect.php');
// collect data

$errorCount = 0;


$first_name = $_POST['first_name'] != "" ? $_POST['first_name']: $errorCount++;

$last_name = $_POST['last_name'] != "" ? $_POST['last_name'] : $errorCount++;

$email = $_POST['email'] !="" ? $_POST['email'] : $errorCount++;
$password = $_POST['password'] !="" ? $_POST['password'] : $errorCount++;
$gender = $_POST['gender'] != "" ? $_POST['gender'] : $errorCount++;
$designation= $_POST['designation'] != "" ? $_POST['designation'] : $errorCount++;
$department= $_POST['department'] != "" ? $_POST['department'] : $errorCount++;


$_SESSION ['first_name'] = $first_name;

$_SESSION ['last_name'] = $last_name;

$_SESSION ['email'] = $email;

$_SESSION ['gender'] = $gender;

$_SESSION ['designation'] = $designation;

$_SESSION ['department'] = $department;



if($errorCount > 0){


	$session_error = "You have"   .  $errorCount  .   " error";

	if($errorCount > 1) {
		$session_error .= "s";
	}

	$session_error .= " in your submisson" ;
	$_SESSION["error"] = $session_error;

	redirect_to(" register.php");

}else {
 	$allUsers = scandir("db/users/");
	 $countAllUsers = count($allUsers);
 	$newUserId = ($countAllUsers - 1);
 	



	$userObject = [
		'id' => $newUserId,
		'first_name' => $first_name,
		'last_name' => $last_name,
		'email' => $email,
		'password' => password_hash($password, PASSWORD_DEFAULT),
		'gender' => $gender,
		'designation' => $designation,
		'department' => $department
	];


//check if user already exists
	$userExists = find_user($email);
	
		if($userExists) {
			$_SESSION['error'] = "Registration Failed, User already exists" ;
			redirect_to(" register.php");
			die();

		}

	}


 	

//save to database
	save_user($userObject); 
	$_SESSION["message"] = "Registration Successful, You can now login"    .   $first_name ;
	
	redirect_to(" login.php");










 	?>
