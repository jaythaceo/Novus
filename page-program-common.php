<?php
/*
Template Name: Common Program page
*/
?>
<?php get_header(); ?>
<main>
    <section class="postHeader">
        <div class="greenSide flex">
            <div class="center">
                <h1><?= the_title(); ?></h1>
                <span><?= preg_replace('/<img[^>]+./', '', $post->post_content); ?></span>
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
    <section class="contentBox">
        <div class="center">
            <section class="contentSide">
                <?php if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                        the_field("add_top_text");
                    }
                } ?>
                <section class="mainContent commonPage">
                    <?= the_field('mainContent'); ?>
                    <div class="clear-fix"></div>
                </section>
                <!--<section class="callBar">
                    <div class="clear-fix">
                        <div class="textWrap fl">
                            <p>Novus is the best way to get your life back as painlessly as possible.</p>
                            <span>Call to speak to one of our experienced & caring detox advisors today!</span>
                        </div>
                        <script language="JavaScript" type="text/javascript">document.write('<a class="green-btn-phone fr" href=\"tel:'+GetPhoneText("1NNNNNNNNNN")+'\"> Call Now ');document.write('</a>');</script><noscript>1-866-303-3848 </noscript>
                    </div>
                </section>-->
                <section class="cta-block">
                    <div class="content-cta">
                        <span>There is <span>hope</span> for a new life.</span>
                        <span>Call to speak to one of our experienced & caring detox advisors today!</span>
                        <script language="JavaScript" type="text/javascript">document.write('<a href=\"tel:'+GetPhoneText("1NNNNNNNNNN")+'\">');DisplayPhoneText("1.NNN.NNN.NNNN");document.write('</a>');</script><noscript>1-866-303-3848 </noscript>
                    </div>
                    <div class="photo-cta"></div>
                </section>
                <section class="why-novus-block">
                    <div class="center">
                        <div class="why-novus-items">
                            <div class="novus-logo-item"></div>
                            <div class="novus-content-item">
                                <span>Why Novus?</span>
                                <span>At Novus Medical Detox Center, because we truly understand drug
                                and alcohol addiction, we employ the latest technology with true compassion
                                to help every patient get through their drug or alcohol withdrawal more painlessly
                                than they ever imagined.</span>
                                <a href="treatment-program.php">Learn more.</a>
                            </div>
                        </div>
                    </div>
                </section>
                <?php
                $id_post = get_the_ID();
                if (($id_post == 2735) || $id_post == 3174 || $id_post == 2995 || $id_post == 3168) {
                    ?>
                    <section class="programs-bottom-block">
                        <div class="center">
                            <div class="programs-bottom-items">
                                <div class="programs-bottom-photo-item"></div>
                                <div class="programs-bottom-content-item">
                                    <span><?php the_title(); ?> Success</span>
                                    <span>Find out what others have experienced while detoxing from <?php echo explode(' ', get_the_title(), 2)[0]; ?>
                                        at Novus Medical Detox Center.
                                        “I am so glad I made the decision to come here. I feel so much better about myself.
                                        I look better and it also makes my family happy. But,
                                        I did this for me…”</span>
                                    <?php $result_cat = 81;
                                    if ($id_post == 2735) {
                                        $result_cat = 207;
                                    } else if ($id_post == 3174) {
                                        $result_cat = 225;
                                    } else if ($id_post == 2995) {
                                        $result_cat = 219;
                                    } else if ($id_post == 3168) {
                                        $result_cat = 223;
                                    }
                                    ?>
                                    <a href="/success-stories?cat=<?php echo $result_cat; ?>">Learn more.</a>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php
                } else if (get_the_ID() == 6390) {
                    ?>
                    <section class="programs-bottom-block studies">
                        <div class="center">
                            <div class="programs-bottom-items">
                                <div class="programs-bottom-photo-item"></div>
                                <div class="programs-bottom-content-item">
                                    <span>Case Studies</span>
                                    <span>"Novus has helped me in a way that I thought was impossible."</span>
                                    <span>Find out others have experienced while detoxing from Methadone with the Novus Medical Detox Program.</span>
                                    <a href="/success-stories?cat=211">Learn more.</a>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php
                }
                ?>
                <section class="blog">
                    <h2>Recent Blog Articles</h2>
                    <div class="articlesWrap">
                        <?php
                        $cat_id = 0;
                        //Methadone
                        if (get_the_ID() == 6390) {
                            $cat_id = 211;
                        } //benzo
                        else if (get_the_ID() == 2735) {
                            $cat_id = 207;
                        } //Vicodin
                        else if (get_the_ID() == 3174) {
                            $cat_id = 225;
                        } //OxyContin
                        else if (get_the_ID() == 2995) {
                            $cat_id = 219;
                        } //SUBOXONE
                        else if (get_the_ID() == 3168) {
                            $cat_id = 223;
                        } else {
                            $cat_id = 6;
                        }
                        if (have_posts()) : query_posts('cat=' . $cat_id . '&orderby=rand' . '&showposts=3');
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
