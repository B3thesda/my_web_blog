<?php

function my_longer($str1, $str2)
{
	$long1 = strlen($str1);
	$long2 = strlen($str2);

	if ($long1 > $long2)
	{
		return $long1;
	}
	elseif ($long2 > $long1) 
	{
		return $long2;
	}
	elseif ($long1 == $long2) 
	{
		return $long2;
	}
	else
	{
		return -1;
	}
}
?>