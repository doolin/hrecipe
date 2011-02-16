
<!-- Thank you Michael Torbert of All In One SEO Pack -->
<script type="text/javascript"> 
<!--
    function toggleVisibility(id) {
       var e = document.getElementById(id);
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
    }
//-->
</script> 


<script type="text/javascript">
		//<![CDATA[
		jQuery(document).ready( function($) {
			// close postboxes that should be closed
			$('.if-js-closed').removeClass('if-js-closed').addClass('closed');
			// postboxes setup
			postboxes.add_postbox_toggles('<?php global $hrecipe_pagehook; echo $hrecipe_pagehook; ?>');
		});
		//]]>
	</script>

<?php 
    function hrecipe_postbox($id, $title, $content) {
?>
			<div id="<?php echo $id; ?>" class="postbox">
				<div class="handlediv" title="Click to toggle"><br /></div>
				<h3 class="hndle"><span><?php echo $title; ?></span></h3>
				<div class="inside">
					<?php echo $content; ?>
				</div>
			</div>
<?php   
    }
    
		/**
		 * Box with latest RSS news
		 */
		function hrecipe_news($id, $title, $feed, $class) {
			require_once(ABSPATH.WPINC.'/rss.php');
			if ( $rss = fetch_rss($feed)) {
			    $content = '<ul>';
				$rss->items = array_slice( $rss->items, 0, 3 );
				foreach ( (array) $rss->items as $item ) {
				    /* Credit: Joost de Valk, yoast.com */
					$content .= '<li class="'.$class.'">';
					$content .= '<a class="rsswidget" href="'.clean_url( $item['link'], $protocolls=null, 'display' ).'">'. htmlentities($item['title']) .'</a> ';
					$content .= '</li>';
				}
				$content .= '<li class="rss"><a href="'.$feed.'">Subscribe with RSS</a></li>';
				hrecipe_postbox($id, $title, $content);
			} else {
				hrecipe_postbox($id, $title, 'Nothing to say...');
			}
		}
    
    
?>

<div class="wrap">

<?php //echo $this->url(); ?>

<?php screen_icon(); ?>

<?php if (!get_option('hrecipe_support')) : ?>
	<div style="text-align: center; width: 80px; height: 50px; float: right; margin: 5px 15px 1px 0; padding: 4px 3px 0px 3px;-moz-border-radius: 5px; -webkit-border-radius: 5px;" id="support-annoy">
       
       <a href="<?php echo $this->base(); ?>?page=hrecipe.class&amp;sub=support">
	   <img src="<?php echo $this->url() ?>/images/donate.gif" alt="support" />
       </a>
