<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Woodlane functions.
 *
 * @package    theme_woodlane
 * @copyright  2018 Falmouth University - Educational Technology
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();


function theme_woodlane_get_main_scss_content($theme) {                                                                                
    global $CFG;                                                                                                                    
 
    $scss = '';                                                                                                                     
    $filename = !empty($theme->settings->preset) ? $theme->settings->preset : null;                                                 
    $fs = get_file_storage();                                                                                                       
 
    $context = context_system::instance();                                                                                          
    if ($filename == 'default.scss') {                                                                                              
        // We still load the default preset files directly from the boost theme. No sense in duplicating them.                      
        $scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/default.scss');                                        
    } else if ($filename == 'plain.scss') {                                                                                         
        // We still load the default preset files directly from the boost theme. No sense in duplicating them.                      
        $scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/plain.scss');                                          
 
    } else if ($filename && ($presetfile = $fs->get_file($context->id, 'theme_woodlane', 'preset', 0, '/', $filename))) {              
        // This preset file was fetched from the file area for theme_photo and not theme_boost (see the line above).                
        $scss .= $presetfile->get_content();                                                                                        
    } else {                                                                                                                        
        // Safety fallback - maybe new installs etc.                                                                                
        $scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/default.scss');                                        
    }                                                                                                                               
 
    // Pre CSS - this is loaded AFTER any prescss from the setting but before the main scss.                                        
    $pre = file_get_contents($CFG->dirroot . '/theme/woodlane/scss/pre.scss');                                                         
    // Post CSS - this is loaded AFTER the main scss but before the extra scss from the setting.                                    
    $post = file_get_contents($CFG->dirroot . '/theme/woodlane/scss/post.scss');                                                       
 
    // Combine them together.                                                                                                       
    return $pre . "\n" . $scss . "\n" . $post;                                                                                      
}

function theme_woodlane_get_custom_footer() {
    $footeritems = array(
        '<a href="http://www.falmouth.ac.uk/" class="nav-link falu">&copy; ' . date('Y') . ' Falmouth University</a>',
        '<a href="http://et.falmouth.ac.uk" class="nav-link edtech">Educational Technology</a>',
        '<a href="https://falmouthac.sharepoint.com/ict/info/Shared%20Documents/Forms/AllItems.aspx?id=%2Fict%2Finfo%2FShared%20Documents%2FMoodle%20Copyright%20%26%20Data%20Protection%20Statement%2Epdf&parent=%2Fict%2Finfo%2FShared%20Documents&p=true&slrid=7e9f7d9e-50c7-6000-1297-403eb05f7bff" class="nav-link copyright">Copyright compliance</a>',
        '<a href="https://www.falmouth.ac.uk/data-privacy-learning-space-users" class="nav-link privacy">Privacy</a>',
        '<a href="https://docs.google.com/spreadsheets/d/e/2PACX-1vTyxlPQ1UGeI__wbqG0XUHo1c3SxOxLbqcPt-j_p1CHCVB0OdJ0DqLfxuPRPu343YHfuLEr-GrNzNno/pubhtml" data-url="https://spreadsheets.google.com/feeds/list/1iYMDWkX6jA38sxq6IAzkqIJkcxnzJbMSFSEB038lkp8/od6/public/values?alt=json" class="nav-link release-notes-link">Release notes</a>',
        '<a href="http://portal.falmouth.ac.uk" class="nav-link portal">Portal</a>'
    );
    return $footeritems;
}

