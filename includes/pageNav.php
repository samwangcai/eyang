<?

function pageNav($first,$maxNo,$total)
{		
//��ʼֵ	
	$currentPage = 1 ;
	$pageNum = ceil($total / $maxNo);
	$url = getURL();
	
//ȥ��"&page=*"�ֶ�
	$tmp = explode("&amp;",$url);
	for($a=1;$a<count($tmp);$a++)
	{
		if(preg_match("/page=/i",$tmp[$a]))
		{
			$tmp[$a] = "";
		}
		else
		{
			$tmp[$a] = "&amp;".$tmp[$a];
		}
	}
	$url = implode("",$tmp);

//�жϵ�ǰҳ�Ƿ��ڿ��з�Χ֮��
	if(isset($_GET['page']))
	{
		if($_GET['page']<1) 
		{
			$currentPage = 1 ;
		}
		else if($_GET['page']>$pageNum)
		{
			$currentPage = $pageNum ;
		}
		else
		{
			$currentPage = $_GET['page'] ;
		}
	}
	
	printPageNav($currentPage,$pageNum,$url,$total);
}

function getURL()
{
	$regFormAction = $_SERVER['PHP_SELF'];
	if (isset($_SERVER['QUERY_STRING'])) {
	  $regFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
	}
	return $regFormAction;
}

function printPageNav($currentPage,$pageNum,$url,$total)
{
	echo "<div id=pageNav>";
	echo "<div id=page_left>";
	//echo "<div class='totalPage'>total : ".$total."</div>";
	echo "<div class='page_index'>";
	//echo "<div class='pageTitle' >current page : </div>";

	$maxNum = 10;
	$start = 1;
	$end = $pageNum;
	
	if($pageNum>$maxNum)
	{
		if($currentPage>5)
		{
			if(($currentPage+5) <= $pageNum)
			{
				$start = ($currentPage-5);
				$end = ($currentPage+5);
			}
			else
			{
				$start = $pageNum-10;
				$end = $pageNum;
			}
		}
		else if($currentPage<=5)
		{
			if(($currentPage+5) < $end)
			{
				$end = ($currentPage+5)+(6-$currentPage);
			}
		}
	}
	else
	{
		$start = 1;
		$end = $pageNum;
	}
	echo "<a href='".$url."&page=1'><img src='images/page_first.gif'></a>";
	for($a=$start;$a<=$end;$a++)
	{
		
		if($a==$currentPage)
		{
			echo "<span class='page_index_disable'>".$a."</span>";
		}
		else
		{
			echo "<a href='".$url."&page=".$a."'>".$a."</a>";
		}
	}
	echo "<a href='".$url."&page=".$pageNum."'><img src='images/page_last.gif'></a>";
	echo "</div>";
	echo "</div>";
	
	/*
	echo "<div id='page_right'>";
	if($currentPage==1)
	{
		echo "<div class='page_button_disable'>��һҳ</div>";
		echo "<div class='page_button_disable'>ǰһҳ</div>";
	}
	else
	{
		echo "<a href='".$url."page=1' class='page_button'>��һҳ</a>";
		echo "<a href='".$url."page=".($currentPage-1)."' class='page_button'>ǰһҳ</a>";
	}
	
	if($currentPage == $pageNum)
	{
		echo "<div class='page_button_disable'>��һҳ</div>";
		echo "<div class='page_button_disable'>���ҳ</div>";
	}
	else
	{
		echo "<a href='".$url."page=".($currentPage+1)."' class='page_button'>��һҳ</a>";
		echo "<a href='".$url."page=".$pageNum."' class='page_button'>���ҳ</a>";
	}
	echo "</div>";
	*/
	echo "</div>";
	
}


?>