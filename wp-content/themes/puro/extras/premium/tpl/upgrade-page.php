<?php
global $siteorigin_premium_info;
$premium_info = $siteorigin_premium_info;
$theme = basename( get_template_directory() );
?>

<div class="wrap" id="theme-upgrade">

	<?php if( empty($premium_info['free_download']) ) : ?>

		<form id="theme-upgrade-info" method="post" action="<?php echo esc_url( add_query_arg( 'action', 'enter-order' ) ) ?>" target="_blank">
			<p>
				<?php
				printf(
					__( "After you pay for %s, we'll email you an order number to your <strong>PayPal email address</strong>. ", 'puro' ) ,
					apply_filters('siteorigin_premium_theme_name', ucfirst($theme) . ' ' . __( 'Premium', 'puro' ) )
				);
				printf(
					__( "Use <a href='%s' target='_blank'>this form</a> if you don't receive your order number in the next 15 minutes. ", 'puro' ) ,
					'http://puro.fetchapp.com/orders'
				);
				_e( 'To be sure, check your spam folder.', 'puro' );
				?>
			</p>

			<label><strong><?php _e( 'Order Number', 'puro' ) ?></strong></label>
			<input type="text" class="regular-text" name="order_number" />
			<input type="submit" value="<?php esc_attr_e( 'Enable Upgrade', 'puro' ) ?>" />
			<?php wp_nonce_field( 'save_order_number', '_upgrade_nonce' ) ?>
		</form>

		<a href="#" id="theme-upgrade-already-paid" class="button"><?php _e( 'Already Paid?', 'puro' ) ?></a>

	<?php endif; ?>

	<div id="icon-themes" class="icon32"><br></div>
	<h2><?php echo !empty($premium_info['premium_title']) ? $premium_info['premium_title'] : __('Premium Upgrade', 'puro') ?></h2>

	<?php if( empty($premium_info) ) : ?>

		<p><?php printf(__( "The premium version of this theme is no longer available. If you need any help, please contact <a href='mailto:support@purothemes.com'>Puro support</a>.", 'puro' ),ucfirst( $theme )); ?></p>

	<?php else:  ?>

		<div class="left-column">

			<?php if( !empty($premium_info['premium_video_poster']) ) : ?>
				<div id="video-wrapper" style="background-image: url(<?php echo esc_url($premium_info['premium_video_poster']) ?>)">
					<?php if(!empty($premium_info['premium_video_id'])) : ?>
						<a href="https://player.vimeo.com/video/<?php echo intval($premium_info['premium_video_id']) ?>?title=0&byline=0&portrait=0&autoplay=1" target="_blank" id="click-to-play" data-video-id="<?php echo intval($premium_info['premium_video_id']) ?>" target="_blank"></a>
					<?php else : ?>
						<div class="placeholder"></div>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<p class="premium-summary">
				<?php echo $premium_info['premium_summary'] ?>
			</p>

			<div id="features">
				<?php foreach ( $premium_info['features'] as $feature ) : ?>
					<div class="feature clearfix">
						<?php if(!empty($feature['image'])) : ?><img src="<?php echo $feature['image'] ?>" /><?php endif; ?>
						<h3><?php echo $feature['heading'] ?></h3>
						<p><?php echo $feature['content'] ?></p>
					</div>
				<?php endforeach; ?>
			</div>

		</div>

		<div class="right-column">

			<?php if( empty($premium_info['free_download']) && function_exists( 'siteorigin_theme_update_settings' ) ) : ?>

				<form method="get" action="<?php echo esc_url( $premium_info['buy_url'] ) ?>" id="purchase-form" target="_blank">

					<p class="download">
						<a href="<?php echo esc_url( $premium_info['buy_url'] ) ?>?amount=15" class="buy-button variable-pricing-submit">
							<span><?php _e('Buy Now', 'puro') ?></span><em>$15</em>
							<input type="hidden" name="amount" value="15" >
						</a>
					</p>

					<div class="support-message">
						<p><?php _e("Although we appreciate and support all our users, we only offer prioritized support for orders of <strong>$15</strong> or more.", 'puro') ?></p>
					</div>

					<p class="description">
						<?php printf( __("You choose the price, so you can pay what %s is worth to you.", 'puro'), ucfirst($theme) ) ?>
					</p>

					<div class="options hide-if-no-js">
						<label><input type="radio" name="variable_pricing_option" value="10"> <strong>$10</strong> <?php _e('Building your site on a budget', 'puro') ?></label>
						<label><input type="radio" name="variable_pricing_option" value="15" <?php checked(true) ?>> <strong>$15</strong> <?php _e("A fair price for a powerful theme", 'puro') ?></label>
						<label><input type="radio" name="variable_pricing_option" value="20"> <strong>$20</strong> <?php _e("Our sincere thanks", 'puro') ?></label>
						<label><input type="radio" name="variable_pricing_option" value="35"> <strong>$35</strong> <?php _e("We'll go that extra mile for you", 'puro') ?></label>
						<label><input type="radio" name="variable_pricing_option" value="50"> <strong>$50</strong> <?php _e("A huge contribution to its development", 'puro') ?></label>
						<label><input type="radio" name="variable_pricing_option" value="custom" class="custom-price" > <strong><?php _e('Custom', 'puro') ?></strong> <input type="number" name="variable_pricing_custom" value="15" placeholder="$5+" min="5"> </label>
					</div>
					<div class="options hide-if-js">
						<p><?php _e('Please enable Javascript to change pricing', 'puro') ?></p>
					</div>

					<p class="description choose-description">
						<?php printf( __("Happy customers are our first priority. In the event, however, that you decide %s isn't quite right for you, we want to make things right. Within 60 days of purchase, we'll refund the full price you paid upon request.", 'puro') , ucfirst($theme) ) ?>
					</p>

				</form>

			<?php else : ?>

				<div id="purchase-form" class="supporters-pack">

					<p class="download">
						<a href="<?php echo esc_url( $premium_info['buy_url'] ) ?>" class="buy-button">
							<span><?php _e('Download', 'puro') ?></span><em>Free</em>
						</a>
					</p>

					<p class="description">
						<?php printf( __("Sign up to our newsletter and download %s for free.", 'puro'), apply_filters('siteorigin_premium_theme_name', ucfirst($theme) . ' ' . __( 'Premium', 'puro' ) ) ) ?>
					</p>

				</div>

			<?php endif; ?>

			<?php if(!empty($premium_info['roadmap'])) : ?>
				<div class="contribute">
					<?php printf( __('Your contribution will help fund new features in %s.', 'puro'), ucfirst($theme) ); ?>
					<?php printf( __('Find out more on our <a href="%s" target="_blank">roadmap</a>.', 'puro'), $premium_info['roadmap'] ); ?>
				</div>
			<?php endif; ?>

			<?php if(!empty($premium_info['testimonials'])): ?>
				<h3 class="testimonials-heading"><?php _e('Our User Feedback', 'puro') ?></h3>
				<ul class="testimonials">
					<?php foreach($premium_info['testimonials'] as $testimonial) : ?>
						<li class="testimonial clearfix">
							<div class="avatar" style="background-image: url(http://www.gravatar.com/avatar/<?php echo esc_attr($testimonial['gravatar']) ?>?d=identicon&s=40)"></div>

							<div class="text">
								<div class="name"><?php echo $testimonial['name'] ?></div>
								<div class="title"><?php echo $testimonial['title'] ?></div>
								<div class="content"><?php echo $testimonial['content'] ?></div>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

		</div>

	<?php endif; ?>

	<div class="clear"></div>
</div>