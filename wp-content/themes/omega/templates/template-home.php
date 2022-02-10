<?php
/**
 * Template Name: Home Page
 */
get_header(); ?>

<main>
	<section id="section_one">
		<div>
			<h1><?php the_title(); ?></h1>
			<p><?php the_field("home_page_description"); ?></p>
			<button><?php the_field("home_page_btn"); ?></button>
		</div>
	</section>
	<section id="section_two">

</section>
</main>

<?php get_footer(); ?>
