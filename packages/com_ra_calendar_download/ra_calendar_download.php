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

$controller = JControllerLegacy::getInstance('ra_calendar_download');
$jinput = JFactory::getApplication()->input;
$task = $jinput->get('task', "", 'STR');
$controller->execute($task);
$controller->redirect();