</div>
<?php endif; ?>

    <h2>
        <?php _e('hRecipe Support for Editor', 'hrecipe'); ?>
    </h2>
    
    <form method="post" action="options.php">

        <?php wp_nonce_field('update-options'); ?>

	  <table cellpadding="3" width="100%" class="form-table">
			<tr>
				<th align="right"><?php _e ('Plugin Support', 'hrecipe'); ?>:</th>
				<td>
					<input type="checkbox" name="hrecipe_support" <?php echo $this->checked (get_option('hrecipe_support')); ?> id="support"/> 
					<label for="support"><span class="sub"><?php _e ('I\'m a nice person and I have helped support the author of this plugin', 'hrecipe'); ?></span></label>
				</td>
			</tr>
            <tr valign="top">
                <th scope="row">
                    <a style="cursor:pointer;" title="Click for Help!" onclick="toggleVisibility('hrecipe_linklove_tip');">
                        <?php _e('Link love!', 'hrecipe'); ?>
                    </a>
                    <div style="max-width:500px; text-align:left; display:none" id="hrecipe_linklove_tip">
                        <?php
                        _e('Link love sends a trackback to the hRecipe home page.  You get a backlink to your recipe.
                        I use it to see how people use hRecipe and fix problems.', 'hrecipe');
                        ?>
                    </div>
                </th>
                <td>
                    <input type="checkbox" id="linklove" name="hrecipe_linklove"
                    <?php if (get_option('hrecipe_linklove')) echo 'checked="checked"'?>
>
                    <?php _e('Yes!', 'hrecipe'); ?>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">
                    <a style="cursor:pointer;" title="Click for Help!" onclick="toggleVisibility('hrecipe_reciply_tip');">
                        <?php _e('Recip.ly', 'hrecipe'); ?>
                    </a>
                    <div style="max-width:500px; text-align:left; display:none" id="hrecipe_reciply_tip">
                        <?php
                        _e('(UK only!) Recip.ly lets you earn money and save time by ordering recipe ingredients online', 'hrecipe');
                        ?>
                    </div>
                </th>
                <td>
                    <input type="checkbox" id="reciply" name="hrecipe_reciply"
                    <?php if (get_option('hrecipe_reciply')) echo 'checked="checked"'?>
>
                    <?php _e('Yes!', 'hrecipe'); ?>
                </td>
            </tr>
      </table>

        <p class="submit">
            <input type="submit" name="Submit" value="<?php _e('Save Changes','hrecipe') ?>" />
        </p>

        <div class="metabox-holder">




          <div class="postbox-container" style="width: 70%;">
          
          <div class="meta-box-sortables ui-sortable">
          
          
       
              
                <div id="hrecipelabels" class="postbox ">
                    <div class="handlediv" title="Click to toggle"><br/></div><!-- handlediv -->
                    <h3 class="hndle"><span><?php _e('Recipe Labels', 'hrecipe'); ?></span></h3>
                    <div class="inside">
                    <p>
                    Actions here control how your recipe is labeled. 
                    </p>
                        <table class="form-table">

                            <tr valign="top">
                                <th scope="row">
                                    <a style="cursor:pointer;" title="Click for Help!" onclick="toggleVisibility('hrecipe_recipe_tip');">
                                    <?php _e('Recipe text', 'hrecipe'); ?>
                                    </a>
                                    <div style="max-width:500px; text-align:left; display:none" id="hrecipe_recipe_tip">
                                        <?php _e('Change the name of the name of the recipe as you see fit.  For example, Cocktail.', 'hrecipe'); ?>
                                    </div>                                    
                                </th>
                                <td>
                                    <input type="text" name="hrecipe_recipe_text" value="<?php echo get_option('hrecipe_recipe_text'); ?>" />
                                </td>
                            </tr>
                            
                            <tr valign="top">
                                <th scope="row">
                                    <a style="cursor:pointer;" title="Click for Help!" onclick="toggleVisibility('hrecipe_summary_tip');">
                                    <?php _e('Summary text', 'hrecipe'); ?>
                                    </a>
                                    <div style="max-width:500px; text-align:left; display:none" id="hrecipe_summary_tip">
                                        <?php _e('A short description of the recipe.', 'hrecipe'); ?>
                                    </div>                                    
                                </th>
                                <td>
                                    <input type="text" name="hrecipe_summary_text" value="<?php echo get_option('hrecipe_summary_text'); ?>" />
                                </td>
                            </tr>

                            <tr valign="top">
                                <th scope="row">
                                    <a style="cursor:pointer;" title="Click for Help!" onclick="toggleVisibility('hrecipe_ingredients_tip');">
                                    <?php _e('Ingredients text', 'hrecipe'); ?>
                                    </a>
                                    <div style="max-width:500px; text-align:left; display:none" id="hrecipe_ingredients_tip">
                                        <?php _e('Food stuffs used for preparing the recipe.', 'hrecipe'); ?>
                                    </div>                                    
                                </th>
                                <td>
                                    <input type="text" name="hrecipe_ingredients_text" value="<?php echo get_option('hrecipe_ingredients_text'); ?>" />
                                </td>
                            </tr>
                            
                            <tr valign="top">
                                <th scope="row">
                                    <a style="cursor:pointer;" title="Click for Help!" onclick="toggleVisibility('hrecipe_instructions_tip');">
                                    <?php _e('Instructions text', 'hrecipe'); ?>
                                    </a>
                                    <div style="max-width:500px; text-align:left; display:none" id="hrecipe_instructions_tip">
                                        <?php _e('How the recipe is prepared.', 'hrecipe'); ?>
                                    </div>                                    
                                </th>
                                <td>
                                    <input type="text" name="hrecipe_instructions_text" value="<?php echo get_option('hrecipe_instructions_text'); ?>" />
                                </td>
                            </tr>

                            <tr valign="top">
                                <th scope="row">
                                    <a style="cursor:pointer;" title="Click for Help!" onclick="toggleVisibility('hrecipe_quicknotes_tip');">
                                    <?php _e('Quick notes text', 'hrecipe'); ?>
                                    </a>
                                    <div style="max-width:500px; text-align:left; display:none" id="hrecipe_quicknotes_tip">
                                        <?php _e('Some quick extra notes.', 'hrecipe'); ?>
                                    </div>                                    
                                </th>
                                <td>
                                    <input type="text" name="hrecipe_quicknotes_text" value="<?php echo get_option('hrecipe_quicknotes_text'); ?>" />
                                </td>
                            </tr>

                            <tr valign="top">
                                <th scope="row">
                                    <a style="cursor:pointer;" title="Click for Help!" onclick="toggleVisibility('hrecipe_variations_tip');">
                                    <?php _e('Variations text', 'hrecipe'); ?>
                                    </a>
                                    <div style="max-width:500px; text-align:left; display:none" id="hrecipe_variations_tip">
                                        <?php _e('Use this recipe to make related recipes.', 'hrecipe'); ?>
                                    </div>                                    
                                </th>
                                <td>
                                    <input type="text" name="hrecipe_variations_text" value="<?php echo get_option('hrecipe_variations_text'); ?>" />
                                </td>
                            </tr>

                            <tr valign="top">
                                <th scope="row">
                                    <a style="cursor:pointer;" title="Click for Help!" onclick="toggleVisibility('hrecipe_rating_tip');">
                                        <?php _e('Rating text', 'hrecipe'); ?>
                                    </a>
                                    <div style="max-width:500px; text-align:left; display:none" id="hrecipe_rating_tip">
                                        <?php _e('You can choose to rate each recipe, using the text of your choice.', 'hrecipe'); ?>
                                    </div>
                                </th>
                                <td>
                                    <input type="text" name="hrecipe_rating_text" value="<?php echo get_option('hrecipe_rating_text'); ?>" />
                                </td>
                            </tr>

                            <tr valign="top">
                                <th scope="row">
                                    <?php _e('Stars text', 'hrecipe'); ?>
                                </th>
                                <td>
                                    <input type="text" name="hrecipe_stars_text" value="<?php echo get_option('hrecipe_stars_text'); ?>" />
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
           

                <div id="hrecipestyling" class="postbox">
                    <div class="handlediv" title="Click to toggle">
                        <br/>
                    </div>
                    
                    <h3 class="hndle"><span>Recipe Styling</span></h3>

                    <div class="inside">
                    <p>
                        The actions in this section control how your recipe is styled. 
                        At the moment, only the global background color can be 
                        set as an option.  In the future, fonts and font styles 
                        will be customizable.
                    </p>
                        <table class="form-table">
                            <tr valign="top">
                                <th scope="row">
                                    <a style="cursor:pointer;" title="Click for Help!" onclick="toggleVisibility('hrecipe_background_color_tip');">
                                    
                                        <?php _e('Background color', 'hrecipe'); ?>
                                    </a>
                                    <div style="max-width:500px; text-align:left; display:none" id="hrecipe_background_color_tip">
                                        <?php _e('Set the background color for the enclosing container.', 'hrecipe'); ?>
                                    </div>
                                </th>
                                <td>
                                    <input type="text" name="hrecipe_bgcolor" value="<?php echo get_option('hrecipe_bgcolor'); ?>" />
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            
            
                <div id="hrecipestructure" class="postbox ">
                    <div class="handlediv" title="Click to toggle">
                        <br/>
                    </div>
                    <h3 class="hndle"><span>Recipe Structure</span></h3>
                    
                    <div class="inside">
                    <p>
                        The actions in this section control how your recipe is structured. 
                    </p>
                    
                        <table class="form-table">
                            <tr valign="top">
                                <th scope="row">
                                    <?php _e('Enclosure formatting', 'hrecipe'); ?>
                                </th>
                                <td>
                                    <input type="radio" name="hrecipe_enclosure" value="div"
                                    <?php if (get_option('hrecipe_enclosure') == 'div') echo "checked"?>
>
                                    <?php _e('div', 'hrecipe'); ?>
                                    &nbsp;&nbsp;<input type="radio" name="hrecipe_enclosure" value="fieldset"
                                    <?php if (get_option('hrecipe_enclosure') == 'fieldset') echo "checked"?>
>
                                    <?php _e('fieldset', 'hrecipe'); ?>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <?php _e('Ingredient list', 'hrecipe'); ?>
                                </th>
                                <td>
                                    <input type="radio" name="hrecipe_ingredientlist" value="bullets"
                                    <?php if (get_option('hrecipe_ingredientlist') == 'bullets') echo "checked"?>
>
                                    <?php _e('Bullets', 'hrecipe'); ?>
                                    &nbsp;&nbsp;<input type="radio" name="hrecipe_ingredientlist" value="numbers"
                                    <?php if (get_option('hrecipe_ingredientlist') == 'numbers') echo "checked"?>
>
                                    <?php _e('Numbers', 'hrecipe'); ?>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <?php _e('Byline (no HTML)', 'hrecipe'); ?>
                                </th>
                                <td>
                                    <input type="text" size="80" name="hrecipe_byline" value="<?php echo get_option('hrecipe_byline'); ?>" />
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <?php _e('Copyright (no HTML)', 'hrecipe'); ?>
                                </th>
                                <td>
                                    <input type="text" size="80" name="hrecipe_copyright" value="<?php echo get_option('hrecipe_copyright'); ?>" />
                                </td>
                            </tr>

                            <!-- tr valign="top">
                                <th scope="row">
                                    <a style="cursor:pointer;" title="Click for Help!" onclick="toggleVisibility('hrecipe_section_tag_tip');">
                                        <?php _e('Header tag', 'hrecipe'); ?>
                                    </a>
                                    <div style="max-width:500px; text-align:left; display:none" id="hrecipe_section_tag_tip">
                                        <?php _e('Choose h1, h2, h3, or h4 for header tag.', 'hrecipe'); ?>
                                    </div>
                                </th>
                                <td>
                                    <input type="text" name="hrecipe_section_tag" value="<?php echo get_option('hrecipe_section_tag'); ?>" />
                                </td>
                            </tr -->
                        </table>
                    </div>
                </div>


        <input type="hidden" name="action" value="update" />
        <input type="hidden" name="page_options" 
        value="hrecipe_support,hrecipe_variations_text,hrecipe_quicknotes_text,hrecipe_recipe_text,hrecipe_summary_text,hrecipe_ingredients_text,hrecipe_rating_text,hrecipe_stars_text,hrecipe_bgcolor,hrecipe_instructions_text,hrecipe_ingredientlist,hrecipe_linklove,hrecipe_reciply,hrecipe_copyright,hrecipe_byline,hrecipe_enclosure" />

        <p class="submit">
            <input type="submit" name="Submit" value="<?php _e('Save Changes','hrecipe') ?>" />
        </p>
        </div>
            </div><!-- postbox-container -->
            
<div class="postbox-container" style="width: 20%;">
<div class="meta-box-sortables ui-sortable">

<?php 
function hrecipe_donate_postbox($id,$title) {

	$content = <<<EOF
<p>
hRecipe is truly a labor of love, but 
love always better with a little bread.
</p>
EOF;
	hrecipe_postbox($id,$title,$content);
}
?>

<?php //bpe_appreciation('bpe-appreciation','Like this plugin?'); ?> 
<?php //bpe_support('bpe-get-support','Need support?'); ?>
<?php //hrecipe_donate_postbox('donate','<strong class="red">Donate $5, $10, $20 or $50!</strong>'); ?>
<?php hrecipe_news('wiawlatest', 'News: Website In A Weekend','http://website-in-a-weekend.net/feed/','wiaw'); ?>
<?php hrecipe_news('tinoboxlatest', 'News: There Is No Box','http://tinobox.com/wordpress/feed/','tinobox'); ?>
<?php hrecipe_news('hrecipelatest', 'News: hRecipe for WordPress','http://hrecipe.com/feed/','hrecipe'); ?>

</div><!-- meta-box-sortables -->
<br />
<br />
<br />
</div><!-- postbox-container -->
            
            
            
        </div><!-- metabox-holder -->
    </form>    
</div><!-- wrap -->
