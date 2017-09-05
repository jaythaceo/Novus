<?php get_header(); ?>
<main>
    <section class="postHeader programs-page">
        <div class="greenSide flex">
            <div class="center">
                <h1>Programs</h1>
                <span>Re-imagining Sobriety™</span>
            </div>
        </div>
        <?php if (have_posts()){
        while (have_posts()){
        the_post();
        $attach = get_attached_media('image', get_the_ID());
        $media = array_shift($attach);
        $image_url = $media->guid;
        if ($image_url != ''){
        ?>
        <div class="picSide flex" style="background-image: url('<?= $image_url; ?>')">
            <?php }
            else{
            ?>
            <div class="picSide flex">
                <?php
                }
                }
                } ?>
    </section>
    <!--<section class="topProgramLine">
        <div class="center">
            <div class="btnWrap">
                <a href="#" class="sqr-btn">Find help for <span>you</span></a>
                <a href="#" class="sqr-btn">For <span>a friend</span></a>
            </div>
        </div>
    </section>-->
    <selction class="contentBox">
        <section class="center">
            <section class="programSide">
                <section class="detoxQuestion">
                    <p>
                        <?php the_field('about_novus', false, false); ?>
                    </p>
                    <div class="detoxLinks">
                        <?php /*if (have_posts()) : query_posts('cat=1' . '&order=ASC'.'&posts_per_page=20');
                            while (have_posts()) : the_post(); */?><!--
                                <a href="<?php /*the_permalink(); */?>"><?php /*the_title(); */?></a>
                            --><?php /*endwhile; endif;
                        wp_reset_query(); */?>
                        <a href="oxycodone-detox.php"><?= get_the_title(5862); ?></a>
                        <a href="opiate-detox.php"><?= get_the_title(2933); ?></a>
                        <a href="alcohol-detox.php"><?= get_the_title(2647); ?></a>
                        <a href="benzo-detox.php"><?= get_the_title(2735); ?></a>
                        <a href="methadone-detox.php"><?= get_the_title(6390); ?></a>
                        <a href="heroin-detox.php"><?= get_the_title(5889); ?></a>
                        <a href="oxycontin-detox-addiction.php"><?= 'OxyContin Detox' ?></a>
                        <a href="vicodin-addiction-detox.php"><?= 'Vicodin Detox' ?></a>
                        <a href="suboxone-information-withdrawals.php"><?= 'Suboxone Detox' ?></a>
                    </div>
                </section>
                <section class="cta-block">
                    <div class="content-cta">
                        <span>There is <span>hope</span> for a new life.</span>
                        <span>Call to speak to one of our experienced & caring detox advisors today!</span>
                        <script language="JavaScript" type="text/javascript">document.write('<a href=\"tel:'+GetPhoneText("1NNNNNNNNNN")+'\">');DisplayPhoneText("1.NNN.NNN.NNNN");document.write('</a>');</script><noscript>1-866-303-3848 </noscript>
                    </div>
                    <div class="photo-cta"></div>
                </section>
                <section class="detoxSolution">
                    <?php if( have_rows('novus_detox_solution') ): while ( have_rows('novus_detox_solution') ) : the_row();  ?>
                        <span class="titlePr"><?php the_sub_field('title_question', false, false); ?></span>
                        <div class="videoPr">
                            <iframe src="<?php the_sub_field('link_movie', false, false); ?>" width="410" height="250" frameborder="0"
                                    webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                        </div>
                        <?php the_sub_field('description'); ?>
                    <?php endwhile; endif; ?>
                    <div class="clear-fix"></div>
                </section>
                <section class="bestPrograms">
                    <span class="titlePr">The Best Drug/Alcohol Detox Programs</span>
                    <?php the_field('best_programs'); ?>
                </section>
                <section class="detoxDifference">
                    <span class="titlePr">The Novus Medical Detox Difference</span>
                    <?php the_field('novus_difference'); ?>
                </section>
            </section>
            <section class="communicationsSidebar">
                <?php get_template_part('template-parts/sidebar'); ?>
            </section>
        </section>
    </selction>
</main>
<?php get_footer(); ?>
