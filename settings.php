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
 * Woodlane settings
 * 
 * @package    theme_woodlane
 * @copyright  2018 Falmouth University - Educational Technology
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
                                                             
defined('MOODLE_INTERNAL') || die();                                                                                                
 
if ($ADMIN->fulltree) {                                                                                                             
 
    $settings = new theme_boost_admin_settingspage_tabs('themesettingwoodlane', get_string('configtitle', 'theme_woodlane'));             
 
    $page = new admin_settingpage('theme_woodlane_general', get_string('generalsettings', 'theme_woodlane'));                             
 
    $name = 'theme_woodlane/preset';                                                                                                   
    $title = get_string('preset', 'theme_woodlane');                                                                                   
    $description = get_string('preset_desc', 'theme_woodlane');                                                                        
    $default = 'default.scss';                                                                                                      
 
    $context = context_system::instance();                                                                                          
    $fs = get_file_storage();                                                                                                       
    $files = $fs->get_area_files($context->id, 'theme_woodlane', 'preset', 0, 'itemid, filepath, filename', false);                    
 
    $choices = [];                                                                                                                  
    foreach ($files as $file) {                                                                                                     
        $choices[$file->get_filename()] = $file->get_filename();                                                                    
    }                                                                                                                               

    $choices['default.scss'] = 'default.scss';                                                                                      
    $choices['plain.scss'] = 'plain.scss';                                                                                          
 
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);                                     
    $setting->set_updatedcallback('theme_reset_all_caches');                                                                        
    $page->add($setting);                                                                                                           
 
    $name = 'theme_woodlane/presetfiles';                                                                                              
    $title = get_string('presetfiles','theme_woodlane');                                                                               
    $description = get_string('presetfiles_desc', 'theme_woodlane');                                                                   
 
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'preset', 0,                                         
        array('maxfiles' => 20, 'accepted_types' => array('.scss')));                                                               
    $page->add($setting);     
 
    $name = 'theme_woodlane/brandcolor';                                                                                               
    $title = get_string('brandcolor', 'theme_woodlane');                                                                               
    $description = get_string('brandcolor_desc', 'theme_woodlane');                                                                    
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');                                               
    $setting->set_updatedcallback('theme_reset_all_caches');                                                                        
    $page->add($setting);                                                                                                           
 
    $settings->add($page);                                                                                                          

    $page = new admin_settingpage('theme_woodlane_advanced', get_string('advancedsettings', 'theme_woodlane'));                           
 
    $setting = new admin_setting_configtextarea('theme_woodlane/scsspre',                                                              
        get_string('rawscsspre', 'theme_woodlane'), get_string('rawscsspre_desc', 'theme_woodlane'), '', PARAM_RAW);                      
    $setting->set_updatedcallback('theme_reset_all_caches');                                                                        
    $page->add($setting);                                                                                                           
 
    $setting = new admin_setting_configtextarea('theme_woodlane/scss', get_string('rawscss', 'theme_woodlane'),                           
        get_string('rawscss_desc', 'theme_woodlane'), '', PARAM_RAW);                                                                  
    $setting->set_updatedcallback('theme_reset_all_caches');                                                                        
    $page->add($setting);                                                                                                           
 
    $settings->add($page);
    
    $page = new admin_settingpage('theme_woodlane_custom', get_string('customsettings', 'theme_woodlane'));                           
 
    $setting = new admin_setting_configcheckbox('theme_woodlane/collapsetopics',                                                              
        get_string('collapsetopics', 'theme_woodlane'), get_string('collapsetopics_desc', 'theme_woodlane'), 0, 1, 0);
    $setting->set_updatedcallback('theme_reset_all_caches');                                                                        
    $page->add($setting);                                                                                                                                                                                                
 
    // $setting = new admin_setting_configcheckbox('theme_woodlane/expandcurrent',                                                              
    //     get_string('expandcurrent', 'theme_woodlane'), get_string('expandcurrent_desc', 'theme_woodlane'), 0, 1, 0);
    // $setting->set_updatedcallback('theme_reset_all_caches');
    // $page->add($setting);


    $sectionchoices = array();
    $sectionchoices['collapsed'] = 'All Collapsed';
    $sectionchoices['expandcurrent'] = 'Expand Current Section';
    $sectionchoices['expandoverview'] = 'Expand Overview Section';

    $setting = new admin_setting_configselect('theme_woodlane/expandtopicchoice',                                                              
        get_string('expandtopicchoice', 'theme_woodlane'), get_string('expandtopicchoice_desc', 'theme_woodlane'), 'collapsed', $sectionchoices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);

}