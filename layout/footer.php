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
 * Footer
 *
 * @package    theme_woodlane
 * @copyright  2018 Falmouth University - Educational Technology
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$footerlinks = array('&copy; Falmouth University','<a href="">Copyright compliance</a>','<a href="https://et.falmouth.ac.uk/">Digital Learning</a>','<a class="release-notes"  href="https://docs.google.com/spreadsheets/d/e/2PACX-1vTyxlPQ1UGeI__wbqG0XUHo1c3SxOxLbqcPt-j_p1CHCVB0OdJ0DqLfxuPRPu343YHfuLEr-GrNzNno/pubhtml">Release notes</a>','<a href="https://portal.falmouth.ac.uk/">Portal</a>');

?>

<footer id="page-footer">
	
    <div class="footer-content">
        <ul class="footer-links">
            <?php
                foreach ($footerlinks as $footerlink) {
                    echo '<li>' . $footerlink . '</li>';
                }
            ?>
	
        <div class="footer-logo">
            <a href="http://www.falmouth.ac.uk/">
                <img src="<?php $this->pix_url('logo_white_2x', 'theme')?>" alt="Falmouth University logo">
            </a>
        </div>
    </div>
</footer>
