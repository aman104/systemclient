<?php

class MailingListForm extends sfForm
{

  public function configure()
  {

  	$this->widgetSchema->setNameFormat('mailing_list[%s]');

  	$this->widgetSchema['name'] = new sfWidgetFormInputText();
    $this->widgetSchema['name']->setLabel('Nazwa grupy');
  	$this->widgetSchema['hash'] = new sfWidgetFormInputHidden();

  	$this->validatorSchema['name'] = new sfValidatorString(array('required' => true));
  	$this->validatorSchema['hash'] = new sfValidatorString(array('required' => false));

  }

  public function setParamsDefaults($params)
  {  	
  	$this->setDefault('name', $params['name']);
  	$this->setDefault('hash', $params['hash']);
  }

  public function save()
  {
  	$values = $this->getValues();
  	if($values['hash'])
  	{
  		$return = SmMailingList::editMailingList($values['hash'], $values['name']);
  	}
  	else
  	{
  		$return = SmMailingList::addMailingList($values['name']);	
  	}
  	return json_decode($return, true);
  }

}