<?php

include dirname( __FILE__ ).'/plugin_base.php';
include_once dirname( __FILE__ ).'/models/options_db.php';
//include dirname( __FILE__ ).'/controller/shortcode.php';


$hrecipe_pagehook = null;
$hrecipe_options_file = 'view/admin/options.php';
//$hrecipe_options_file = __FILE__;
  
include('hrecipe_localize_vars.php');

class hrecipe extends PluginBase {

    //var $firephp;
    
    //var $hrecipe_options_file = 'hrecipe/view/admin/options2.php';
    //var $hrecipe_options_file = __FILE__;

    function init() {
        $this->register_plugin('hrecipe', __FILE__);    
    }


    function hrecipe_activate() {
        $this->register_plugin('hrecipe', __FILE__);
        hrecipe_add_options();
    }


    function hrecipe_deactivate() {
    }

    // Stub
    function hrecipe_uninstall() {
      
      //hrecipe_delete_options();
    }

    function hrecipe_plugin_init() {

        if (get_user_option('rich_editing') == 'true') {
            // Include hooks for TinyMCE plugin
            add_filter('mce_external_plugins', array($this, 'hrecipe_plugin_mce_external_plugins'));
            add_filter('mce_buttons_3', array($this, 'hrecipe_plugin_mce_buttons'));
        }
        global $hrecipe_plugin_url;
        load_plugin_textdomain('hrecipe', $hrecipe_plugin_url.'/lang', 'hrecipe/lang');
        
        //wp_register_script('hrecipe-reciply', 'http://www.recip.ly/static/js/jquery-reciply.js');
        //wp_enqueue_script('hrecipe-reciply');
        wp_register_script('hrecipeformat',plugins_url('hrecipe/js/hrecipe_format.js', dirname(__FILE__)),'','',true);
        wp_localize_script('hrecipeformat','hrecipe_handle',hrecipe_localize_vars());

        wp_register_script('hrecipelaunch',plugins_url('hrecipe/js/hrecipe_launch.js', dirname(__FILE__)),'','',true);

        wp_register_script('hrecipescript',plugins_url('hrecipe/js/hrecipescript.js', dirname(__FILE__)),'','',true);
        wp_register_style('hrecipe_editor_stylesheet',plugins_url('hrecipe/hrecipe-editor.css', dirname(__FILE__)),'','');

        wp_enqueue_script('hrecipeformat');                
        wp_enqueue_script('hrecipelaunch');                
        //wp_enqueue_script('hrecipescript');                
    }
    
    function register_mysettings() {

       global $hrecipe_options_file;

        register_setting('hrecipe_options_group', 'hrecipe_options');//, array($this,'hrecipe_options_validate')); #next rev
        add_settings_section('hrecipe_labels', '', 'hrecipe_labels_text', $hrecipe_options_file);
        add_settings_section('hrecipe_structure', '', 'hrecipe_structure_text', $hrecipe_options_file);        

        add_settings_section('hrecipe_styling', '', array($this,'hrecipe_styling_text'), $hrecipe_options_file);
        add_settings_field('hrecipe_border_color', __('Border color', 'hrecipe'), array($this,'border_color'), $hrecipe_options_file, 'hrecipe_styling');        
        //add_settings_field('hrecipe_background_color', 'Background color', array($this,'background_color'), $hrecipe_options_file, 'hrecipe_styling');        
    }


  function bordercolor() {
  }

  function background_color() {

    $options = get_option('hrecipe_options');
    echo "<input id='hrecipe_background_color' name='hrecipe_options[background_color]' size='40' type='text' value='{$options['background_color']}' />";
  }

  function border_color() {

    $options = get_option('hrecipe_options');
    echo "<input id='hrecipe_border_color' name='hrecipe_options[border_color]' size='40' type='text' value='{$options['border_color']}' />";
  }

  function hrecipe_labels_text() {
    echo '
    <p>
    Actions here control how your recipe is labeled.
    </p>';
  }

  function hrecipe_styling_text() {
    echo '
    <p>
    The actions in this section control how your recipe is styled. At the moment, only the global background color can be set as an option. In the future, fonts and font styles will be customizable.
    </p>';
  }

  function hrecipe_structure_text() {
    echo '
    <p>
    The actions in this section control how your recipe is structured.
    </p>';
  }

  /**
   * Place holder for options registration.
   */
   function hrecipe_options_validate($input) {
     return $input;
   }

    function hrecipe_plugin_menu() {

        global $hrecipe_options_file;
        
        if (function_exists('add_options_page')) {

            global $hrecipe_pagehook;
            $hrecipe_pagehook = add_options_page('hRecipe Options', 'hRecipe', 'administrator', $hrecipe_options_file, array($this, 'hrecipe_plugin_options_page'));
            add_action('load-'.$hrecipe_pagehook, array($this,'on_load_page'));
        }
    }


    function on_load_page() {
        wp_enqueue_script('common');
        wp_enqueue_script('wp-lists');
        wp_enqueue_script('postbox');
        wp_enqueue_script('hrecipescript');                
    }



    function hrecipe_plugin_options_page() {

        global $hrecipe_plugin_url;
        global $hrecipe_plugin_url1;

        if ( isset($_GET['sub']) && $_GET['sub'] == 'support' ) {
            return $this->render_admin('support');
        } else {
            include ('view/admin/options.php');
        }
    }


    function hrecipe_plugin_mce_external_plugins($plugins) {

        global $hrecipe_plugin_url;
        $plugins['hrecipe_plugin'] = $hrecipe_plugin_url.'/tinymceplugin/editor_plugin.js';
        return $plugins;
    }


    function hrecipe_plugin_mce_buttons($buttons) {

        array_push($buttons, 'hrecipe_button');
        return $buttons;
    }

    function hrecipe_plugin_footer() {

        // TODO: Wrap to load only on post or page editing admin pages.
        wp_register_script('hrecipeformat',plugins_url('hrecipe/js/hrecipe_format.js', dirname(__FILE__)),'','',true);
        wp_enqueue_script('hrecipeformat');
    }

    function add_hrecipe_stylesheet() {

        // TODO: Replace constants with plugins_url()
        $css_url = WP_PLUGIN_URL.'/hrecipe/hrecipe.css';
        $css_file = WP_PLUGIN_DIR.'/hrecipe/hrecipe.css';
        if (file_exists($css_file)) {
            wp_register_style('hrecipe_stylesheet', $css_url);
            wp_enqueue_style('hrecipe_stylesheet');
        }
    }

// TODO: Add this in as a custom hook later.
    function add_hrecipe_editor_stylesheet() {

       wp_enqueue_style('hrecipe_editor_stylesheet');
       
       /*
        $css_url = WP_PLUGIN_URL.'/hrecipe/hrecipe-editor.css';
        $css_file = WP_PLUGIN_DIR.'/hrecipe/hrecipe-editor.css';
        if (file_exists($css_file)) {
            wp_register_style('hrecipe_editor_stylesheet', $css_url);
            wp_enqueue_style('hrecipe_editor_stylesheet');
        }
        */
        
    }

}

?>