<?php

class SmAuthRegisterFilter extends sfFilter
{
	public function execute($filterChain)
	{
		if(! $this->context->getUser()->isAnonymous())
		{
			$profile = $this->context->getUser()->getGuardUser()->getProfile();	
			
			$auth = new SmAuth($profile->getApiToken(), $profile->getApiSecret());
  			SmModule::setAuth($auth);  			
		}
		$filterChain->execute();
	}
}