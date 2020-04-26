<?php
/* Template name: Contacts */
get_header();
?>
<section class="contacts-page">
    <div class="contacts_box-shadow">

        <div class="contacts-container container">

            <?php if( have_rows('contacts_block') ): ?>

            <div class="contacts-content">

                <?php while( have_rows('contacts_block') ): the_row(); ?>
                
                <div class="contacts">
                    <h3><?php the_sub_field('title'); ?></h3>

                    <?php 
                        $address = get_sub_field('address');
                        if($address){
                    ?>
                    <div class="contact-item address">
                        <span class="address-icon"></span>
                        <address><?php echo $address; ?></address>
                    </div>
                    <?php }?>

                    <?php if( have_rows('tel_number') ): ?>
                        <?php while( have_rows('tel_number') ): the_row(); ?>
                    <div class="contact-item number">
                        <span class="phone-icon"></span>
                        <?php $number = get_sub_field('number'); ?>
                        <a href="tel:<?php echo str_replace(' ', '', $number); ?>"><?php echo $number; ?></a>
                    </div>
                        <?php endwhile ?> 
                    <?php endif ?>
                    
                    <div class="contact-item email">
                        <span class="email-icon"></span>
                        <?php $email = get_sub_field('email'); ?>
                        <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                    </div>
                    
                </div>
                <?php endwhile ?>        
            </div>
            <?php endif ?>

            <div class="contacts-form">

            <div class="sk-folding-cube loader display-none">
                <div class="sk-cube1 sk-cube"></div>
                <div class="sk-cube2 sk-cube"></div>
                <div class="sk-cube4 sk-cube"></div>
                <div class="sk-cube3 sk-cube"></div>
                <div class="load_text">Loading...</div>
            </div>

                <form id="form" method="post">
                    <div class="form-left">
                        <div class="form-item">
                            <label for="name"><?php _e('Name', 'theme'); ?></label>
                            <input  type="text" name="name" id="name" placeholder="Type your name" class="mintwo">
                        </div>
                        <div class="form-item">
                            <label for="email"><?php _e('E-mail', 'theme'); ?></label>
                            <input type="email" name="email" id="email" placeholder="Type e-mail address" class="requiredemail">
                        </div>
                        <div class="form-item">
                            <label for="company"><?php _e('Company', 'theme'); ?></label>
                            <input type="text" name="company" id="company" class="required" placeholder="Type your company" >

                        </div>
                    </div>

                    <div class="form-right">
                        <div class="form-item">
                            <label for="inquiry"><?php _e('Your’s inquiry', 'theme'); ?></label>
                            <textarea name="inquiry" id="inquiry" placeholder="Type your inquiry" cols="30" rows="10" class="mintnine"></textarea>
                        </div>
                        <div class="form-item">
                            <label class="gdpr" for="gdpr">
                                <span class="checkbox">
                                    <span class="checkbox_inner " ></span>
                                </span>

                                 <span class="gdpr-note"><?php _e('I understand and accept the Privacy Policies', 'theme'); ?> <a href="https://gdpr-info.eu/" target="_blank"> <?php _e('(GDPR)', 'theme'); ?></a> <input type="checkbox" name="gdpr" id="gdpr" class="required"></span>
                            </label>
                        </div>
                        <div class="form-item">
                            <button id="submit_btn" type="submit"><span></span><span><?php _e('Send', 'theme'); ?></span></button>
                        </div>

                    </div>
                </form>
                <span class="post-send-mess display-none"><?php _e('Your message has been sent. Thank You.', 'theme'); ?></span>
                <span class="error-mess display-none"><?php _e('Not all form fields filled', 'theme'); ?></span>
            </div>
        </div>

    </div>
</section>

<?php get_footer(); ?>