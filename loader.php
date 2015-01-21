<?php
/*
Plugin Name: OpenLinks
Plugin URI: http://www.bgextensions.bgvhod.com
Description: Network for sharing a free links
Version: 1.0.0
Author: BgExtensions
Author URI: http://www.bgextensions.bgvhod.com
License: GPL2
*/

/*  Copyright 2015  BgExtensions  (email : bgextensions@bgvhod.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function openlinks_init() {
    require( dirname( __FILE__ ) . '/openlinks.php' );
}
add_action( 'plugins_loaded', 'openlinks_init' );

function openlinks_locale_init () {
	$plugin_dir = basename(dirname(__FILE__));
	$locale = get_locale();
}
add_action ('plugins_loaded', 'openlinks_locale_init');

?>