<?php

class SmMailingList extends SmModule {

	private $url = '/mailing_list';

	public static function addMailingList($name)
	{
		$params = array();
		$params['name'] = $name;

		$connect = SmRestAPI::connect(parent::getAuth());
		return $connect->execPut('/mailing_list', $params);
	}

	public static function editMailingList($hash, $name)
	{

	}

	public static function deleteMailingList($hash)
	{

	}

	public static function getMailingList($hash = false)
	{

	}	
	
}