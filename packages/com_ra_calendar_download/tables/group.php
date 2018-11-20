<?php
/*
 * @package Ramblers Calendar Download (com_ra_calendar_download) for Joomla! >=3.0
 * @author Keith Grimes
 * @copyright (C) 2018 Keith Grimes
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/
defined('_JEXEC') or die;

jimport('joomla.database.table');

class ra_calendar_downloadTableGroup extends JTable
{
	function __construct(&$db)
	{
		parent::__construct('#__ra_groups', 'id', $db);
	}
}
