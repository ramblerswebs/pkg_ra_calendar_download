<?php
/*
 * @package Ramblers Calendar Download (com_ra_calendar_download) for Joomla! >=3.0
 * @author Keith Grimes
 * @copyright (C) 2018 Keith Grimes
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/
defined('_JEXEC') or die;
jimport('joomla.application.component.view');

class ra_calendar_downloadViewGroup extends JViewLegacy
{
	public function display($tpl = null)
	{
		$this->form = $this->get('Form');
		$this->item = $this->get('Item');
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		$this->addToolbar();
		$lang = JFactory::getLanguage();
		$lang->load('plg_system_ra_calendar_download.sys', JPATH_ADMINISTRATOR);
		$document = JFactory::getDocument();
		$document->addStyleSheet(JURI::base(true).DIRECTORY_SEPARATOR.
			'components'.DIRECTORY_SEPARATOR.
			'com_ra_calendar_download'.DIRECTORY_SEPARATOR.
			'views'.DIRECTORY_SEPARATOR.
			'group'.DIRECTORY_SEPARATOR.
			'tmpl'.DIRECTORY_SEPARATOR.
			'edit.css');
		parent::display($tpl);
	}
	protected function addToolbar()
	{
		$input = JFactory::getApplication()->input;
		$input->set('hidemainmenu', true);
		$isNew = ($this->item->id == 0);
              
		JToolBarHelper::title($isNew
			? JText::_('COM_RA_CALENDAR_DOWNLOAD_GROUP_NEW')
			: JText::_('COM_RA_CALENDAR_DOWNLOAD_GROUP_EDIT'));
		JToolBarHelper::save('group.save');
		JToolBarHelper::cancel('group.cancel', $isNew
			? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE');
	}
}
