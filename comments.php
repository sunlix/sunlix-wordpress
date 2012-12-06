<?php

/*
 * displays the comments section
 */

if (post_password_required()) :

?>

	<p class="nopassword"><?php _e('This post is password protected. Enter the password to view comments.'); ?></p>

<?php

	return;
endif;

if(have_comments()) :

?>

	<section id="comments" class="comments">
		<header>
			<h4><?php _e("Comments") ?></h4>
		</header>

<?php

	if ( get_comment_pages_count() > 1 && get_option('page_comments')) :

?>
		<div><?php previous_comments_link('&larr; '. __('Older Comments', 'sunlix')) ?></div>
		<div><?php next_comments_link(__('Newer Comments', 'sunlix') .'&rarr;') ?></div>

<?php

	endif;

	wp_list_comments( array( 'style' => 'div', 'callback' => 'sxComment' ) );

?>

	</section>

<?php

elseif (!comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments' )) :

?>

	<p><?php _e('Comments are closed.'); ?></p>

<?php

endif;

if (is_user_logged_in())
{
	global $current_user;
	get_currentuserinfo();
}

if(comments_open()) :

?>

	<section id="response">
		<header>
			<h4><?php _e("Leave a Comment") ?></h4>
		</header>
		<form action="<?php echo get_option('siteurl').'/wp-comments-post.php' ?>" method="post" class="ym-form ym-columnar">
			<?php comment_id_fields() ?>
			<fieldset>
				<legend><?php _e("Comment data", 'sunlix') ?></legend>
				<div class="ym-fbox-text">
					<label for="author"><?php _e("Name") ?> <?php echo $req ? _e("(required)") : '' ?></label>
					<input type="text" name="author" id="author" <?php echo $current_user ? 'disabled="disabled" ' : '' ?>value="<?php echo $current_user ? $current_user->display_name : '' ?>" />
				</div>
				<div class="ym-fbox-text">
					<label for="email"><?php _e("E-Mail") ?> <?php echo $req ? _e("(required)") : '' ?></label>
					<input type="email" name="email" id="email" <?php echo $current_user ? 'disabled="disabled" ' : '' ?>value="<?php echo $current_user ? $current_user->user_email : '' ?>" />
				</div>
				<div class="ym-fbox-text">
					<label for="url"><?php _e("Website", 'sunlix') ?></label>
					<input type="url" name="url" id="url" <?php echo $current_user ? 'disabled="disabled" ' : '' ?>value="<?php echo $current_user ? $current_user->user_url : '' ?>" />
				</div>
				<div class="ym-fbox-text">
					<label for="comment"><?php _e("Comment") ?> <?php echo $req ? _e("(required)") : '' ?></label>
					<textarea name="comment" id="comment" cols="30" rows="7"></textarea>
				</div>
			</fieldset>
			<div class="ym-fbox-button">
				<input type="submit" name="submit" value="<?php _e("Submit Comment") ?>" />
			</div>
		</form>
	</section>

<?php

endif;
