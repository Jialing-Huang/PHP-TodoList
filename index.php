<?php 
	require ("includes/functions.php");

	// select the books from our DB
	// loop and display in the table
	// show total number of books in library
	
	if(isset($_GET['name']) && isset($_GET['date']) && !empty($_GET['name']) && !empty($_GET['date'])){
		if(isset($_GET['delete']) && $_GET['delete']=='1'){  //If "Delete" is active
			if(is_logged_in()){// If the user has logged in

				DB::delete('todo_items', 'name = %s AND date_added = %s', $_GET['name'], $_GET['date']);
				$items = DB::query("SELECT * FROM todo_items");
				echo $twig->render("task_list.htm", array("items" => $items));

			}else{ // If the user does not log in
				header("Location: login.php");
			};

		}else{
			// Only "Completed" is active
			DB::update('todo_items', array('completed'=>'1'), 'name = %s AND date_added = %s', $_GET['name'],$_GET['date']);
			$items = DB::query("SELECT * FROM todo_items");
			echo $twig->render("task_list.htm", array("items" => $items));
		};
		
	}else{
		$items = DB::query("SELECT * FROM todo_items");
		//show the template file
		echo $twig->render("task_list.htm", array("items" => $items));
	};
?>



