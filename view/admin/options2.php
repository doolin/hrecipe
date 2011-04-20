
<!-- Thank you Michael Torbert of All In One SEO Pack -->
<script type="text/javascript"> 
//<!--
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


function hrecipe_postbox_fields($id, $title, $content, $section) {
  global $hrecipe_options_file;
?>

      <div id="<?php echo $id; ?>" class="postbox">
        <div class="handlediv" title="Click to toggle"><br /></div>
        <h3 class="hndle"><span><?php echo $title; ?></span></h3>
        <div class="inside">
           <?php echo $content; ?>
           <table class="form-table">
             <?php //echo $section ?>
             <?php do_settings_fields($hrecipe_options_file, $section); ?>
          </table>
        </div>
      </div>
<?php   
}


   
    // http://www.mrspeaker.net/2009/08/07/convert-wordpress-fetch_rss-to-fetch_feed/
    // http://codex.wordpress.org/Function_Reference/fetch_feed
    function hrecipe_news($id, $title, $feed, $class) {
      
      $rss = fetch_feed($feed);
      if (is_wp_error($rss)) {
        return;
      }
      
      $content = '<ul>';
      $rssitems = array_slice( $rss->get_items(), 0, 3 );
      foreach ((array)$rssitems as $item) {
       /* Credit: Joost de Valk, yoast.com */
        $content .= '<li class="'.$class.'">';
        $content .= '<a class="rsswidget" href="'.esc_url( $item->get_permalink(), $protocolls=null, 'display' ).'">'. htmlentities($item->get_title()) .'</a> ';
        $content .= '</li>';
      }
      $content .= '<li class="rss"><a href="'.$feed.'">Subscribe with RSS</a></li></ul>';
      hrecipe_postbox($id, $title, $content);
    }



function hrecipe_options_tip($id, $label, $tip) {
?>
  <a style="cursor:pointer;" title="Click for Help!" onclick="toggleVisibility('<?php echo $id; ?>');">
  <?php _e($label, 'hrecipe'); ?>
  </a>
  <div style="max-width:500px; text-align:left; display:none" id="<?php echo $id; ?>">
  <?php _e($tip, 'hrecipe'); ?>
  </div>
<?php  
}
?>


<div class="wrap">

<?php 
//echo $this->url(); 
//$options = get_option('hrecipe_options');
?>

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
    <?php settings_fields('hrecipe_options_group'); $options = get_option('hrecipe_options');?>



    <table cellpadding="3" width="100%" class="form-table">

<?php 
function hrecipe_emit_donation_html($options) {
?>
      <tr>
        <th align="right"><?php _e ('Plugin Support', 'hrecipe'); ?>:</th>
        <td>
          <input type='checkbox' id='support' name='hrecipe_options[support]' <?php checked(!empty( $options['support'])); ?> /> 
          <label for="support"><span class="sub"><?php _e ('I\'m a nice person and I have helped support the author of this plugin', 'hrecipe'); ?></span></label>
        </td>
      </tr>
<?php
}
//hrecipe_emit_donation_html($options);
?>
            <tr valign="top">
                <th scope="row">
                    <?php hrecipe_options_tip('hrecipe_linklove_tip', 'Link love!', 'Link love sends a trackback to the hRecipe home page.  You get a backlink to your recipe. I use it to see how people use hRecipe and fix problems.'); ?>                                    
                </th>
                <td>
                    <input type='checkbox' id='linklove' name='hrecipe_options[linklove]'
                    <?php checked( !empty( $options['linklove']));?> />
                    <?php _e('Yes! Help hRecipe help you, and find other bloggers.', 'hrecipe'); ?>
                </td>
            </tr>
