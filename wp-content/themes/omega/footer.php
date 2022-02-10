<?php
/**
 * Footer
 */
?>
<!-- BEGIN of footer -->
<footer>
	<div class="container">
		<div class="footer_leftblock">
			<p><?php echo get_field("position_option", pll_current_language()) . date("Y");?></p>
		</div>
		<div class="footer_rightblock">
		<?php $media_option = get_field("media_option", pll_current_language());
		if ($media_option) {
			foreach( $media_option as $media_items ) {
				$item_ico = $media_items['ico'];
				$item_url = $media_items['url']; ?>
				<a href="<?php echo $item_url; ?>"><div class="background_image media_ico" style="background-image: url(<?php echo $item_ico; ?>)"></div></a>
			<?php }
		} ?>
		</div>
	</div>
</footer>

<!-- END of footer -->

<?php wp_footer(); ?>
</body>
</html>
