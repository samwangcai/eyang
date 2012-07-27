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
include"includes/pageNav.php";

$type = $_GET['m']?$_GET['m']:"";
$page = $_GET['page']?$_GET['page']:"1";
$maxNo = 10;
$first = ($page-1)*$maxNo;
$table = $table_per."users";

$regFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $regFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ($_POST['submit'] == "register") {
	$a = checkInput("email", $email);
	if($a)
	{
		$exist_member = getInfo($table, "email", $_POST['email']);
		if ($exist_member['id']>0)
		{
			$msg = "邮箱已经注册过, 请换个邮箱.";
		}
		else
		{
			$date = date("Y-m-d H:i:s");
			$conn = mysql_pconnect($hostname_conn, $username_conn, $password_conn) or trigger_error(mysql_error(),E_USER_ERROR); 
			mysql_select_db($database_conn, $conn);
			
			$query=sprintf("INSERT INTO $table (statue,lever,email,name,password,contact,company,addr,phone,add_time) value ('actived',0,%s,%s,%s,%s,%s,%s,%s)",
							   GetSQLValueString($_POST['email'], "text"),
							   GetSQLValueString($_POST['name'], "text"),
							   GetSQLValueString($date, "password"),
							   GetSQLValueString($_POST['contact'], "text"),
							   GetSQLValueString($_POST['company'], "text"),
							   GetSQLValueString($_POST['addr'], "text"),
							   GetSQLValueString($_POST['phone'], "text"),
							   GetSQLValueString($date, "text"));
			mysql_select_db($database_conn, $conn);
			mysql_query("set names 'utf8'");
			$Result = mysql_query($query, $conn) or die(mysql_error());
			
			$_SESSION['uid'] = $_POST['id'];
			$_SESSION['uname'] = $_POST['name'];
			$_SESSION['uemail'] = $_POST['email'];
			$_SESSION['ucontact'] = $_POST['contact'];
			$_SESSION['ucompany'] = $_POST['company'];
			$_SESSION['uaddr'] = $_POST['addr'];
			$_SESSION['uphone'] = $_POST['phone'];
			
			$msg = "会员注册成功.";
			//$pageGoTo = "member.php";
			//header(sprintf("Location: %s", $pageGoto));
		}
	}
	else
	{
		$msg = "输入错误.";
	}
}
else if($_POST['submit'] == "edit")
{
	$exist_member = getInfo($table, "email", $_POST['email']);
	if ($exist_member['id'] > 0 && $exist_member['id'] != $_SESSION['uid'])
	{
		$msg = "邮箱已经注册过, 请换个邮箱.";
	}
	else
	{
		$conn = mysql_pconnect($hostname_conn, $username_conn, $password_conn) or trigger_error(mysql_error(),E_USER_ERROR); 
		mysql_select_db($database_conn, $conn);
		
		$query=sprintf("update $table set email=%s, name=%s, password=%s, contact=%s , company=%s, addr=%s ,phone=%s where id=%s",
						   GetSQLValueString($_POST['email'], "text"),
						   GetSQLValueString($_POST['name'], "text"),
						   GetSQLValueString($_POST['password'], "text"),
						   GetSQLValueString($_POST['contact'], "text"),
						   GetSQLValueString($_POST['company'], "text"),
						   GetSQLValueString($_POST['addr'], "text"),
						   GetSQLValueString($_POST['phone'], "text"),
						   GetSQLValueString($_SESSION['uid'], "text"));
		mysql_select_db($database_conn, $conn);
		mysql_query("set names 'utf8'");
		$Result = mysql_query($query, $conn) or die(mysql_error());
		
		$_SESSION['uname'] = $_POST['name'];
		$_SESSION['uemail'] = $_POST['email'];
		$_SESSION['ucontact'] = $_POST['contact'];
		$_SESSION['ucompany'] = $_POST['company'];
		$_SESSION['uaddr'] = $_POST['addr'];
		$_SESSION['uphone'] = $_POST['phone'];
		
		$msg = "会员信息修改成功.";
		//$pageGoTo = "member.php";
		//header(sprintf("Location: %s", $pageGoto));
	}
}

