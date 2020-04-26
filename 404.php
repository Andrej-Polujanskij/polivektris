<?php get_header(); ?>

    <section class="inner-page_header not-found ">
        <div class="page-img">
            <div class="page_header-shadow"></div>
        </div>
        <div class="page-title container">
            <h1 class=""><?php _e('Error 404', 'theme'); ?></h1> 
         </div>
         <div class="not-found_content container">

             <h3> <?php _e('Oops...The link you clicked may be broken or the page may have been removed. We’re sorry.', 'theme'); ?></h3>
             <div class="back_btn">
                 <a href="<?php echo get_option("siteurl"); ?>"><?php _e('Go to homepage', 'theme'); ?></a>
             </div>
             
         </div>
    </section>
<?php get_footer(); ?>