<?php
/*
 * @package Ramblers Calendar Download (com_ra_calendar_download) for Joomla! >=3.0
 * @author Keith Grimes
 * @copyright (C) 2018 Keith Grimes
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/
defined('_JEXEC') or die;
//JHtml::_('behavior.tooltip');
?>
<form method="post" name="adminForm" id="adminForm">
	<fieldset class="adminform">
		<legend><?php echo JText::_('COM_RA_CALENDAR_DOWNLOAD_GROUP_DETAILS'); ?></legend>
		<ul class="adminformlist">
<?php foreach($this->form->getFieldset() as $field): ?>
			<li><?php echo $field->label; echo $field->input; ?></li>
<?php endforeach; ?>
		</ul>
	</fieldset>
	<input type="hidden" name="task" value="group.edit" />
	<?php echo JHtml::_('form.token'); ?>
</form>
