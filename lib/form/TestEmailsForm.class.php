<?php 

class TestEmailsForm extends sfForm
{
	public function configure()
	{
		$this->widgetSchema->setNameFormat('emails[%s]');

		$this->widgetSchema['emails_1']	= new sfWidgetFormInputText();
		$this->widgetSchema['emails_1']->setLabel('Adres e-mail');
		$this->validatorSchema['emails_1'] = new sfValidatorEmail(array('required' => false));

		$this->widgetSchema['emails_2']	= new sfWidgetFormInputText();
		$this->widgetSchema['emails_2']->setLabel('Adres e-mail');
		$this->validatorSchema['emails_2'] = new sfValidatorEmail(array('required' => false));

		$this->widgetSchema['emails_3']	= new sfWidgetFormInputText();
		$this->widgetSchema['emails_3']->setLabel('Adres e-mail');
		$this->validatorSchema['emails_3'] = new sfValidatorEmail(array('required' => false));

		$this->widgetSchema['emails_4']	= new sfWidgetFormInputText();
		$this->widgetSchema['emails_4']->setLabel('Adres e-mail');
		$this->validatorSchema['emails_4'] = new sfValidatorEmail(array('required' => false));

		$this->widgetSchema['emails_5']	= new sfWidgetFormInputText();
		$this->widgetSchema['emails_5']->setLabel('Adres e-mail');
		$this->validatorSchema['emails_5'] = new sfValidatorEmail(array('required' => false));
	}

	public function setParamsDefaults($params)
    {
    	$i = 1;
    	foreach($params as $email)
    	{
    		$this->setDefault('emails_'.$i, $email['email']);
    		$i++;
    	}
    }

    public function save()
    {
    	$values = $this->getValues();
    	$response = SmUser::setTestEmails($values);
    	return json_decode($response, true);
    }
}