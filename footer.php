<footer>
    <div class="center">
        <div class="colWrap">
            <div class="column">
                <div class="logo"></div>
                <p>Located in Sunny Florida. Detox in Safe and Comfortable Surroundings.</p>
            </div>
            <div class="column lists">
                <p class="title">Detox</p>
                <?php wp_nav_menu(array(
                    'menu'            => 'Detox_bottom_nav',
                    'container'       => '',
                    'container_class' => '',
                    'container_id'    => '',
                    'menu_class'      => '',
                    'items_wrap'      => '<ul>%3$s</ul>',
                )); ?>
            </div>
            <div class="column lists">
                <p class="title">Resources</p>
                <?php wp_nav_menu(array(
                    'menu'            => 'resourcesMenu',
                    'container'       => '',
                    'container_class' => '',
                    'container_id'    => '',
                    'menu_class'      => '',
                    'items_wrap'      => '<ul>%3$s</ul>',
                )); ?>
            </div>
            <div class="column">
                <p class="title">100% confidentiality</p>
                <span>We welcome calls from family, friends, employers, clergy, and health professionals. All information shared is kept 100% confidential.</span>
                <div class="btnWrap">
                    <span>Call today at</span>
                    <script language="JavaScript" type="text/javascript">document.write('<a href=\"tel:'+GetPhoneText("1NNNNNNNNNN")+'\">');DisplayPhoneText("1.NNN.NNN.NNNN");document.write('</a>');</script><noscript>1-866-303-3848 </noscript>
                </div>
            </div>
        </div>
        <div class="copyRightLine">
            <p>&copy; 2007-<?= date('Y'); ?> Novus Medical Detox Centers, LLC. All Rights Reserved. 1.855.324.6317 - <a href="/privacy.php">Privacy Policy</a></p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
<div class="blackShadow"></div>
</div>
</body>
</html>
