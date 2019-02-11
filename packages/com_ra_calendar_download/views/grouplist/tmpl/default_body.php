<?php
/*
 * @package Ramblers Calendar Download (com_ra_calendar_download) for Joomla! >=3.0
 * @author Keith Grimes
 * @copyright (C) 2018 Keith Grimes
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/
defined('_JEXEC') or die;
foreach ($this->items as $i => $item): ?>
<tr>
	<td><?php echo JHtml::_('grid.id', $i, $item->id); ?></td>
	<td><?php echo $item->code; ?></td>
	<td><?php echo $item->name; ?></td>
</tr>
<?php endforeach;
