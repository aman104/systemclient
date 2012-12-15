<?php

class SmRestAPI {

	private $host = 'http://systemcore.sf.pl';
	
	const POST   = 'POST';	
	const GET    = 'GET';
	const PUT    = 'PUT';
	const DELETE = 'DELETE';

	const HTTP_OK = 200;
	const HTTP_CREATED = 201;
	const HTTP_ACEPTED = 202;

	private $headers = array();
	private $auth;

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

	public function execPost($url, $params = array())
	{
	    return $this->exec(self::POST, $url, $params);
	}

	public function execGet($url, $params = array())
	{
	    return $this->exec(self::GET, $url, $params);
	}

	public function execPut($url, $params = array())
	{
		return $this->exec(self::PUT, $url, $params);
	}

	public function execDelete($url, $params = array())
	{
		return $this->exec(self::DELETE, $url, $params);
	}

	private function exec($type, $_url, $params = array())
	{

		$url = $this->host.$_url;

		$params['api_csrf'] = $this->auth->generateCsrf($params);
		$params['api_token'] = $this->auth->getApiToken();			

    	$headers = $this->headers;
	    $s = curl_init();

	    echo $url.'<br />';
	    echo '<pre>';
	    print_r($params);
	    echo '</pre>';
	    //exit;

	    switch ($type) 
	    {

	        case self::DELETE:

	            curl_setopt($s, CURLOPT_URL, $url . '?' . http_build_query($params));
	            curl_setopt($s, CURLOPT_CUSTOMREQUEST, self::DELETE);
	            break;

        	case self::POST:

	            curl_setopt($s, CURLOPT_URL, $url);
            	curl_setopt($s, CURLOPT_POST, true);
            	curl_setopt($s, CURLOPT_POSTFIELDS, $params);
            	break;

	        case self::GET: 	

	            curl_setopt($s, CURLOPT_URL, $url . '?' . http_build_query($params));
	            break;

        	case self::PUT:

	            curl_setopt($s, CURLOPT_URL, $url);
            	curl_setopt($s, CURLOPT_POST, true);
            	curl_setopt($s, CURLOPT_POSTFIELDS, $params);
            	curl_setopt($s, CURLOPT_CUSTOMREQUEST, self::PUT);
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


}

