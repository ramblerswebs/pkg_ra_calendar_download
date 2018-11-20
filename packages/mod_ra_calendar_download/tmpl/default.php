<?php defined('_JEXEC') or die;

/**
 * File       default.php
 * Created    1/17/14 12:29 PM
 * Author     Keith Grimes | webmaster@wiltsswindonramblers.org.uk | http://wiltsswindonramblers.org.uk
 * Support
 * License    GNU General Public License version 2, or later.
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// Ensure we load the full jQuery library with datepicker
JHtml::_('jquery.framework');
$document = JFactory::getDocument();
$document->addScript('https://code.jquery.com/ui/1.10.3/jquery-ui.js');
$document->addStyleSheet('https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css', 'text/css');
$document->addStyleSheet(JURI::base() . 'modules/mod_ra_calendar_download/scripts/css/ra_calendar_download.css', 'text/css');

// Add the script to enable datepicker
//$document->addScript(JURI::base() . 'modules/mod_ra_calendar_download/scripts/js/ra_calendar_download.js', "text/javascript");

// Get the configuration which was entered by the administrator
$ID = $params->get('id');
$leadingText = $params->get('leadingText');
$trailingText = $params->get('trailingText');
$buttonText = $params->get('buttonText');
$ramblers_groups = $params->get('groups');
$class = $params->get('moduleclass_sfx');
$rsstimeout = $params->get('rsstimeout');

?>
<div class="ra_calendar_download">
    <div id="<?php echo($ID)?>_leadingmessage" class="leadingtext textdescription"> <?php echo($leadingText); ?> </div>
    <form id='<?php echo($ID)?>_submitform'>
        <span class="item">
            <div class="groupselection">
                <select id="<?php echo($ID) ?>_group" name="<?php echo($ID) ?>_group" style="margin-top:5px">
                    <?php
                        // Now we need to add the groups into the list.
                        $count = count($ramblers_groups);
                        for ($i = 0; $i < $count; $i++) {
                            $current_group = $ramblers_groups[$i];
                            $group_parts = explode(':',$current_group);
                            echo('<option value="' . $group_parts[0] . '">' . $group_parts[1] . '</option>');
                        }
                    ?>
                </select>
            </div>
            <input type="submit" id="<?php echo($ID) ?>_submit" class="button" value="<?php echo($buttonText) ?>" />
            <a href="#" id="<?php echo($ID) ?>_more_options" style="text-align: right">More Options...</a>
            <span id="<?php echo($ID) ?>_download_details" style="display:none">
                <br/><br/>
                <label for="from_datepicker">Date Duration</label>
                <input type="text" id="<?php echo($ID) ?>_from_datepicker" name="<?php echo($ID) ?>_fromdate" value="07/03/2016">
                <input type="text" id="<?php echo($ID) ?>_to_datepicker" name="<?php echo($ID) ?>_todate" value="21/03/2016">
                <label>Walking Days & Grades</label>
                <table border="0" cellpadding="0" cellspacing="0">
                    <tr border="0">
                        <td border="0">
                            <input type="checkbox" name="<?php echo($ID) ?>_monday" checked="true" value="1">Monday<br/>
                            <input type="checkbox" name="<?php echo($ID) ?>_tuesday" checked="true" value="2">Tuesday<br/>
                            <input type="checkbox" name="<?php echo($ID) ?>_wednesday" checked="true" value="4">Wednesday<br/>
                            <input type="checkbox" name="<?php echo($ID) ?>_thursday" checked="true" value="8">Thursday<br/>
                            <input type="checkbox" name="<?php echo($ID) ?>_friday" checked="true" value="16">Friday<br/>
                            <input type="checkbox" name="<?php echo($ID) ?>_saturday" checked="true" value="32">Saturday<br/>
                            <input type="checkbox" name="<?php echo($ID) ?>_sunday" checked="true" value="64">Sunday
                        </td>
                        <td border="0">
                            <input type="checkbox" name="<?php echo($ID) ?>_easyaccess" checked="true" value="1">Easy Access<br/>
                            <input type="checkbox" name="<?php echo($ID) ?>_easy" checked="true" value="2">Easy<br/>
                            <input type="checkbox" name="<?php echo($ID) ?>_leisurely" checked="true" value="4">Leisurely<br/>
                            <input type="checkbox" name="<?php echo($ID) ?>_moderate" checked="true" value="8">Moderate<br/>
                            <input type="checkbox" name="<?php echo($ID) ?>_strenuous" checked="true" value="16">Strenuous<br/>
                            <input type="checkbox" name="<?php echo($ID) ?>_technical" checked="true" value="32">Technical<br/>
                        </td>
                    </tr>
                </table>
                <div>
                  <label for="<?php echo($ID) ?>_distance">Walk Distance:</label>
                  <input type="text" id="<?php echo($ID) ?>_distance" readonly style="border:0">
                </div>
                <div id="<?php echo($ID) ?>_slider-range"></div>
            </span>
            <span id="<?php echo($ID) ?>_hidden_details" style="display:none">
                <input type="text" id="<?php echo($ID) ?>_rsstimeout" value="<?php echo($rsstimeout)?>">
            </span>
        </span>
    </form>
    <div id='<?php echo($ID)?>_trailingmessage' class="trailingtext textdescription"> <?php echo($trailingText); ?> </div>
    <div>
        <a href="https://github.com/ramblerswebs/calendarmodule/wiki/6.-User-Guide" target="blank">Click Here for User Guide</a>
    </div>
    <div id='<?php echo($ID) ?>_usermessage'></div>
    <div id='<?php echo($ID) ?>_tryagain' style='display:none'>
        <br/>
        <input type="button" id="<?php echo($ID) ?>_tryagain" class="button" value="Try Again" />
        <br/>&nbsp;
    </div>
    <div style="display:none">
        <form id="<?php echo($ID) ?>_finalstage" action="<?php echo JURI::root() ?>modules/mod_ra_calendar_download/calendar_download.php" method="POST">
            <textarea id="<?php echo($ID) ?>_icsdata" name="icsdata"></textarea>
        </form>
    </div>
</div>
