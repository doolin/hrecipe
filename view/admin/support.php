<?php if (!defined ('ABSPATH')) die ('No direct access allowed'); ?>
<div class="wrap supporter">
	<?php screen_icon(); ?>
	
	<h2><?php _e ('hRecipe Support', 'hRecipe'); ?></h2>

	
	<p style="clear: both">
		<?php _e( 'hRecipe has required a great deal of time and effort to develop. If you find hRecipe useful, help support hRecipe development by <strong>making a small donation</strong>.', 'hrecipe'); ?>
		<?php _e( 'Your donation gives me an incentive for developing, providing countless hours of support, and including new features and suggestions.', 'hRecipe'); ?>
	</p>
	
	<p><?php _e( 'If you are using this plugin in a commercial setup, or feel that it\'s been particularly useful, then you may want to consider a <strong>commercial donation</strong>.', 'hrecipe' )?>
	
	<ul class="donations">
		<li>
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
				<input type="hidden" name="cmd" value="_xclick">
				<input type="hidden" name="business" value="david.doolin@gmail.com">
				<input type="hidden" name="item_name" value="hRecipe - Personal">
				<input type="hidden" name="amount" value="12.00">
				<input type="hidden" name="buyer_credit_promo_code" value="">
				<input type="hidden" name="buyer_credit_product_category" value="">
				<input type="hidden" name="buyer_credit_shipping_method" value="">
				<input type="hidden" name="buyer_credit_user_address_change" value="">
				<input type="hidden" name="no_shipping" value="1">
				<input type="hidden" name="return" value="http://website-in-a-weekend.net/hrecipe-donation-thanks/">
				<input type="hidden" name="no_note" value="1">
				<input type="hidden" name="currency_code" value="USD">
				<input type="hidden" name="tax" value="0">
				<input type="hidden" name="lc" value="US">
				<input type="hidden" name="bn" value="PP-DonationsBF">
				<input type="image" style="border: none" src="<?php echo $this->url () ?>/images/donate.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!"/>
			</form>
			
			<p><strong>$12</strong><br/><?php _e( 'Individual<br/>Donation', 'hrecipe' ); ?></p>
		</li>
		<li>
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
				<input type="hidden" name="cmd" value="_xclick">
				<input type="hidden" name="business" value="david.doolin@gmail.com">
				<input type="hidden" name="item_name" value="hRecipe - Commercial">
				<input type="hidden" name="buyer_credit_promo_code" value="">
				<input type="hidden" name="buyer_credit_product_category" value="">
				<input type="hidden" name="buyer_credit_shipping_method" value="">
				<input type="hidden" name="buyer_credit_user_address_change" value="">
				<input type="hidden" name="no_shipping" value="1">
				<input type="hidden" name="return" value="http://website-in-a-weekend.net/hrecipe-donation-thanks/">
				<input type="hidden" name="no_note" value="1">
				<input type="hidden" name="currency_code" value="USD">
				<input type="hidden" name="tax" value="0">
				<input type="hidden" name="lc" value="US">
				<input type="hidden" name="bn" value="PP-DonationsBF">
				<input type="image" style="border: none" src="<?php echo $this->url () ?>/images/donate.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!"/>
			</form>
			<p><strong>$$$</strong><br/><?php _e( 'Commercial<br/>Donation', 'hrecipe' ); ?></p>
		</li>
	</ul>
	
</div>