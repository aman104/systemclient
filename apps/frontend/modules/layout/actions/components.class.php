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

	public function executeStats(sfWebRequest $request)
	{
		
	}
}