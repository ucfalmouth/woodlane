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
 * Woodlane config.
 *
 * @package    theme_woodlane
 * @copyright  2018 Falmouth University - Educational Technology
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
                                                          
defined('MOODLE_INTERNAL') || die();

require_once(__DIR__ . '/lib.php');
                                                                                            
$THEME->name = 'woodlane';                                                                                                                                                      
$THEME->sheets = [];                                                                                                                                                                                
$THEME->editor_sheets = [];                                                                                                                                                                               
$THEME->parents = ['boost'];                                                                                                                          
$THEME->enable_dock = false;                                                                                                                            
$THEME->yuicssmodules = array();                                                                                                            
$THEME->requiredblocks = '';   
$THEME->addblockposition = BLOCK_ADDBLOCK_POSITION_FLATNAV;


$THEME->layouts = [

    'base' => array(
        'file' => 'columns2.php',
        'regions' => array(),
    ),
    'standard' => array(
        'file' => 'columns2.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
    ),
    'course' => array(
        'file' => 'course.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
        'options' => array('langmenu' => true),
    ),
    'coursecategory' => array(
        'file' => 'columns2.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
    ),
    'incourse' => array(
        'file' => 'columns2.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
    ),
    'frontpage' => array(
        'file' => 'mainpage.php',
        'regions' => array('side-pre', 'home-list'),
        'defaultregion' => 'side-pre',
        'options' => array('nonavbar' => true)
    ),
    'admin' => array(
        'file' => 'admin.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
    ),
    'mydashboard' => array(
        'file' => 'columns2.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
        'options' => array('nonavbar' => true, 'langmenu' => true),
    ),
    'mypublic' => array(
        'file' => 'columns2.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
        'options' => array('nonavbar' => true, 'langmenu' => true),
    ),
    'login' => array(
        'file' => 'login.php',
        'regions' => array(),
        'options' => array('langmenu' => true),
    ),
    'popup' => array(
        'file' => 'columns1.php',
        'regions' => array(),
        'options' => array('nofooter' => true, 'nonavbar' => true),
    ),
    'frametop' => array(
        'file' => 'frametop.php',
        'regions' => array(),
        'options' => array('nofooter' => true, 'nocoursefooter' => true),
    ),
    'embedded' => array(
        'file' => 'embedded.php',
        'regions' => array()
    ),
    'maintenance' => array(
        'file' => 'maintenance.php',
        'regions' => array(),
    ),
    'print' => array(
        'file' => 'columns1.php',
        'regions' => array(),
        'options' => array('nofooter' => true, 'nonavbar' => false),
    ),
    'redirect' => array(
        'file' => 'embedded.php',
        'regions' => array(),
    ),
    'report' => array(
        'file' => 'columns2.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
    ),
    'secure' => array(
        'file' => 'secure.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre'
    )
];
           
$THEME->rendererfactory = 'theme_overridden_renderer_factory';

$THEME->scss = function($theme) {                                                                                                   
    return theme_woodlane_get_main_scss_content($theme);                                                                               
};

$THEME->footeritems = function(){
    return theme_woodlane_get_custom_footer();
};

$THEME->rarrow = '<i class="fas fa-caret-right"></i>';
$THEME->larrow = '<i class="fas fa-caret-left"></i>';
$THEME->uarrow = '<i class="fas fa-caret-up"></i>';
$THEME->darrow = '<i class="fas fa-caret-down"></i>';