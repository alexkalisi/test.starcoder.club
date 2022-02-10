<?php
/** Header */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<!-- Set up Meta -->
<!-- Meta add comments from facebook-->

<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<!-- Set the viewport width to device width for mobile -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, user-scalable=yes">
<!-- Remove Microsoft Edge's & Safari phone-email styling -->
<meta name="format-detection" content="telephone=no,email=no,url=no">
<!-- Add external fonts below (GoogleFonts / Typekit) -->

<?php wp_head(); ?>
</head>
<body>

<!-- BEGIN of header -->
<header>
	<div class="logo_wrapper">
		<a href="/"><div id="logo" style="background-image: url(<?php the_field('logo_option', pll_current_language()); ?>)"></div></a>
	</div>
	<?php $menu_option = get_field("menu_option", pll_current_language());
	if ($menu_option) { ?>
		<ul class="menu_wrapper">
		<?php foreach( $menu_option as $menu_items ) {
			$item_link = $menu_items['item'];
			if ($item_link) {
    			$link_url = $item_link['url'];
    			$link_title = $item_link['title'];
    			$link_target = $item_link['target'] ? $link['target'] : '_self'; ?>
				<li><a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a></li>
			<?php } 
		} ?>
		<ul>
	<?php } ?>
</header>
<!-- END of header -->
