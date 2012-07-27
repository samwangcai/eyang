<?
session_start();
include"includes/check_ad_login.php";
include"includes/config.php";
include"includes/globalFunc.php";
include"includes/getData.php";
include"includes/login_out.php";
include"includes/pageNav.php";
//include("fckeditor/fckeditor.php") ;

$page = $_GET['page']?$_GET['page']:1;
$category = $_GET['category']?$_GET['category']:"";
$maxNo = 10;
$first = ($page-1)*$maxNo;
$table = $table_per."article";

if($category != "")
{
	$sql = " where 1 and category=$category order by add_time desc ";
}
else
{
	$sql = " where 1 order by add_time desc ";
}
$data = getList($table,$sql, $first, $maxNo);
/**/
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
		<p><input type="button" onclick="javascript:window.location.href='ad_articles_edit.php?page=<? echo $page; ?>';" value="add new articles" /></p>
		<?
			if ($data[0] >0 )
			{
				echo "<div class='pageNav'>";
				pageNav($first, $maxNo, $data[0]);
				echo "</div>";
				echo "<div class='space'></div>";
				echo "<div id='articleList'>";
				for($a=1;$a<=$data[0]; $a++)
				{
					if($data[$a]['id']>0)
					{
						$img = explode("||",$data[$a]['pictures']);
						echo "<div class='dataLine' aid='".$data[$a]['id']."'>";
						echo "<div class='img'><img src='".$folder.$img[0]."'><a href='ad_articles_edit.php?m=del&category=$category&page=$page&&id=".$data[$a]['id']."'>Delete</a></div>";
						echo "<a class='title' href='ad_articles_edit.php?id=".$data[$a]['id']."&category=$category&page=$page'>".$data[$a]['title']."</a>";
						echo "<div class='synopsis'><b>Context:</b> ".str_replace("\n","<br />",$data[$a]['content'])."</div>";
						echo "<div class='space'></div>";
						echo "</div>";
					}
				}
				echo "</div>";
				echo "<p>&nbsp;</p>";
				echo "<div class='space'></div>";
				echo "<div class='pageNav'>";
				pageNav($first, $maxNo, $data[0]);
				echo "</div>";
				echo "<p>&nbsp;</p>";
			}
			else
			{
				echo "<h2>no dates </h2>";
			}
		?>
		</div>
	</div>
	<? include"includes/a_footer.php"; ?>
</div>
</body>
</html>
