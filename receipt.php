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
include"includes/pageNav.php";

$id = $_GET['id']?$_GET['id']:"0";

$table = $table_per."order";
$order = getInfo($table, "id", $id);
if($order['id']!="")
{
	unset_carts();
}
$cates = get_cates();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/global.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>yatalite-tech admin page</title>
</head>
<body>
<div class="container">
	<? include"includes/header.php"; ?>
	<div class="mainbody">
		<div class="content">
			<div class="navigation">
				Location:
				<a href="index.php">Homepage</a> / 
				<a href="member.php">Member</a> / 
				<a href="order.php?id=<? echo $id; ?>">Order detail</a>
			</div>
			<?
			if($order['id']!="")
			{
				echo "<h2>交易成功。</h2>";
			?>
			<h2>收件人信息</h2>
			<table class="editTable" cellpadding="0" cellspacing="0" border="0">
				<tr>
					<th width="100">收件人: </th>
					<td><? echo $order['contact']; ?></td>
				</tr>
				<tr>
					<th>联系电话: </th>
					<td><? echo $order['phone']; ?></td>
				</tr>
				<tr>
					<th>收件地址: </th>
					<td><? echo $order['addr']; ?></td>
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
				$table = $table_per."carts";
				$sql = " where oid='$id' ;";
				$carts = getData($table, $sql);
				if($carts[0] >0)
				{
					for($a=1; $a<count($carts); $a++)
					{
						if($carts[$a]['id'] >0)
						{
							?>
							<tr>
								<td class="product">
									<a href="products_detail.php?id=<? echo $carts[$a]['pid']; ?>"><img src="<? echo $folder.$carts[$a]['thumb']; ?>" /></a>
									<a class="name" href="products_detail.php?id=<? echo $carts[$a]['pid']; ?>" title="<? echo $carts[$a]['pname']; ?>">
										<? echo $carts[$a]['pname']; ?>
									</a>
									<div class="features">
										<label>尺寸: <b><? echo format_features("sizes", $carts[$a]['size'], $cates); ?></b></label>
										<label>颜色: <b><? echo format_features("color", $carts[$a]['color'], $cates); ?></b></label>
									</div>
								</td>
								<td>￥ <span class="price"><? echo $carts[$a]['price']; ?></span></td>
								<td class="qty"><? echo $carts[$a]['quantity']; ?></td>
								<td>￥ <span class="price2"><? echo $carts[$a]['price']*$carts[$a]['quantity']; ?></span></td>
							</tr>
				<?
						}
					}
				}
				else
				{
					echo "<tr>";
					echo "<td class='product' colspan=4>没有数据。</td>";
					echo "</tr>";
				}
				?>
				<tr>
					<td class="subtotal title" colspan="4" style="text-align:right; padding-right:30px;">商品总计: &nbsp;  ￥ <span class="subtotalfee"><? echo $order['total']; ?></span></td>
				</tr>
			</table>
			<p>
				<input type="button" class="backBtn" value="  返回首页  " />
			</p>
			<?
			}
			else
			{
				echo "<h2>没有信息或交易失败。</h2>";
			?>
			<p>
				<input type="button" class="backCartBtn" value="  返回购物车  " />
				<input type="button" class="backBtn" value="  返回首页  " />
			</p>
			<?
			}
			?>
		</div>
		<div class="space"></div>
		</form>
	</div>
	<? include"includes/a_footer.php"; ?>
</div>
<script language="javascript">
$(".orderList").sortable({});
$(".backBtn").bind("click",function(){ window.location.href='index.php'; })
$(".backCartBtn").bind("click",function(){ window.location.href='carts.php'; })
</script>
</body>
</html>
