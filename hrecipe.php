<?php 
/*
 * Plugin Name: hRecipe
 * Plugin URI: http://hrecipe.com/
 * Description: Fast and easy recipe formatting for Google Rich Snippet display and better search results click throughs. Leverage your recipe SEO with the hrecipe microformatting! It's easy using hRecipe plugin for WordPress. Visit the plugin home page for tips and techniques on food blogging, SEO and more. 
 * Version: 0.5.8.5
 * Author: Dave Doolin
 * Author URI: http://hrecipe.com/about
 */ 

/*  Copyright 2009-2011 David M. Doolin

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation; either version 2 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

  hRecipe is derived from Andrew Scott's hReview plugin, with some 
  modification of the original code.
*/

  /** 
   * Translation command line: $ xgettext -L PHP --keyword="__" --keyword="_e" --files-from="filelist.txt" -o
lang/hrecipe.pot
   * 
   * Procedure for merging updated translations: TBD
   */

   
define('HRECIPE_VERSION', "5.8");   
   
// Find the full URL to the plugin directory and store it
// @todo define(HRECIPE_PLUGIN_URL) instead of this.
global $hrecipe_plugin_url;
$hrecipe_plugin_url = WP_PLUGIN_URL.'/hrecipe';


include dirname( __FILE__ ).'/models/options_db.php';

if (!class_exists('hrecipe')) {
    require_once ('hrecipe.class.php');
}

if (class_exists('hrecipe')) {
    $recipe = new hrecipe();
}

if ( isset ($recipe)) {

    register_activation_hook( __FILE__ , array (&$recipe, 'hrecipe_activate'));
    register_deactivation_hook( __FILE__ , array (&$recipe, 'hrecipe_deactivate'));
    add_filter('plugin_action_links', 'plugin_links', 10, 2);
    $recipe->init();
        
    add_action('wp_print_styles', array ($recipe, 'add_hrecipe_stylesheet'));
    // Probably ought to split this out into admin style sheet.
    add_action('admin_print_styles', array (&$recipe, 'add_hrecipe_stylesheet'));
    //add_action('hrecipe_admin_print_styles', array (&$recipe, 'add_hrecipe_editor_stylesheet'));

    add_action('init', array ($recipe, 'hrecipe_plugin_init'));
    add_action('admin_init', array($recipe, 'register_mysettings'));
    add_action('admin_menu', array ($recipe, 'hrecipe_plugin_menu'));

   /**
     * Adds an action link to the Plugins page
     */
    function plugin_links($links, $file) {
    	
        static $this_plugin;
        
        if (!$this_plugin) {
            $this_plugin =  plugin_basename(__FILE__);
		    }
		
        if ($file == $this_plugin) {
            $settings_link = '<a href="admin.php?page=view/admin/options.php">'.__("Settings", "hrecipe").'</a>';
            array_unshift($links, $settings_link);
        }
        
        return $links;
    }

}

?>
