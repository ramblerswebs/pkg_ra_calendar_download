<?php
/*
 * @package Ramblers Calendar Download (com_ra_calendar_download) for Joomla! >=3.0
 * @author Keith Grimes
 * @copyright (C) 2018 Keith Grimes
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/

defined('_JEXEC') or die;

jimport('joomla.application.component.controlleradmin');

class ra_calendar_downloadControllerGroupList extends JControllerAdmin
{
	public function getModel($name = 'grouplist', $prefix = 'ra_calendar_downloadmodel')
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}
        
    function download()
	{
        if (JDEBUG) { JLog::add("[controller][grouplist] call to download - refresh the list", JLog::DEBUG, "com_ra_calendar_download"); }

		// Get the input
		$input = JFactory::getApplication()->input;
		$pks = $input->post->get('cid', array(), 'array');

		// Sanitize the input
		JArrayHelper::toInteger($pks);

		// Get the model
		$model = $this->getModel();

		$return = $model->download($pks);

		// Redirect to the list screen.
		$this->setRedirect(JRoute::_('index.php?option=com_ra_calendar_download&view=grouplist', false));

	}        

    function delete()
	{
        if (JDEBUG) { JLog::add("[controller][grouplist] call to delete the selected item(s)", JLog::DEBUG, "com_ra_calendar_download"); }

		// Get the input
		$input = JFactory::getApplication()->input;
		$pks = $input->post->get('cid', array(), 'array');

		// Sanitize the input
		JArrayHelper::toInteger($pks);

		// Get the model
		$model = $this->getModel();

		$return = $model->delete($pks);

		// Redirect to the list screen.
		$this->setRedirect(JRoute::_('index.php?option=com_ra_calendar_download&view=grouplist', false));

	}   
	          
    function remove()
	{
        if (JDEBUG) { JLog::add("[controller][grouplist] call to remove the selected item(s)", JLog::DEBUG, "com_ra_calendar_download"); }

		// Get the input
		$input = JFactory::getApplication()->input;
		$pks = $input->post->get('cid', array(), 'array');

		// Sanitize the input
		JArrayHelper::toInteger($pks);

		// Get the model
		$model = $this->getModel();

		$return = $model->delete($pks);

		// Redirect to the list screen.
		$this->setRedirect(JRoute::_('index.php?option=com_ra_calendar_download&view=grouplist', false));

	}             
}
 
