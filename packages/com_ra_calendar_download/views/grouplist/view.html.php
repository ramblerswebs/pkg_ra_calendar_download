<?php
/*
 * @package Ramblers Calendar Download (com_ra_calendar_download) for Joomla! >=3.0
 * @author Keith Grimes
 * @copyright (C) 2018 Keith Grimes
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/
defined('_JEXEC') or die;

// import Joomla view library
jimport('joomla.application.component.view');

class ra_calendar_downloadViewgrouplist extends JViewLegacy
{
	function display($tpl = null) {
		$this->items      = $this->get('Items');
		$this->pagination = $this->get('Pagination');
		$state            = $this->get('State');
		$this->sortColumn = $state->get('list.ordering');
		$this->sortDirection = $state->get('list.direction');
		if (count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		$this->addToolBar();
		//$lang = JFactory::getLanguage();
		//$lang->load('plg_system_ra_calendar_download.sys', JPATH_ADMINISTRATOR);
		parent::display($tpl);
	}

	protected function addToolBar()
	{
		JToolBarHelper::title(JText::_('COM_RA_CALENDAR_DOWNLOAD_HEADING_GROUPS'), 'ra_calendar_download');
		JToolBarHelper::divider();
		JToolBarHelper::custom('grouplist.download', 'download.png', 'download.png', 'COM_RA_CALENDAR_DOWNLOAD_REFRESH', false);
		JToolBarHelper::custom('grouplist.delete','delete.png','delete.png', 'Delete', true);
		//JToolBarHelper::deleteList('COM_RA_CALENDAR_DOWNLOAD_GROUPLIST_DELETE_CONFIRM','delete');
		JToolBarHelper::editList('group.edit');
		JToolBarHelper::addNew('group.add');
	}
}
