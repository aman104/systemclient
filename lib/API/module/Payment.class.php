<?php

class SmPayment extends SmModule {

	private static $url = '/payment';

	public static function addPayment($points)
	{
		$params = array();
		$params['points'] = $points;

		$connect = SmRestAPI::connect(parent::getAuth());
		return $connect->execPost(self::$url, $params);
	}

	public static function getPayment($hash = null)
	{		
		$params = array();
		if($hash)
		{
			$params['hash'] = $hash;	
		}

		$connect = SmRestAPI::connect(parent::getAuth());
		return $connect->execGet(self::$url, $params);	
	}

}