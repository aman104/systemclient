<?php

class MailingForm extends sfForm
{

  private $action = 'add';

  public function setAction($action)
  {
  	if(in_array($action, array('add', 'edit')));
  	$this->action = $action;
  	if($this->action == 'edit')
  	{
		$this->widgetSchema['hash'] = new sfWidgetFormInputHidden();
		$this->validatorSchema['hash'] = new sfValidatorString(array('required' => true));
  	}
  }

  public function getAction()
  {
  	return $this->action;
  }

	public function configure()
	{

		$this->widgetSchema->setNameFormat('mailing[%s]');

		$this->widgetSchema['title'] = new sfWidgetFormInputText(array(), array('style' => 'width: 600px;'));
  		$this->widgetSchema['title']->setLabel('Tytuł kreacji');
  		$this->validatorSchema['title'] = new sfValidatorString(array('required' => true));

  		$this->widgetSchema['html'] = new sfWidgetFormTextareaTinyMCE(array(), array('style' => 'width: 800px; height: 300px;'));
  		$this->widgetSchema['html']->setLabel('Wiadomość HTML');
  		$this->validatorSchema['html'] = new sfValidatorString(array('required' => true));

  		$this->widgetSchema['text'] = new sfWidgetFormTextarea(array(), array('style' => 'width: 800px; height: 300px;'));
  		$this->widgetSchema['text']->setLabel('Wiadomość tekstowa');
  		$this->validatorSchema['text'] = new sfValidatorString(array('required' => true));

  		$choices =  $this->getMailingListChoices();

  		$this->widgetSchema['mailing_list'] = new sfWidgetFormChoice(array(
  			'choices' => $choices,
  			'expanded' => true,
  			'multiple' => true,
  		));

  		$this->widgetSchema['mailing_list']->setLabel('Wybierz grupy docelowe');

  		//$this->validatorSchema['mailing_list'] = new sfValidatorString();

  		// print_r(($choices));
  		// print_r(array_keys($choices));
  		// exit;

  		 $this->validatorSchema['mailing_list'] = new sfValidatorChoice(array(
  		   'multiple' => true,
	       'choices' => array_keys($choices)
	     ));  		
	}

	public function setMailing($params)
	{
		//Tools::debug($params, true);
		$this->setDefault('title', $params['title']);
		$this->setDefault('html', $params['html']);
		$this->setDefault('text', $params['text']);

		$this->setDefault('hash', $params['hash']);

		$list = array();
		foreach($params['MailingLists'] as $one)
		{
			$list[] = $one['hash'];
		}

		$this->setDefault('mailing_list', $list);		

				

	}

	public function save()
	{
		$values = $this->getValues();
		if(isset($values['hash']))
		{
			$return = SmMailing::editMailing($values);
		}
		else
		{
			$return = SmMailing::addMailing($values);	
		}
		
		return json_decode($return, true);
	}

	private function getMailingListChoices()
	{
		$response = SmMailingList::getMailingList();
    	$mailingLists = json_decode($response, true);

    	$choices = array();
    	foreach($mailingLists as $one)
    	{
    		$choices[$one['hash']] = $one['name'];
    	}
    	return $choices;
	}
}