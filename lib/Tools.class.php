<?php

class Tools {
	
	static function debug($data, $exit = false)
	{
		echo '<pre>';
		print_r($data);
		echo '</pre>';
		if($exit)
		{
			exit;
		}
	}

	static function getPrice($g)
	{
		$p1 = substr($g, -2);
		$p2 = substr($g, strlen($p1));
		return $p1.','.$p2;
	}


}