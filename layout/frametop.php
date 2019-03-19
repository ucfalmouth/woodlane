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
 * A one column layout for the woodlane theme.
 *
 * @package    theme_woodlane
 * @copyright  2018 Falmouth University - Educational Technology
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$footeritems = array('&copy; ' . date('Y') . ' Falmouth University','<a href="">Copyright compliance</a>','<a href="">Educational Technology</a>','<a href="">Release notes</a>','<a href="">Portal</a>');
$logourl = $this->pix_url('logo_white_2x', 'theme');

$bodyattributes = $OUTPUT->body_attributes([]);

$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/';

$templatecontext = [
    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
    'output' => $OUTPUT,
    'bodyattributes' => $bodyattributes,
    'footeritems' => $footeritems,
    'logourl' => $logourl,
    'referer' => $referer,
];

echo $OUTPUT->render_from_template('theme_woodlane/frametop', $templatecontext);
