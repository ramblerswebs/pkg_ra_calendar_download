<?php
/*
 * @package Ramblers Calendar Download (com_ra_calendar_download) for Joomla! >=3.0
 * @author Keith Grimes
 * @copyright (C) 2018 Keith Grimes
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/
defined('_JEXEC') or die;
?>
<tr class="sortable">
	<th width="20">
		<input
			type="checkbox"
			name="toggle"
			value=""
			onclick="checkAll(<?php echo count($this->items); ?>);"
		/>
	</th>
	<th>
		<?php echo JHTML::_('grid.sort',
			'COM_RA_CALENDAR_DOWNLOAD_HEADING_CODE',
			'b.code',
			$this->sortDirection,
			$this->sortColumn); ?>
	</th>
	<th>
		<?php echo JHTML::_('grid.sort',
			'COM_RA_CALENDAR_DOWNLOAD_HEADING_DESCRIPTION',
			'b.description',
			$this->sortDirection,
			$this->sortColumn); ?>
	</th>
</tr>
