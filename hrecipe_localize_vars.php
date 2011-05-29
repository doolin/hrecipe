<?php

// TODO: Use as an options array.
// TODO: Write an iterator aking array of handles
// and fetching options.
function hrecipe_localize_vars() {
  
  global $pagenow;
  global $hrecipe_pagehook;
  $options = get_option('hrecipe_options');
  
  return array(
    'SiteUrl' => get_bloginfo('url'),
    'Permalink' => get_permalink(),
    'AjaxUrl' => admin_url('admin-ajax.php'),
    'PluginsUrl' => plugins_url('hrecipe',dirname(__FILE__)),
    'PageNow' => $pagenow,
    'PageHook' => $hrecipe_pagehook,
    'hrecipe_rating_text'       => $options['rating_text'],
    'hrecipe_stars_text'        => $options['stars_text'],
    'hrecipe_ingredientslist'   => $options['ingredientlist'],
    'hrecipe_ingredients_text'  => $options['ingredients_text'],
    'hrecipe_instructions_text' => $options['instructions_text'],
    'hrecipe_quicknotes_text'   => $options['quicknotes_text'],
    'hrecipe_variations_text'   => $options['variations_text'],
    'hrecipe_summary_text'      => $options['summary_text'],
    'hrecipe_enclosure'         => $options['enclosure'],
    'hrecipe_recipe_text'       => $options['recipe_text'],
    'hrecipe_copyright'         => $options['copyright'],
    'hrecipe_byline'            => $options['byline'],
    'hrecipe_custom_style'      => $options['custom_style'],
    'hrecipe_linklove'          => (!empty($options['linklove'])) ? "on" : "off",
    'hrecipe_reciply'           => (!empty($options['reciply'])) ? "on" : "off",
    'hrecipe_enclosure'         => $options['enclosure'],
    'hrecipe_ingredientlist'    => $options['ingredientlist'],
    'hrecipe_instructionlist'   => $options['instructionlist']
  );
}


function hrecipe_localize_vars_old() {
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