$sql = " where 1 and id='".$_SESSION['uid']."' limit 0,1 ;";
$member = getInfo($table, "id", $_SESSION['uid']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Member center</title>
<link href="css/global.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="container">
		<? include "includes/header.php"; ?>
		<div class="mainbody">
			<div class="content">
				<div class="navigation">
					Location：
					<a href="index.php">Homepage</a> / 
					<a href="member.php">Member center</a>
				</div>
				<h1>用户中心</h1>
				<h2>会员信息</h2>
				<form action="<?php echo $regFormAction; ?>" method="post" >
				<?
				echo "<p>$msg</p>";
				if($_SESSION['uid']>0)
				{
					if($type=="edit")
					{
						echo "<input name='submit' type='hidden' value='edit'>";
					}
					else
					{
						$type = "";
					}
				}
				else
				{
					$type = "register";
					echo "<input name='submit' type='hidden' value='register'>";
				}
				//echo $msg;
				if ($type != "")
				{
				?>
				<table border="0" cellpadding="0" cellspacing="0" class="normalTable">
				  <tr>
					<td width="120">用户邮箱: *</td>
					<td width="200"><input id="email" name="email" type="text" value="<? echo $member['email']; ?>" class="input1" ></td>
					<td></td>
				  </tr>
				  <tr>
					<td>密码: *</td>
					<td><input id="password" name="password" type="password" value="<? echo $member['password']; ?>" class="input1" ></td>
					<td></td>
				  </tr>
				  <tr>
					<td>确认密码: *</td>
					<td><input id="password2" name="password2" type="password" value="<? echo $member['password']; ?>" class="input1"></td>
					<td></td>
				  </tr>
				  <tr>
					<td>用户名:</td>
					<td><input id="name" name="name" type="text" value="<? echo $member['name']; ?>" class="input1"></td>
					<td></td>
				  </tr>
				  <tr>
					<td>联系人:</td>
					<td><input id="contact" name="contact" type="text" value="<? echo $member['contact']; ?>" class="input1"></td>
					<td></td>
				  </tr>
				  <tr>
					<td>公司名:</td>
					<td><input id="company" name="company" type="text" value="<? echo $member['company']; ?>" class="input1"></td>
					<td></td>
				  </tr>
				  <tr>
					<td>收件地址:</td>
					<td><input id="addr" name="addr" type="text" value="<? echo $member['addr']; ?>" class="input1"></td>
					<td></td>
				  </tr>
				  <tr>
					<td>联系手机:</td>
					<td><input id="phone" name="phone" type="text" value="<? echo $member['phone']; ?>" class="input1"></td>
					<td></td>
				  </tr>
				  <tr>
					<td colspan="3">
						<input type="submit" class="saveBtn" value="保存修改">
						<a href="member.php">返回</a>
					</td>
				  </tr>
				</table>
				<?
				}
				else
				{
				?>
				<table border="0" cellpadding="0" cellspacing="0" class="normalTable">
				<tr>
					<td width="120">用户邮箱: *</td>
					<td width="200"><? echo $member['email']; ?></td>
					<td></td>
				  </tr>
				  <tr>
					<td>用户名:</td>
					<td><? echo $member['name']; ?></td>
					<td></td>
				  </tr>
				  <tr>
					<td>联系人:</td>
					<td><? echo $member['contact']; ?></td>
					<td></td>
				  </tr>
				  <tr>
					<td>收件地址:</td>
					<td><? echo $member['addr']; ?></td>
					<td></td>
				  </tr>
				  <tr>
					<td>联系手机:</td>
					<td><? echo $member['phone']; ?></td>
					<td></td>
				  </tr>
				  <tr>
					<td colspan="3">
						<a href="member.php?m=edit">修改信息</a>
					</td>
				  </tr>
				</table>
				<?
				}
				?>
				</form>
				<?
				$table = $table_per."order";
				$sql = " where 1 and uid='".$_SESSION['uid']."' ";
				$data = getList($table, $sql, $first, $maxNo);
				if($data[0]>0)
				{
				?>
				<h2>交易记录</h2>
				<table border="0" class="cartTable" cellpadding="0" cellspacing="0" border="0" width="100%">
					<tr class="title" style="font-weight:bold;">
						<th colspan="4">最近交易列表</th>
					</tr>
					<?
						for($a=1;$a<count($data);$a++)
						{
							echo "<tr>";
							echo "<td width='120'>".$data[$a]['add_time']."</td>";
							echo "<td class='product' width='520'>";
							echo "<a href='receipt.php?id=".$data[$a]['id']."'><img src='".$folder.$data[$a]['thumb']."' /></a>";
							echo "<a class='name' href='receipt.php?id=".$data[$a]['id']."'>".$data[$a]['title']."</a>";
							echo "</td>";
							echo "<td width='50'>￥ ".$data[$a]['total']."</td>";
							echo "<td width='50'>".$data[$a]['statue']."</td>";
							echo "</tr>";
						}
					}
					?>
				</table>
				<?
				if($data[0]>$maxNo)
				{
					pageNav(($page-1)*$maxNo,$maxNo,$totalList);
				}
				?>
			</div>
			<div class="space"></div>
		</div>
		<? include "includes/footer_en.php"; ?>
	</div>	
</body>
</html>
