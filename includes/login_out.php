<?php
session_start();
if ($_GET['doLogout']=="1"){
	//to fully log out a visitor we need to clear the session varialbles
	unset_user_info();
	unset_carts();
	session_destroy();
	//$pageGoTo = "index.php";
	//header(sprintf("Location: %s", $pageGoto));
}



if(!$_SESSION['carts'])
{
	$_SESSION['carts'] = array();
	$_SESSION['carts']['items'] = array();
}
?>
