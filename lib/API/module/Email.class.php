<?php

class SmEmail extends SmModule {
		
	private static $url = '/email';

	public static function addEmail($_params, $mailing_list_hash, $status = 1)
	{	
		$params = array();
		$params['email'] = $_params['email'];
		$params['name'] = $_params['name'];
		$params['phone'] = $_params['phone'];
		$params['status'] = $status;
		$params['hash'] = $mailing_list_hash;

		$connect = SmRestAPI::connect(parent::getAuth());
		return $connect->execPost(self::$url, $params);
	}

	public static function getEmail($email, $hash)
	{
		$params = array();
		$params['email'] = $email;
		$params['hash'] = $hash;

		$connect = SmRestAPI::connect(parent::getAuth());
		return $connect->execGet(self::$url, $params);
	}

	public static function deleteEmail($email, $hash)
	{
		$params = array();
		$params['email'] = $email;
		$params['hash'] = $hash;

		$connect = SmRestAPI::connect(parent::getAuth());
		return $connect->execDelete(self::$url, $params);
	}

	public static function editEmail($_params)
	{
		$params = array();
		$params['email'] = $_params['email'];
		$params['hash'] = $_params['hash'];
		$params['name'] = $_params['name'];
		$params['phone'] = $_params['phone'];
		$params['status'] = $_params['status'];

		$connect = SmRestAPI::connect(parent::getAuth());
		return $connect->execPut(self::$url, $params);
	}

	public static function getEmailsByHash($hash)
	{
		$params = array();
		$params['hash'] = $hash;

		$connect = SmRestAPI::connect(parent::getAuth());
		return $connect->execGet(self::$url, $params);
	}

	public static function verifyEmail($email, $hash)
	{
		$params = array();
		$params['email'] = $email;
		$params['hash'] = $hash;
		$params['method'] = 'verify';

		$connect = SmRestAPI::connect(parent::getAuth());
		return $connect->execGet(self::$url, $params);
	}

}