<?
session_start();
include"includes/check_ad_login.php";
include"includes/config.php";
include"includes/globalFunc.php";
include"includes/getData.php";
include"includes/login_out.php";
include"includes/pageNav.php";
include"includes/format_datas.php";

$page = $_GET['page']?$_GET['page']:1;

$maxNo = 10;
$first = ($page-1)*$maxNo;

$table = $table_per."products";
$sql = " where 1 order by add_time desc ";
$data = getList($table, $sql, $first, $maxNo);

$cates = get_cates();

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
		<p><input type="button" onclick="javascript:window.location.href='ad_products_edit.php?page=<? echo $page; ?>';" value="add new products" /></p>
		<?
			if ($data[0] >0 )
			{
				echo "<div class='pageNav'>";
				pageNav($first, $maxNo, $data[0]);
				echo "</div>";
				echo "<div class='space'></div>";
				for($a=1;$a<=$data[0]; $a++)
				{
					if ($data[$a]['id']!="")
					{
						$img = explode("||",$data[$a]['pictures']);
						echo "<div class='dataLine'>";
						echo "<div class='img'><img src='".$folder.$img[$data[$a]['thumb']]."'></div>";
						echo "<a class='title' href='ad_products_edit.php?id=".$data[$a]['id']."&page=".$page."'>".$data[$a]['title']."</a>";
						echo "<div class='date'><b>Date:</b> ".$data[$a]['add_time'];
						echo " &nbsp; &nbsp; &nbsp; &nbsp; <b>包装:</b> ".$data[$a]['packaging'];
						echo " &nbsp; &nbsp; &nbsp; &nbsp; <b>分类:</b> ".format_features("category", $data[$a]['category'], $cates);
						echo " &nbsp; &nbsp; &nbsp; &nbsp; <b>性别:</b> ".format_features("gender", $data[$a]['gender'], $cates);
						echo " &nbsp; &nbsp; &nbsp; &nbsp; <b>年龄:</b>".format_features("age", $data[$a]['age'], $cates)."</div>";
						echo "<div class='date'><b>价格:</b> ".$data[$a]['sale_price']." / ".$data[$a]['market_price'];
						echo " &nbsp; &nbsp; &nbsp; &nbsp; <b>材质:</b> ".format_features("material", $data[$a]['material'], $cates);
						echo " &nbsp; &nbsp; &nbsp; &nbsp; <b>尺寸:</b> ".format_features("sizes", $data[$a]['sizes'], $cates);
						echo " &nbsp; &nbsp; &nbsp; &nbsp; <b>颜色:</b>".format_features("color", $data[$a]['color'], $cates)."</div>";
						echo "<div class='synopsis'><b>简述:</b> ".str_replace("\n","<br>",$data[$a]['synopsis'])."</div>";
						echo "<div class='space'></div>";
						echo "</div>";
					}
				}
				echo "<div class='space'></div>";
				echo "<div class='pageNav'>";
				pageNav($first, $maxNo, $data[0]);
				echo "<p>&nbsp;</p>";
				echo "<p>&nbsp;</p>";
				echo "</div>";
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
