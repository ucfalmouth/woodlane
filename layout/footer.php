<?php
/**
 * Aardvark theme for Moodle - Material-inspired theme based on bootstrap.
 *
 * DO NOT MODIFY THIS THEME!
 * COPY IT FIRST, THEN RENAME THE COPY AND MODIFY IT INSTEAD.
 *
 * For full information about creating Moodle themes, see:
 * http://docs.moodle.org/dev/Themes_2.0
 *
 * Footer
 *
 * @package   theme_aardvark
 * @author    Shaun Daubney
 * @copyright 2017 Newbury College
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$footerlinks = array('&copy; Falmouth University','<a href="">Copyright compliance</a>','<a href="https://et.falmouth.ac.uk/">Educational Technology</a>','<a class="release-notes"  href="https://docs.google.com/spreadsheets/d/e/2PACX-1vTyxlPQ1UGeI__wbqG0XUHo1c3SxOxLbqcPt-j_p1CHCVB0OdJ0DqLfxuPRPu343YHfuLEr-GrNzNno/pubhtml">Release notes</a>','<a href="https://portal.falmouth.ac.uk/">Portal</a>');

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
