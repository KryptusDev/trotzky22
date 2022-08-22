<?php

/**
 * Template Name: Page (Default)
 * Description: Page template with Sidebar on the left side.
 *
 */

get_header();

the_post();
?>
<div id="post-<?php the_ID(); ?>">
	<?php
	the_content();

	/* wp_link_pages(
		array(
			'before' => '<div class="page-links">' . __('Pages:', 'trotzky22'),
			'after'  => '</div>',
		)
	);
	edit_post_link(esc_html__('Edit', 'trotzky22'), '<span class="edit-link">', '</span>'); */
	?>

</div><!-- /#post-<?php the_ID(); ?> -->
<?php
// If comments are open or we have at least one comment, load up the comment template.
if (comments_open() || get_comments_number()) :
	comments_template();
endif;
?>
<?php
get_footer();
