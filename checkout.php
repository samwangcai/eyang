<?
session_start();
if(!isset($_SESSION['uid'])||$_SESSION['uid']=="")
{
	$pageGoto = "login.php";
	header(sprintf("Location: %s", $pageGoto));
}

include"includes/config.php";
include"includes/globalFunc.php";
include"includes/getData.php";
include"includes/login_out.php";
include"includes/format_datas.php";

$table = $table_per."products";

$cates = get_cates();

if($_POST['cartSubmit'] == 1 && $_SESSION['uid'])
{
	$_SESSION['carts']['uid'] = $_SESSION['uid'];
	$_SESSION['carts']['contact'] = $_POST['contact'];
	$_SESSION['carts']['phone'] = $_POST['phone'];
	$_SESSION['carts']['addr'] = $_POST['addr'];
	$result = add_order($_SESSION['carts']);
	if($result!="" && strlen($result) > 5)
	{
		$pageGoTo = "receipt.php?id=$result";
		header(sprintf("Location: %s", $pageGoTo));
	}
	else
	{
		$msg = "交易失败， 请重试。";
	}
}
//var_dump($_SESSION['carts']['items']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>checkout</title>
<link href="css/global.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="container">
	<? include "includes/header.php"; ?>
	<div class="mainbody">
		<div class="content">
			<div class="navigation">
				Location:
				<a href="index.php">Homepage</a> / 
				<a href="carts.php">Shopping cart</a> / 
				<a href="checkout.php">Checkout Confirm</a>
			</div>
			<div class="mainbox">
				<p><? echo $msg; ?></p>
				<form action="<?php echo $loginFormAction; ?>" method="post" id="cartForm">		
					<input type="hidden" name="cartSubmit" value="1" />
					<h2>请确认收件人信息</h2>
					<table class="editTable" cellpadding="0" cellspacing="0" border="0">
						<tr>
							<th width="100">收件人: *</th>
							<td><input type="text" id="contact" name="contact" value="<? echo $_SESSION['ucontact']; ?>" onchange="set_pay_btn();" /></td>
						</tr>
						<tr>
							<th>联系电话: *</th>
							<td><input type="text" id="phone" name="phone" value="<? echo $_SESSION['uphone']; ?>" onchange="set_pay_btn();"  /></td>
						</tr>
						<tr>
							<th>收件地址: *</th>
							<td><input type="text" id="addr" name="addr" value="<? echo $_SESSION['uaddr']; ?>" onchange="set_pay_btn();"  /></td>
						</tr>
					</table>
					<p>&nbsp;</p>
					<table class="cartTable" cellpadding="0" cellspacing="0" border="0">
						<tr>
							<th width="560">产品信息</th>
							<th width="60">单价</th>
							<th width="60">数量</th>
							<th width="60">总价</th>
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
											<a href="product.php?id=<? echo $pid; ?>"><img src="<? echo $folder.$img[$product['thumb']]; ?>" /></a>
											<a class="name" href="product.php?id=<? echo $pid; ?>" title="<? echo $product['title']; ?>">
												<? echo $product['title']; ?>
											</a>
											<div class="features">
												<label>尺寸: <b><? echo format_features("sizes", $item['size'], $cates); ?></b></label>
												<label>颜色: <b><? echo format_features("color", $item['color'], $cates); ?></b></label>
											</div>
										</td>
										<td>￥ <span class="price"><? echo $item['price']; ?></span></td>
										<td class="qty"><? echo $item['qty']; ?></td>
										<td>￥ <span class="price2"><? echo $item['price']*$item['qty']; ?></span></td>
									</tr>
						<?
								}
							}
						}
						else
						{
							echo "<tr>";
							echo "<td class='msg' colspan=4>没有数据。</td>";
							echo "</tr>";
						}
						?>
						<tr>
							<td class="subtotal title" colspan="4" style="text-align:right; padding-right:30px;">商品总计: &nbsp;  ￥ <span class="subtotalfee"></span></td>
						</tr>
					</table>
					<div class="pays">
						<a href="###" onclick='submit_order(this);' class="cart_btn pay_it"></a>
					</div>
				</form>
			</div>
		</div>	
	</div>
</div>
<script language="javascript">
$(document).ready(function(){
	caculatePrices();
	set_pay_btn();
});
function caculatePrices()
{
	var pricelist = $(".price");
	var qtylist = $(".qty");
	var total = 0;
	
	for(var a=0; a<qtylist.length; a++)
	{
		total += (parseInt($(qtylist[a]).html())*parseFloat($(pricelist[a]).html()));
	}
	var eshfee = parseFloat(total*0.00).toFixed(2);
	var taxfee = parseFloat(total*0.05).toFixed(2);
	
	$(".subtotalfee").html(total.toFixed(2));
}
function set_pay_btn()
{
	var list = $(".product");
	var contact = $("#contact").val();
	var phone = $("#phone").val();
	var addr = $("#addr").val();
	if(list.length == 0 || contact == "" || phone == "" || addr == "")
	{
		$(".pay_it").addClass("pay_it_disabled"); 
	}
}
function submit_order(obj)
{
	if($(obj).hasClass("pay_it_disabled"))
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
