<?php
/*
 * @package Ramblers Calendar Download (com_ra_calendar_download) for Joomla! >=3.0
 * @author Keith Grimes
 * @copyright (C) 2018 Keith Grimes
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/
defined('_JEXEC') or die;

jimport('joomla.application.component.modeladmin');

class ra_calendar_downloadModelGroup extends JModelAdmin
{
	public function getTable($type = 'Group', $prefix = 'ra_calendar_downloadTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}
	public function getForm($data = array(), $loadData = true)
	{
		$form = $this->loadForm('com_ra_calendar_download.group', 'group',
			array('control' => 'jform', 'load_data' => $loadData));
               
                
		if (empty($form))
		{
			return false;
		}
		return $form;
	}
	protected function loadFormData()
	{
		$data = JFactory::getApplication()->getUserState('com_ra_calendar_download.edit.group.data', array());
		if (empty($data))
		{
			$data = $this->getItem();
		}
		return $data;
	}
}
