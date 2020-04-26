</main>
<footer>
  <div class="footer container">
    <div class="footer-logo" style="background-image: url(<?php the_field('footer_logo', 'options'); ?>)">
    </div>
    <div class="footer-contact-item">
      <span><?php the_field('uab_tite','options') ?> </span>
      <address><?php the_field('address','options') ?></address>
    </div>
    <div class="footer-contact-item">
      <span><?php the_field('name','options') ?></span>
        <a href="tel:<?php the_field('tel_number','options') ?>"><?php the_field('tel_number','options') ?></a> 
        <a href="mailto:<?php the_field('email','options') ?>"><?php the_field('email','options') ?></a> 
    </div>
    <div class="footer-contact-item">
    <?php the_field('copyright','options') ?>
    </div>
  </div>
</footer>
    <?php wp_footer(); ?>
  </body>
</html>