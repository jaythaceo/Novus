<?php get_header(); ?>
<main>
   <section class="contact-from">
       <div class="center">
           <div class="contact-form-content">
               <?php
               if( have_posts() ){ while( have_posts() ){ the_post();
                   the_content();
               }} ?>
           </div>
       </div>
   </section>
</main>
<?php get_footer(); ?>

