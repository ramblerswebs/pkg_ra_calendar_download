<?php
/*
 * @package Ramblers Calendar Download (com_ra_calendar_download) for Joomla! >=3.0
 * @author Keith Grimes
 * @copyright (C) 2018 Keith Grimes
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/
defined('_JEXEC') or die;

class ra_calendar_downloadHelper
{
	public static function addSubmenu($vName)
	{
		JSubMenuHelper::addEntry(
			JText::_('COM_RA_CALENDAR_DOWNLOAD_SUBMENU_GROUPS'),
			'index.php?option=com_ra_calendar_download&view=grouplist',
			$vName == 'grouplist'
		);
	}
}
