
/*global tb_show, hrecipe_handle, hrecipe_qttoolbar:true, document, newbutton:true, tb_remove, url */
/*global tinyMCE, edInsertContent, edCanvas */

  var hrecipe_from_gui;


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
  document.getElementById('item-recipetype').value = '';
  document.getElementById('item-servings').value = '';
  document.getElementById('item-rating').value = '';
  document.getElementById('item-duration').value = '';
  document.getElementById('item-preptime').value = '';
  document.getElementById('item-cooktime').value = '';
  document.getElementById('item-calories').value = '';
  document.getElementById('item-fat').value = '';
  document.getElementById('item-protein').value = '';
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
// Move to hrecipe_format.js
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


  
  function google_compliant_rating(itemRating) {

    var markup = '';
    //var solid_star = '&#9733;'
    //var outline_star = '&#9734;'
      
    if (itemRating) {        
      var i;
      var itemRatingValue = parseInt(itemRating, 10);
        
      markup =  '<p class="review hreview-aggregate">';
      markup += hrecipe_handle.hrecipe_rating_text + ' ';
          
      markup += '<span class="rating">';
      markup += '<span class="average">' + itemRating + ' </span> ';
      markup += hrecipe_handle.hrecipe_stars_text + ':&nbsp; ';
        
      // These are the loops the print the star symbols.  
      var stars = 0;
      for (i = 1; i <= itemRatingValue; i++) {          
        stars++;
        markup += '&#9733;'; // solid_star
      }
       
      for (i = stars; i < 5; i++) {
        markup += '&#9734;'; // outline_star
      }
        
      markup += '<span class="count"> 1</span> review(s)';
      markup += '</span>';  
      markup += '</p>';

    } // End if

    return markup;
      
  } 



  function format_ingredients(itemIngredients) {
    //listtype
    var lt =  (hrecipe_handle.hrecipe_ingredientlist === 'bullets') ? 'ul' : 'ol';
    var imarkup = '';
    var lines = '';
    var i;
    lines = itemIngredients.split("\n");
    imarkup = '<div class="ingredients">';
    imarkup += '<h4  class="ingredients">' + hrecipe_handle.hrecipe_ingredients_text + '</h4>';
    imarkup += '<' + lt + ' class="ingredients">';
    for (i = 0; i < lines.length; i++) {
      // Crockford doesn't like continue, consider refactoring.
      if (lines[i] === '') { continue; }
      imarkup += '<li class="ingredient">' + lines[i] + '</li>';
    }
    imarkup += '</' + lt + '>';
    imarkup += '</div>';
    return imarkup;
  }


  function format_instructions(itemDescription) {

    //listtype
    var lt =  (hrecipe_handle.hrecipe_instructionlist === 'bullets') ? 'ul' : 'ol';
    var imarkup = '';
    var lines = '';
    var i;
    lines = itemDescription.split("\n");
    imarkup = '<div class="instructions">';
    imarkup += '<h4 class="instructions">' + hrecipe_handle.hrecipe_instructions_text + '</h4>';
    imarkup += '<' + lt + ' class="instructions">';
    for (i = 0; i < lines.length; i++) {
      if (lines[i] === '') { continue; }
      imarkup += '<li>' + lines[i] + '</li>';
    }
    imarkup += '</' + lt + '>';
    imarkup += '</div>';
    return imarkup;
  }

  function format_quicknotes(itemQuicknotes) {
    var imarkup = '';
    //var lines = '';
    //lines = itemQuicknotes.split("\*");
    imarkup = '<div class="quicknotes">';
    imarkup += '<h4 class="quicknotes">' + hrecipe_handle.hrecipe_quicknotes_text  + '</h4>';
    imarkup += '<p class="quicknotes">';
    imarkup += itemQuicknotes;
    imarkup += '</p>';
    imarkup += '</div>';
    return imarkup;
  }


  function format_variations(itemVariations) {
    var imarkup = '';
    //var lines = '';
    //lines = itemVariations.split("\*");
    imarkup = '<div class="variations">';
    imarkup += '<h4>' + hrecipe_handle.hrecipe_variations_text + '</h4>';
    //imarkup += '<h4>Variations</h4>';
    imarkup += '<p class="variations">';
    imarkup += itemVariations;
    imarkup += '</p>';
    imarkup += '</div>';
    return imarkup;
  }



  function format_summary(itemSummary) {
    var markup = '';
    if (itemSummary === '') { return; }
    markup = '<p class="summary">';
    markup += '<strong>' +  hrecipe_handle.hrecipe_summary_text + '</strong>: ';
    markup += '<em>' + itemSummary + '</em>';    
    markup += '</p>';
    return markup;
  }


