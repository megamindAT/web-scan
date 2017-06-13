<?php
session_start();

if ($_SESSION['username']) {
	

	$action = $_GET['action'];
	require_once('controller/PostController.php');
	  $controll = new PostController();
	  $controll->Getpost();
	if ($action == 'upload') {
		$controll->UpLoad();
	}
	if ($action == 'delete') {	

		$controll->Delete();
		
	}
	if ($action == 'logout') {
		$controll->LogOut();
		
	}

}else{
	require_once('controller/PostController.php');
	$controll = new PostController();
	$controll->Login();
	
	 
}
?>
