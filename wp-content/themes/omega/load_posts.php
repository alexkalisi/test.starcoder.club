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
            <?php the_content(); ?>
        </div>
    </div>
<?php }
wp_reset_postdata(); ?>