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
  wp_enqueue_style('hrecipe_editor_stylesheet');
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



<script type="text/javascript">//<!CDATA[

function submitForm() {
	
   r = new recipe();
   r["name"] = document.getElementById('item-name').value;

   if ("" == r["name"]) {
      alert("You need to provide a name for the recipe.");
      return false;
   }

   r["url"] = document.getElementById('item-url').value;
   r["summary"] = document.getElementById('item-summary').value;
   r["ingredients"] = document.getElementById('item-ingredients').value;
   r["description"] = document.getElementById('item-description').value;
   
   r["quicknotes"] = document.getElementById('item-quicknotes').value;
   r["variations"] = document.getElementById('item-variations').value;
       
   r["tradition"] = getSelectValue('item-culinarytradition');
   r["rating"] = getSelectValue('item-rating');

   // When this id doesn't exist, call fails.
   //r["duration"] = document.getElementById('item-duration').value;
   r["preptime"] = document.getElementById('item-preptime').value;
   r["cooktime"] = document.getElementById('item-cooktime').value;

   r["diettype"] = getSelectValue('item-diettype');
   r["mealtype"] = getSelectValue('item-mealtype');
   r["dietother"] = getCheckedValues();
   r["restriction"] = document.getElementById('item-dietrestriction').value; 
   r["servings"] = document.getElementById('item-servings').value; 
   
   window.parent.edInsertHRecipeDone(r);
}

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
<script type="text/javascript">
//<!CDATA[
/*
jQuery(document).ready(function() {

  //Default Action
  jQuery(".tab_content").hide(); //Hide all content
  jQuery("ul.tabs li:first a").addClass("current").show(); //Activate first tab
  jQuery(".tab_content:first").show(); //Show first tab content
  
  //On Click Event for the sidemenu across the media popup
  jQuery("ul.tabs li a").click(function() {
    jQuery("ul.tabs li a").removeClass("current"); 
    jQuery(this).addClass("current"); 
    jQuery(".tab_content").hide(); //Hide all tab content
    var activeTab = jQuery(this).attr("href"); //Find the rel attribute value to identify the active tab + content
    jQuery(activeTab).fadeIn(); //Fade in the active content
    return false;
  });
  
  jQuery("#hrecipe-ujs-old").click(function() {

   alert("In -UJS-");

   r = new recipe();
   r["name"] = document.getElementById('item-name').value;

   if ("" === r["name"]) {
      alert("You need to provide a name for the recipe.");
      return false;
   }

   r["url"] = document.getElementById('item-url').value;
   r["summary"] = document.getElementById('item-summary').value;
   r["ingredients"] = document.getElementById('item-ingredients').value;
   r["description"] = document.getElementById('item-description').value;
   
   r["quicknotes"] = document.getElementById('item-quicknotes').value;
   r["variations"] = document.getElementById('item-variations').value;
       
   r["tradition"] = getSelectValue('item-culinarytradition');
   r["rating"] = getSelectValue('item-rating');

   // When this id doesn't exist, call fails.
   //r["duration"] = document.getElementById('item-duration').value;
   r["preptime"] = document.getElementById('item-preptime').value;
   r["cooktime"] = document.getElementById('item-cooktime').value;

   r["diettype"] = getSelectValue('item-diettype');
   r["mealtype"] = getSelectValue('item-mealtype');
   r["dietother"] = getCheckedValues();
   r["restriction"] = document.getElementById('item-dietrestriction').value; 
   r["servings"] = document.getElementById('item-servings').value; 
   
   window.parent.edInsertHRecipeDone(r);

  });


  // Handle the bottom tabs.
  jQuery("ul.tabs li.btmtabs a").click(function() {
    //alert("Bottom tab clicked " + this);
    var activeTab = jQuery(this).attr("href"); //Find the rel attribute value to identify the active tab + content
    //alert("Active tab: " + activeTab);
    jQuery("ul.tabs li a").removeClass("current"); 
    //alert("ul.tabs li a."+activeTab.substring(1));
    jQuery("ul.tabs li a."+activeTab.substring(1)).addClass("current"); 
    jQuery(".tab_content").hide(); //Hide all tab content
    jQuery(activeTab).fadeIn(); //Fade in the active content
    return false;
  });  
});
*/
//]]>
</script>

</body>
</html>
