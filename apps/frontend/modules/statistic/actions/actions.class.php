<?php

/**
 * statistic actions.
 *
 * @package    SystemCore
 * @subpackage statistic
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class statisticActions extends sfActions
{

  public function executeIndex(sfWebRequest $request)
  {
    	$response = SmMailing::getMailings(2);
  		$tmp = json_decode($response, true);

  		$response = SmMailing::getMailings(3);
  		$tmp2 = json_decode($response, true);

  		$this->mailings = array_merge($tmp, $tmp2);
  }

  public function executeShow(sfWebRequest $request)
  {
  	$hash = $request->getParameter('hash');
  	$response = SmMailing::getMailing($hash);
  	$this->mailing = json_decode($response, true);

    $response = SmStatistic::getLinks($this->mailing['hash']);
    $this->links = json_decode($response, true);
    //Tools::debug($this->links, true);

  }
}
