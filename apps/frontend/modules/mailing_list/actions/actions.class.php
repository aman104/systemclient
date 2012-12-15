<?php

/**
 * mailing_list actions.
 *
 * @package    SystemCore
 * @subpackage mailing_list
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mailing_listActions extends sfActions
{
 
  public function executeIndex(sfWebRequest $request)
  {
   
  	$api_token = 'WWERV234523V@Vv2345n57345q3453';
  	$api_secret = 'ERTNY567X4567$B56v34563456345n';

  	$auth = new SmAuth($api_token, $api_secret);

  	SmModule::setAuth($auth);
  	$response = SmMailingList::addMailingList('Nazwa testowa');
  	echo $response;
  	exit;

  	echo $auth->getApiSecret();

  	//SmMailingList::

  }
}
