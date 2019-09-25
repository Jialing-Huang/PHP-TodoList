<?php
require ("includes/functions.php");

$error = [];

if ( $_SERVER['REQUEST_METHOD'] == "POST"){

	//validate all the date received
	if ( !isset($_POST['uname']) || !isset($_POST['psw'])   ){
        $error[] = "A field is missing, please try again";
        //echo "A field is missing, please try again";
	}else{
		if (empty($_POST['uname']) && $_POST['uname'] != "")
			  $error[] = "Name was left blank, please try again";
		if (empty($_POST['psw']) && $_POST['psw'] != "")
		    $error[] = "Password was left blank, please try again";
		
    }
    
    $results = DB::queryFirstRow("SELECT id,  display_name, password 
								  FROM todo_users 
								  WHERE username = %s 
								  LIMIT 1", $_POST['uname']);
			
			// check 1 row returned
			if ( $results == null){ // number of rows returned
				$error[] = "User does not exist";
				//$log->warning("User '" . $_POST['uname'] . "' not found in db");
			}else{
				    // encrypt pw to match databases
					if ( $results['password'] != md5($_POST['psw']) ){ //check if passwords match
						 $error[] = "Passwords do not match";
					}else{                  									
						//save session and TODO cookie
						$_SESSION['u_id'] = $results['id'];
						$_SESSION['displayname'] = $results['display_name'];
					
						//redirect user on successful login
						header("Location: index.php");					
				    };
            };
}
	
echo $twig->render("login_form.htm", 
					array("form_action"	=> $_SERVER['PHP_SELF'], "error" => $error)
                  );

?>