<?php

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