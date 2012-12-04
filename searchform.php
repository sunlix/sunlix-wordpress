<?php

/*
 * the search form
 */
?>

<section class="search">
	<header>
		<h3><?php _e("Search & Find", 'sunlix') ?></h3>
	</header>
	<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" class="ym-form ym-full search-form">
		<div class="ym-fbox-text">
			<label class="ym-hideme" for="s"><?php _e('Search'); ?></label>
			<input type="text" name="s" id="s" placeholder="<?php printf(esc_attr__('Search term %1$s', 'sunlix'), ' + &#x23ce;'); ?>" />
		</div>
		<div class="ym-fbox-button ym-hideme">
			<input type="submit" name="submit" value="<?php esc_attr_e('Search'); ?>" />
		</div>
	</form>
</section>