/**
 * Thanks for Michael Allen Smith for help 
 * with bringing duration into spec so that 
 * hrecipes will be properly displayed as 
 * Google Rich Snippets.  Please visit Michael:
 * http://criticalmas.com/
 */
 // Example from http://microformats.org/wiki/hrecipe#duration
 //<span class="duration"><span class="value-title" title="PT1H30M"> </span>90 min</span>
  function format_duration(totalminutes) {

    //alert("Total minutes: " + totalminutes);
    //Convert the minutes into hours and minutes
    var hours = Math.floor(totalminutes / 60);
    var minutes = totalminutes % 60;
    
    var markup = '';
    markup = '<p class="duration">';
    markup += '<span class="hrlabel">Cooking time (duration): </span>';
    markup += '<span class="hritem value-title" title="PT' + hours + 'H' + minutes + 'M">';
    markup += hours + ' hour(s), ' + minutes + ' minutes</span>';    
    markup += '</p>';
    return markup;
  }
    
    
    
  function format_iso_time(totalminutes) {
    
    var hours = Math.floor(totalminutes / 60);
    var minutes = totalminutes % 60;
    var markup = '';
    if (hours > 0) {
      markup += hours + ' hour(s) ';
    }
    if (minutes > 0) {
      markup += minutes + ' minute(s)';
    }
    markup += '<span class="hritem value-title" title="PT' + hours + 'H' + minutes + 'M"> </span>';
    return markup;
  }  

  
  function format_time(totalminutes, classname, label) {
    
    var markup = '';
    markup = '<p>';
    markup += label + ': <span class="' + classname + '">';
    markup += format_iso_time(totalminutes);
    markup += '</span>';    
    markup += '</p>';
    return markup;
  }
  
  
/**
 * Refactor format_item into something which can be used for all the 
 * pieces of hrecipe output to reduce the maintenance load for 
 * changing formatting etc.
 */
  
  function format_item(hrclass, hrtext, hritem) {
    var markup = '';
    markup = '<p class="' + hrclass + '">';
    markup += '<span class="hrlabel">' + hrtext + ': </span>';
    markup += '<span class="hritem">' + hritem + '</span>';    
    markup += '</p>';
    return markup;
  }


  function format_enclosure(itemName, itemURL) {

    var padding = ' <br /> <br /> <br /> ';
    var et =  (hrecipe_handle.hrecipe_enclosure === 'div') ? 'div' : 'fieldset';
    var markup = '';
  
    if ("div" === et) {
      markup += padding + '<div class="hrecipe">';
      markup += '<h2 class="fn">' + hrecipe_handle.hrecipe_recipe_text  + ': ';
      markup += (itemURL ? '<a class="url" href="' + itemURL + '">' : '') + itemName + (itemURL ? '</a>' : '');
      markup += '</h2>';
    } else {
      markup += padding + '<fieldset class="hrecipe">';
      markup += '<legend class="fn">' + hrecipe_handle.hrecipe_recipe_text  + ': ';
      markup += (itemURL ? '<a class="url" href="' + itemURL + '">' : '') + itemName + (itemURL ? '</a>' : '');
      markup += '</legend>';
    } 
  
    return markup;
  }

  function linklove() {   
    return 'Microformatting by <a href="http://hrecipe.com/recipe-seo/" target="_blank">hRecipe</a>.<br />';
  }

  function reciply() {
    return '<div class="reciply-addtobasket-widget" href="' + url + '"></div>';
  }
  
  function hrecipe_format_nutrition(r) {
    
  }
  
  
