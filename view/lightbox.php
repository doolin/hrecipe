<?php

// Do some javascript checking with jslint:
// http://www.crockford.com/javascript/
/* This is the form entry page that is used by hrecipe.php */
// BOGUS!  These paths need to be redone, correctly.
require_once('../../../../wp-load.php'); // Ugly directory stuff
require_once('../../../../wp-admin/admin.php'); // Ugly directory stuff
@header('Content-Type: ' . get_option('html_type') . '; charset=' . get_option('blog_charset'));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php do_action('admin_xml_ns'); ?> <?php language_attributes(); ?>>
<head>
<?php
wp_enqueue_style( 'global' );
wp_enqueue_style( 'wp-admin' );
wp_enqueue_style( 'colors' );
?>

<!-- js for the tabs -->
<script type="text/javascript"
src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {

	//Default Action
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content
	
	//On Click Event
	$("ul.tabs li").click(function() {
		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content
		var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active content
		return false;
	});

});
</script>
<!-- end tab js -->

<!-- Tabs CSS -->
<style type="text/css">
ul.tabs {
	margin: 0;
	padding: 0;
	float: left;
	list-style: none;
	height: 32px;
	border-bottom: 1px solid #999;
	border-left: 1px solid #999;
	width: 100%;
}
ul.tabs li {
	float: left;
	margin: 0;
	padding: 0;
	height: 31px;
	line-height: 31px;
	font-size:11px;
	border: 1px solid #999;
	border-left: none;
	margin-bottom: -1px;
	background: #e0e0e0;
	overflow: hidden;
	position: relative;
}
ul.tabs li a {
	text-decoration: none;
	color: #000;
	display: block;
	font-size: 1.2em;
	padding: 0 20px;
	border: 1px solid #fff;
	outline: none;
}
ul.tabs li a:hover {
	background: #ccc;
}	
html ul.tabs li.active, html ul.tabs li.active a:hover  {
	background: #fff;
	border-bottom: 1px solid #fff;
}
ul.tabs li.btmtabs {
	background: transparent;
	border:0;
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
  if ("" != selectValue)
  {
    return selectValue;
  }
  // avoid bug in old browsers where they never give any value directly
  var selectIdx = selectItem.selectedIndex;
  selectValue = selectItem.options[selectIdx].value;
  if ("" != selectValue)
  {
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

function abortForm()
{
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
<div class="wrap">
<h2><?php _e('New Recipe','hrecipe'); ?></h2>
<ul class="tabs">
    <li><a href="#tab1">General</a></li>
    <li><a href="#tab2">Ingredients/Instructions</a></li>
    <li><a href="#tab3">Notes/Variations</a></li>
    <li><a href="#tab4">Additional Information</a></li>
</ul>

<form name="recipeForm">
<p>
<div id="tab1" class="tab_content">

<table class="form-table">

<tr valign="top">
<th scope="row"><?php _e('Name of recipe','hrecipe'); ?> </th>
<td><input type="text" id="item-name" size="45" /></td>
</tr>
<tr valign="top">
<th scope="row"><?php _e('Reference URL','hrecipe'); ?></th>
<td><input type="text" id="item-url" size="45" /></td>
</tr>

<tr valign="top">
<th scope="row"><?php _e('Summary','hrecipe'); ?></th>
<td><input type="text" id="item-summary" size="45" /></td>
</tr>
</table>
<ul class="tabs" style="margin-top:50px; border:0; background:transparent;">
    <li class="btmtabs"><a href="#tab2">Next</a></li>
	<li class="btmtabs" style="float:right; display:inline;"><a href="#" onclick="javascript:submitForm()">Insert</a></li>
	</ul>
</div>

<div id="tab2" class="tab_content">

<table class="form-table">
<tr valign="top">
<th scope="row"><?php _e('Ingredients','hrecipe'); ?><br /><?php _e('(May use HTML)','hrecipe'); ?></th>
<td><textarea id="item-ingredients" rows="10" cols="45"></textarea></td>
</tr>


<tr valign="top">
<th scope="row"><?php _e('Instructions','hrecipe'); ?><br /><?php _e('(May use HTML)','hrecipe'); ?></th>
<td><textarea id="item-description" rows="10" cols="45"></textarea></td>
</tr>
</table>
<ul class="tabs" style="margin-top:50px; border:0; background:transparent;">
<li class="btmtabs"><a href="#tab1">Back</a></li>
    <li class="btmtabs"><a href="#tab3">Next</a></li>
	<li class="btmtabs" style="float:right; display:inline;"><a href="#" onclick="javascript:submitForm()">Insert</a></li>
	</ul>
</div>

<div id="tab3" class="tab_content">

<table class="form-table">

<tr valign="top">
<th scope="row"><?php _e('Quick Notes','hrecipe'); ?><br /><?php _e('(May use HTML)','hrecipe'); ?></th>
<td><textarea id="item-quicknotes" rows="5" cols="45"></textarea></td>
</tr>


<tr valign="top">
<th scope="row"><?php _e('Variations','hrecipe'); ?><br /><?php _e('(May use HTML)','hrecipe'); ?></th>
<td><textarea id="item-variations" rows="5" cols="45"></textarea></td>
</tr>

</table>
<ul class="tabs" style="margin-top:50px; border:0; background:transparent;">
<li class="btmtabs"><a href="#tab2">Back</a></li>
    <li class="btmtabs"><a href="#tab4">Next</a></li>
	<li class="btmtabs" style="float:right; display:inline;"><a href="#" onclick="javascript:submitForm()">Insert</a></li>
	</ul>
</div>

<div id="tab4" class="tab_content">

<table class="form-table">

<tr valign="top">
<th scope="row"><?php _e('Preparation time (minutes)','hrecipe'); ?></th>
<td><input type="text" id="item-duration" size="5" /></td>
</tr>

<tr valign="top">
<th scope="row"><?php _e('Recipe type:','hrecipe'); ?></th>
<td>
<select id="item-mealtype">
<option></option>
<option><?php _e('breakfast','hrecipe'); ?></option>
<option><?php _e('lunch','hrecipe'); ?></option>
<option><?php _e('dinner','hrecipe'); ?></option>
<option><?php _e('supper','hrecipe'); ?></option>
<option><?php _e('brunch','hrecipe'); ?></option>
<option><?php _e('dessert','hrecipe'); ?></option>
<option><?php _e('cocktail','hrecipe'); ?></option>
<option><?php _e('hors d\'oerves','hrecipe'); ?></option>
<option><?php _e('snack','hrecipe'); ?></option>
</select>
</td>
</tr>


<tr valign="top">
<th scope="row"><?php _e('Number of servings:','hrecipe'); ?></th>
<td>
<select id="item-servings">
<option></option>
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>6</option>
<option>8</option>
<option>12</option>
</select>
</td>
</tr>


<tr valign="top">
<th scope="row"><?php _e('Diet type:','hrecipe'); ?></th>
<td>
<select id="item-diettype">
<option></option>
<option><?php _e('Vegetarian','hrecipe'); ?></option>
<option><?php _e('Pescatarian','hrecipe'); ?></option>
<option><?php _e('Vegan','hrecipe'); ?></option>
<option><?php _e('Macrobiotic','hrecipe'); ?></option>
</select>
</td>
</tr>

<tr valign="top">
<th scope="row"><?php _e('Diet restriction:','hrecipe'); ?></th>
<td>
<select id="item-dietrestriction">
<option></option>
<option><?php _e('Kosher','hrecipe'); ?></option>
<option><?php _e('Halal','hrecipe'); ?></option>
<option><?php _e('Buddhist','hrecipe'); ?></option>
</select>
</td>
</tr>


<tr valign="top">
  <th scope="row"><?php _e('Diet (other):','hrecipe'); ?><br />
  <?php _e('(Check all that apply)','hrecipe'); ?></th>
<td>
<input type="checkbox" id="low_calorie" name="item-dietother" value="Low calorie"><?php _e('Low calorie','hrecipe'); ?>&nbsp;&nbsp;  
<input type="checkbox" id="reduced_fat" name="item-dietother" value="Reduced fat"><?php _e('Reduced fat','hrecipe'); ?>&nbsp;&nbsp; 
<input type="checkbox" id="reduced_carbohydrate" name="item-dietother" value="Reduced carbohydrate"><?php _e('Reduced carbohydrate','hrecipe'); ?><br /> 
<input type="checkbox" id="high_protein" name="item-dietother" value="High protein"><?php _e('High protein','hrecipe'); ?>&nbsp;&nbsp; 
<input type="checkbox" id="gluten_free" name="item-dietother" value="Gluten free"><?php _e('Gluten free','hrecipe'); ?>&nbsp;&nbsp; 
<input type="checkbox" id="raw" name="item-dietother" value="Raw"><?php _e('Raw','hrecipe'); ?>
</td>
</tr>



<tr valign="top">
<th scope="row"><?php _e('Culinary Tradition:','hrecipe'); ?></th>
<td>
<select id="item-culinarytradition">
<option></option>
<option><?php _e('USA (General)','hrecipe'); ?></option>
<option><?php _e('USA (Traditional)','hrecipe'); ?></option>
<option><?php _e('USA (Southern)','hrecipe'); ?></option>
<option><?php _e('USA (Southwestern)','hrecipe'); ?></option>
<option><?php _e('USA (Nouveau)','hrecipe'); ?></option>
<option><?php _e('English','hrecipe'); ?></option>
<option><?php _e('Irish','hrecipe'); ?></option>
<option><?php _e('French','hrecipe'); ?></option>
<option><?php _e('German','hrecipe'); ?></option>
<option><?php _e('Spanish','hrecipe'); ?></option>
<option><?php _e('Chinese','hrecipe'); ?></option>
<option><?php _e('Thai','hrecipe'); ?></option>
<option><?php _e('Mexican','hrecipe'); ?></option>
<option><?php _e('Central American','hrecipe'); ?></option>
<option><?php _e('Russian','hrecipe'); ?></option>
<option><?php _e('Scandinavian','hrecipe'); ?></option>
<option><?php _e('Italian','hrecipe'); ?></option>
<option><?php _e('Persian','hrecipe'); ?></option>
<option><?php _e('Indian (Southern)','hrecipe'); ?></option>
<option><?php _e('Indian (Northern)','hrecipe'); ?></option>
<option><?php _e('Pakistani','hrecipe'); ?></option>
<option><?php _e('African','hrecipe'); ?></option>
<option><?php _e('Middle Eastern','hrecipe'); ?></option>
<option><?php _e('Greek','hrecipe'); ?></option>
<option><?php _e('Vietnamese','hrecipe'); ?></option>
<option><?php _e('Indian (Marathi Cuisine)','hrecipe'); ?></option></select></td>
</tr>

<tr valign="top">
<th scope="row"><?php _e('My rating:','hrecipe'); ?><br />
<?php _e('(number of stars, leave blank if rating is undesired)','hrecipe'); ?></th>
<td>
<select id="item-rating">
<option></option>
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
</select></td>
</tr>
</table>
<ul class="tabs" style="margin-top:50px; border:0; background:transparent;">
<li class="btmtabs"><a href="#tab3">Back</a></li>
	<li class="btmtabs" style="float:right; display:inline;"><a href="#" onclick="javascript:submitForm()">Insert</a></li>
	</ul>
</div>
</form></div>
</body>
</html>
