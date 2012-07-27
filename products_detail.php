<?
include"includes/config.php";
include"includes/globalFunc.php";
include"includes/getData.php";

$id = $_GET['id']?$_GET['id']:0;
$table = $table_per."products";
$data = getInfo($table, "id", $id);

$cates = get_cates();

$list = array("sizes", "color");
$list_txt = array("尺寸", "颜色");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>product - <? echo $data['title']; ?></title>
<link href="css/global.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="container">
	<? include"includes/header.php"; ?>
	<div class="space"></div>
	<div class="mainbody">
		<div class="content">
			<div class="navigation">
				Location:
				<a href="index.php">Homepage</a> / 
				<a href="products.php">Products</a> /
				<? echo $data['title']; ?>
			</div>
			<?
			if($data['id']>0)
			{
			    $img = explode("||", $data['pictures']);
			?>
			<div class="productImgs">
				<?
					for($a=0; $a<count($img); $a++)
					{	
						if($img[$a]!="")
						{
							echo "<div class='proImgs' src='".$folder.$img[$a]."'></div> \n";
						}
					}
				?>
			</div>
			<div class="productContent">
				<table cellpadding="0" cellspacing="0" border="0" width="100%" class="normalTable">
					<tr>
						<th colspan="2"><div class="topTitle"><? echo $data['title']; ?></div></th>
					</tr>
					<tr>
						<th width="60">价格:</th>
						<td><? echo "<span class='mp'>￥".$data['market_price']."</span> <span class='sp'>￥".$data['sale_price']."</span>"; ?></td>
					</tr>
					<tr>
						<td colspan="2">
							<div class="cart_info">
								<?
								$i = 0;
								foreach ($list as $v)
								{
									$pclist = explode("||", $data[$v]);
									echo "<div class='block'> \n";
									echo "<span class='title_txt'>".$list_txt[$i].":</span> \n";
									for($a=1; $a<=$cates[0]; $a++)
									{
										if($cates[$a]['id'] > 0 && $cates[$a]['category'] == $v)
										{
											if(in_array($cates[$a]['id'], $pclist))
											{
												echo "<label><input type='radio' name='".$cates[$a]['category']."Checkbox' value=".$cates[$a]['id']." />".$cates[$a]['display']."</label> \n";
											}
										}
									}
									echo "</div> \n";
									$i ++ ;
								}
								echo "<div class='block'> \n";
								echo "<span class='title_txt'>数量:</span> \n";
								echo "<input type='text' class='buy_qty' thumb='".$img[$data['thumb']]."' id='qty' pid='".$data['id']."' value=1 />";
								echo "</div> \n";
								?>
								<input type="button" class="cart_btn buy_it" />
								<input type="button" class="cart_btn add_cart" />
							</div>
						</td>
					</tr>
				</table>
			</div>
			<div class="space"></div>
			<div class="proDetails">
				<table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td><? echo str_replace("\n","<br />",$data['context']); ?></td></tr></table>
			</div>
			<?
			}
			else
			{
				echo  "<h2>Bad request.</h2><p><a href='products.php'>Back to products page</a></p>";
			}
			?>
			<div class="space"></div>
			<p>&nbsp;</p>
			<a href="products.php"><img src="images/index_title_hot.jpg" /></a>
			<?
			$first = 0;
			$maxNo = 4;
			$table = $table_per."products";
			$sql = " where 1 and is_hot=1 and is_show=1 order by add_time desc ";
			$relate = getList($table, $sql, $first, $maxNo);
			if($relate[0]>0)
			{
				for($a=1; $a<=$maxNo; $a++)
				{
					if($relate[$a]['id']>0)
					{
						$img = explode("||",$relate[$a]['pictures']);
						echo "<div class='pro'> \n";
						echo "<a href='products_detail.php?id=".$relate[$a]['id']."'><img src='".$folder.$img[$relate[$a]['thumb']]."'></a>";
						echo "<a href='products_detail.php?id=".$relate[$a]['id']."' class='prc'><span class='mp'>￥".$relate[$a]['market_price']."</span> <span class='sp'>￥".$relate[$a]['sale_price']."</span></a>";
						echo "<a href='products_detail.php?id=".$relate[$a]['id']."' class='txt'>".$relate[$a]['title']."</a>";
						echo "</div> \n";
					}
				}
			}
			?>
		</div>
	</div>
	<div class="space"></div>
	<? include"includes/footer.php"; ?>
</div>
<script language="javascript">
$(document).ready(function(){
	set_pro_img();
	set_category_selected();
}); 
function set_category_selected()
{
	$("input:radio[name='sizesCheckbox']:first").attr("checked", "checked");
	$("input:radio[name='colorCheckbox']:first").attr("checked", "checked");
}
function set_pro_img()
{
	var cur = <? echo $data['thumb']; ?>;
	if ( cur =="" )
	{
		cur = 0;
	}
	var list = $(".proImgs");
	var html = "";
	if($(list).length>0)
	{
		for(var a=0; a<$(list).length; a++)
		{
			html += "<div class='smlImg' onclick='set_selected_img("+a+")'><img src='"+$(list[a]).attr("src")+"'></div>";
		}
		$(".productImgs").append(html)
	}
	set_selected_img(cur)
}
function set_selected_img(ind)
{
	var list = $(".smlImg");
	if (ind>list.length) { ind = list.length; }
	if (ind<0) { ind = 0; }
	$(list).removeClass("on");
	$(list[ind]).addClass("on");
	$(".productImgs").css("background-image", "url("+$(list[ind]).find("img").attr("src")+")");
}

$(".buy_it, .add_cart").bind("click",function(){
	var btn = $(this);
	var pid = $("#qty").attr("pid");
	var thumb = $("#qty").attr("thumb");
	var qty = $("#qty").val();
	var size = $("input:checked[name='sizesCheckbox']").val();
	var color = $("input:checked[name='colorCheckbox']").val();
	if(pid>0 && qty >0 && size>0 && color>0)
	{
		$.ajax({
			type: "GET",
			url: "ajax_addcart.php",
			data: "type=add&pid="+pid+"&qty="+qty+"&size="+size+"&color="+color+"&thumb="+thumb,
			success: function(msg){
				if(msg>0)
				{
					updateCarts(msg);
					if($(btn).hasClass("buy_it"))
					{
						window.location.href = "carts.php?x="+Math.random();
					}
					else
					{
						alert("添加成功， 请再看看其他商品。");
					}
				}
				else
				{
					alert("添加失败， 请重试。");
				}
			}
		});
	}
	else
	{
		alert("请选择尺寸和颜色先。")
	}
})
</script>
</body>
</html>
