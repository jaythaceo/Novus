<!DOCTYPE html>
<html>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Start ClickPath from Who's Calling -->
    <script language="Javascript">var PAGERESULT='888';</script>
    <script type="text/javascript" src="<?= get_template_directory_uri(); ?>/js/clickpathmedia.js"></script>
    <noscript><img src="https://analyticssl.clickpathmedia.com/page_stats_v1.asp?aid=200720&js=no" width="1" height="1"></noscript>
    <!-- End ClickPath from Who's Calling -->
    <?php wp_head(); ?>
</head>

<body>
<div class="fixedBanner">
    <div class="center">
        <p>Talk to a Detox Advisor </p>
        <script language="JavaScript" type="text/javascript">document.write('<a class="green-btn-phone fr" href=\"tel:'+GetPhoneText("1NNNNNNNNNN")+'\"> Call Now ');document.write('</a>');</script><noscript>1-866-303-3848 </noscript>
    </div>
</div>
<div class="layoutWrap">
    <header>
        <div class="center">
            <?php if (!is_page('home')): ?><a href="<?php echo get_home_url() ?>" class="logo"><?php else: ?>
                <div class="logo"><?php endif; ?>
                    <img src="<?= get_template_directory_uri(); ?>/assets/images/logo.png" alt="Novus Detox">
                <?php if (!is_page('home')): ?></a><?php else: ?></div><?php endif; ?>
        <nav>
            <?php wp_nav_menu(array(
                'menu' => 'main',
                'container' => '',
                'container_class' => '',
                'container_id' => '',
                'menu_class' => '',
                'items_wrap' => '<ul>%3$s</ul>',
            )); ?>
        </nav>
        <script language="JavaScript" type="text/javascript">document.write('<a class="green-btn-phone" href=\"tel:'+GetPhoneText("1NNNNNNNNNN")+'\"> Call Now ');DisplayPhoneText("1.NNN.NNN.NNNN");document.write('</a>');</script><noscript>1-866-303-3848 </noscript>
</div>
<div class="mobileNavLine">
    <div class="naviItems">
        <div class="naviItem"><a href="<?php echo get_home_url() ?>"><i class="fa fa-home" aria-hidden="true"></i></a>
        </div>
        <div class="naviItem"><a href="aboutUs.php"></a></div>
        <div class="naviItem"><script language="JavaScript" type="text/javascript">document.write('<a href=\"tel:'+GetPhoneText("1NNNNNNNNNN")+'\"><i class="fa fa-phone" aria-hidden="true"></i>');document.write('</a>');</script><noscript>1-866-303-3848 </noscript></div>
        <div class="burgerWrap fr">
            <div class="burger"></div>
        </div>
    </div>
    <div class="navigationOverlay">
        <nav>
            <?php
            $p_id = get_the_ID();
                ?>
                <ul class="green-link-nav">
                    <?php
                    if (have_posts()) : query_posts('page_id=' . $p_id);
                        while (have_posts()) : the_post();
                            if (have_rows('sidebar_links')): while (have_rows('sidebar_links')) : the_row();
                                $id = get_sub_field('link');
                                ?>
                                <li><a href="<?= get_the_permalink($id[0]) ?>"><?= get_sub_field('link_name'); ?></a>
                                </li>
                            <?php endwhile; endif; ?>
                        <?php endwhile; endif;
                    wp_reset_query(); ?>
                </ul>
                <?php
            wp_nav_menu(array(
                'menu' => 'mobile_common',
                'container' => '',
                'container_class' => '',
                'container_id' => '',
                'menu_class' => '',
                'items_wrap' => '<ul>%3$s</ul>',
            )); ?>
        </nav>
    </div>
</div>
<!--<div class="btnWrap">
    <a href="tel:1-855-324-6317" class="green-btn-phone"> 1-855-324-6317</a>
</div>-->
</header>