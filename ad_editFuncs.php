<?
session_start();
include"includes/check_ad_login.php";
include"includes/config.php";
include"includes/globalFunc.php";
include"includes/getData.php";

$keys = array();
$vals = array();
foreach($_POST as $k => $v)
{
	if($k!="type"&&$k!="fromPage")
	{
		if($k!="materialCheckbox"&&$k!="categoryCheckbox"&&$k!="colorCheckbox"&&$k!="ageCheckbox"&&$k!="genderCheckbox"&&$k!="sizesCheckbox") // remove products useless keys
		{
			if($k!="method") // remove useless keys
			{
				array_push($keys, $k);
				array_push($vals, $v);
			}
		}
	}
}
$table = $table_per.$_POST['type']; 
$result = upData($table, $keys, $vals);
if ($result==1)
{
	$editGoTo = $_POST['fromPage']."&msg=success.";
}
else
{
	$editGoTo = $_POST['fromPage']."&msg=fail.";
}
header(sprintf("Location: %s", $editGoTo));

?>
