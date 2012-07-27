<?
session_start();
include"includes/check_ad_login.php";
include"includes/config.php";
include"includes/globalFunc.php";
include"includes/getData.php";
include"includes/login_out.php";
include"includes/pageNav.php";
include"includes/format_datas.php";
//include("fckeditor/fckeditor.php") ;

$from = "ad_products.php?page=".$_GET['page'];
$id = 0;
$page = 1;
$type = "";

if(isset($_GET['page'])&&$_GET['page']>0)
{
	$page = $_GET['page'];
}
if(isset($_GET['id'])&&$_GET['id']>0)
{
	$id = $_GET['id'];
}
$table = $table_per."products";
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
$cates = get_cates();
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
				echo "<h2>编辑产品</h2>";
			}
			else
			{
				echo "<h2>添加产品</h2>";
			}
		?>
		<form action="ad_editFuncs.php" method="post">
			<input type="hidden" name="type" value="products" />
			<input type="hidden" name="fromPage" value="<? echo $from; ?>" />
			<input type="hidden" name="id" value="<? echo $data['id']; ?>" />
			<input type="hidden" name="thumb" id="thumb" value="<? echo $data['thumb']; ?>" />
			<input type="hidden" name="gender" id="gender" value="<? echo $data['gender']; ?>" />
			<input type="hidden" name="age" id="age" value="<? echo $data['age']; ?>" />
			<input type="hidden" name="sizes" id="sizes" value="<? echo $data['sizes']; ?>" />
			<input type="hidden" name="category" id="category" value="<? echo $data['category']; ?>" />
			<input type="hidden" name="material" id="material" value="<? echo $data['material']; ?>" />
			<input type="hidden" name="color" id="color" value="<? echo $data['color']; ?>" />
			<table class="editTable" cellpadding="0" cellspacing="0" border="0" style="width:800px;">
				<tr>
					<th width="90">标题:</td>
					<td><input type="text" name="title" value="<? echo str_replace('"','&quot;',$data['title']); ?>" /></td>
				</tr>
				<tr>
					<th>添加日期  :</td>
					<td><input type="text" name="add_time" value="<? if($type=="edit") { echo $data['add_time']; } else { echo date("Y-m-s H:i:s"); } ?>" /></td>
				</tr>
				<tr>
					<th>性别 :</td>
					<td>
						<?
						for($a=1; $a<=$cates[0]; $a++)
						{
							if($cates[$a]['id'] > 0 && $cates[$a]['category'] == "gender")
							{
								echo "<label><input type='checkbox' name='".$cates[$a]['category']."Checkbox' value=".$cates[$a]['id']." />".$cates[$a]['display']."</label>";
							}
						}
						?>
					</td>
				</tr>
				<tr>
					<th>年龄 :</td>
					<td>
						<?
						for($a=1; $a<=$cates[0]; $a++)
						{
							if($cates[$a]['id'] > 0 && $cates[$a]['category'] == "age")
							{
								echo "<label><input type='checkbox' name='".$cates[$a]['category']."Checkbox' value=".$cates[$a]['id']." />".$cates[$a]['display']."</label>";
							}
						}
						?>
					</td>
				</tr>
				<tr>
					<th>分类 :</td>
					<td>
						<?
						for($a=1; $a<=$cates[0]; $a++)
						{
							if($cates[$a]['id'] > 0 && $cates[$a]['category'] == "category")
							{
								echo "<label><input type='checkbox' name='".$cates[$a]['category']."Checkbox' value=".$cates[$a]['id']." />".$cates[$a]['display']."</label>";
							}
						}
						?>
					</td>
				</tr>
				<tr>
					<th>尺寸:</td>
					<td colspan="2">
						<?
						for($a=1; $a<=$cates[0]; $a++)
						{
							if($cates[$a]['id'] > 0 && $cates[$a]['category'] == "sizes")
							{
								echo "<label><input type='checkbox' name='".$cates[$a]['category']."Checkbox' value=".$cates[$a]['id']." />".$cates[$a]['display']."</label>";
							}
						}
						?>
					</td>
				</tr>
				<tr>
					<th>材质:</td>
					<td colspan="2">
						<?
						for($a=1; $a<=$cates[0]; $a++)
						{
							if($cates[$a]['id'] > 0 && $cates[$a]['category'] == "material")
							{
								echo "<label><input type='checkbox' name='".$cates[$a]['category']."Checkbox' value=".$cates[$a]['id']." />".$cates[$a]['display']."</label>";
							}
						}
						?>
					</td>
				</tr>
				<tr>
					<th>颜色:</td>
					<td colspan="2">
						<?
						for($a=1; $a<=$cates[0]; $a++)
						{
							if($cates[$a]['id'] > 0 && $cates[$a]['category'] == "color")
							{
								echo "<label><input type='checkbox' name='".$cates[$a]['category']."Checkbox' value=".$cates[$a]['id']." />".$cates[$a]['display']."</label>";
							}
						}
						?>
					</td>
				</tr>
				<tr>
					<th>价格:</td>
					<td>
						<label>网站价：<input type="text" name="sale_price" value="<? echo $data['sale_price']; ?>" style="width:80px;" /></label>
						<label>市场价：<input type="text" name="market_price" value="<? echo $data['market_price']; ?>" style="width:80px;" /></label>
					</td>
				</tr>
				<tr>
					<th>包装 :</td>
					<td><input type="text" name="packaging" value="<? echo str_replace('"','&quot;',$data['packaging']); ?>" /></td>
				</tr>
				<tr>
					<th>重量 :</td>
					<td colspan="2">
						<input type="text" name="weight" value="<? echo str_replace('"','&quot;',$data['weight']); ?>" />
					</td>
				</tr>
				<tr>
					<th>简介 :</td>
					<td><textarea name="synopsis" ><? echo str_replace('"','&quot;',$data['synopsis']); ?></textarea></td>
				</tr>
				<tr>
					<th>详细描述:</td>
					<td><textarea name="context" ><? echo str_replace('"','&quot;',$data['context']); ?></textarea></td>
				</tr>
				<tr>
					<th>产品图片:</td>
					<td>
						<input type="hidden" name="pictures" id="imgs" value="<? echo $data['pictures']; ?>" />
						<input type="button" id="uploadBtn" class="small" value="add pictures" style="margin-bottom:15px;" />
						<div class="imgs"></div>
					</td>
				</tr>
			</table>
			<p></p>
			<p>
				<input type="submit" value="Submit" />
				<input type="reset" value="Reset" />
				<input type="button" onclick="window.location.href='ad_products.php?page=<? echo $page; ?>';" value="Back" />
			</p>
		</form>
		</div>
		<p>&nbsp;</p>
	</div>
	<? include"includes/a_footer.php"; ?>
