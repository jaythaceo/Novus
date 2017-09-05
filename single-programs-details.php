<?php get_header(); ?>
<main>
    <section class="postHeader">
        <div class="greenSide flex">
            <div class="center">
                <h1><?= the_title(); ?></h1>
                <span></span>
            </div>
        </div>
        <div class="picSide flex">
    </section>
    <section class="contentBox">
        <div class="center">
            <section class="contentSide">
                <section class="mainContent">
                    <?php
                    if (have_posts()) {
                        while (have_posts()) {
                            the_post();
                            ?>
                            <p><?php the_content(); ?></p>
                            <?php
                        }
                    }
                    ?>
                </section>
                <section class="cta-block">
                    <div class="content-cta">
                        <span>There is <span>hope</span> for a new life.</span>
                        <span>Call to speak to one of our experienced & caring detox advisors today!</span>
                        <script language="JavaScript" type="text/javascript">document.write('<a href=\"tel:'+GetPhoneText("1NNNNNNNNNN")+'\">');DisplayPhoneText("1.NNN.NNN.NNNN");document.write('</a>');</script><noscript>1-866-303-3848 </noscript>
                    </div>
                    <div class="photo-cta"></div>
                </section>
                <section class="blog">
                    <h2>Recent Blog Articles</h2>
                    <div class="articlesWrap">
                        <?php if (have_posts()) : query_posts('cat=6' . '&orderby=rand' . '&showposts=3');
                            while (have_posts()) : the_post(); ?>
                                <article>
                                    <?php
                                    $title = rtrim(substr(strip_tags(get_the_title()), 0, 30), "!,.-");
                                    $title = $title . '…';

                                    $content = rtrim(substr(strip_tags(get_the_content()), 0, 150), "!,.-");
                                    $content = substr($content, 0, strrpos($content, ' ')) . '… ';
                                    ?>
                                    <p><?= $title; ?></p>
                                    <?php
                                    if (get_the_post_thumbnail() != '') {
                                        echo get_the_post_thumbnail();
                                    }
                                    ?>
                                    <span><?= $content; ?></span>
                                    <a href="<?= the_permalink(); ?>">Learn more.</a>
                                </article>
                            <?php endwhile; endif;
                        wp_reset_query(); ?>
                    </div>
                </section>
            </section>
            <section class="communicationsSidebar">
                <?php get_template_part('template-parts/sidebar'); ?>
            </section>
        </div>
    </section>
</main>
<?php get_footer(); ?>
