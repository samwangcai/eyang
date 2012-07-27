<?
if(!isset($_SESSION['aname'])||$_SESSION['aname']=="")
{
	$pageGoto = "ad_login.php";
	header(sprintf("Location: %s", $pageGoto));
}
?>