</div>
<script language="javascript">
$(document).ready(function(){
	setCheckboxs();
	
	var imgs = $("#imgs").val();
	var type = "mimg";
	if(imgs!="")
	{
		changeBgImg(type, imgs);
	}
	var cur = $("#thumb").val()?$("#thumb").val():0;
	set_main($(".imgs .img img:eq("+cur+")"));
}); 
function changeBgImg(type, imgs)
{
	if (type=="mimg")
	{
		var t = imgs.split("||");
		var imgList = new Array();
		var html = ""
		var vals = ""
		for(var a=0; a<t.length; a++)
		{
			if(t[a]!="")
			{
				vals += t[a] + "||";
				html += "<div class='img'><img src='images/upload/" + t[a] + "' onclick='set_main(this);' /><div class='closeIcon' onclick='removeImg(this);'></div></div>\n";
			}
		}
		$("#imgs").val(vals);
		$(".imgs").html(html);
	}
	else if(type=="mimgu")
	{
		var pics = $("#imgs").val() + "||" + imgs + "||";
		var type = "mimg";
		$("#imgs").val(pics);
		changeBgImg(type, pics);
	}
	else 
	{
		$("#uploadBtn").hide();
		$("#removeBtn").show();
		var pics = $("#imgs").val();
		var type = "mimg";
		pics = pics.replace(imgs+"||");
		changeBgImg(type, pics);
	}
	
	var cur = $("#thumb").val()?$("#thumb").val():0;
	if (cur<0) { cur = 0; }
	if (cur>$(".imgs .img").length-1) { cur = $(".imgs .img").length-1; }
	set_main($(".imgs .img img:eq("+cur+")"));
}
function set_main(obj)
{
	if($(obj).attr("src")!=""||$(obj).attr("src")!="undefined")
	{
		$(".imgs .img").removeClass("imgon");
		$(obj).parent().addClass("imgon");
	}
	$("#thumb").val($(".imgs .img img").index($(obj)));
}
$(".uploadFrameDiv, .InforDiv").draggable({
	handle: "h2"
});
$("#uploadBtn").bind("click",function(){
	$(".uploadFrameDiv").css("left",$(this).position().left-0);
	$(".uploadFrameDiv").css("top",$(this).position().top+30);
	$(".uploadFrameDiv").show();
	$("#uploadFrame").attr("src","ad_pictures_iframe.php?f=mimgu");
})
function removeImg(obj)
{
	var url = top.location.href.split("ad_")[0];
	var img = $(obj).prev().attr("src").replace(url, "").replace("images/upload/", "");
	if (img!="")
	{
		var pics = $("#imgs").val();
		pics = pics.replace(img+"||", "");
		$("#imgs").val(pics);
		var type = "mimg";
		changeBgImg(type, pics);
	}
}
$("#uploadFrameDiv h2 a").bind("click",function(){
	$(".uploadFrameDiv").hide();
})

function setCheckboxs()
{
	var list = ["gender", "age", "category", "material", "color", "sizes"]
	for(var a=0; a<list.length; a++)
	{
		try{ setCheckbox(list[a], $("input[name='"+list[a]+"']").val());}
		catch(e) {}
	}
}
function setCheckbox(name, vals)
{
	var valList = [];
	var list = $("input[name='"+name+"Checkbox']");
	if (vals != "")
	{
		valList = vals.split("||");
	}
	for(var a=0; a<(valList.length-1); a++)
	{
		for(var b=0; b<list.length; b++)
		{
			if(valList[a] == $(list[b]).val())
			{
				$(list[b]).attr("checked", "checked");
			}
		}
	}
}
$("input[type='checkbox']").bind("click",function(){
	var name = $(this).attr("name");
	var list = $("input[name='"+name+"']");
	var html = "";
	for(var a=0; a<list.length; a++)
	{
		if($(list[a]).attr("checked")==true)
		{
			html += $(list[a]).val() + "||"; 
		}
	}
	$("input[name='"+name.replace('Checkbox','')+"']").val(html);
})
</script>
</body>
</html>
