<?php get_header(); ?>
<main>
    <section class="postHeader aboutPage">
        <div class="greenSide flex">
            <div class="center">
                <h1><?php the_title(); ?></h1>
                <span>Novus Medical Detox</span>
            </div>
        </div>
        <div class="picSide flex"></div>
    </section>
    <selction class="contentBox">
        <section class="center">
            <section class="aboutSide">
                <section class="mainContent">
                        <?php
                        if( have_posts() ){ while( have_posts() ){ the_post();
                            the_content();
                        }} ?>
                    <div class="clear-fix"></div>
                </section>
                <section class="aboutWorkers">
                    <?php $counter = 0;
                    if( have_rows('workers') ): while ( have_rows('workers') ) : the_row();?>
                            <div class="novusPersonal">
                                <div class="personalPhoto"
                                     style="background-image: url('<?php the_sub_field('photo'); ?>')"></div>
                                <div class="personalInfo">
                                    <span><?php the_sub_field('name'); ?></span>
                                    <span><?php the_sub_field('position'); ?></span>
                                    <p><?php the_sub_field('description'); ?></p>
                                </div>
                                <?php
                                if ($counter == 2) {
                                    ?>
                                    <section class="cta-block">
                                        <div class="content-cta">
                                            <span>There is <span>hope</span> for a new life.</span>
                                            <span>Call to speak to one of our experienced & caring detox advisors today!</span>
                                            <script language="JavaScript" type="text/javascript">document.write('<a href=\"tel:'+GetPhoneText("1NNNNNNNNNN")+'\">');DisplayPhoneText("1.NNN.NNN.NNNN");document.write('</a>');</script><noscript>1-866-303-3848 </noscript>
                                        </div>
                                        <div class="photo-cta"></div>
                                    </section>
                                    <?php
                                }
                                $counter++;
                                ?>
                            </div>
                            <?php
                        endwhile;
                    endif;
                    wp_reset_query(); ?>
                </section>
                <section class="cta-block">
                    <div class="content-cta">
                        <span>There is <span>hope</span> for a new life.</span>
                        <span>Call to speak to one of our experienced & caring detox advisors today!</span>
                        <script language="JavaScript" type="text/javascript">document.write('<a href=\"tel:'+GetPhoneText("1NNNNNNNNNN")+'\">');DisplayPhoneText("1.NNN.NNN.NNNN");document.write('</a>');</script><noscript>1-866-303-3848 </noscript>
                    </div>
                    <div class="photo-cta"></div>
                </section>
            </section>
            <section class="communicationsSidebar">
                <?php get_template_part('template-parts/sidebar'); ?>
            </section>
        </section>
    </selction>
</main>
<?php get_footer(); ?>
