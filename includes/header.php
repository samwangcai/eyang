<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script language="javascript" src="js/jquery-1.4.2.min.js"></script>
	<script language="javascript" src="js/jquery.ui.core.min.js"></script>
	<script language="javascript" src="js/jquery.ui.widget.min.js"></script>
	<script language="javascript" src="js/jquery.ui.mouse.min.js"></script>
	<script language="javascript" src="js/jquery.ui.draggable.js"></script>
	<script language="javascript" src="js/jquery.ui.sortable.js"></script>
	<script language="javascript" src="js/commend.js"></script>
	<script  src="xheditor/xheditor-en.min.js" type="text/javascript"></script>
	<div class="header">
		<div class="content">
			<a href="index.php"><img src="images/logo.gif" class="logo" /></a>
			<div class="topm">
				<a href="carts.php" class="cart_num"><? echo count($_SESSION["carts"]['items']); ?></a>
				
				Welcome!
				<?
				if($_SESSION['uid']!="")
				{
					echo "<a href='member.php'>".$_SESSION['uemail']."</a> or <a href='?doLogout=1'>Logout</a>. ";
				}
				else
				{
					echo "<a href='login.php'>Log In</a> or <a href='register.php'>create</a> an account. ";
				}
				?>
			</div>
			<div class="space"></div>
		</div>
	</div>
	
	<script language="javascript">
	function updateCarts(num)
	{
		$(".cart_num").html(num);
	}
	</script>