<?php

/*
 * list archived entries repects the archive type
 */

get_header()

?>

<div class="ym-column">

<?php

	get_sidebar()

?>

	<div class="ym-col3">
		<h2 class="ym-hideme"><?php _e("Content") ?></h2>

<?php

	if (have_posts()) :

?>

		<h3>

<?php

			if (is_day()) :
				printf(__('All archived articles from %1$s', 'sunlix'), get_the_date());
			elseif (is_month()) :
				printf(__('All archived articles from %1$s', 'sunlix'), get_the_date(_x('F Y', 'monthly archived articles', 'sunlix')));
			elseif (is_year()) :
				printf(__('All archived articles from %1$s', 'sunlix'), get_the_date(_x('Y', 'yearly archived articles', 'sunlix')));
			else :
				_e('All Archives', 'sunlix');
			endif

?>

		</h3>

<?php

		sxPaging();

		while (have_posts()) :
			the_post();

			get_template_part('content', get_post_format());

		endwhile;

		sxPaging();

	else:

		get_template_part("404");

	endif

?>

	</div>
</div>

<?php

get_footer();