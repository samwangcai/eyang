<?
session_start();
include"includes/config.php";
include"includes/globalFunc.php";
include"includes/getData.php";

$first = 0;
$maxNo = 10;
$table = $table_per."populers";
$sql = " where 1 and `category`='首页大图' order by id desc ";
$data = getList($table, $sql, $first, $maxNo);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Yatalite-Tech</title>
<link href="css/global.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/jquery-1.4.2.min.js"></script>
<style>
<?

if($data[0]>0)
{
	for($a=1; $a<=$data[0]; $a++)
	{
		echo ".div_".($a-1)." { background-image:url(".$folder.$data[$a]['pictures']."); } \n";
	}
}
?>
</style>
</head>

<body>
	<div class="container">
		<? include"includes/header.php"; ?>
		<div class="space"></div>
		<div class="mainbody">
			<div class="bannerBlock">
				<div class="imgList" cid="0">
					<?
					if($data[0]>0)
					{
						for($a=1; $a<=$data[0]; $a++)
						{
							echo "<div title='".$data[$a]['txt']."' link='".$data[$a]['url']."' src='".$folder.$data[$a]['pictures']."'></div> \n";
						}
					}
					?>
				</div>
				<div class="prevBtn"></div>
				<div class="nextBtn"></div>
	
				<div class="moveNav"></div>
				
				<?
				if($data[0]>0)
				{
					for($a=1; $a<=$data[0]; $a++)
					{
						echo "<div class='div_".($a-1)."'></div> \n";
					}
				}
				?>

				<div class="moveOut">
					<div class="moveWidthOut">
						<div class="blockImg block0"></div>
						<div class="blockImg block1"></div>
						<div class="blockImg block2"></div>
					</div>		
				</div>	
			</div>	
			<div class="space"></div>
			<div class="maincontent">
				<div class="content">
					<a href="products.php"><img src="images/index_title_new.jpg" /></a>
					<?
					$first = 0;
					$maxNo = 12;
					$table = $table_per."products";
					$sql = " where 1 and is_new=1 and is_show=1 order by add_time desc ";
					$data = getList($table, $sql, $first, $maxNo);
					if($data[0]>0)
					{
						for($a=1; $a<$maxNo; $a++)
						{
							if($data[$a]['id']>0)
							{
								$img = explode("||",$data[$a]['pictures']);
								echo "<div class='pro'> \n";
								echo "<a href='products_detail.php?id=".$data[$a]['id']."'><img src='".$folder.$img[$data[$a]['thumb']]."'></a>";
								echo "<a href='products_detail.php?id=".$data[$a]['id']."' class='prc'><span class='mp'>￥".$data[$a]['market_price']."</span> <span class='sp'>￥".$data[$a]['sale_price']."</span></a>";
								echo "<a href='products_detail.php?id=".$data[$a]['id']."' class='txt'>".$data[$a]['title']."</a>";
								echo "</div> \n";	
							}
						}
					}
					?>
					<p>&nbsp;</p>
					<a href="products.php"><img src="images/index_title_hot.jpg" /></a>
					<?
					$first = 0;
					$maxNo = 12;
					$table = $table_per."products";
					$sql = " where 1 and is_hot=1 and is_show=1 order by add_time desc ";
					$data = getList($table, $sql, $first, $maxNo);
					if($data[0]>0)
					{
						for($a=1; $a<$maxNo; $a++)
						{
							if($data[$a]['id']>0)
							{
								$img = explode("||",$data[$a]['pictures']);
								echo "<div class='pro'> \n";
								echo "<a href='products_detail.php?id=".$data[$a]['id']."'><img src='".$folder.$img[$data[$a]['thumb']]."'></a>";
								echo "<a href='products_detail.php?id=".$data[$a]['id']."' class='prc'><span class='mp'>￥".$data[$a]['market_price']."</span> <span class='sp'>￥".$data[$a]['sale_price']."</span></a>";
								echo "<a href='products_detail.php?id=".$data[$a]['id']."' class='txt'>".$data[$a]['title']."</a>";
								echo "</div> \n";	
							}
						}
					}
					?>	
				</div>
			</div>
		</div>
		
		<div class="footer">
			<p>copyright</p>
		</div>
	</div>
<script language="javascript">
var tag = 0;
$(document).ready(function(){
	setBannerNavPos();
	setNavFunc();
	setDefaultImgs();
});
$(".bannerBlock").bind("mouseover",function(){
	clearTimeout(y);
})
$(".bannerBlock").bind("mouseout",function(){
	y = setInterval(nextFunc,30000);
})
var y = setInterval(nextFunc,30000);

</script>	
</body>
</html>
