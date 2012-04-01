<?php
$tree = getDirectory("./video");
$type = 'asc';
getSort($tree);

$count = 0;

for ($i = 0; $i < sizeof($tree); $i++)
{
	//substr_replace($var, 'bob', -7, -1)
	if (stristr($tree[$i]['name'],'.flv'))
	{
		$temp = substr_replace($tree[$i]['name'],'',-4,4);
	}
	else
	{
		$temp = $tree[$i]['name'];
	}
	$tempZ = str_replace('_',' ',$temp);
	
	//Comment out this section to cease accommodating Welcome.flv
	/* if (!stristr($tree[$i]['name'],'Welcome'))
	{
		print "\r\n\r\n\t\t\t\t<section>\r\n\r\n\t\t\t\t\t<h2 onselectstart='return false;' ondragstart='return false;' onclick=\"Show_UL('list" . $count . "')\">" . $temp . "</h2>\r\n\r\n\t\t\t\t\t<ul id=list" . $i . ">";
	} */
	//Uncomment this line to cease accommodating Welcome.flv
	print "\r\n\t\t\t\t\t\t<section>\r\n\r\n\t\t\t\t\t\t\t<a href='#' onselectstart='return false;' ondragstart='return false;' onclick=\"Show_UL('list" . $count . "')\"><h2>" . $tempZ . "</h2></a>\r\n\r\n\t\t\t\t\t\t\t<ul id='list" . $i . "'>";
	//print "\r\n\t\t\t\t\t\t<section>\r\n\r\n\t\t\t\t\t\t\t<h2 onselectstart='return false;' ondragstart='return false;' onclick=\"Show_UL('list" . $count . "')\">" . $temp . "</h2>\r\n\r\n\t\t\t\t\t\t\t<ul id=list" . $i . ">";
	
	$count++;
	
	$temp2 = $tree[$i]['children'];
	
	for ($j = 0; $j < sizeof($temp2); $j++)
	{
		if (stristr($temp2[$j]['name'],'.flv'))
		{
			$temp3 = substr_replace($temp2[$j]['name'],'',-4,4);
		}
		else
		{
			$temp3 = $temp2[$j]['name'];
		}
		$temp4 = str_replace('_',' ',$temp3);
		//$temp3 = $temp2[$j]['name'];
		print "\r\n\r\n\t\t\t\t\t\t\t\t<li onselectstart='return false;' ondragstart='return false;' onmouseover=\"this.style.cursor = 'pointer';\" onclick=\"Change_Video('" . $temp . "','" . $temp3 . "','flv');\"><a href='#'>" . $temp4 . "</a></li>";
	}
	print "\r\n\r\n\t\t\t\t\t\t\t</ul>\r\n\r\n\t\t\t\t\t\t</section>\r\n";
}
?>
