
/*global tb_show, hrecipe_handle, hrecipe_qttoolbar:true, document, newbutton:true, tb_remove, url */
/*global tinyMCE, edInsertContent, edCanvas */



  var hrecipe_from_gui;

  // TODO: rename these next two functions appropriately.
  function edInsertHRecipe() {    
    tb_show("Add an hRecipe", hrecipe_handle.PluginsUrl + "/view/lightbox.php?TB_iframe=true");
    hrecipe_from_gui = true; /** Called from TinyMCE **/
  }


  function edInsertHRecipeCode() {
    tb_show("Add an hRecipe", hrecipe_handle.PluginsUrl + "/view/lightbox.php?TB_iframe=true");
    hrecipe_from_gui = false; /** Called from Quicktags **/
  }

  hrecipe_qttoolbar = document.getElementById("ed_toolbar");
/*
  if (hrecipe_qttoolbar === null) {
    alert("ed_toolber element is null");
  }
 */
  //if (hrecipe_qttoolbar = document.getElementById("ed_toolbar")) {
  if (hrecipe_qttoolbar !== null) {
    newbutton = document.createElement("input");
    newbutton.type = "button";
    newbutton.id = "ed_hrecipe";
    newbutton.className = "ed_button";
    newbutton.value = "hRecipe";
    newbutton.onclick = edInsertHRecipeCode;
    hrecipe_qttoolbar.appendChild(newbutton);
  }

  function edInsertHRecipeAbort() {
    tb_remove();
  } 

  
  function google_compliant_rating(itemRating) {

    var markup = '';
    //var solid_star = ''
    //var outline_star = ''
      
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
 // TODO: Add an hrlabel span for formatting
  function format_duration(totalminutes) {

    //Convert the minutes into hours and minutes
    var hours = Math.floor(totalminutes / 60);
    var minutes = totalminutes % 60;
    
    var markup = '';
    markup = '<p class="duration">Cooking time (duration): ';
    markup += '<span class="value-title" title="PT' + hours + 'H' + minutes + 'M"></span>';    
    markup += totalminutes + '</p>';
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

    var et =  (hrecipe_handle.hrecipe_enclosure === 'div') ? 'div' : 'fieldset';
    var markup = '';
  
    if ("div" === et) {
      markup += '<div class="hrecipe">';
      markup += '<h2 class="fn">' + hrecipe_handle.hrecipe_recipe_text  + ': ';
      markup += (itemURL ? '<a class="url" href="' + itemURL + '">' : '') + itemName + (itemURL ? '</a>' : '');
      markup += '</h2>';
    } else {
      markup += '<fieldset class="hrecipe">';
      markup += '<legend class="fn">' + hrecipe_handle.hrecipe_recipe_text  + ': ';
      markup += (itemURL ? '<a class="url" href="' + itemURL + '">' : '') + itemName + (itemURL ? '</a>' : '');
      markup += '</legend>';
    } 
  
    return markup;
  }

  function linklove() {   
    return 'Microformatting by <a href="http://hrecipe.com/community/" target="_blank">hRecipe</a>.<br />';
  }

  function reciply() {
    return '<div class="reciply-addtobasket-widget" href="' + url + '"></div>';
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
    HRecipeOutput += (r.duration    ? format_duration(r.duration) : '');
    
    HRecipeOutput += (r.diettype    ? format_item('diettype', 'Diet type', r.diettype) : '');
    HRecipeOutput += (r.dietother   ? format_item('dietother', 'Diet (other)', r.dietother) : '');
    HRecipeOutput += (r.restriction ? format_item('restriction', 'Dietary restriction', r.restriction) : '');
    HRecipeOutput += (r.servings    ? format_item('yield', 'Number of servings (yield)', r.servings) : '');
    HRecipeOutput += (r.mealtype    ? format_item('mealtype', 'Meal type', r.mealtype) : '');
    HRecipeOutput += (r.tradition   ? format_item('tradition', 'Culinary tradition', r.tradition) : '');

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
  
    var et =  (hrecipe_handle.hrecipe_enclosure === 'div') ? 'div' : 'fieldset';
    HRecipeOutput += '</' + et + '>';
    //HRecipeOutput += '</div>';

    if (hrecipe_from_gui) {
      tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, HRecipeOutput);
      tinyMCE.execCommand('mceCleanup');
    } else {
      edInsertContent(edCanvas, HRecipeOutput);
    }
  } // End edInsertHRecipeDone()

//})();
