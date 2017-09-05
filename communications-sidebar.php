<form action="">
    <section class="searchForm">
        <input type="search" placeholder="Search">
        <button type="submit">
            <i class="fa fa-search" aria-hidden="true"></i>
        </button>
    </section>
</form>
<span>read about the dangers of oxycodone addiction</span>
<ul>
    <?php if ( have_posts() ) :  query_posts('cat=8'.'&order=ASC'.'&showposts=6');
        while (have_posts()) : the_post();
            ?>
            <a href="<?= get_permalink(); ?>">
                <li><?php the_title(); ?></li>
            </a>
            <?php
        endwhile;
    endif;
    wp_reset_query();
    ?>
</ul>
<div class="socialNetwBlock">
    <a target="_blank" href="http://www.facebook.com/novusdetox"><i class="fa fa-facebook" aria-hidden="true"></i></a>
    <a target="_blank" href="http://www.flickr.com/novusmedicaldetox/"><i class="fa fa-flickr" aria-hidden="true"></i></a>
    <a target="_blank" href="http://www.twitter.com/novusmeddetox"><i class="fa fa-twitter" aria-hidden="true"></i></a>
    <a target="_blank" href="http://www.youtube.com/novusdetox"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
    <a target="_blank" href="http://www.linkedin.com/in/novusmedicaldetox"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
</div>
<span>subscrobe to our weekly newsletter</span>
<form action="" class="secondForm">
    <section class="emailForm">
        <input type="email" placeholder="Enter Your Email">
        <button type="submit">
            <i class="fa fa-check" aria-hidden="true"></i>
        </button>
    </section>
</form>