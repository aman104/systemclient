<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once(dirname(__FILE__).'/../lib/BasesfGuardAuthActions.class.php');

/**
 *
 * @package    symfony
 * @subpackage plugin
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: actions.class.php 23319 2009-10-25 12:22:23Z Kris.Wallsmith $
 */
class sfGuardAuthActions extends BasesfGuardAuthActions
{
	public function executeSignin($request)
	{
		$this->setLayout('none');

		$this->registerForm = new UserForm();
		if($request->isMethod('post') && $request->getParameter('user'))
		{
			$values = $request->getParameter('user');
			$this->registerForm->bind($values);
			if($this->registerForm->isValid())
			{
				$user = $this->registerForm->save();
				if($user)
				{
					$this->getUser()->signIn($user);
					$this->getUser()->setFlash('notice', 'Zostałeś zalogowany');
					$this->redirect('@homepage');
				}
			}
		}

		parent::executeSignin($request);
	}
}
