<?
session_start();
include"includes/config.php";
include"includes/getData.php";
include"includes/globalFunc.php";

$id = $_GET['pid']?$_GET['pid']:"0"; 
$qty = $_GET['qty']?$_GET['qty']:"0";
$size = $_GET['size']?$_GET['size']:""; 
$color = $_GET['color']?$_GET['color']:"";
$thumb = $_GET['thumb']?$_GET['thumb']:"";
$type = $_GET['type']?$_GET['type']:"add";

if(!isset($_SESSION['carts']['items']))
{
	$_SESSION['carts']['items'] = array();
}

if($id>0 && $qty>0)
{
	if($type=="add")
	{
		if($size!="" && $color != "")
		{
			$table = $table_per."products";
			$colum = "id";
			$product = getInfo($table, "id", $id);
			$added = 0;
			for($a=0; $a<count($_SESSION['carts']['items']); $a++)
			{
				if($_SESSION['carts']['items'][$a]['pid'] == $id && $_SESSION['carts']['items'][$a]['size'] == $size && $_SESSION['carts']['items'][$a]['color'] == $color)
				{
					$_SESSION['carts']['items'][$a]['qty'] += $qty;
					$_SESSION['carts']['items'][$a]['total'] += $qty*$_SESSION['carts']['items'][$a]['price'];
					$added = 1;
					break;
				}
			}
			
			if($added == 0)
			{
				$product = array("pid" => $id, "qty" => $qty, "size" => $size, "thumb" => $thumb, "color" => $color, "title" => $product['title'], "price" => $product['sale_price'], "total" => $product['sale_price']*$qty);
				array_push($_SESSION['carts']['items'], $product);
			}
			echo count($_SESSION['carts']['items']);
		}
		else
		{
			echo 0;
		}
	}
	else if($type =="delete")
	{
		foreach($_SESSION['carts']['items'] as $item)
		{
			if($item['pid'] == $id)
			{
				$ind = array_search($item, $_SESSION['carts']['items']);
				$_SESSION['carts']['items'][$ind] = NULL;
				unset($_SESSION['carts']['items'][$ind]);
				break;
			}
		}
		echo count($_SESSION['carts']['items']);
	}
}
else
{
	echo 0;
}
?>