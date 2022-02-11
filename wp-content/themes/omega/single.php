<?php
/**
 * Single
 *
 * Loop container for single post content
 */
get_header(); ?>

	<main>
		<div class="container post_content_block">
			<div class="post_thumb"><?php the_post_thumbnail(); ?></div>
			<div class="post_content_wrapper">
				<h1 class="post_title"><?php the_title(); ?></h1>
				<p><?php the_content(); ?></p>
			</div>
		</div>
	</main>

<?php get_footer(); ?>
