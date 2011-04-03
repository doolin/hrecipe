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
  wp_enqueue_style( 'colors' );
  wp_enqueue_style( 'ie' );
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


<!-- Tabs CSS -->
<style type="text/css">

div#hrecipe-tab-wrapper {
    background-color: #F9F9F9;
    border-bottom-color: #DFDFDF;
    
    border-bottom-style: solid;
    border-bottom-width: 1px;
    font-weight: bold;
    margin: 0;
    padding: 0 5px;
    position: relative;
    color: #333333;
    line-height: 1.4em;
    font-family: "Lucida Grande",Verdana,Arial,"Bitstream Vera Sans",sans-serif;
    font-size: 13px;    
}


ul.tabs {

    bottom: -1px;
    float: none;
    font-weight: normal;
    left: 0;
    margin: 0 5px;
    overflow: hidden;
    font-size: 12px;
    list-style: none outside none;
    padding-left: 10px;
    position: relative;
}

ul.tabs li {

    display: inline;
    line-height: 200%;
    list-style: none outside none;
    margin: 0;
    padding: 0;
    text-align: center;
    white-space: nowrap;
}

ul.tabs li a {

    background-color: #F9F9F9;
    border-color: #F9F9F9 #F9F9F9 #DFDFDF;

    border-bottom-style: solid;
    border-bottom-width: 1px;
    border-top-style: solid;
    border-top-width: 1px;
    display: block;
    float: left;
    line-height: 28px;
    padding: 0 7px;
    text-decoration: none;

}

ul.tabs li a.current {
  background-color: #FFFFFF;
  border-color: #DFDFDF #DFDFDF #FFFFFF;
 -moz-border-radius: 4px 4px 0 0;
  border-radius: 4px 4px 0 0;
  color: #d54e21;
  border-style: solid;
  border-width: 1px;
  font-weight: normal;
  padding-left: 6px;
  padding-right: 6px;
}



ul.tabs li.btmtabs {
	background: transparent;
	border:0px;
	height:50px;
}

ul.tabs li.btmtabs a{
	border: 1px solid #999;
	border-bottom:1px solid #999;
	width:50px;
	font-size:11px;
	text-align:center;
	background:#ddd;
	margin-bottom:10px;
	float:left; display:inline;
	margin-left:15px;
}

ul.tabs li.btmtabs a:hover {
	background:#ccc;
}
</style>
<!-- end tabs CSS -->

<script type="text/javascript">//<!CDATA[
function clearForm() {
	
  document.getElementById('item-name').value = '';
  document.getElementById('item-url').value = '';
  document.getElementById('item-summary').value = '';
  document.getElementById('item-ingredients').value = '';
  document.getElementById('item-description').value = '';
  document.getElementById('item-quicktnotes').value = '';
  document.getElementById('item-variations').value = '';
  document.getElementById('item-diettype').value = '';
  document.getElementById('item-dietrestriction').value = '';
  document.getElementById('item-culinarytradition').value = '';
  document.getElementById('item-mealtype').value = '';
  document.getElementById('item-servings').value = '';
  document.getElementById('item-rating').value = '';
  document.getElementById('item-duration').value = '';
}



function getSelectValue(fieldId) {
    
  var selectItem = document.getElementById(fieldId);
  var selectValue = selectItem.value;

  if ("" != selectValue) {
    return selectValue;
  }
  
  // avoid bug in old browsers where they never give any value directly
  var selectIdx = selectItem.selectedIndex;
  selectValue = selectItem.options[selectIdx].value;

  if ("" != selectValue) {
    return selectValue;
  }
  
  // and cope with IE
  selectValue = (selectItem.options[selectIdx]).text;
  return selectValue;
}


// Process the checkboxes here.
// This can be processed as an 
// arrary traversing id's and names later.
// Suggestions welcome.
function getCheckedValues() {
	
	var need_comma = false;
	var comma = ', ';
	var diet = '';
	if (document.getElementById('low_calorie').checked) { 
	   diet += 'Low calorie';
	   need_comma = true; 
	}
	if (document.getElementById('reduced_fat').checked) { 
	   if (need_comma) diet += comma;
	   diet += 'Reduced fat'; 
	   need_comma = true; 
	}
	if (document.getElementById('reduced_carbohydrate').checked) { 
	   if (need_comma) diet += comma;
	   diet += 'Reduced carbohydrate'; 
	   need_comma = true; 
	}
	if (document.getElementById('high_protein').checked) { 
	   if (need_comma) diet += comma;
	   diet += 'High protein'; 
	   need_comma = true; 	   
	}
	if (document.getElementById('gluten_free').checked) { 
	   if (need_comma) diet += comma;
	   diet += 'Gluten free';
	   need_comma = true; 	    
	}
	if (document.getElementById('raw').checked) { 
	   if (need_comma) diet += comma;
	   diet += 'Raw'; 
	}

	return  diet;
}

function recipe() {}

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
   r["duration"] = document.getElementById('item-duration').value;
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
do_action('admin_print_scripts');
do_action('admin_head');
?>
</head>
<body<?php if ( isset($GLOBALS['body_id']) ) echo ' id="' . $GLOBALS['body_id'] . '"'; ?>>
<?php 
  include('hrecipe_form_body.php');
?>
<?php
  do_action('admin_print_footer_scripts');
?>
<script type="text/javascript">
  if(typeof wpOnload=='function')
    wpOnload();
</script>
<script type="text/javascript">
//<!CDATA[
jQuery(document).ready(function() {

  //Default Action
  jQuery(".tab_content").hide(); //Hide all content
  jQuery("ul.tabs li:first a").addClass("current").show(); //Activate first tab
  jQuery(".tab_content:first").show(); //Show first tab content
  
  //On Click Event
  jQuery("ul.tabs li a").click(function() {
    jQuery("ul.tabs li a").removeClass("current"); 
    jQuery(this).addClass("current"); 
    jQuery(".tab_content").hide(); //Hide all tab content
    var activeTab = jQuery(this).attr("href"); //Find the rel attribute value to identify the active tab + content
    jQuery(activeTab).fadeIn(); //Fade in the active content
    return false;
  });
});
//]]>
</script>

</body>
</html>
