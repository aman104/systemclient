<?php

class UserForm extends sfForm
{

  private $action = 'add';


  public function setAction($action)
  {
    if(in_array($action, array('add', 'edit')));
    $this->action = $action;
    if($this->action == 'edit')
    {
      unset($this['username']);
      unset($this['email']);
      unset($this['password']);
      unset($this['password_again']);
    }
  }

  public function getAction()
  {
    return $this->action;
  }

  public function setParamsDefaults($params)
  {
      $this->setDefault('first_name', $params['first_name']);
      $this->setDefault('last_name', $params['last_name']);
      $this->setDefault('street', $params['street']);
      $this->setDefault('post_code', $params['post_code']);
      $this->setDefault('city', $params['city']);
      $this->setDefault('country', $params['country']);
      $this->setDefault('phone', $params['phone']);
      $this->setDefault('nip', $params['nip']);

  }

  public function configure()
  {

  	$this->widgetSchema->setNameFormat('user[%s]');

  	$this->widgetSchema['username'] = new sfWidgetFormInputText();
  	$this->widgetSchema['username']->setLabel('Login');
  	$this->validatorSchema['username'] = new sfValidatorString(array('required' => true));

  	$this->widgetSchema['email'] = new sfWidgetFormInputText();
  	$this->widgetSchema['email']->setLabel('Adres e-mail');
  	$this->validatorSchema['email'] = new sfValidatorEmail(array('required' => true));

  	$this->widgetSchema['password'] = new sfWidgetFormInputText();
  	$this->widgetSchema['password']->setLabel('Hasło');
  	$this->validatorSchema['password'] = new sfValidatorString(array('required' => true));
  	
  	$this->widgetSchema['password_again'] = new sfWidgetFormInputText();
  	$this->widgetSchema['password_again']->setLabel('Powtórz hasło');
  	$this->validatorSchema['password_again'] = new sfValidatorString(array('required' => true));
  	
  	$this->widgetSchema['first_name'] = new sfWidgetFormInputText();
  	$this->widgetSchema['first_name']->setLabel('Imię');
  	$this->validatorSchema['first_name'] = new sfValidatorString(array('required' => true));

	  $this->widgetSchema['last_name'] = new sfWidgetFormInputText();
  	$this->widgetSchema['last_name']->setLabel('Nazwisko');
  	$this->validatorSchema['last_name'] = new sfValidatorString(array('required' => true));

	  $this->widgetSchema['street'] = new sfWidgetFormInputText();
  	$this->widgetSchema['street']->setLabel('Ulica');  	
  	$this->validatorSchema['street'] = new sfValidatorString(array('required' => true));

  	$this->widgetSchema['post_code'] = new sfWidgetFormInputText();
  	$this->widgetSchema['post_code']->setLabel('Kod pocztowy');  	
  	$this->validatorSchema['post_code'] = new sfValidatorString(array('required' => true));

  	$this->widgetSchema['city'] = new sfWidgetFormInputText();
  	$this->widgetSchema['city']->setLabel('Miasto');
  	$this->validatorSchema['city'] = new sfValidatorString(array('required' => true));

  	$this->widgetSchema['country'] = new sfWidgetFormInputText();
  	$this->widgetSchema['country']->setLabel('Kraj');
  	$this->validatorSchema['country'] = new sfValidatorString(array('required' => true));

	  $this->widgetSchema['nip'] = new sfWidgetFormInputText();
  	$this->widgetSchema['nip']->setLabel('NIP');
  	$this->validatorSchema['nip'] = new sfValidatorString(array('required' => false));

  	$this->widgetSchema['phone'] = new sfWidgetFormInputText();
  	$this->widgetSchema['phone']->setLabel('Telefon');
  	$this->validatorSchema['phone'] = new sfValidatorString(array('required' => false));

  }

  public function save()
  {
  	$values = $this->getValues();  	
  	// $return = SmUser::createUser($values);	 
  	// echo $return;
  	// $return2 = json_decode($return, true);
  	// var_dump($return2);
  	// exit;
  	// Tools::debug($return, true);
  	// exit;
  	
    if($this->getAction() == 'edit')
    {
      $response = SmUser::editUser($values);
      $return = json_decode($response, true);
    }

    return $return;

  	// if(count($return) > 0)
  	// {
  	// 	$user = new sfGuardUser();
  	// 	$user->setUsername($return['username']);
  	// 	$user->setEmailAddress($return['email']);
  	// 	$user->setFirstName($return['fisrt_name']);
  	// 	$user->setLastName($return['last_name']);
  	// 	$user->setPassword($values['password']);
  	// 	$user->setIsActive(1);
  	// 	$user->save();

  	// 	$profile = new Profile();
  	// 	$profile->setApiToken($return['api_token']);
  	// 	$profile->setApiSecret($return['api_secret']);
  	// 	$profile->sfGuardUser($user);
  	// 	$profile->save();
  	// }

  	// Tools::debug($return, true);
  }

}