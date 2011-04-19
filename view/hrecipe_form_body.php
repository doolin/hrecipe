<div class="wrap">
<h2><?php _e('New Semantic Recipe','hrecipe'); ?></h2>


<div>
  
  <div id="hrecipe-tab-wrapper">
    <ul class="tabs">
      <li><a class="tab-1" href="#tab-1">Ingredients/Instructions</a></li>
      <li><a class="tab-2" href="#tab-2">More Details</a></li>
      <li><a class="tab-3" href="#tab-3">Notes/Variations</a></li>
    </ul>
  </div><!-- tabbed menu wrapper -->

<form name="recipeForm">

<div id="tab-1" class="tab_content">

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
<td><input type="text" id="item-summary" size="45" cols="45" /></td>
</tr>

<tr valign="top">
<th scope="row"><?php _e('Ingredients','hrecipe'); ?><br /><?php _e('(One ingredient per line, please)','hrecipe'); ?></th>
<td><textarea id="item-ingredients" rows="10" cols="45"></textarea></td>
</tr>


<tr valign="top">
<th scope="row"><?php _e('Instructions','hrecipe'); ?><br /><?php _e('(One step per line)','hrecipe'); ?></th>
<td><textarea id="item-description" rows="10" cols="45"></textarea></td>
</tr>

<tr valign="top">
<th scope="row"><?php _e('Preparation time (minutes)','hrecipe'); ?></th>
<td><input type="text" id="item-duration" size="5" /></td>
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

<ul class="tabs bottom">
  <li class="btmtabs" style="float:right; display:inline;"><a href="#" onclick="javascript:submitForm()">Insert</a></li>
  <li class="btmtabs" style="float:right; display:inline;"><a href="#tab-2">More...</a></li>
</ul>

</div>


<div id="tab-2" class="tab_content">

<table class="form-table">

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

</table>


<ul class="tabs bottom">
  <li class="btmtabs"><a href="#tab-1">Back</a></li>
  <li class="btmtabs" style="float:right; display:inline;"><a href="#" onclick="javascript:submitForm()">Insert</a></li>
  <li class="btmtabs" style="float:right; display:inline;"><a href="#tab-3">More...</a></li>
</ul>
</div>

<div id="tab-3" class="tab_content">

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
<ul class="tabs bottom">
  <li class="btmtabs"><a href="#tab-2">Back</a></li>
  <li class="btmtabs" style="float:right; display:inline;"><a href="#" onclick="javascript:submitForm()">Insert</a></li>
</ul>
</div>


</form>
</div>
