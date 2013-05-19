<?php

class PayPalPayment 
{
	private $payment = false;
	private $bussines = 'psalajczyk-facilitator@gmail.com';

	private $return = 'http://systemcore.sf.pl/';
	private $cancel_return = 'http://systemcore.sf.pl/';
	private $notify_url = 'http://systemcore.sf.pl/';

	public function __construct($payment, $user)
	{
		$this->payment = $payment;
	}

	public function getUrl()
	{
        $item_name = 'Doladowanie konta ';
        $item_amount = Tools::getPrice($this->payment['price']);
        $querystring = '';

        $querystring .= "?business=".urlencode($this->bussines)."&";
        $querystring .= "item_name=".urlencode($item_name)."&";
        $querystring .= "item_number=".urlencode('1')."&";

        $querystring .= "amount=".urlencode($item_amount)."&";

        $querystring .= "cmd=".urlencode(stripslashes('_xclick'))."&";
        $querystring .= "no_note=".urlencode(stripslashes('1'))."&";
        $querystring .= "lc=".urlencode(stripslashes('PL'))."&";
        $querystring .= "currency_code=".urlencode(stripslashes('PLN'))."&";
        $querystring .= "bn=".urlencode(stripslashes('PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest'))."&";

        $this->return = $this->return.'payment/'.$this->payment['hash'];

        $querystring .= "return=".urlencode(stripslashes($this->return))."&";
        $querystring .= "cancel_return=".urlencode(stripslashes($this->cancel_return))."&";
        $querystring .= "notify_url=".urlencode($this->notify_url);

        $url = 'https://www.sandbox.paypal.com/cgi-bin/webscr'.$querystring;

        return $url;

	}
}