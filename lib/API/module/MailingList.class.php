<?php

class SmMailingList extends SmModule {

	private static $url = '/mailing_list';

	public static function addMailingList($name)
	{
		$params = array();
		$params['name'] = $name;
	

		$connect = SmRestAPI::connect(parent::getAuth());
		return $connect->execPost(self::$url, $params);
	}

	public static function editMailingList($hash, $name)
	{
		$params = array();
		$params['hash'] = $hash;
		$params['name'] = $name;

		$connect = SmRestAPI::connect(parent::getAuth());
		return $connect->execPut(self::$url, $params);
	}

	public static function deleteMailingList($hash)
	{
		$params = array();
		$params['hash'] = $hash;
		$connect = SmRestAPI::connect(parent::getAuth());
		return $connect->execDelete(self::$url, $params);
	}

	public static function clearMailingList($hash)
	{
		$params = array();
		$params['hash'] = $hash;
		$params['method'] = 'clear';
		$connect = SmRestAPI::connect(parent::getAuth());
		return $connect->execGet(self::$url, $params);
	}

	public static function getMailingList($hash = false)
	{
		$params = array();
		if($hash)
		{
			$params = array('hash' => $hash);
		}

		$connect = SmRestAPI::connect(parent::getAuth());
		return $connect->execGet(self::$url, $params);
	}	

}