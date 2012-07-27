<?
session_start();
include"includes/check_ad_login.php";
include"includes/config.php";
include"includes/globalFunc.php";
include"includes/getData.php";
include"includes/login_out.php";

$page = $_GET['page']?$_GET['page']:1;
$type = $_GET['type']?$_GET['type']:"";
$maxNo = 15;
$first = ($page-1)*$maxNo;
$table = $table_per."populers";
if ($type!="")
{
	$sql = " where 1 and `category`='$type' order by id desc ";
}
else
{
	$sql = " where 1 order by id desc ";
}
$data = getList($table, $sql, $first, $maxNo);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/global.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>phdesign admin page</title>
</head>
<body class="admin">
<div id="container">
	<? include"includes/a_header.php"; ?>
	<div class="mainbody">
		<? include"includes/a_nav.php"; ?>
		<div class="mainbox">
		<p><input type="button" onclick="javascript:window.location.href='ad_populers_edit.php?category=<? echo $type; ?>&page=<? echo $page; ?>';" value="添加编辑" /></p>
		<table class="editTable" cellpadding="0" cellspacing="0" border="0">
			<tr>
				<td colspan="3"><h2>推荐编辑</h2></td>
			</tr>
			<tr>
				<th width="80" height="120">类别</th>
				<th width="160">图片</th>
				<th width="250">描述</th>
				<th>链接</th>
			</tr>
			<?
			for($a=1; $a<=$data[0]; $a++)
			{
				echo "<tr class='dataLine'>";
				echo "<td>".$data[$a]['category']."</td>";
				echo "<td><img src='".$folder.$data[$a]['pictures']."' style='width:140px; height:110px; padding:3px; border:1px solid #ddd;' /></td>";
				echo "<td><a class='title' href='ad_populers_edit.php?category=$type&page=$page&id=".$data[$a]['id']."' style='margin:0px;'>".$data[$a]['txt']."</a></td>";
				echo "<td>".$data[$a]['url']."</td>";
				echo "</tr>";
			}
			?>
		</table>
		<p></p>
			<div class="space"></div>
		<p>&nbsp;</p>
		</div>
	</div>
	<? include"includes/a_footer.php"; ?>
</div>
			


