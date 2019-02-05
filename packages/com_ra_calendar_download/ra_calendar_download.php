<?php
/*
 * @package Ramblers Calendar Download (com_ra_calendar_download) for Joomla! >=3.0
 * @author Keith Grimes
 * @copyright (C) 2018 Keith Grimes
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/
defined('_JEXEC') or die;

JLoader::register('ra_calendar_downloadHelper', dirname(__FILE__).
	DIRECTORY_SEPARATOR.'helpers'.
	DIRECTORY_SEPARATOR.'ra_calendar_download.php');

jimport('joomla.application.component.controller');

JLog::addLogger(
       array(
            // Sets file name
            'text_file' => 'pkg_ra_calendar_download.log.php'
       ),
           // Sets messages of all log levels to be sent to the file
       JLog::ALL,
           // The log category/categories which should be recorded in this file
           // In this case, it's just the one category from our extension, still
           // we need to put it inside an array
       array('com_ra_calendar_download', 'mod_ra_calendar_download', 'pkg_ra_calendar_download')
   );

$controller = JControllerLegacy::getInstance('ra_calendar_download');
$jinput = JFactory::getApplication()->input;
$task = $jinput->get('task', "", 'STR');
$controller->execute($task);
$controller->redirect();
