<?php
require $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php';

$posts = get_posts( array(
    'numberposts' => 6,
    'category'    => 0,
    'orderby'     => 'date',
    'order'       => 'DESC',
    'include'     => array(),
    'exclude'     => array(),
    'meta_key'    => '',
    'meta_value'  =>'',
    'post_type'   => 'post',
    'suppress_filters' => true,
) );	
foreach( $posts as $post ){
setup_postdata($post); ?>
    <div class="post_item">
        <?php if (has_post_thumbnail()) { ?>
        <div class="post_thumb"><?php the_post_thumbnail(); ?></div>
        <?php } ?>
        <div class="post_content">
            <a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a>
            <?php 
            $contentLength = strlen(get_the_content());
            if ($contentLength > 90) {
                $firsthContent = substr(get_the_content(), 0, 90);
                $firsthContSpace = strripos($firsthContent, ' ');
                $firsthContent = substr(get_the_content(), 0, $firsthContSpace);
                $secondContent = substr(get_the_content(), $firsthContSpace);
            } ?>
            <div class="slider_content">
                <p><?php echo $firsthContent; ?></p>
                <p class="hidden hidden_selector"><?php echo $secondContent; ?></p>
            </div>
            <button class="show_more" more="<?php the_field("show_more", pll_current_language()); ?>" less="<?php the_field("show_less", pll_current_language()); ?>"><span><?php the_field("show_more", pll_current_language()); ?><span></button>
        </div>
    </div>
<?php }
wp_reset_postdata(); ?>