// Add Restrictions, Yield, Author, and Published (date) into first parameter, 
// an object which gets passed in this function.
  function edInsertHRecipeDone(r) {
    
    tb_remove();
  
    var HRecipeOutput = ''; 
    HRecipeOutput += format_enclosure(r.name, r.url);

    HRecipeOutput += (r.summary     ? format_summary(r.summary) : '');
    HRecipeOutput += (r.ingredients ? format_ingredients(r.ingredients) : '');
    HRecipeOutput += (r.description ? format_instructions(r.description) : '');
    HRecipeOutput += (r.quicknotes  ? format_quicknotes(r.quicknotes) : '');
    HRecipeOutput += (r.variations  ? format_variations(r.variations) : '');
    //HRecipeOutput += (r.duration    ? format_duration(r.duration) : '');
    HRecipeOutput += (r.preptime    ? format_time(r.preptime, 'preptime', 'Preparation time') : '');
    HRecipeOutput += (r.cooktime    ? format_time(r.cooktime, 'cooktime', 'Cooking time') : '');
    
    HRecipeOutput += (r.diettype    ? format_item('diettype', 'Diet type', r.diettype) : '');
    HRecipeOutput += (r.dietother   ? format_item('dietother', 'Diet tags', r.dietother) : '');
    HRecipeOutput += (r.restriction ? format_item('restriction', 'Dietary restriction', r.restriction) : '');
    HRecipeOutput += (r.servings    ? format_item('yield', 'Number of servings (yield)', r.servings) : '');
    HRecipeOutput += (r.mealtype    ? format_item('recipeType', 'Meal type', r.mealtype) : '');
    HRecipeOutput += (r.tradition   ? format_item('tradition', 'Culinary tradition', r.tradition) : '');


    // These need to be pushed into 
    //HRecipeOutput += hrecipe_format_nutrition(r);
    HRecipeOutput += (r.calories    ? format_item('calories', 'Calories', r.calories) : '');
    HRecipeOutput += (r.fat         ? format_item('fat', 'Fat', r.fat) : '');
    HRecipeOutput += (r.protein     ? format_item('protein', 'Protein', r.protein) : '');


    HRecipeOutput += (r.rating      ? google_compliant_rating(r.rating) : '');


    var want_copyright = hrecipe_handle.hrecipe_copyright;
    //alert (want_copyright);
    if (want_copyright !== '') {
      HRecipeOutput += 'Copyright &copy; ' + want_copyright + '.<br />';
    }

    ///*
    var want_byline = hrecipe_handle.hrecipe_byline; 
    if (want_byline !== '') {
      HRecipeOutput += 'Recipe by ' + want_byline + '.<br />';
    }
    //*/

    // TODO: Clean up superfluous code
    var want_linklove = (hrecipe_handle.hrecipe_linklove === 'on') ? 'true' : '';
    //alert (want_linklove);
    if (want_linklove) {
      HRecipeOutput += linklove();
    }
  
    // TODO: Clean up superfluous code
    var want_reciply = (hrecipe_handle.hrecipe_reciply === 'on') ? 'true' : '';
    //alert (want_reciply);
    if (want_reciply) {
        // This is supposed to result from a function call 
        // to reciply(), which for some reason is crashing the 
        // entire hrecipe output.  Stupid.    
      HRecipeOutput += '<div class="reciply-addtobasket-widget" href="' 
        + hrecipe_handle.Permalink 
        + '"></div>';
    }

    // From keith@solowebdesigns.net
    //HRecipeOutput += '<a class="printlink" href="#" onclick="javascript:window.print();">Print this recipe</a>';
  
    var padding = ' <br /> <br /> <br /> ';
    var et =  (hrecipe_handle.hrecipe_enclosure === 'div') ? 'div' : 'fieldset';
    HRecipeOutput += '</' + et + '>' + padding;
    //HRecipeOutput += '</div>';

    if (hrecipe_from_gui) {
      tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, HRecipeOutput);
      tinyMCE.execCommand('mceCleanup');
    } else {
      edInsertContent(edCanvas, HRecipeOutput);
    }
  } // End edInsertHRecipeDone()



jQuery(document).ready(function() {

  jQuery(".hrecipe-ujs").click(function() {

   //alert("In UJS");

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
   r["recipetype"] = getSelectValue('item-recipetype');
   r["dietother"] = getCheckedValues();
   r["restriction"] = document.getElementById('item-dietrestriction').value; 
   r["servings"] = document.getElementById('item-servings').value; 

   r["calories"] = document.getElementById('item-calories').value; 
   r["fat"] = document.getElementById('item-fat').value; 
   r["protein"] = document.getElementById('item-protein').value; 

   
   window.parent.edInsertHRecipeDone(r);

  });
  
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


//})();
