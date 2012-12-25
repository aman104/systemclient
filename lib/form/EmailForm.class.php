<?php 

class EmailForm extends sfForm
{

  private $action = 'add';

  public function setAction($action)
  {
  	if(in_array($action, array('add', 'edit')));
  	$this->action = $action;
  	if($this->action == 'edit')
  	{
  		$this->widgetSchema['email_tmp'] = new sfWidgetFormInputText(array(), array('disabled' => 'disabled'));
  		$this->widgetSchema['email_tmp']->setLabel('Adres e-mail');
  		$this->validatorSchema['email_tmp'] = new sfValidatorEmail(array('required' => false));
  		$this->widgetSchema['email'] = new sfWidgetFormInputHidden();
  		$this->validatorSchema['email'] = new sfValidatorEmail(array('required' => true));
  	}
  }

  public function getAction()
  {
  	return $this->action;
  }

  public function configure()
  {

  	$this->widgetSchema->setNameFormat('email[%s]');

  	$this->widgetSchema['email'] = new sfWidgetFormInputText();
  	$this->widgetSchema['email']->setLabel('Adres e-mail');
  	$this->widgetSchema['hash'] = new sfWidgetFormInputHidden();

  	$this->widgetSchema['name'] = new sfWidgetFormInputText();
  	$this->widgetSchema['name']->setLabel('Imię i nazwisko');
  	$this->widgetSchema['phone'] = new sfWidgetFormInputText();
  	$this->widgetSchema['phone']->setLabel('Telefon');
  	$this->widgetSchema['status'] = new sfWidgetFormSelect(array('choices' => array('1' => 'Do weryfikacji', '2' => 'Zweryfikowany')));

  	$this->validatorSchema['email'] = new sfValidatorEmail(array('required' => true));
  	$this->validatorSchema['hash'] = new sfValidatorString(array('required' => true));

  	$this->validatorSchema['name'] = new sfValidatorString(array('required' => false));
  	$this->validatorSchema['phone'] = new sfValidatorString(array('required' => false));
  	$this->validatorSchema['status'] = new sfValidatorInteger(array('required' => true));

  	$this->setDefault('status', 1);

  }

  public function setParamsDefaults($params)
  {  	
  	if($params['hash'])
  		$this->setDefault('hash', $params['hash']);

  	if(isset($params['email']))
  	{
  		$this->setDefault('email', $params['email']);
  		if($this->getAction() == 'edit')
  		{
  			$this->setDefault('email_tmp', $params['email']);	
  		}
  		
  	}
  		
  	if(isset($params['name']))
  		$this->setDefault('name', $params['name']);
  	if(isset($params['phone']))
  		$this->setDefault('phone', $params['phone']);
  	if(isset($params['status']))
  		$this->setDefault('status', $params['status']);
  }

  public function save()
  {
  	$values = $this->getValues();
  	if($this->getAction() == 'add')
  	{
  		if($values['hash'])
	  	{
	  		$return = SmEmail::addEmail($values, $values['hash'], $values['status']);
	  	}
	  	else
	  	{
	  		return null;
	  	}	
  	}
  	elseif($this->getAction() == 'edit')
  	{
  		$return = SmEmail::editEmail($values);
  	}

  	return json_decode($return, true);
  }
}