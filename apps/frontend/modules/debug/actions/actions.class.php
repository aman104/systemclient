<?php

/**
 * debug actions.
 *
 * @package    SystemCore
 * @subpackage debug
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class debugActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeDebug(sfWebRequest $request)
  {
    $response = SmMailing::getMailings(3);
	$this->project = count(json_decode($response, true));

	$response = SmMailing::getMailings(3);
	$this->run = count(json_decode($response, true));

	$response = SmMailing::getMailings(3);
	$this->end = count(json_decode($response, true));

	echo $this->project.'<br />';
	echo ($this->run).'<br />';
	echo $this->end.'<br />';

    exit;
  }
}
