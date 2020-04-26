<?php
/* Template name: Social Responsibility */
get_header();
?>
<section class="inner-page_header soc-res_page">
    <?php $header_image = get_field('header_image');
    top_header_image($header_image); ?>
    
    <div class="inner_page container">

        <div class="inner_page-image">
            <img src="<?php echo get_correct_image_link_thumb(get_field('content_image'), 'inner-page_content-image'); ?>" alt="">
        </div>

        <div class="inner_page-content">
            <div class="content-top">
                <?php the_field('content_top'); ?>
            </div>
            <div class="content-middle">
                <?php the_field('content_middle'); ?>
            </div>
            <div class="content-bottom">
                <?php the_field('content_bottom'); ?>
            </div>
        </div>

        <div class="galery">
        <?php $images = get_field('galery');
            if( $images ): 
            ?>
            <ul>
            <?php foreach( $images as $image_id ): ?>
                <li>
                    <a data-fancybox="gallery" href="<?php echo get_correct_image_link_thumb($image_id, 'full'); ?>">
                        <img src="<?php echo get_correct_image_link_thumb($image_id, 'responsibility-galery-image'); ?>" alt="" >
                    </a>
                </li> 
            <?php endforeach; ?>
            </ul>
            <?php endif; ?>    
        </div>
    </div>

</section>



<?php get_footer(); ?>