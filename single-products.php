<?php get_header(); ?>
<section class=" inner-page_header product-inner_page">
    <?php $header_image = get_correct_image_link_thumb(get_field('header_image'), 'inner-page_header-image');
    if($header_image){
        top_header_image($header_image); 
    } ?>

    <div class="inner_page container">

        <div class="inner_page-image">
            <div class="main-inner_page-image" style="background-image: url(<?php the_field('product_image'); ?>)">
            </div>

            <?php if( have_rows('images') ): ?>
                <ul>
                <?php while( have_rows('images') ): the_row(); ?>

                    <li><img src="<?php echo get_correct_image_link_thumb(get_sub_field('image'), 'inner-page_content-extra-image'); ?>" alt=""></li>

                <?php endwhile; ?>
                </ul>
            <?php endif; ?>    
        </div>

        <div class="inner_page-content">
            <div class="content-container">
                <p><?php the_field('product_content'); ?></p>
            </div>

            <?php if( have_rows('product_key_words') ): ?>
                <div class="content-container">
                    <ul>
                    <?php while( have_rows('product_key_words') ): the_row(); ?>

                        <li><?php the_sub_field('key_word'); ?></li>

                        <?php endwhile; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if( have_rows('more_information') ): ?>

                <?php while( have_rows('more_information') ): the_row(); ?>

                <?php $product_field = get_sub_field('information_type');  
                    if( $product_field == 'Text') {?>

                    <div class="content-container">
                        <p><?php the_sub_field('text'); ?></p>
                    </div>

                <?php }elseif( $product_field == 'Galery') { ?>

                    <div class="content-container galery_prod-field">
                    <?php $images = get_sub_field('galery');
                        if( $images ): 
                    ?>
                        <ul>
                        <?php foreach( $images as $image_id ): ?>
                            <li>
                                <a  data-fancybox="gallery" href="<?php echo get_correct_image_link_thumb($image_id, 'full'); ?>">
                                    <img src="<?php echo get_correct_image_link_thumb($image_id, 'product_gallery_image'); ?>" alt="">
                                </a>
                            </li>
                        <?php endforeach; ?>
                        </ul>
                        <?php endif; ?> 
                    </div>

                <?php }elseif( $product_field == 'Table image') { ?>
                    <?php $table__image = get_sub_field('table_image'); ?>

                    <div class="content-container table-field">
                        <div class="table_text">
                            <?php echo $table__image['table_text']; ?>
                        </div>
                        <div class="table_img">
                            <img src="<?php echo get_correct_image_link_thumb($table__image['table_image'], 'full'); ?>" alt="">
                        </div>
                    </div>

                <?php }elseif( $product_field == 'Text & Image') { ?>
                    <?php $text__image = get_sub_field('text_&_image')?>

                    <div class="content-container text__image">
                        <div class="__image">
                            <img src="<?php echo get_correct_image_link_thumb($text__image['image']['ID'], 'product_content_image'); ?>" alt="">
                        </div>
                        <div class="text__"> 
                            <?php echo $text__image['text']; ?>
                        </div>
                    </div>

                <?php } ?>
            
                <?php endwhile; ?>

            <?php endif; ?>
        </div>
    </div>
<?php if( have_rows('specification') ): ?>

    <section class="product_spec">
        <div class="inner_page container ">
            
            <div class="inner_page-image">
                <h2>Specification</h2>
            </div>
            
            <div class="inner_page-content">
                <?php while( have_rows('specification') ): the_row(); ?>

                <?php $product_field = get_sub_field('information_type');  
                    if( $product_field == 'Text') {?>

                    <div class="content-container">
                        <p><?php the_sub_field('text'); ?></p>
                    </div>

                <?php }elseif( $product_field == 'Galery') { ?>

                    <div class="content-container galery_prod-field">
                    <?php $images = get_sub_field('galery');
                        if( $images ): 
                    ?>
                        <ul>
                        <?php foreach( $images as $image_id ): ?>
                            <li>
                                <a href="<?php echo get_correct_image_link_thumb($image_id, 'full'); ?>">
                                    <img src="<?php echo get_correct_image_link_thumb($image_id, 'product_gallery_image'); ?>" alt="">
                                </a>
                            </li>
                        <?php endforeach; ?>
                        </ul>
                        <?php endif; ?> 
                    </div>

                <?php }elseif( $product_field == 'Table image') { ?>

                    <?php $table__image = get_sub_field('table_image'); ?>

                    <div class="content-container table-field">
                        <div class="table_text">
                            <?php echo $table__image['table_text']; ?>
                        </div>
                        <div class="table_img">
                            <img src="<?php echo get_correct_image_link_thumb($table__image['table_image'], 'full'); ?>" alt="">
                        </div>
                    </div>

                <?php }elseif( $product_field == 'Text & Image') { ?>
                    <?php $text__image = get_sub_field('text_&_image')?>

                    <div class="content-container text__image">
                        <div class="__image">
                            <img src="<?php echo get_correct_image_link_thumb($text__image['image']['ID'], 'product_content_image'); ?>" alt="">
                        </div>
                        <div class="text__"> 
                            <?php echo $text__image['text']; ?>
                        </div>
                    </div>

                <?php } ?>
            
                <?php endwhile; ?>
            </div>
    </div>

        </div>
    </section>

<?php endif; ?>
</section>
<?php get_footer(); ?>