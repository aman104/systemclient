<?php

class SmMailing extends SmModule {
		
	private static $url = '/mailing';

	public static function addMailing($_params, $status = 1)
	{	
		$params = array();
		$params['title'] = $_params['title'];
		$params['html'] = $_params['html'];
		$params['text'] = $_params['text'];
		$params['css'] = $_params['css'];
		$params['name_from'] = $_params['name_from'];
		$params['email_from'] = $_params['email_from'];
		$params['mailing_list'] = $_params['mailing_list'];
		$params['status'] = $status;

		$connect = SmRestAPI::connect(parent::getAuth());
		return $connect->execPost(self::$url, $params, 'json');
	}

	public static function editMailing($_params, $status = 1)
	{	
		$params = array();
		$params['hash'] = $_params['hash'];
		$params['title'] = $_params['title'];
		$params['html'] = $_params['html'];
		$params['text'] = $_params['text'];
		$params['css'] = $_params['css'];
		$params['name_from'] = $_params['name_from'];
		$params['email_from'] = $_params['email_from'];
		$params['mailing_list'] = $_params['mailing_list'];
		$params['status'] = $status;

		$connect = SmRestAPI::connect(parent::getAuth());
		return $connect->execPost(self::$url, $params, 'json');
	}


	public static function getMailings($status = 1)
	{
		$params = array();
		$params['status'] = $status;

		$connect = SmRestAPI::connect(parent::getAuth());
		return $connect->execGet(self::$url, $params);
	}

	public static function getMailing($hash)
	{
		$params = array();
		$params['hash'] = $hash;

		$connect = SmRestAPI::connect(parent::getAuth());
		return $connect->execGet(self::$url, $params);
	}

	public static function runMailing($hash)
	{
		$params = array();
		$params['hash'] = $hash;
		$params['method'] = 'run';

		$connect = SmRestAPI::connect(parent::getAuth());
		return $connect->execGet(self::$url, $params);
	}

	public static function deleteMailing($hash)
	{
		$params = array();
		$params['hash'] = $hash;

		$connect = SmRestAPI::connect(parent::getAuth());
		return $connect->execDelete(self::$url, $params);
	}

	public static function testMailing($hash)
	{
		$params = array();
		$params['hash'] = $hash;
		$params['method'] = 'test';

		$connect = SmRestAPI::connect(parent::getAuth());
		return $connect->execGet(self::$url, $params);
	}	

}