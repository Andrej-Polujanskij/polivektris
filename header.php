<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=9;IE=10;chrome=1; IE=edge" /> -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/images/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <title><?php if ( is_front_page() ) { echo get_bloginfo( 'name' ); } else { echo get_bloginfo( 'name' ); echo ' | '; wp_title( '', true, 'right' ); } ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="nav-bar">
        <div class="header container">
            <a href="<?php echo get_option("siteurl"); ?>">
                <div class="nav-bar-logo" style="background-image: url(<?php the_field('header_logo', 'options'); ?>)">
                </div>
            </a>
            <nav>
                
                <?php wp_nav_menu(array( 
                        'container'  => '<ul></ul>',
                        'menu_class' => 'meniuitem menu-menu',
                        'theme_location' => 'header_main-menu'
                    )); ?>

            </nav>
            <div class="header_soc-net">
                <ul>
                    <?php 
                        $facebook = get_field('facebook', 'options');
                        $linkedin = get_field('linkedin', 'options');
                    ?>
                    <?php if($linkedin){ ?>
                        <li><a class="icon-1" href="<?php the_field('linkedin', 'options'); ?>" target="_blank"></a></li>
                    <?php } ?>
                    <?php if($facebook){ ?>
                        <li><a class="icon-2" href="<?php the_field('facebook', 'options'); ?>" target="_blank"></a></li>
                    <?php } ?>
                </ul>
            </div>

            <div id="menu-toggle">
                <div id="hamburger">
                    <span class="span"></span>
                    <span class="span"></span>
                    <span class="span"></span>
                </div>
                <div id="cross">
                    <span class="span"></span>
                    <span class="span"></span>
                </div>
             </div>

             <div class="mobile-menu menu_hidden">
                <nav class="mobile-nav">
                    
                    <?php wp_nav_menu(array( 
                            'container'  => '<ul></ul>',
                            'menu_class' => 'meniuitem menu-menu',
                            'theme_location' => 'header_main-menu'
                        )); ?>

                </nav>

                <div class="header_soc-net mobile_soc-net">
                    <ul class="">
                        <?php 
                            $facebook = get_field('facebook', 'options');
                            $linkedin = get_field('linkedin', 'options');
                        ?>
                        <?php if($linkedin){ ?>
                            <li><a class="icon-1" href="<?php the_field('linkedin', 'options'); ?>" target="_blank"></a></li>
                        <?php } ?>
                        <?php if($facebook){ ?>
                            <li><a class="icon-2" href="<?php the_field('facebook', 'options'); ?>" target="_blank"></a></li>
                        <?php } ?>
                    </ul>
                </div>
                
                <div class="mobile-logo">
                    <a href="<?php echo get_option("siteurl"); ?>">
                        <div class="nav-bar-logo" style="background-image: url(<?php the_field('header_logo', 'options'); ?>)">
                        </div>
                    </a>
                </div>
             </div>
             
        </div>
    
    </header>
    <main>