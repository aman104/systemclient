<?php

class VerifyForm extends sfForm
{
	public function configure()
	{
		$this->widgetSchema->setNameFormat('verify[%s]');

		$this->widgetSchema['text'] = new sfWidgetFormTextareaTinyMCE(array(), array('style' => 'width: 550px; height: 300px;'));
  		$this->widgetSchema['text']->setLabel('Wiadomość tekstowa');
  		$this->validatorSchema['text'] = new sfValidatorString(array('required' => true));

	}

	public function setParamsDefaults($text)
    {
    	$this->setDefault('text', $text);
    }

    public function save()
    {
    	$values = $this->getValues();
    	$response = SmUser::setVerifyText($values['text']);
    	return json_decode($response, true);
    }
}