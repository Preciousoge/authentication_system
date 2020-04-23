<?php


 function generate_token()
{
	$token = "";

			$alphabets = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
			for($i = 0 ; $i < 26 ; $i++){

				
				$index = mt_rand(0,count($alphabets)-1);
				$token .= $alphabets[$index];
			}
	return $token;		
}

function find_token($email='')
{
	$allUserTokens = scandir("db/token/");
	$countAllUserTokens = count($allUserTokens);

	for ($counter = 0; $counter < $$countAllUserTokens; $counter++) {
		
		$currentTokenfile = $allUserTokens [$counter];

		if($currentTokenfile == $email . ".json"){
			
			$tokenContent = file_get_contents("db/token/" . $currentTokenfile);

			$tokenObject = json_decode($tokenContent);

			//$tokenFromDB = $tokenObject -> token;
			return $tokenObject;
			

		}
	}


	return false; 
}

