<?
session_start();
include"includes/config.php";
include"includes/globalFunc.php";
include"includes/getData.php";
include"includes/login_out.php";
include"includes/format_datas.php";

$table = $table_per."products";

$cates = get_cates();

if($_POST['cartSubmit'] == 1)
{
	if($_SESSION['uid']!="")
	{
		$_SESSION['carts']['total'] = $_POST['etotalfee'];
		$_SESSION['carts']['subTotal'] = $_POST['subTotal'];
		$_SESSION['carts']['length'] = $_POST['cartLength'];
		
		$pageGoTo = "checkout.php";
	}
	else
	{
		$pageGoTo = "login.php";
	}
	header(sprintf("Location: %s", $pageGoTo));
}
//var_dump($_SESSION['carts']['items']);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>shopping carts</title>
<link href="css/global.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="container">
	<? include "includes/header.php"; ?>
	<div class="space"></div>
	<div class="mainbody">
		<div class="content">
			<div class="navigation">
				Location:
				<a href="index.php">Homepage</a> / 
				<a href="carts.php">Shopping cart</a>
			</div>
			<div class="mainbox">
			<form action="<?php echo $loginFormAction; ?>" method="post" id="cartForm">
				<input type="hidden" name="cartSubmit" value="1" />
				<input type="hidden" name="cartLength" id="cartLength" value="0" />
				<input type="hidden" name="subTotal" id="subTotal" value="0" />
				<input type="hidden" name="etotalfee" id="etotalfee" value="0" />
				<table class="cartTable" cellpadding="0" cellspacing="0" border="0">
					<tr>
						<th width="520">产品信息</th>
						<th width="60">单价</th>
						<th width="60">数量</th>
						<th width="60">总价</th>
						<th width="40">操作</th>
					</tr>
					<?
					if(count($_SESSION['carts']['items']) >0)
					{
						foreach($_SESSION['carts']['items'] as $item)
						{
							if($item['pid'] >0)
							{
								$pid = $item['pid'];
								$product = getInfo($table, "id", $pid);
								$img = explode("||", $product['pictures']);
								?>
								<tr>
									<td class="product">
										<a href="products_detail.php?id=<? echo $pid; ?>"><img src="<? echo $folder.$img[$product['thumb']]; ?>" /></a>
										<a class="name" href="products_detail.php?id=<? echo $pid; ?>" title="<? echo $product['title']; ?>">
											<? echo $product['title']; ?>
										</a>
										<div class="features">
											<label>尺寸: <b><? echo format_features("sizes", $item['size'], $cates); ?></b></label>
											<label>颜色: <b><? echo format_features("color", $item['color'], $cates); ?></b></label>
										</div>
									</td>
									<td>￥ <span class="price"><? echo $item['price']; ?></span></td>
									<td><input type="text" id="pro" name="pro" class="qty" onchange="caculatePrices();" value="<? echo $item['qty']; ?>" /></td>
									<td>￥ <span class="price2"><? echo $item['price']*$item['qty']; ?></span></td>
									<td><a href="#" class="remove" size='<? echo $item['size']; ?>' color='<? echo $item['color']; ?>' pid="<? echo $pid; ?>"><img src="images/b_drop.png" /></a></td>
								</tr>
					<?
							}
						}
					}
					else
					{
						echo "<tr>";
						echo "<td class='product' colspan=5>没有数据。</td>";
						echo "</tr>";
					}
					?>
					<tr>
						<td class="subtotal title" colspan="5" style="text-align:right; padding-right:30px;">商品总计: &nbsp;  ￥ <span class="subtotalfee"></span></td>
					</tr>
				</table>
				<div class="pays">
					<a href="#" onclick='submit_cart(this);' class="cart_btn buy_it <? if(count($_SESSION['carts']['items']) <=0) { echo "buy_it_disabled"; } ?>"></a>
				</div>
			</form>
			</div>
			<div class="space"></div>
			<a href="products.php"><img src="images/index_title_hot.jpg" /></a>
			<?
			$first = 0;
			$maxNo = 4;
			$table = $table_per."products";
			$sql = " where 1 and is_hot=1 and is_show=1 order by add_time desc ";
			$data = getList($table, $sql, $first, $maxNo);
			if($data[0]>0)
			{
				for($a=1; $a<=$maxNo; $a++)
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
	<? include "includes/footer.php"; ?>
</div>
<script language="javascript">
$(".remove").bind("click",function(){
	var pid = $(this).attr("pid");
	var qty = $(this).parent().parent().find(".qty").val();
	var size = $(this).attr("size");
	var color = $(this).attr("color");
	$.ajax({
		type: "GET",
		url: "ajax_addcart.php",
		data: "type=delete&pid="+pid+"&qty="+qty+"&size="+size+"&color="+color,
		success: function(msg){
			updateCarts(msg);
			window.location.href = "carts.php";
		}
	});
})

$(document).ready(function(){
	caculatePrices();
});
function caculatePrices()
{
	var pricelist = $(".price");
	var qtylist = $(".qty");
	var total = 0;
	
	for(var a=0; a<qtylist.length; a++)
	{
		total += (parseInt($(qtylist[a]).val())*parseFloat($(pricelist[a]).html()));
	}
	var eshfee = parseFloat(total*0.00).toFixed(2);
	var taxfee = parseFloat(total*0.05).toFixed(2);
	
	$(".subtotalfee").html(total.toFixed(2));
	$("#subTotal").val(total.toFixed(2));
	$("#cartLength").val($(pricelist).length);
}

function submit_cart(obj)
{
	if($(obj).hasClass("buy_it_disabled"))
	{
		// alert();
	}
	else
	{
		$("#cartForm").submit();
	}
}
</script>
</body>
</html>

