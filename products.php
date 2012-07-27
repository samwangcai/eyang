<?
session_start();
include"includes/config.php";
include"includes/globalFunc.php";
include"includes/getData.php";
include"includes/login_out.php";
include"includes/pageNav.php";
include"includes/format_datas.php";
//include("fckeditor/fckeditor.php") ;

$page = $_GET['page']?$_GET['page']:1;
$gender = $_GET['gender']?$_GET['gender']:"";
$category = $_GET['category']?$_GET['category']:"";
$age = $_GET['age']?$_GET['age']:"";
$sizes = $_GET['sizes']?$_GET['sizes']:"";
$material = $_GET['material']?$_GET['material']:"";
$color = $_GET['color']?$_GET['color']:"";
$maxNo = 12;
$first = ($page-1)*$maxNo;

$table = $table_per."products";
$sql = " where 1 and is_show=1 ";

$list = array("category", "gender", "age", "sizes", "material", "color");
$list_txt = array("分类", "性别", "年龄", "尺寸", "材质", "颜色");
foreach ($list as $v)
{
	if ($$v!="") { 
		$tmp = explode("||", $$v);
		$sql_ = "";
		for ($a=0; $a<count($tmp); $a++)
		{
			if($tmp[$a]!="")
			{
				$sql_ .= " or $v like '%".$tmp[$a]."||%' "; 
			}
		}
		if ($sql_ != "")
		{
			$sql_ = substr($sql_, 3);
			$sql .= " and ( $sql_ ) ";
		}
	}
}
$sql .= " order by add_time desc ";
//echo $sql;
$data = getList($table, $sql, $first, $maxNo);

$cates = get_cates();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/global.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>products</title>
</head>
<body>
	<div class="container">
		<? include"includes/header.php"; ?>
		<div class="mainbody">
			<div class="content">
				<div class="navigation">
					Location:
					<a href="index.php">Homepage</a> / 
					<a href="products.php">Products</a>
				</div>
				<input type="hidden" name="gender" id="gender" value="<? echo $gender; ?>" />
				<input type="hidden" name="age" id="age" value="<? echo $age; ?>" />
				<input type="hidden" name="sizes" id="sizes" value="<? echo $sizes; ?>" />
				<input type="hidden" name="category" id="category" value="<? echo $category; ?>" />
				<input type="hidden" name="material" id="material" value="<? echo $material; ?>" />
				<input type="hidden" name="color" id="color" value="<? echo $color; ?>" />
				<div class="search_box">
					<?
					$i = 0;
					foreach ($list as $v)
					{
						echo "<div class='block'> \n";
						echo "<span class='title_txt'>".$list_txt[$i].":</span> \n";
						for($a=1; $a<=$cates[0]; $a++)
						{
							if($cates[$a]['id'] > 0 && $cates[$a]['category'] == $v)
							{
								echo "<label><input type='checkbox' name='".$cates[$a]['category']."Checkbox' value=".$cates[$a]['id']." />".$cates[$a]['display']."</label> \n";
							}
						}
						echo "</div> \n";
						$i ++ ;
					}
					?>
					<input type="button" onclick="search_products();" value="搜索" />
				</div>
				<?
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
					pageNav($first, $maxNo, $data[0]);
				}
				else
				{
					echo "<h2>没有数据， 请重新查询。</h2>";
				}
				?>
			</div>
		</div>
		<? include"includes/footer_en.php"; ?>
	</div>
<script language="javascript">
$(document).ready(function(){
	setCheckboxs();
}); 
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
function search_products()
{
	var list = ["gender", "age", "category", "material", "color", "sizes"]
	var kys = "";
	for(var a=0; a<list.length; a++)
	{
		if($("input[name='"+list[a]+"']").val()!="")
		{
			kys += "&"+list[a]+"="+$("input[name='"+list[a]+"']").val();
		}
	}
	window.location.href = "products.php?"+kys;
}
</script>	
</body>
</html>
