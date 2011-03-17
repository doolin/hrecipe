<?php

// http://planetozh.com/blog/2009/09/top-10-most-common-coding-mistakes-in-wordpress-plugins/
// http://striderweb.com/nerdaphernalia/2008/07/consolidate-options-with-arrays/
// Some "best practice" 
/**
 * http://scribu.net/wordpress/front-end-editor
 * http://wordpress.stackexchange.com/questions/266/best-of-breed-features-of-a-high-end-wordpress-web-host
 * http://wordpress.stackexchange.com/questions/4702/best-practices-for-a-b-testing
 * http://wordpress.stackexchange.com/questions/715/objective-best-practices-for-plugin-development
 * http://www.heavyworks.net/blog/posts/5-best-practices-on-developing-wordpress-plugins
 */

function hrecipe_add_options() {

	// Set up defaults for options
	//$copyright = bloginfo('name');
	// CSS formatting options
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

	// Miscellaneous
	add_option('hrecipe_support','');
}

function hrecipe_delete_options() {
	
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


	/*
	 delete_option('hrecipe_rating_text');
	 delete_option('hrecipe_stars_text');
	 delete_option('hrecipe_bgcolor');
	 delete_option('hrecipe_linklove');
	 delete_option('hrecipe_byline');
	 delete_option('hrecipe_copyright');
	 */
}


?>