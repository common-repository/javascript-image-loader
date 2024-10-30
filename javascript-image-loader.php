<?php
/*
Plugin Name: javascript-image-loader
Description: Block images only loading images that user see.
Version: 1.0
Author: karrikas
Author URI: http://karrikas.com/
Author Email: karrikas@gmail.com
License: GPL3
*/

/*
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>. 
*/

// bertsio ulergarria kargatu
define('DEBUG_MODE', true);

include dirname(__FILE__) . '/functions.php';


add_action('init', 'jil_add_scripts');
add_action('get_header', 'jil_ob_start');