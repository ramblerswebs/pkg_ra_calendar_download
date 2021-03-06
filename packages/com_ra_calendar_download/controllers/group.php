<?php
/*
 * @package Ramblers Calendar Download (com_ra_calendar_download) for Joomla! >=3.0
 * @author Keith Grimes
 * @copyright (C) 2018 Keith Grimes
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

class ra_calendar_downloadControllerGroup extends JControllerForm
{
	public function save($key = null, $urlVar = null)
	{
        if (JDEBUG) { JLog::add("[controller][group] call to save the selected item", JLog::DEBUG, "com_ra_calendar_download"); }
		$return = parent::save($key, $urlVar);
		$this->setRedirect('index.php?option=com_ra_calendar_download&view=grouplist');
		return $return;
	}
	public function cancel($key = null)
	{
        if (JDEBUG) { JLog::add("[controller][group] call to cancel the current edit", JLog::DEBUG, "com_ra_calendar_download"); }
		$return = parent::cancel($key);
		$this->setRedirect('index.php?option=com_ra_calendar_download&view=grouplist');
		return $return;
	}

}
