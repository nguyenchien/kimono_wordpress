<?php
/**
 * The template for displaying a "No posts found" message
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<article id="post-0" class="post no-results not-found">
		<header class="entry-header">
			<p class="entry-title"><?php _e( 'Nothing Found', 'twentytwelve' ); ?></p>
		</header>

		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'twentytwelve' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</article><!-- #post-0 -->
