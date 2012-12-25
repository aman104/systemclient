<?php

/**
 * email actions.
 *
 * @package    SystemCore
 * @subpackage email
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class emailActions extends sfActions
{

  public function executeNew(sfWebRequest $request)
  {
    $hash = $request->getParameter('hash');

    $response = SmMailingList::getMailingList($hash);
    $this->mailingList = json_decode($response, true);

    $this->params = array('hash' => $this->mailingList['hash']);

    $this->form = new EmailForm();
    $this->form->setParamsDefaults($this->params);


    if($request->isMethod('POST'))
    {
      $values = $request->getParameter('email');      
      $this->form->bind($values);
      if($this->form->isValid())
      {
        $return = $this->form->save();
        $this->getUser()->setFlash('notice', 'Adres email został dodany', true);
        $this->redirect('mailing_list_show', array('hash' => $hash));
      }
    }
    
  }

  public function executeEdit(sfWebRequest $request)
  {
  	$tmp_email = $request->getGetParameter('email');  
  	$hash = $request->getParameter('hash');

    $response = SmMailingList::getMailingList($hash);
    $this->mailingList = json_decode($response, true);

  	$response = SmEmail::getEmail($tmp_email, $hash);
  	$this->email = json_decode($response, true);

    $this->form = new EmailForm();
    $this->form->setAction('edit');
    if($request->isMethod('POST'))
    {
      $values = $request->getPostParameter('email');      
      $this->form->bind($values);
      if($this->form->isValid())
      {
        $return = $this->form->save();
        $this->getUser()->setFlash('notice', 'Adres email został zedytowany', true);
        $this->redirect('email_edit', array('hash' => $hash, 'email' => $tmp_email));
      }
    }
    else
    {
      $this->form->setParamsDefaults($this->email);
    }

  }

  public function executeDelete(sfWebRequest $request)
  {
    $email = $request->getGetParameter('email');  
    $hash = $request->getParameter('hash');

    $response = SmEmail::deleteEmail($email, $hash);
    $this->getUser()->setFlash('notice', 'Adres email został usunięty', true);
    $this->redirect('mailing_list_show', array('hash' => $hash));
  }

  public function executeVerify(sfWebRequest $request)
  {
    $email = $request->getGetParameter('email');  
    $hash = $request->getParameter('hash');

    $response = SmEmail::verifyEmail($email, $hash);
    $this->getUser()->setFlash('notice', 'Link weryfikacyjny został wysłany', true);
    $this->redirect('mailing_list_show', array('hash' => $hash));
  }

}
