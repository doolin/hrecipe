<?php

// ======================================================================================
// This library is free software; you can redistribute it and/or
// modify it under the terms of the GNU Lesser General Public
// License as published by the Free Software Foundation; either
// version 2.1 of the License, or(at your option) any later version.
//
// This library is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
// Lesser General Public License for more details.
// ======================================================================================
// @author     John Godley(http://urbangiraffe.com)
// @version    0.2.7
// @copyright  Copyright &copy; 2009 John Godley, All Rights Reserved
// ======================================================================================


/**
 * <h4>Display Parameters</h4>
 * Also similar to Ruby On Rails, when you display a template you must supply the parameters that the template has access to.  This tries
 * to ensure a very clean separation between code and display.  Parameters are supplied as an associative array mapping variable name to variable value.
 *
 * For example,
 *
 * array( 'message' => 'Your data was processed', 'items' => 103);
 *
 * <h4>How it works in practice</h4>
 * You create a template file to display how many items have been processed.  You store this in 'view/admin/processed.php':
 *
 * <pre>&lt;p&gt;You processed &lt;?php echo $items ?&gt; items&lt;/p&gt;</pre>
 *
 * When you want to display this in your plugin you use:
 *
 * <pre> $this->render_admin( 'processed', array( 'items' => 100));</pre>
 *
 * @package WordPress base library (from Redirection)
 * @author John Godley
 * @copyright Copyright(C) John Godley
 **/

class PluginBase {

	/**
	 * Plugin name
	 * @var string
	 **/
	var $plugin_name;

	/**
	 * Plugin 'view' directory
	 * @var string Directory
	 **/
	var $plugin_base;

	/**
	 * Version URL(if enabled)
	 * @var string URL
	 **/
	var $version_url;

	/**
	 * Register your plugin with a name and base directory.  This <strong>must</strong> be called once.
	 *
	 * @param string $name Name of your plugin.  Is used to determine the plugin locale domain
	 * @param string $base Directory containing the plugin's 'view' files.
	 * @return void
	 **/
	function register_plugin( $name, $base ) {
		$this->plugin_base = rtrim( dirname( $base ), '/' );
		$this->plugin_name = $name;
		//$this->add_action( 'init', 'load_locale' );
	}
	
	/**
	 * Renders an admin section of display code
	 *
	 * @param string $ug_name Name of the admin file(without extension)
	 * @param string $array Array of variable name=>value that is available to the display code(optional)
	 * @return void
	 **/
	function render_admin( $ug_name, $ug_vars = array() ) {
		global $plugin_base;

		foreach ( $ug_vars AS $key => $val ) {
			$$key = $val;
		}

		if ( file_exists( "{$this->plugin_base}/view/admin/$ug_name.php" ) ) {
			include "{$this->plugin_base}/view/admin/$ug_name.php";
		} else {
            echo "<p>this->plugin_base: {$this->plugin_base}</p>";
			echo "<p>Rendering of admin template {$this->plugin_base}/view/admin/$ug_name.php failed</p>";
		}
	}
    
	/**
	 * Helper function to check a checkbox if the item has been checked
	 *
	 * @param mixed $item Checkbox value, or array of checkbox values: field => value
	 * @param string $field Fieldname, if array is given for $item
	 * @return void
	 **/
	function checked( $item, $field = '' ) {
		if ( $field && is_array( $item ) )	{
			if ( isset( $item[$field] ) && $item[$field] )
				echo ' checked="checked"';
		}
		elseif ( !empty( $item ) )
			echo ' checked="checked"';
	}    

	/**
	 * Get a URL to the plugin.  Useful for specifying JS and CSS files
	 *
	 * For example, <img src="<?php echo $this->url() ?>/myimage.png"/>
	 *
	 * @return string URL
	 **/
	function url( $url = '' ) {
		if ( $url )
			return str_replace( '\\', urlencode( '\\' ), str_replace( '&amp;amp', '&amp;', str_replace( '&', '&amp;', $url ) ) );

		$root = ABSPATH;
		if ( defined( 'WP_PLUGIN_DIR' ) )
			$root = WP_PLUGIN_DIR;

		$url = substr( $this->plugin_base, strlen( $this->realpath( $root ) ) );
		if ( DIRECTORY_SEPARATOR != '/' )
			$url = str_replace( DIRECTORY_SEPARATOR, '/', $url );

		if ( defined( 'WP_PLUGIN_URL' ) )
			$url = WP_PLUGIN_URL.'/'.ltrim( $url, '/' );
		else
			$url = get_bloginfo( 'wpurl' ).'/'.ltrim( $url, '/' );

		// Do an SSL check - only works on Apache
		global $is_IIS;
		if ( isset( $_SERVER['HTTPS'] ) && strtolower( $_SERVER['HTTPS'] ) == 'on' && $is_IIS === false )
			$url = str_replace( 'http://', 'https://', $url );

		return $url;
	}
	
	/**
	 * Version of realpath that will work on systems without realpath
	 *
	 * @param string $path The path to canonicalize
	 * @return string Canonicalized path
	 **/
	function realpath( $path ) {
		if ( function_exists( 'realpath' ) && DIRECTORY_SEPARATOR == '/' )
			return realpath( $path );
		elseif ( DIRECTORY_SEPARATOR == '/' )
		{
			$path = preg_replace( '/^~/', $_SERVER['DOCUMENT_ROOT'], $path );

	    // canonicalize
	    $path    = explode( DIRECTORY_SEPARATOR, $path );
	    $newpath = array();

	    for ( $i = 0; $i < count( $path ); $i++ ) {
				if ( $path[$i] === '' || $path[$i] === '.' )
					continue;

				if ( $path[$i] === '..' ) {
					array_pop( $newpath );
					continue;
				}

				array_push( $newpath, $path[$i] );
	    }

	   	return DIRECTORY_SEPARATOR.implode( DIRECTORY_SEPARATOR, $newpath );
		}

		return $path;
	}	
	
	function base () {
		$parts = explode( '?', basename( $_SERVER['REQUEST_URI'] ) );
		return $parts[0];
	}	
	
	
}

?>