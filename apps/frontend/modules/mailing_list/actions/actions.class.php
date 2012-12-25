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
  	$response = SmMailingList::getMailingList();
    $this->mailingLists = json_decode($response, true);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new MailingListForm();

    if($request->isMethod('POST'))
    {
      $values = $request->getParameter('mailing_list');
      $this->form->bind($values);
      if($this->form->isValid())
      {
        $return = $this->form->save();
        $this->getUser()->setFlash('notice', 'Lista mailingowa została dodana', true);
        $this->redirect('mailing_list_show', array('hash' => $return['hash']));
      }
    }    
  }

  public function executeShow(sfWebRequest $request)
  {
    $hash = $request->getParameter('hash');
    
    $response = SmMailingList::getMailingList($hash);
    $this->mailingList = json_decode($response, true);

    $response = SmEmail::getEmailsByHash($hash);
    $this->emails = json_decode($response, true);

  }

  public function executeEdit(sfWebRequest $request)
  {
    $hash = $request->getParameter('hash');
    $response = SmMailingList::getMailingList($hash);
    $this->params = json_decode($response, true);

    $this->form = new MailingListForm();    

    if($request->isMethod('POST'))
    {
      $values = $request->getParameter('mailing_list');
      //Tools::debug($values, true);
      $this->form->bind($values);
      if($this->form->isValid())
      {
        $return = $this->form->save();
        $this->getUser()->setFlash('notice', 'Lista mailingowa została zedytowana', true);
        $this->redirect('mailing_list_edit', array('hash' => $return['hash']));
      }
    }
    else
    {          
      $this->form->setParamsDefaults($this->params);
    }
    
  }

  public function executeDelete(sfWebRequest $request)
  {
    $hash = $request->getParameter('hash');
    $response = SmMailingList::deleteMailingList($hash); 
    $this->getUser()->setFlash('notice', 'Lista mailingowa została usunięta', true);   

    $this->redirect('mailing_list');
  }

  public function executeClear(sfWebRequest $request)
  {
    $hash = $request->getParameter('hash');
    $response = SmMailingList::clearMailingList($hash);
    $this->getUser()->setFlash('notice', 'Lista mailingowa została wyczyszczona', true);  
    $this->redirect('mailing_list_show', array('hash' => $hash));
  }
}
