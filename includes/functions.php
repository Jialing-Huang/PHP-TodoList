<?php // functions.php

	//autoload composer libraries
	require ('vendor/autoload.php');


	// start session to use session variables
	session_start();
	
	//meekro db configuration
	DB::$user = 'ipd';
	DB::$password = "ipdipd";
	DB::$dbName = 'ipd16'; 

	// twig configuration
	$loader = new \Twig\Loader\FilesystemLoader('templates');
	$twig = new \Twig\Environment($loader);
	

	// MONOLOG - setup logging
	/*
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger("login");
$log->pushHandler( new StreamHandler("login_log.log", Logger::ALERT) );

$log->debug("debug");
$log->info("info");
$log->notice("notice - This is a notice");
$log->warning("warning");
$log->error("error");
$log->critical("critical");
$log->alert("alert");
$log->emergency("emergency");
	*/
	
	function is_logged_in(){
		
		if ( isset($_SESSION['u_id']) && $_SESSION['u_id'] != ""){
			return true;
		}else return false;
		
	}

	//set twig global variables
	$twig->addGlobal("is_logged_in", is_logged_in() );
	
	if (isset($_SESSION['u_id'])){
		$twig->addGlobal("user_name", $_SESSION['displayname']);
	};
		
?>