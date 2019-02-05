<?php
/*
 * @package Ramblers Calendar Download (com_ra_calendar_download) for Joomla! >=3.0
 * @author Keith Grimes
 * @copyright (C) 2018 Keith Grimes
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/
defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

require_once(JPATH_ROOT . '/modules/mod_ra_calendar_download/scripts/ra_calendar_download_feed.php');

class ra_calendar_downloadModelgrouplist extends JModelList
{

	public function __construct($config = array())
	{
		$config['filter_fields'] = array(
                        'b.id',
			'b.code',
			'b.description'
		);
		parent::__construct($config);
	}

	protected function getListQuery()
	{
        if (JDEBUG) { JLog::add("[models][grouplist] call to getListQuery", JLog::DEBUG, "com_ra_calendar_download"); }
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('b.id, b.code, b.description');
		$query->from('#__ra_groups b');
		$ordering  = $this->getState('list.ordering', 'b.code');
		$ordering  = (strcmp($ordering, '') == 0) ? 'b.code' : $ordering;
		$direction = $this->getState('list.direction', 'ASC');
		$direction = (strcmp($direction, '') == 0) ? 'ASC' : $direction;
		$query->order($db->escape($ordering).' '.$db->escape($direction));
		return $query;
	}

	public function getItems()
	{
		$result = parent::getItems();
		return $result;
	}

	protected function populateState($ordering = null, $direction = null) {
		parent::populateState('b.code', 'ASC');
	}

    public function download($pks)
	{
        if (JDEBUG) { JLog::add("[models][grouplist] call to download", JLog::DEBUG, "com_ra_calendar_download"); }
		$feed_class = new ra_calendar_download_feed();
		// $feed_class->truncate_table();
		$feed_class->update_records();
        unset($feed_class);

		return true;
	}

    public function delete($pks)
	{
        if (JDEBUG) { JLog::add("[models][grouplist] call to delete", JLog::DEBUG, "com_ra_calendar_download"); }

		$db = JFactory::getDbo();

		foreach ($pks as $id)
		{
			if (JDEBUG) { JLOG::add("[models][grouplist] delete id " . $id . " from database", JLog::DEBUG, "com_ra_calendar_download"); }

			// delete each key in turn
			$conditions = array($db->quoteName('id') . ' = ' . $id);
			$query = $db->getQuery(true);
			$query->delete($db->quoteName('#__ra_groups'));
			$query->where($conditions);
			$db->setQuery($query);

			$result = $db->execute();

			unset($conditions);
			unset($query);
		}
		unset($db);

		return true;
	}
        
        public function getTotal()
	{
		return parent::getTotal();
	}
}
