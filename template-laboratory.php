<?php
/* Template name: Labotatory */
get_header(); ?>

<section class="inner-page_header">

<?php $header_image = get_field('header_image');
    top_header_image($header_image); ?>

    <div class="inner_page labotatory container">
        <div class="inner_page-image">
            <img src="<?php echo get_correct_image_link_thumb(get_field('content_image'), 'inner-page_image'); ?>" alt="">
        </div>
        <div class="inner_page-content">
            <?php the_field('content_note'); ?>
        </div>
    </div>
    
</section>

<?php get_footer(); ?>