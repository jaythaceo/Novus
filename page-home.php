<?php get_header(); ?>
<main>
    <section class="mainBanner">
        <div class="block pic"<?php if (get_the_post_thumbnail() != '') {
            ?>
            style="background-size: cover;background-image: url('<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), array(975, 212))[0]; ?>')"
            <?php
        } ?>>
            <h2><?= get_post(8)->post_content; ?></h2>
            <div class="btnWrap">
                <a href="/find-help-for-you" class="sqr-btn">Find help for <span>you</span></a>
                <a href="/find-help-friend" class="sqr-btn">For <span>a friend</span></a>
            </div>
        </div>
        <div class="block slider">
            <div class="initSlick">
                <?php if( have_rows('video_links') ): while ( have_rows('video_links') ) : the_row();  ?>
                    <div class="item">
                        <?php the_sub_field('link'); ?>
                    </div>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </section>
    <section class="programs" data-enllax-ratio="-2" data-enllax-direction="vertical">
        <p class="sectionTitle"><?= get_category(1)->cat_name; ?></p>
        <div class="center">
            <a href="oxycodone-detox.php">
                <div class="detoxProgram">
                    <?= get_the_post_thumbnail(5862,'home_thumb'); ?>
                    <div class="infoBlock">
                        <p><?= get_the_title(5862); ?></p>
                        <a href="oxycodone-detox.php">learn more</a>
                    </div>
                </div>
            </a>
            <a href="opiate-detox.php">
                <div class="detoxProgram">
                    <?= get_the_post_thumbnail(2933,'home_thumb'); ?>
                    <div class="infoBlock">
                        <p><?= get_the_title(2933); ?></p>
                        <a href="opiate-detox.php">learn more</a>
                    </div>
                </div>
            </a>
            <a href="alcohol-detox.php">
                <div class="detoxProgram">
                    <?= get_the_post_thumbnail(2647,'home_thumb'); ?>
                    <div class="infoBlock">
                        <p><?= get_the_title(2647); ?></p>
                        <a href="alcohol-detox.php">learn more</a>
                    </div>
                </div>
            </a>
            <a href="benzo-detox.php">
                <div class="detoxProgram">
                    <?= get_the_post_thumbnail(2735,'home_thumb'); ?>
                    <div class="infoBlock">
                        <p><?= get_the_title(2735); ?></p>
                        <a href="benzo-detox.php">learn more</a>
                    </div>
                </div>
            </a>
            <a href="methadone-detox.php">
                <div class="detoxProgram">
                    <?= get_the_post_thumbnail(6390,'home_thumb'); ?>
                    <div class="infoBlock">
                        <p><?= get_the_title(6390); ?></p>
                        <a href="methadone-detox.php">learn more</a>
                    </div>
                </div>
            </a>
            <div class="btnWrap">
                <a href="program" class="green-btn">View all programs</a>
                <a href="verification-form" class="green-btn">Verify Your Insurance</a>
            </div>
        </div>
    </section>
    <section class="difference">
        <div class="center">
            <p class="sectionTitle">The Novus Difference</p>
            <?php if( have_rows('difference') ): while ( have_rows('difference') ) : the_row();  ?>
                <div class="differenceBlock">
                    <a href="<?= the_sub_field('link', false, false); ?>"><i style="background: url(<?= the_sub_field('icon'); ?>) no-repeat center;"></i></a>
                    <a href="<?= the_sub_field('link', false, false); ?>"><p><?= the_sub_field('title', false, false); ?></p></a>
                    <a href="<?= the_sub_field('link', false, false); ?>"><span><?= the_sub_field('content', false, false); ?></span></a>
                </div>
            <?php endwhile; endif; ?>
        </div>
    </section>
    <section class="tradeMarks">
        <div class="center">
            <?php if ( have_posts() ) :  query_posts('cat=4'.'&order=ASC');
                while (have_posts()) : the_post(); $attach = get_attached_media( 'image', get_the_ID() ); $media = array_shift( $attach ); ?>
                    <div class="tradeMarkLogo">
                        <img src="<?= $image_url = $media->guid; ?>" alt="Logo">
                    </div>
            <?php endwhile; endif; wp_reset_query(); ?>
        </div>
    </section>
    <section class="getHelp forYou">
        <div class="textWrap">
            <p><?= the_field('getHelpForYouTitle', false, false); ?></p>
            <span><?= the_field('getHelpForYouContent', false, false); ?></span>
            <a href="/find-help-for-you" class="sqr-btn">Get help <span>for you</span></a>
        </div>
    </section>
    <section class="isEasy">
        <div class="center">
            <p class="sectionTitle">Getting help is easy.</p>
            <span>Call to speak to one of our caring compassionate detox specialists today.</span>
            <script language="JavaScript" type="text/javascript">document.write('<a class="green-btn-phone" href=\"tel:'+GetPhoneText("1NNNNNNNNNN")+'\"> Call Now ');DisplayPhoneText("1.NNN.NNN.NNNN");document.write('</a>');</script><noscript>1-866-303-3848 </noscript>
        </div>
    </section>
    <section class="getHelp forFriend">
        <div class="textWrap">
            <p><?= the_field('getHelpForAFriendTitle', false, false); ?></p>
            <span><?= the_field('getHelpForAFriendContent', false, false); ?></span>
            <a href="/find-help-friend" class="sqr-btn">Get help <span>for a friend</span></a>
        </div>
    </section>
    <section class="insuranceCompanies">
        <p>Some Insurance Companies We Work With:</p>
        <div class="insuranceInitSlick">
            <?php if ( have_posts() ) :  query_posts('cat=5'.'&order=ASC');
                while (have_posts()) : the_post();
                    $attach = get_attached_media( 'image', get_the_ID() ); $media = array_shift( $attach ); ?>
                    <div style="background: url(<?= $image_url = $media->guid; ?>) no-repeat center;"></div>
            <?php endwhile; endif; wp_reset_query(); ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>
