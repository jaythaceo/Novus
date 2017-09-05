<!--<span>read about the dangers of oxycodone addiction</span>-->
<ul>
    <?php
    if (have_posts()) : query_posts('page_id=' . get_the_ID() . '&order=ASC' . '&showposts=1');
        while (have_posts()) : the_post();
            if (have_rows('sidebar_links')): while (have_rows('sidebar_links')) : the_row();
                ?>
                <a href="<?= get_sub_field('link'); ?>">
                    <li><?= get_sub_field('link_name'); ?></li>
                </a>
            <?php endwhile; endif;
        endwhile;
    endif;
    wp_reset_query();
    ?>
    <a href="/verification-form" class="green-btn">Find Out If Your Insurance Will Pay</a>
    <?php
    if (have_posts()) : query_posts('p=188' . '&order=ASC' . '&showposts=1');
        while (have_posts()) : the_post();
            if (have_rows('sidebar_links')): while (have_rows('sidebar_links')) : the_row();
                $id = get_sub_field('link');
                ?>
                <a href="<?= get_the_permalink($id[0]) ?>">
                    <li><?= get_sub_field('link_name'); ?></li>
                </a>
            <?php endwhile; endif;
        endwhile;
    endif;
    wp_reset_query();
    ?>
</ul>

<section class="categories-sidebar-links">
    <?php
    $parent_id = 6;
    if (is_page(16)) {
        echo '<h2>Categories</h2>';

        # получаем дочерние рубрики
        $sub_cats = get_categories(array(
            'parent' => $parent_id,
            'hide_empty' => 0
        ));
        ?>
        <ul>
            <?php
            if ($sub_cats) {
                foreach ($sub_cats as $cat) {
                    $sub_sub_cats = get_categories(array(
                        'parent' => $cat->term_id,
                        'hide_empty' => 0
                    ));
                    ?>
                    <li><a href=<?php get_home_url(); ?>"/news?cat=<?= $cat->term_id ?>"><?= $cat->name;?></a><?php
                        if ($sub_sub_cats) {
                            ?>
                            <ul>
                                <?php
                                foreach ($sub_sub_cats as $s_cat) {
                                    echo '<li>' . '<a href=' . get_home_url() . '/news?cat='. $s_cat->term_id .'>' .$s_cat->name .'</a>' . '</li>';
                                }
                                ?>
                            </ul>
                            <?php
                        }
                        wp_reset_postdata();
                        ?></li>
                    <?php
                }
            }
            ?>
        </ul>
        <?php
    }
    ?>
</section>


<span>contact us</span>
<form action="" class="contactForm">
    <input id="namems" type="text" placeholder="name">
    <input id="telms" type="tel" placeholder="phone">
    <input id="emailms" type="email" placeholder="email">
    <textarea id="msgms" name="msg" placeholder="How can we help you ?"></textarea>
    <button type="submit" onclick="return false;">
        <i class="fa fa-check" aria-hidden="true"></i>
    </button>
</form>
<span id="infoContUs">message</span>
<div class="socialNetwBlock">
    <a target="_blank" href="http://www.facebook.com/novusdetox"><i class="fa fa-facebook" aria-hidden="true"></i></a>
    <a target="_blank" href="http://www.flickr.com/novusmedicaldetox/"><i class="fa fa-flickr"
                                                                          aria-hidden="true"></i></a>
    <a target="_blank" href="http://www.twitter.com/novusmeddetox"><i class="fa fa-twitter" aria-hidden="true"></i></a>
    <a target="_blank" href="http://www.youtube.com/novusdetox"><i class="fa fa-youtube-play"
                                                                   aria-hidden="true"></i></a>
    <a target="_blank" href="http://www.linkedin.com/in/novusmedicaldetox"><i class="fa fa-linkedin"
                                                                              aria-hidden="true"></i></a>
</div>
<span>SUBSCRIBE to our weekly newsletter</span>
<form action="" class="secondForm">
    <section class="emailForm">
        <input id="emailem" type="email" placeholder="Enter Your Email">
        <button onclick="return false;">
            <i class="fa fa-check" aria-hidden="true"></i>
        </button>
    </section>
</form>
<span id="infoSubcr">message</span>
<form role="search" method="get" id="searchform" action="<?php echo home_url('/') ?>">
    <section class="searchForm">
        <input type="search" placeholder="Search" value="<?php echo get_search_query() ?>" name="s" id="s">
        <button type="submit" id="searchsubmit">
            <i class="fa fa-search" aria-hidden="true"></i>
        </button>
    </section>
</form>
<section class="insuranceCompanies">
    <div class="slideBarCom">
        <?php if (have_posts()) : query_posts('cat=5' . '&order=ASC');
            while (have_posts()) : the_post();
                $attach = get_attached_media('image', get_the_ID());
                $media = array_shift($attach); ?>
                <div style="background: url(<?= $image_url = $media->guid; ?>) no-repeat center;"></div>
            <?php endwhile; endif;
        wp_reset_query(); ?>
    </div>
</section>
<section class="tradeMarks">
    <?php if (have_posts()) : query_posts('cat=4' . '&order=ASC');
        while (have_posts()) : the_post();
            $attach = get_attached_media('image', get_the_ID());
            $media = array_shift($attach); ?>
            <div class="tradeMarkLogo">
                <img src="<?= $image_url = $media->guid; ?>" alt="Logo">
            </div>
        <?php endwhile; endif;
    wp_reset_query(); ?>
</section>
