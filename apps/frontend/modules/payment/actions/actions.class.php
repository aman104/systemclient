<?php

/**
 * payment actions.
 *
 * @package    SystemCore
 * @subpackage payment
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class paymentActions extends sfActions
{
 
  public function executeAdd(sfWebRequest $request)
  {
 	$points = (int)$request->getParameter('points');   
 	if($points > 0)
 	{
 		$payment = SmPayment::addPayment($points);
 		$this->redirect('user_invoice');
 	}
 	else
 	{
 		$this->redirect('user_payment');
 	}
  }
}
