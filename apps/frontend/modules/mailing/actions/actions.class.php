<?php

/**
 * mailing actions.
 *
 * @package    SystemCore
 * @subpackage mailing
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mailingActions extends sfActions
{

  public function executeIndex(sfWebRequest $request)
  {  
  	$response = SmMailing::getMailings(1);
  	$this->mailings = json_decode($response, true);

  }

  public function executeRun(sfWebRequest $request)
  {
  	$response = SmMailing::getMailings(2);
  	$this->mailings = json_decode($response, true);
  }

  public function executeEnd(sfWebRequest $request)
  {
  	$response = SmMailing::getMailings(3);
  	$this->mailings = json_decode($response, true);	
  }

  public function executeSetRun(sfWebRequest $request)
  {
  	$hash = $request->getParameter('hash');
  	$response = SmMailing::runMailing($hash);
  	$mailing = json_decode($response, true);
  	$this->redirect('@mailing_run');
  }

  public function executeNew(sfWebRequest $request)
  {

  	$this->form = new MailingForm();

  	if($request->isMethod('post'))
  	{
  		$values = $request->getParameter('mailing');
  		$this->form->bind($values);
  		if($this->form->isValid())
  		{
  			$return = $this->form->save();
  			$this->getUser()->setFlash('notice', 'Kreacja mailingowa została zapisana', true);
        $this->redirect('mailing_edit', array('hash' => $return['hash']));
  		}
      else
      {
        $this->getUser()->setFlash('error', 'Wypełnij poprawnie wszystkie wymagane pola', true);
      }
  	}

  }

  public function executeEdit(sfWebRequest $request)
  {

  	$hash = $request->getParameter('hash');
  	$response = SmMailing::getMailing($hash);
  	$this->mailing = json_decode($response, true);

  	$this->form = new MailingForm();
  	$this->form->setAction('edit');
 	  if($request->isMethod('post'))
  	{
  		$values = $request->getParameter('mailing');
  		$this->form->bind($values);
  		if($this->form->isValid())
  		{
  			$return = $this->form->save();
  			$this->getUser()->setFlash('notice', 'Kreacja mailingowa została zapisana', true);
        	$this->redirect('mailing_edit', array('hash' => $return['hash']));
  		}
      else
      {
        $this->getUser()->setFlash('error', 'Wypełnij poprawnie wszystkie wymagane pola', true);
      }
  	}
  	else
  	{
  		$this->form->setMailing($this->mailing);	
  	}
  	
  }

  public function executeDelete(sfWebRequest $request)
  {
  	$hash = $request->getParameter('hash');
  	$response = SmMailing::deleteMailing($hash);
  	$this->mailing = json_decode($response, true);
  	$this->getUser()->setFlash('notice', 'Kreacja mailingowa została usunięta', true);
  	$this->redirect('mailing');
  }

  public function executeTest(sfWebRequest $request)
  {
    $hash = $request->getParameter('hash');
    $response = SmMailing::testMailing($hash);
    $this->mailing = json_decode($response, true);
    $this->getUser()->setFlash('notice', 'Test został wysłany', true);
    $this->redirect($request->getReferer());
  }
}
