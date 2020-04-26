<?php
/* Template name: News */
get_header();
?>
<section class="inner-page_header">
<?php $header_image = get_field('header_image');
    top_header_image($header_image); ?>


    <div class="news-container news_page-container container">
        <div class="all-news">
        <?php

            $post = array('post_type' => 'post');
            $news = new WP_Query($post);

            if($news->have_posts()) : 
            while($news->have_posts()) : 
                $news->the_post();
        ?>
            <div class="single-news">
                <a href="<?php the_permalink(); ?>">
                    <div class="new-image">
                        <img src="<?php  echo get_the_post_thumbnail_url($post->ID, 'news_image'); ?>" alt="">
                    </div>
                    <div class="new-content">
                        <div class="new-title"><?php the_title(); ?></div>
                        <span class="section-title_spacer"></span>
                        <p><?php echo excerpt(30); ?></p>
                        <div class="new-read"><span><?php _e('READ MORE', 'theme'); ?></span> <span></span></div>
                    </div>
                </a>
            </div>
            <?php
                endwhile;
                endif;
            ?>
        </div>
    </div>
    
</section>



<?php get_footer(); ?>