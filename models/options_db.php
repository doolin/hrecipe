<?php


function hrecipe_add_options() {
  
  if (get_option('hrecipe_options')) {
    return;
  }
  
  hrecipe_set_default_options();
  //hrecipe_set_old_default_options();
} 

 
function hrecipe_delete_options() {
  
  //delete_option('hrecipe_options');
  //hrecipe_delete_old_options();
}

 
function hrecipe_set_default_options() {
  
  $description = <<<EOD
hRecipe plugin for WordPress makes it easy 
to add search engine friendly formatting to 
your recipes and blog posts. If you find this
entry in your options table, and you do not 
have hRecipe installed, you may delete it.
If you intend on (re)installing hRecipe in 
the future, it should be safe to leave this
in your WordPress options table.
EOD;
  
  $options = array ('description'        => $description,
                    'ingredientlist'     => 'bullets',
                    'instructionlist'    => 'numbers',
                    'enclosure'          => 'div',
                    'background_color'   => 'white',
                    'recipe_text'        => __('Recipe','hrecipe'),
                    'summary_text'       => __('Summary','hrecipe'),
                    'ingredients_text'   => __('Ingredients','hrecipe'),
                    'instructions_text'  => __('Instructions','hrecipe'),
                    'quicknotes_text'    => __('Quick notes','hrecipe'),
                    'variations_text'    => __('Variations','hrecipe'),
                    'culinary_tradition' => __('Culinary tradition','hrecipe'),
                    'rating_text'        => __('My rating','hrecipe'),
                    'stars_text'         => __('stars','hrecipe'),
                    'byline'             => '',
                    'copyright'          => '',
                    'linklove'           => '',
                    'reciply'            => '',
                    'support'            => ''
  );
  
  update_option('hrecipe_options', $options);
  
} 


 
function hrecipe_set_old_default_options() {

  // Set up defaults for options
  //$copyright = bloginfo('name');
  add_option('hrecipe_bgcolor', 'white');
  add_option('hrecipe_linklove', 'off');
  add_option('hrecipe_reciply', 'off');
  add_option('hrecipe_copyright', '');
  add_option('hrecipe_byline', '');

  // Text label options
  add_option('hrecipe_recipe',            __('Recipe','hrecipe'));
  add_option('hrecipe_recipe_text',       __('Recipe','hrecipe'));
  add_option('hrecipe_summary',           __('Summary','hrecipe'));
  add_option('hrecipe_summary_text',      __('Summary','hrecipe'));
  add_option('hrecipe_ingredients',       __('Ingredients','hrecipe'));
  add_option('hrecipe_ingredients_text',  __('Ingredients','hrecipe'));
  add_option('hrecipe_instructions_text', __('Instructions','hrecipe'));
  add_option('hrecipe_quicknotes_text',   __('Quick Notes','hrecipe'));
  add_option('hrecipe_variations_text',   __('Variations','hrecipe'));
  add_option('hrecipe_culinary_tradition',__('Culinary Tradition','hrecipe'));
  add_option('hrecipe_rating_text',       __('My rating: ', 'hrecipe'));
  add_option('hrecipe_stars_text',        __('stars', 'hrecipe'));

  // Structure options
  add_option('hrecipe_ingredientlist', 'bullets');
  add_option('hrecipe_enclosure', 'div');
  add_option('hrecipe_support','');
}

 
function hrecipe_delete_old_options() {

  delete_option('hrecipe_recipe');
  delete_option('hrecipe_recipe_text');
  delete_option('hrecipe_summary');
  delete_option('hrecipe_summary_text');
  delete_option('hrecipe_ingredients');
  delete_option('hrecipe_ingredients_text');
  delete_option('hrecipe_instructions');
  delete_option('hrecipe_instructions_text');
  delete_option('hrecipe_culinary_tradition');
  delete_option('hrecipe_ingredientlist');
  delete_option('hrecipe_enclosure');
  delete_option('hrecipe_copyrright');
  delete_option('hrecipe_quicknotes_text');
  delete_option('hrecipe_variations_text');
  delete_option('hrecipe_support');
  delete_option('hrecipe_options[linklove]');  
  delete_option('hrecipe_rating_text');
  delete_option('hrecipe_stars_text');
  delete_option('hrecipe_bgcolor');
  delete_option('hrecipe_linklove');
  delete_option('hrecipe_reciply');
  delete_option('hrecipe_byline');
  delete_option('hrecipe_copyright');
}
 
 


?>