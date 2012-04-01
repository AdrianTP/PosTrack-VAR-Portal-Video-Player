<?php 
$tree = array(); 

function getDirectory($path = '.')
{
	$ignore = array( 'cgi-bin', '.', '..', '.DS_Store' );
	$dh = @opendir($path);
	$j = 0;
	$temp = array();
	
	while (false !== ($file = readdir($dh)))
	{
		if (!in_array($file, $ignore))
		{
			$temp[$j]['name'] = $file;
			
			if (is_dir("$path/$file"))
			{
				$temp[$j]['children'] = getDirectory("$path/$file");
			}
		}
		$j++;
	}
	return $temp;
	
	closedir($dh);
}

//$tree = getDirectory("./video"); 

//$type = 'desc'; 
 
function getSort(&$temp)
{ 
	global $type;
	
	switch ($type)
	{
		case 'desc':
			rsort($temp);
			break;
			
		case 'asc':
			sort($temp);
			break;
	}
	
	foreach ($temp as &$t)
	{
		if(is_array($t['children']))
		{
			getSort($t['children']);
		}
	}
} 
      
//getSort($tree); 
 
//print_r($tree);  // output  
?>
