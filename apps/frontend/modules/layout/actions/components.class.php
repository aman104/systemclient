<?php

/**
 * layout components
 *
 * @package    cms
 * @subpackage layout
 * @author     Paweł Sałajczyk
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class layoutComponents extends sfComponents
{
	public function executeMenu(sfWebRequest $request)
	{
		
	}

	public function executeBreadcrumbs(sfWebRequest $request)
	{
		
	}

	public function executeFlash(sfWebRequest $request)
	{

	}

	public function executeFooter(sfWebRequest $request)
	{

	}

	public function executePoints(sfWebRequest $request)
	{
		$response = SmUser::getPoints(); 
		$this->points = json_decode($response, true);
	}

	public $TmpStats = array();

	public function executeStats(sfWebRequest $request)
	{
		
		if(count($this->TmpStats) == 0)
		{
			$this->stats = array();

			$response = SmMailing::getMailings(3);
	  		$this->stats['ended'] = count(json_decode($response, true));	

	  		$response = SmStatistic::getEmails(false, false);
	  		$this->stats['sended_emails'] = count(json_decode($response, true));

	  		$response = SmStatistic::getEmails(false, 4);
	  		$this->stats['opened_emails'] = count(json_decode($response, true));

	  		$response = SmStatistic::getMailingListEmails(false);
	  		$this->stats['emails'] = count(json_decode($response, true));

	  		$response = SmMailingList::getMailingList();
    		$this->stats['mailing_list'] = count(json_decode($response, true));

    		$response = SmUser::getPoints(); 
			$this->stats['points'] = json_decode($response, true);

	  		$this->TmpStats = $this->stats;

		}
		else
		{
			$this->stats = $this->TmpStats;
		}		
  		
	}


}