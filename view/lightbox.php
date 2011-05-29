<?php

// Do some javascript checking with jslint:
// http://www.crockford.com/javascript/
/* This is the form entry page that is used by hrecipe.php */
// BOGUS!  These paths need to be redone, correctly.
// http://ottodestruct.com/blog/2010/dont-include-wp-load-please/
// http://ottopress.com/2010/passing-parameters-from-php-to-javascripts-in-plugins/

require_once('../../../../wp-admin/admin.php'); 

//@header('Content-Type: ' . get_option('html_type') . '; charset=' . get_option('blog_charset'));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php do_action('admin_xml_ns'); ?> <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" />
<title><?php bloginfo('name') ?> &rsaquo; <?php _e('hRecipe'); ?> &#8212; <?php _e('WordPress'); ?></title>  
<?php
  wp_enqueue_style( 'global' );
  wp_enqueue_style( 'wp-admin' );
  wp_enqueue_style( 'media' );
  wp_enqueue_style( 'colors' );
  wp_enqueue_style( 'ie' );
  // Maybe not needed, handled with admin_print_styles hook.
  //wp_enqueue_style('hrecipe_editor_stylesheet');
?>

<script type="text/javascript">
//<![CDATA[
addLoadEvent = function(func) {
  if (typeof jQuery!="undefined")
    jQuery(document).ready(func);
  else if (typeof wpOnload!='function') {
    wpOnload=func;
  } else {
    var oldonload = wpOnload;
    wpOnload = function() {
      oldonload();
      func();
    }
  }
};
var userSettings = {'url':'<?php echo SITECOOKIEPATH; ?>','uid':'<?php if ( ! isset($current_user) ) $current_user = wp_get_current_user(); echo $current_user->ID; ?>','time':'<?php echo time(); ?>'};
var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>', pagenow = 'post', adminpage = 'post',
isRtl = <?php echo (int) is_rtl(); ?>;
//]]>
</script>

<script type="text/javascript">
//<!CDATA[
// Get rid of this or move it.
function abortForm() {
  window.parent.edInsertHRecipeAbort();
}
//]]>
</script>

<?php
do_action('admin_print_styles');
// TODO: Get this custom hook conencted.
//do_action('hrecipe_admin_print_styles');
do_action('admin_print_scripts');
do_action('admin_head');
?>
</head>
<!-- body<?php if ( isset($GLOBALS['body_id']) ) echo ' id="' . $GLOBALS['body_id'] . '"'; ?> -->
<body id='media-upload'  class="js">
<?php 
  include('hrecipe_form_body.php');
  do_action('admin_print_footer_scripts');
?>
<script type="text/javascript">
  if(typeof wpOnload=='function')
    wpOnload();
</script>

</body>
</html>
