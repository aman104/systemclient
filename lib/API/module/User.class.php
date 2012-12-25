<?php

class SmUser extends SmModule {

	private static $url = '/user';

	public static function getPoints()
	{
		$params = array();
		$params['method'] = 'points';
		$connect = SmRestAPI::connect(parent::getAuth());
		return $connect->execGet(self::$url, $params);
	}

	public static function createUser($_params)
	{
		$params = array();
		$params['email'] = $_params['email'];
		$params['username'] = $_params['username'];
		$params['first_name'] = $_params['first_name'];
		$params['last_name'] = $_params['last_name'];
		$params['street'] = $_params['street'];
		$params['post_code'] = $_params['post_code'];
		$params['city'] = $_params['city'];
		$params['country'] = $_params['country'];
		$params['phone'] = $_params['phone'];
		$params['nip'] = $_params['nip'];
		$params['is_company'] = ($_params['nip'] != "") ? 1 : 0;

		return SmRestAPI::RegisterUser($params);
	}


}