<?php
function hrecipe_emit_reciply_html($options) {
?>
            <tr valign="top">
                <th scope="row">
                    <?php hrecipe_options_tip('hrecipe_reciply_tip', 'Recip.ly', '(UK only!) Recip.ly lets you earn money and save time by ordering recipe ingredients online'); ?>                                    
                </th>
                <td>
                    <input type='checkbox' id='reciply' name='hrecipe_options[reciply]' <?php checked( !empty( $options['reciply']));?> />
                    <?php _e('Yes!', 'hrecipe'); ?>
                </td>
            </tr>
<?php
}
//hrecipe_emit_reciply_html($options);
?>
      </table>

          <p class="submit">
          <input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" />
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
                                    <?php hrecipe_options_tip('hrecipe_recipe_tip', 'Recipe text', 'Change the name of the name of the recipe as you see fit.  For example, Cocktail.'); ?>                                    
                                </th>
                                <td>
                                    <?php echo "<input id='hrecipe_recipe_text' name='hrecipe_options[recipe_text]' size='40' type='text' value='{$options['recipe_text']}' />"; ?>
                                </td>
                            </tr>
                            
                            <tr valign="top">
                                <th scope="row">
                                    <?php hrecipe_options_tip('hrecipe_summary_tip', 'Summary text', 'A short description of the recipe.'); ?>                                    
                                </th>
                                <td>
                                    <?php echo "<input id='hrecipe_summary_text' name='hrecipe_options[summary_text]' size='40' type='text' value='{$options['summary_text']}' />"; ?>
                                </td>
                            </tr>

                            <tr valign="top">
                                <th scope="row">
                                    <?php hrecipe_options_tip('hrecipe_ingredients_tip', 'Ingredients text', 'Food stuffs used for preparing the recipe.'); ?>                                    
                                </th>
                                <td>
                                    <?php echo "<input id='hrecipe_ingredients_text' name='hrecipe_options[ingredients_text]' size='40' type='text' value='{$options['ingredients_text']}' />"; ?>
                                </td>
                            </tr>
                            
                            <tr valign="top">
                                <th scope="row">
                                    <?php hrecipe_options_tip('hrecipe_instruction_tip', 'Instructions text', 'How the recipe is prepared.'); ?>                                    
                                </th>
                                <td>
                                    <?php echo "<input id='hrecipe_intructions_text' name='hrecipe_options[instructions_text]' size='40' type='text' value='{$options['instructions_text']}' />"; ?>
                                </td>
                            </tr>

                            <tr valign="top">
                                <th scope="row">
                                    <?php hrecipe_options_tip('hrecipe_quicknotes_tip', 'Quick notes text', 'Some quick extra notes'); ?>                                    
                                </th>
                                <td>
                                    <?php echo "<input id='hrecipe_quicknotes_text' name='hrecipe_options[quicknotes_text]' size='40' type='text' value='{$options['quicknotes_text']}' />"; ?>
                                </td>
                            </tr>

                            <tr valign="top">
                                <th scope="row">
                                    <?php hrecipe_options_tip('hrecipe_variations_tip', 'Variations text', 'Use this recipe to make related recipes.'); ?>                                    
                                </th>
                                <td>
                                    <?php echo "<input id='hrecipe_variations_text' name='hrecipe_options[variations_text]' size='40' type='text' value='{$options['variations_text']}' />"; ?>
                                </td>
                            </tr>

                            <tr valign="top">
                                <th scope="row">
                                    <?php hrecipe_options_tip('hrecipe_rating_tip', 'Rating text', 'You can choose to rate each recipe, using the text of your choice.'); ?>                                    
                                </th>
                                <td>
                                    <?php echo "<input id='hrecipe_rating_text' name='hrecipe_options[rating_text]' size='40' type='text' value='{$options['rating_text']}' />"; ?>
                                </td>
                            </tr>

                            <tr valign="top">
                                <th scope="row">
                                    <?php _e('Stars text', 'hrecipe'); ?>
                                </th>
                                <td>
                                     <?php echo "<input id='hrecipe_stars_text' name='hrecipe_options[stars_text]' size='40' type='text' value='{$options['stars_text']}' />"; ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

          <p class="submit">
            <input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" />
          </p>
         
                <div id="hrecipestyling-old" class="postbox">
                    <div class="handlediv" title="Click to toggle">
                        <br/>
                    </div>
                    
                    <h3 class="hndle"><span>Recipe Styling</span></h3>

                    <div class="inside">
                      <?php
                      $stylingcontent = <<<EOP
                    <p>
                        The actions in this section control how your recipe is styled. 
                        At the moment, only the global background color can be 
                        set as an option.  In the future, fonts and font styles 
                        will be customizable.
                    </p>
EOP;
                        echo $stylingcontent;
