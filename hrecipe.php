<?php 
/*
Plugin Name: hRecipe
Plugin URI: http://website-in-a-weekend.net/hrecipe/
Description: Fast and easy recipe formatting. Allows the correct microformat content to be easily added for recipes.
Version: 0.5.4.3
Author: Dave Doolin
Author URI: http://website-in-a-weekend.net/
*/ 

/*  Copyright 2009 David M. Doolin

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

// Find the full URL to the plugin directory and store it
// @todo define(HRECIPE_PLUGIN_URL) instead of this.
global $hrecipe_plugin_url;
$hrecipe_plugin_url = WP_PLUGIN_URL.'/hrecipe';

// FirePHP initialization. 
//require_once('FirePHPCore/FirePHP.class.php');
//ob_start();

include dirname( __FILE__ ).'/models/options_db.php';

if (!class_exists('hrecipe')) {
    require_once ('hrecipe.class.php');
}

if (class_exists('hrecipe')) {
    $recipe = new hrecipe();
}

if ( isset ($recipe)) {

/*
$firephp = FirePHP::getInstance(true); 
$firephp->log(__FILE__, 'if (isset())');
*/

    register_activation_hook( __FILE__ , array (&$recipe, 'hrecipe_activate'));
    register_deactivation_hook( __FILE__ , array (&$recipe, 'hrecipe_deactivate'));
    add_action('admin_footer', array ($recipe, 'hrecipe_plugin_footer'));
    add_filter('plugin_action_links', 'plugin_links', 10, 2);
    $recipe->init();

    //add_action('wp_head', array ($recipe, 'hrecipe_plugin_head'));
    //add_action('marker_css', array ($recipe, 'hrecipe_plugin_css'));
    //This was deleted
    //add_action('wp_head', array ($recipe, 'hrecipe_header_css'));
        
    add_action('wp_print_styles', array ($recipe, 'add_hrecipe_stylesheet'));
    add_action('wp_print_styles', array ($recipe, 'add_hrecipe_editor_stylesheet'));
    add_action('admin_print_styles', array ($recipe, 'add_hrecipe_stylesheet'));

    add_action('init', array ($recipe, 'hrecipe_plugin_init'));
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
            $settings_link = '<a href="admin.php?page=hrecipe.class">'.__("Settings", "hrecipe").'</a>';
            array_unshift($links, $settings_link);
        }
        
        return $links;
    }


}

?>
