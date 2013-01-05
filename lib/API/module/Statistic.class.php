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

}