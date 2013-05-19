<?php

class SmStatistic extends SmModule {

	private static $url = '/statistic';

	public static function getLinks($hash)
	{
		$params = array();
		$params['method'] = 'links';
		$params['mailing_hash'] = $hash;
		$connect = SmRestAPI::connect(parent::getAuth());
		return $connect->execGet(self::$url, $params);
	}

	public static function getEmails($hash = false, $status = 1)
	{
		$params = array();
		$params['method'] = 'emails';
		$params['status'] = $status;
		$params['mailing_hash'] = $hash;
		$connect = SmRestAPI::connect(parent::getAuth());
		return $connect->execGet(self::$url, $params);
	}

	public static function getMailingListEmails($status = false)
	{
		$params = array();
		$params['method'] = 'mailing_list_emails';
		if($status)
		{
			$params['status'] = $status;		
		}
		$connect = SmRestAPI::connect(parent::getAuth());
		return $connect->execGet(self::$url, $params);
	}

}