<?php
/*
 * @package Ramblers Calendar Download (com_ra_calendar_download) for Joomla! >=3.0
 * @author Keith Grimes
 * @copyright (C) 2018 Keith Grimes
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/
defined('_JEXEC') or die;

// import Joomla controller library
jimport('joomla.application.component.controller');

class ra_calendar_downloadController extends JControllerLegacy
{
	function display($cachable = false, $urlparams = false)
	{
		$input = JFactory::getApplication()->input;
		$view = $input->getCmd('view', 'grouplist');

		ra_calendar_downloadHelper::addSubmenu($view);
		$input->set('view', $view);
		parent::display($cachable);
	}
        
        function delete()
        {
			if (JDEBUG) { JLog::add("[controller] delete called - remove entries from the database", JLog::DEBUG, "com_ra_calendar_download"); }
            $input = JFactory::getApplication()->input;
            // Obtain the list of group codes to delete
            $pks = $input->post->get('cid', array(), 'array');
            // Sanitize the input
            JArrayHelper::toInteger($pks);

            // TODO: Delete the codes from the database
            
            // Now redirect back to the main Group List page.
            $this->setRedirect('index.php?option=com_ra_calendar_download&view=grouplist');
        }
}
