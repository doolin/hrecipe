<?php

// TODO: Use as an options array.
// TODO: Write an iterator aking array of handles
// and fetching options.
function hrecipe_localize_vars() {
  return array(
    'SiteUrl' => get_bloginfo('url'),
    'Permalink' => get_permalink(),
    'AjaxUrl' => admin_url('admin-ajax.php'),
    'PluginsUrl' => plugins_url('hrecipe',dirname(__FILE__)),
    'hrecipe_rating_text' => get_option('hrecipe_rating_text'),
    'hrecipe_stars_text' => get_option('hrecipe_stars_text'),
    'hrecipe_ingredientslist' => get_option('hrecipe_ingredientlist'),
    'hrecipe_ingredients_text' => get_option('hrecipe_ingredients_text'),
    'hrecipe_instructions_text' => get_option('hrecipe_instructions_text'),
    'hrecipe_quicknotes_text' => get_option('hrecipe_quicknotes_text'),
    'hrecipe_variations_text' => get_option('hrecipe_variations_text'),
    'hrecipe_summary_text' => get_option('hrecipe_summary_text'),
    'hrecipe_enclosure' => get_option('hrecipe_enclosure'),
    'hrecipe_recipe_text' => get_option('hrecipe_recipe_text'),
    'hrecipe_copyright' => get_option('hrecipe_copyright'),
    'hrecipe_byline' => get_option('hrecipe_byline'),
    'hrecipe_linklove' => get_option('hrecipe_linklove'),
    'hrecipe_reciply' => get_option('hrecipe_reciply'),
    'hrecipe_enclosure' => get_option('hrecipe_enclosure')
  );
}

?>