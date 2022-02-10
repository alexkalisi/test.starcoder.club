<?php
/**
 * Template Name: Home Page
 */
get_header(); ?>

<main>
	<section class="background_image" id="section_one">
		<div class="container">
			<div class="center_block">
				<fieldset class="fieldset_borderbottom">
					<legend align="center"><h1><?php the_title(); ?></h1></legend>
					<p><?php the_field("home_page_description"); ?></p>
				</fieldset>
				<fieldset>
					<legend align="center"><button><?php the_field("home_page_btn"); ?></button></legend>
				</fieldset>
			</div>
		</div>
	</section>
	<section id="section_two">
		<div class="container" id="posts_wrapper"></div>
	</section>
</main>

<?php get_footer(); ?>
