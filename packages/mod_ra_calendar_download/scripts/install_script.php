<?php
// No direct access to this file
defined('_JEXEC') or die;

require_once('ra_calendar_download_feed.php');
/**
 * Script file of HelloWorld module
 */
class mod_ra_calendar_downloadInstallerScript
{
	/**
	 * Method to install the extension
	 * $parent is the class calling this method
	 *
	 * @return void
	 */
	function install($parent)
	{
			JFactory::getApplication()->enqueueMessage('Please wait while we download/update the current Ramblers Area & Group Information');
            // Get a db connection.
			$feed = new ra_calendar_download_feed();
			//$feed->truncate_table();
			//$feed->update_records();
			unset($feed);
			JFactory::getApplication()->enqueueMessage('Ramblers Group Codes have been updated.');
	}

	/**
	 * Method to uninstall the extension
	 * $parent is the class calling this method
	 *
	 * @return void
	 */
	function uninstall($parent)
	{
		JFactory::getApplication()->enqueueMessage('The module has been uninstalled');
	}

	/**
	 * Method to update the extension
	 * $parent is the class calling this method
	 *
	 * @return void
	 */
	function update($parent)
	{
            // Update the Group List
            $this->install($parent);
        }

	/**
	 * Method to run before an install/update/uninstall method
	 * $parent is the class calling this method
	 * $type is the type of change (install, update or discover_install)
	 *
	 * @return void
	 */
	function preflight($type, $parent)
	{
		// echo '<p>Anything here happens before the installation/update/uninstallation of the module</p>';
	}

	/**
	 * Method to run after an install/update/uninstall method
	 * $parent is the class calling this method
	 * $type is the type of change (install, update or discover_install)
	 *
	 * @return void
	 */
	function postflight($type, $parent)
	{
		//echo '<p>Anything here happens after the installation/update/uninstallation of the module</p>';
	}
}
