<?php

class mailingComponents extends sfComponents
{
	public function executeTabs(sfWebRequest $request)
	{
		$response = SmMailing::getMailings(1);
		$this->project = count(json_decode($response, true));

		$response = SmMailing::getMailings(2);
		$this->run = count(json_decode($response, true));

		$response = SmMailing::getMailings(3);
		$this->end = count(json_decode($response, true));
	}

	
	public function executeMailings(sfWebRequest $request)
	{
		$response = SmMailing::getMailings(1);
  		$this->mailings = json_decode($response, true);

  		$response = SmMailing::getMailings(2);
  		$this->run = json_decode($response, true);

  		$response = SmMailing::getMailings(3);
  		$this->end = json_decode($response, true);
	}
}