<?php

class SmModule {
	
	private static $auth;

	public static function setAuth(SmAuth $_auth)
	{
		self::$auth = $_auth;
	}

	protected static function getAuth()
	{
		return self::$auth;
	}

}