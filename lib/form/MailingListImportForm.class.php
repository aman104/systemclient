<?php

class MailingListImportForm extends sfForm
{

  private $hash = false;

  public function setMailinglist($hash)
  {
  	$this->hash = $hash;
  }

  public function configure()
  {

  	$this->widgetSchema->setNameFormat('mailing_list[%s]');

  	$this->widgetSchema['file'] = new sfWidgetFormInputFile(array(
        'label' => 'Plik',
    ));
  	$this->widgetSchema['status'] = new sfWidgetFormSelect(array('choices' => array('1' => 'Do weryfikacji', '2' => 'Zweryfikowany')));

 	$this->validatorSchema['file'] = new sfValidatorFile(array(
        'required' => true,
        'path' => sfConfig::get('sf_upload_dir') . '/import',
        'max_size' => 50240000,
    ));

    $this->validatorSchema['status'] = new sfValidatorInteger(array('required' => true));

  	$this->setDefault('status', 1);


  }

  public function save()
  {
	$values = $this->getValues();

	$file = $values['file'];
	$filename = 'import_'.sha1($file->getOriginalName());
	$extension = '.csv';
	$path = sfConfig::get('sf_upload_dir') . '/import/' . $filename . $extension;
	$file->save($path);

	$import = array();
	if (($handle = fopen($path, "r")) !== FALSE) 
	{
	     while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
	     {
	        $tmp = array();
	        $tmp['email'] = $data[0];
	        if(isset($data[1]))
	        {
	        	$tmp['name'] = $data[1];
	        }
	        if(isset($data[2]))
	        {
	        	$tmp['phone'] = $data[2];
	        }
	        $import[] = $tmp;	        
	    }
	    fclose($handle);
	}

	foreach($import as $one)
	{
		SmEmail::addEmail($one, $this->hash, $values['status']);
	}
		
  }
}