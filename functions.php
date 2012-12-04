<?php

/*
 * sunlix specified settings
 */

/**
 * loading text domain for i18n
 */

function sxI18n()
{
	load_theme_textdomain( 'sunlix', get_template_directory() . '/languages' );

		$locale = get_locale();
		$locale_file = get_template_directory() . "/languages/$locale.php";
		if ( is_readable( $locale_file ))
		{
			require_once( $locale_file );
		}
}
add_action("init", "sxI18n");

/**
 * clean up the <head>
 */
function sxRemoveOverhead()
{
	remove_action( 'wp_head', 'wp_generator'); //kein Wp Versionshinweis im head
	remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
	remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
	remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
	remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
	remove_action( 'wp_head', 'index_rel_link'); // index link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0); // Display relational links for the posts adjacent to the current post.
	remove_action( 'wp_head', 'rel_canonical' ); // Display relational links for the posts adjacent to the current post.
}
add_action("init", "sxRemoveOverhead");

/**
 * remove rel-attribute from category link
 */

function sxRemoveCategoryRel ($output)
{
  $output = str_replace(' rel="category"', '', $output);
  return $output;
}
add_filter('wp_list_categories', 'sxRemoveCategoryRel');
add_filter('the_category', 'sxRemoveCategoryRel');

/**
 * register menus
 */

function sxRegisterMenus ()
{
	register_nav_menus(array(
		"nav-main" => __("Main Navigation", 'sunlix'),
		"nav-meta" => __("Meta Navigation", 'sunlix')
	));
}
add_action("init", "sxRegisterMenus");

/**
 * register sidebar
 */

function sxRegisterSidebars ()
{
    register_sidebar(array(
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<div class="title">',
		'after_title' => '</div>',
    ));
}
add_action("init", "sxRegisterSidebars");

/**
 * register widgets
 */

function sxRegisterWidgets()
{
	register_sidebar_widget('sx'. __('Archives'), 'sxArchiveWidget');
	register_sidebar_widget('sx'. __('Categories'), 'sxCategoryWidget');
	register_sidebar_widget('sx'. __('Links'), 'sxBookmarkWidget');
}
add_action("init", "sxRegisterWidgets");

/**
 * content page navigation
 */

function sxPaging()
{
	global $wp_query;

	if ($wp_query->max_num_pages > 1) :
?>
		<nav>
			<h4 class="ym-hideme"><?php _e('Article navigation', 'sunlix'); ?></h4>
				<?php next_posts_link('&larr; '. __('Older articles', 'sunlix')); ?>
				<?php previous_posts_link(__('Newer articles', 'sunlix') .' &rarr;'); ?>
		</nav>
<?php
	endif;
}

/**
 * paging css classes
 */

function sxNextPage()
{
	return 'class="ym-button" rel="prev"';
}
function sxPreviousPage()
{
	return 'class="ym-button float-right" rel="next"';
}
add_filter('next_posts_link_attributes', 'sxNextPage');
add_filter('previous_posts_link_attributes', 'sxPreviousPage');

/**
 * filter for cleaner previous_post_link an next_post_link
 */

function sxAdjacentPostLink ($output)
{
	$previous = str_replace('rel="prev"', 'class="ym-button" rel="prev"', $output);
	$next = str_replace('rel="next"', 'class="ym-button float-right" rel="next"', $output);
	return strpos($output,'prev') !== false ? $previous : $next;
}
add_filter("previous_post_link", "sxAdjacentPostLink");
add_filter("next_post_link", "sxAdjacentPostLink");

/**
 * add the read more link to the excerpt
 */

function sxExcerptMore()
{
	global $post;
	return ' <a href="'. get_permalink($post->ID) . '" class="ym-button ym-next float-right">'. sprintf(__('Read article %1$s', 'sunlix'), '<span class="ym-hideme">&bdquo;'. get_the_title() .'&ldquo;</span>') .'</a>';
}
add_filter('excerpt_more', 'sxExcerptMore');

/**
 * callback for individual comment output
 */

function sxComment ($comment)
{
	$GLOBALS['comment'] = $comment;

     $authID = get_the_author_meta('ID');

	if($authID == $comment->user_id)
		$oddcomment = ' acomment';

?>
<div>
<?php
	switch ($comment->comment_type) :
		case 'pingback' :
		case 'trackback' :
?>
			<p><?php _e('Pingback:'); ?> <?php comment_author_link(); ?></p>
<?php
			break;
		default :
?>

			<article class="ym-contain-oh<?php echo $oddcomment ?>">

<?php

				$avatar_size = 80;
				if ( '0' != $comment->comment_parent )
				{
					$avatar_size = 68;
				}

				echo '<p class="float-left">'. get_avatar( $comment, $avatar_size ) ."</p>";

?>

				<header>
					<h5>
<?php

						printf(__('%1$s wrote on %2$s at %3$s o\'clock', 'sunlix'),
							get_comment_author_link(),
							get_comment_date(get_option("date_format")),
							get_comment_time(get_option("time_format"))
						)

?>
						<?php if ( $comment->comment_approved == '0' ) : ?>// <em class="warning"><?php _e("Your comment is awaiting moderation", 'sunlix') ?></em><?php endif; ?>
					</h5>
				</header>
				<blockquote>
					<?php comment_text(); ?>
				</blockquote>
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply') .' &darr;', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</article>

<?php
			break;
	endswitch;
}

/**
 * WIDGET AREA
 */

function sxArchiveWidget()
{
?>
	<section class="archives">
		<header>
			<h3><?php _e("Archives") ?></h3>
		</header>
		<ul>
			<?php wp_get_archives("type=yearly") ?>
		</ul>
	</section>
<?php
}

function sxCategoryWidget()
{
?>
	<section class="categories">
		<header>
			<h3><?php _e("Categories") ?></h3>
		</header>
		<ul>
			<?php wp_list_cats() ?>
		</ul>
	</section>
<?php
}

function sxBookmarkWidget()
{
?>
	<section class="bookmarks">
		<header>
			<h3><?php _e("Worth reading links", 'sunlix') ?></h3>
		</header>
			<?php wp_list_bookmarks("title_li=&category_before=&category_after=&title_before=<h4>&title_after=</h4>") ?>
	</section>
<?php
}
