<?php get_header(); ?>

<section class=" inner-page_header">

<?php include('includes/page_title.php'); ?>

    
    <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

    <div class="inner_page labotatory container">
        <div class="inner_page-image">
            <img src="<?php  echo get_the_post_thumbnail_url($post->ID, 'inner-page_image' ); ?>" alt="">
            
        </div>
        <div class="inner_page-content">
            <h2><?php the_title(); ?></h2>
            <?php the_content(); ?>
        </div>
    </div>
    
    
    <?php endwhile; endif; ?>
</section>

<?php get_footer(); ?>