?>
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
                                    <?php
                                      echo "<input id='hrecipe_background_color' name='hrecipe_options[background_color]' size='40' type='text' value='{$options['background_color']}' />"; 
                                     ?>
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
                                    <input type="radio" name='hrecipe_options[enclosure]' value="div"
                                    <?php if ($options['enclosure'] == 'div') echo "checked"?>>
                                    <?php _e('div', 'hrecipe'); ?>
                                    
                                    &nbsp;&nbsp;
                                    
                                    <input type="radio" name='hrecipe_options[enclosure]' value="fieldset"
                                    <?php if ($options['enclosure'] == 'fieldset') echo "checked"?>>
                                    <?php _e('fieldset', 'hrecipe'); ?>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <?php _e('Ingredient list', 'hrecipe'); ?>
                                </th>
                                <td>
                                    <input type="radio" name='hrecipe_options[ingredientlist]' value="bullets"
                                    <?php if ($options['ingredientlist'] == 'bullets') echo "checked"?>>
                                    <?php _e('Bullets', 'hrecipe'); ?>
                                    
                                    &nbsp;&nbsp;
                                    
                                    <input type="radio" name='hrecipe_options[ingredientlist]' value="numbers"
                                    <?php if ($options['ingredientlist'] == 'numbers') echo "checked"?>>
                                    <?php _e('Numbers', 'hrecipe'); ?>
                                </td>
                            </tr>
  
  
  
  
                            <tr valign="top">
                                <th scope="row">
                                    <?php _e('Instruction list formatting', 'hrecipe'); ?>
                                </th>                                
                                <td>
                                                                      
                                    <input type="radio" name='hrecipe_options[instructionlist]' value="bullets"
                                    <?php if ($options['instructionlist'] == 'bullets') echo "checked"?>>
                                    <?php _e('Bullets', 'hrecipe'); ?>
                                    
                                    &nbsp;&nbsp;
                                    
                                    <input type="radio" name='hrecipe_options[instructionlist]' value="numbers"
                                    <?php if ($options['instructionlist'] == 'numbers') echo "checked"?>>
                                    <?php _e('Numbers', 'hrecipe'); ?>
                                    
                                    
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <?php _e('Byline (no HTML)', 'hrecipe'); ?>
                                </th>
                                <td>
                                     <?php echo "<input id='hrecipe_byline' name='hrecipe_options[byline]' size='40' type='text' value='{$options['byline']}' />"; ?>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <?php _e('Copyright (no HTML)', 'hrecipe'); ?>
                                </th>
                                <td>
                                     <?php echo "<input id='hrecipe_copyright' name='hrecipe_options[copyright]' size='40' type='text' value='{$options['copyright']}' />"; ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

             
             <?php /* future... */ //hrecipe_postbox_fields('hrecipestyling', 'hRecipe Styling', $stylingcontent, 'hrecipe_styling'); ?>                            

          <p class="submit">
          <input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" />
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
love always goes better with a little bread.
</p>
<ul>
<li>Commercial Sponsor <a href="http://yummly.com/">Yummly</a>.</li>
<li>Theresa Carle-Sanders <a href="http://islandvittles.com/">Island Vittles</a>.</li>
<li>Susan Voison - <a href="http://blog.fatfreevegan.com/">Fat Free Vegan</a></li>
<li><a href="http://transcriptionconnections.com/">Transcription Connections</a></li>
<li><a href="http://annebender.com/">Anne Bender</a></li>
<li><a href="http://bransonsparks.com">Branson Sparks</a></li>
</ul>
<p>If would like to take your place at the head of 
this list, hit that shiny orange PayPal Donate
button right above.  Thanks!</p>
EOF;
  hrecipe_postbox($id,$title,$content);
}
?>

<?php
 // Check out the side boxes for XML Sitemaps, very slick.
?>
<?php //bpe_appreciation('bpe-appreciation','Like this plugin?'); ?> 
<?php //bpe_support('bpe-get-support','Need support?'); ?>
<?php hrecipe_donate_postbox('donate','<strong class="red">Donate $12, $25 or $50!</strong>'); ?>
<?php hrecipe_news('hrecipelatest', 'News: hRecipe for WordPress','http://hrecipe.com/feed/','hrecipe'); ?>
<?php hrecipe_news('wiawlatest', 'News: Website In A Weekend','http://website-in-a-weekend.net/feed/','wiaw'); ?>
<?php hrecipe_news('tinoboxlatest', 'News: There Is No Box','http://tinobox.com/wordpress/feed/','tinobox'); ?>

</div><!-- meta-box-sortables -->
<br />
<br />
<br />
</div><!-- postbox-container -->
            

       
       
                         
      </div><!-- metabox-holder -->
    </form>    
</div><!-- wrap -->
