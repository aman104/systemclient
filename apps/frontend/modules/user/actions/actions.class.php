<?php

/**
 * user actions.
 *
 * @package    SystemCore
 * @subpackage user
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userActions extends sfActions
{

  public function executeIndex(sfWebRequest $request)
  {
    $this->form = new UserForm();
    $this->form->setAction('edit');

    $response = SmUser::getUser();
    $params = json_decode($response, true);

    if($request->isMethod('POST'))
    {
      $values = $request->getParameter('user');
      $this->form->bind($values);
      if($this->form->isValid())
      {
        $return = $this->form->save();
        $this->getUser()->setFlash('notice', 'Profil został zapisany', true);
        $this->redirect('@user');
      }
    }
    else
    {     
    	$this->form->setParamsDefaults($params);
    }
  }

  public function executePassword(sfWebRequest $request)
  {
  	$this->form = new sfGuardChangeUserPasswordForm($this->getUser()->getGuardUser());
  	if($request->isMethod('post'))
    {
        $values = $request->getParameter('sf_guard_user');
        $this->form->bind($values);
        if($this->form->isValid())
        {
          $this->form->save();          
          $this->getUser()->setFlash('notice', 'Hasło zostało zmienione', true);                         
        }
        else
        {
          $this->getUser()->setFlash('error', 'Popraw błędy', true);               
        }
      }
  }

  public function executeEmails(sfWebRequest $request)
  {
  	$this->form = new TestEmailsForm();
  	$response = SmUser::getTestEmails();
  	$emails = json_decode($response, true);

  	if($request->isMethod('POST'))
    {
      $values = $request->getParameter('emails');
      $this->form->bind($values);
      if($this->form->isValid())
      {
        $return = $this->form->save();
        $this->getUser()->setFlash('notice', 'Adresy testowe zostały zapisane', true);
        $this->redirect('@user_emails');
      }
    }
    else
    {     
    	$this->form->setParamsDefaults($emails);
    }
  }

  public function executeVerify(sfWebRequest $request)
  {
  	$this->form = new VerifyForm();
  	$response = SmUser::getVerifyText();
  	$text = json_decode($response, true);

  	if($request->isMethod('POST'))
    {
      $values = $request->getParameter('verify');
      $this->form->bind($values);
      if($this->form->isValid())
      {
        $return = $this->form->save();
        $this->getUser()->setFlash('notice', 'Mail weryfikacyjny został zapisany', true);
        $this->redirect('@user_verify');
      }
    }
    else
    {     
    	$this->form->setParamsDefaults($text);
    }
  }

  public function executePayment(sfWebRequest $request)
  {

  }

  public function executeInvoice(sfWebRequest $request)
  {
  	 $response = SmPayment::getPayment();
     $this->payments = json_decode($response, true);
  }

}
