<?
session_start();
include"includes/check_ad_login.php";
include"includes/config.php";
include"includes/globalFunc.php";
include"includes/getData.php";
include"includes/login_out.php";
include"includes/pageNav.php";
//include("fckeditor/fckeditor.php") ;

$id = $_GET['id']?$_GET['id']:0;
$page = $_GET['page']?$_GET['page']:1;
$category = $_GET['category']?$_GET['category']:"";
$table = $table_per."populers";
$from = "ad_populers.php?&category=$category&page=$page";

if($_GET['m']=="del" && $id>0)
{
	$a = removeData($table, $id);
	$editGoTo = $from;
	header(sprintf("Location: %s", $editGoTo));
}


if($id>0)
{
	$data = getInfo($table, "id", $id);
	if($data['id']>0)
	{
		$type = "edit";
	}
}
else
{
	$type = "add";
}
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
		<div class="uploadFrameDiv" style="display:none;">
				<div id="uploadFrameDiv">
					<h2><div style="width:100px; float:left;">Upload File</div><a href="###" class="closeIcon"></a></h2>
					<iframe id="uploadFrame" src="" frameborder="0"></iframe>
				</div>
			</div>
		<?
			if ($type == "edit")
			{
				echo "<h2>编辑推荐</h2>";
			}
			else
			{
				echo "<h2>添加推荐</h2>";
			}
		?>
		<form action="ad_editFuncs.php" method="post">
			<input type="hidden" name="type" value="populers" />
			<input type="hidden" name="fromPage" value="<? echo $from; ?>" />
			<input type="hidden" name="id" value="<? echo $data['id']; ?>" />
			<input type="hidden" name="pictures" id="small" value="<? echo $data['pictures']; ?>" />
			<table class="editTable" cellpadding="0" cellspacing="0" border="0">
				<tr>
					<th width="90">类别:</td>
					<td>
						<select name="category">
							<option value="首页大图">首页大图</option>
						</select>
					</td>
				</th>
				<tr>	
					<td width="90">图片:</td>
					<td>
						<div class="img"><img src="" /></div>
						<input type="button" id="uploadBtn" class="small" value="upload" />
						<input type="button" id="removeBtn" class="small" value="remove" style="display:none;" />
					</td>
				</tr>
				<tr>
					<th width="90">文字描述:</td>
					<td><input type="text" name="txt" value="<? echo $data['txt']; ?>" /></td>
				</th>
				<tr>
					<th>相关链接:</td>
					<td><input type="text" name="url" value="<? echo $data['url']; ?>" /></td>
				</tr>
			</table>
			<p></p>
			<p>
				<input type="submit" value="Submit" />
				<input type="reset" value="Reset" />
				<input type="button" onclick="window.location.href='ad_populers.php?category=<? echo $category; ?>&page=<? echo $page; ?>';" value="Back" />
			</p>
		</form>
		<div class="space"></div>
		<p>&nbsp;</p>
		</div>
	</div>
	<? include"includes/a_footer.php"; ?>
</div>
<script language="javascript">
$(document).ready(function(){
	var img = $("#small").val();
	if(img!="")
	{
		changeBgImg("", img);
	}
}); 

function changeBgImg(from, img)
{
	$("#uploadBtn").hide();
	$("#removeBtn").show();
	$(".img img").attr("src", "images/upload/"+img);
	$("#"+from).val(img);
}
$(".uploadFrameDiv, .InforDiv").draggable({
	handle: "h2"
});
$("#uploadBtn").bind("click",function(){
	$(".uploadFrameDiv").css("left",$(this).position().left-0)
	$(".uploadFrameDiv").css("top",$(this).position().top+30)
	$(".uploadFrameDiv").show();
	$("#uploadFrame").attr("src","ad_pictures_iframe.php?f="+$(this).attr("class"));
})
$("#removeBtn").bind("click",function(){
	var fname = $("#small").val();
	if(fname!="")
	{
		$("#small").val("");
		$(".img img").attr("src", "");
		$("#uploadBtn").show();
		$("#removeBtn").hide();
	}
})
$("#uploadFrameDiv h2 a").bind("click",function(){
	$(".uploadFrameDiv").hide()
})

</script>
</body>
</html>
