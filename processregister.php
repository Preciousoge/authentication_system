<?php session_start();

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
	$_SESSION["error"] = "You have"   .  $errorCount  .   " errors in your submission" ;
	header("location: register.php");
}

//assign userid after count
else {
 	
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
	for($counter = 0; $counter < $countAllUsers; $counter++) {
		$currentUser = $allUsers[$counter];

		if($currentUser == $email. "json") {
			$_SESSION['error'] = "Registration Failed, User already exists" ;
			header("location: register.php");
			die();

		}

	}


 	

//save to database

	file_put_contents("db/users/" . $email. "json",json_encode( $userObject));
	$_SESSION["message"] = "Registration Successful, You can now login!" . $first_name ;
	
	header("location: login.php");



}






 	?>
