<?php

class SmRestAPI {

	private static $host = 'http://systemcore.sf.pl';
	
	const POST   = 'POST';	
	const GET    = 'GET';
	const PUT    = 'PUT';
	const DELETE = 'DELETE';

	const HTTP_OK = 200;
	const HTTP_CREATED = 201;
	const HTTP_ACEPTED = 202;

	private $headers = array();
	private $auth;
	private $format = 'array';

	public function setHeaders($_headers)
	{
    	$this->headers = $_headers;
	}

	private function __construct(SmAuth $_auth)
	{
		$this->auth = $_auth;
	}

	public static function connect(SmAuth $_auth)
	{
		return new self($_auth);
	}

	public function execPost($url, $params = array(), $format = 'array')
	{
	    return $this->exec(self::POST, $url, $params, $format);
	}

	public function execGet($url, $params = array(), $format = 'array')
	{
	    return $this->exec(self::GET, $url, $params, $format);
	}

	public function execPut($url, $params = array(), $format = 'array')
	{
		return $this->exec(self::PUT, $url, $params, $format);
	}

	public function execDelete($url, $params = array(), $format = 'array')
	{
		return $this->exec(self::DELETE, $url, $params, $format);
	}

	private function exec($type, $_url, $params = array(), $format = 'array')
	{

		$url = self::$host.$_url;

		$params['api_csrf'] = $this->auth->generateCsrf($params);
		$params['api_token'] = $this->auth->getApiToken();			

    	$headers = $this->headers;
	    $s = curl_init();



	    switch ($type) 
	    {

	        case self::DELETE:

	            curl_setopt($s, CURLOPT_URL, $url . '?' . http_build_query($params));
	            curl_setopt($s, CURLOPT_CUSTOMREQUEST, self::DELETE);
	            break;

        	case self::POST:

        		if($format == 'json')
			    {
			    	$url .= '?format=json';
			    	$params = json_encode($params);
			    	$params = array('json' => $params);
			    	//Tools::debug($params, true);
			    }

	            curl_setopt($s, CURLOPT_URL, $url);
            	curl_setopt($s, CURLOPT_POST, true);
            	curl_setopt($s, CURLOPT_POSTFIELDS, $params);
            	break;

	        case self::GET: 	

	            curl_setopt($s, CURLOPT_URL, $url . '?' . http_build_query($params));
	            break;

        	case self::PUT:

        		if($format == 'json')
			    {
			    	$url .= '?format=json';
			    	$params = json_encode($params);
			    	$params = array('json' => $params);			    
			    }
	            
            	curl_setopt($s, CURLOPT_CUSTOMREQUEST, self::PUT);
            	curl_setopt($s, CURLOPT_URL, $url);
            	curl_setopt($s, CURLOPT_POSTFIELDS, http_build_query($params));
            	break;

	    }

	    curl_setopt($s, CURLOPT_RETURNTRANSFER, true);
    	curl_setopt($s, CURLOPT_HTTPHEADER, $headers);
    	$_out = curl_exec($s);

	    $status = curl_getinfo($s, CURLINFO_HTTP_CODE);

	    curl_close($s);

	    switch ($status) 
	    {
        	case self::HTTP_OK:
	        case self::HTTP_CREATED:
	        case self::HTTP_ACEPTED:

	            $out = $_out;
	     		break;

        	default:
        		
            	throw new Http_Exception("http error: {$status}", $status);
    	}	

    	return $out;

	}

	public static function RegisterUser($params)
	{
		$url = self::$host.'/register';

		// echo $url.'<br />';
		// print_r($params);

		$s = curl_init();
		curl_setopt($s, CURLOPT_URL, $url);
    	curl_setopt($s, CURLOPT_POST, true);
    	curl_setopt($s, CURLOPT_POSTFIELDS, $params);
    	curl_setopt($s, CURLOPT_RETURNTRANSFER, true);    	
    	$_out = curl_exec($s);

	    $status = curl_getinfo($s, CURLINFO_HTTP_CODE);

	    curl_close($s);

	    switch ($status) 
	    {
        	case self::HTTP_OK:
	        case self::HTTP_CREATED:
	        case self::HTTP_ACEPTED:

	            $out = $_out;
	     		break;

        	default:



            	throw new Http_Exception("http error: {$status}", $status);
    	}	
    	return $out;
	}


}

class Http_Exception extends Exception 
{
    const NOT_MODIFIED = 304;
    const BAD_REQUEST = 400;
    const NOT_FOUND = 404;
    const NOT_ALOWED = 405;
    const CONFLICT = 409;
    const PRECONDITION_FAILED = 412;
    const INTERNAL_ERROR = 500;
}

