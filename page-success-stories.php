<?php get_header(); ?>
<main>
    <section class="postHeader aboutPage">
        <div class="greenSide flex">
            <div class="center">
                <h1>Success Stories</h1>
                <span><?= preg_replace('/<img[^>]+./', '', $post->post_content); ?></span>
            </div>
        </div>
        <div class="picSide flex"></div>
    </section>
    <selction class="contentBox">
        <section class="center">
            <section class="aboutSide">
                <div class="blogItems">
                    <?php
                    $counter = 0;
                    $result = get_query_var('paged');
                    if(isset($_GET['cat'])){
                        $query = array(
                            'category__and' => array(81,$_GET['cat']),
                            'order' => 'DESC',
                            'paged' => $result
                        );
                    }
                    else{
                        $query = array(
                            'cat' => 81,
                            'order' => 'DESC',
                            'paged' => $result
                        );
                    }
                    if (have_posts()) :
                        query_posts($query);
                        while (have_posts()) :
                            the_post();
                            $attach = get_attached_media( 'image', get_the_ID() ); $media = array_shift( $attach );
                            $image_url = $media->guid;
                            if (get_the_post_thumbnail_url() != '') {
                                ?>
                                <div class="blogItem">
                                    <div class="blogPhoto"
                                         style="background-image: url('<?= get_the_post_thumbnail_url(); ?>')"></div>
                                    <div class="blogTitleText">
                                        <span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
                                    </div>
                                    <!--<div class="blogCatTags">
                                        <span>Categories:</span>
                                        <?php
/*                                        $category_array = get_the_category();
                                        $last_el = end($category_array);
                                        foreach ($category_array as $res_cat) {
                                            if ($res_cat->cat_name != 'Blog') {
                                                if ($last_el == $res_cat) {
                                                    */?>
                                                    <a href="<?/*= get_category_link($res_cat->term_id); */?>"><?/*= $res_cat->cat_name . ' '; */?></a>
                                                    <?php
/*                                                } else {
                                                    */?>
                                                    <a href="<?/*= get_category_link($res_cat->term_id); */?>"><?/*= $res_cat->cat_name . ', '; */?></a>
                                                    <?php
/*                                                }
                                            }
                                        }
                                        */?>

                                    </div>
                                    <div class="blogCatTags">
                                        <span>Tags: </span>
                                        <?php
/*                                        $tags_array = get_the_tags();
                                        $last_el = end($tags_array);
                                        foreach ($tags_array as $res) {
                                            if ($last_el == $res) {
                                                */?>
                                                <a href="<?/*= get_tag_link($res->term_id); */?>"><?/*= $res->name . ' '; */?></a>
                                                <?php
/*                                            } else {
                                                */?>
                                                <a href="<?/*= get_tag_link($res->term_id); */?>"><?/*= $res->name . ', '; */?></a>
                                                <?php
/*                                            }
                                        }
                                        */?>
                                    </div>
                                    <div class="blogComments">
                                        <a href="<?php /*the_permalink(); */?>">
                                            <span><?/*= get_comments_number(); */?></span>
                                            <span>Comments</span>
                                        </a>
                                    </div>-->
                                    <?php $content = rtrim(substr(strip_tags(get_the_content()), 0, 300), "!,.-");
                                    $content = substr($content, 0, strrpos($content, ' ')) . '… ';
                                    ?>
                                    <p><?= $content; ?></p>
                                    <a href="<?php the_permalink(); ?>">Read More ></a>
                                    <div class="clear-fix"></div>
                                    <div class="socialBlock">
                                        <a target="_blank"
                                           href="https://www.facebook.com/sharer.php?u=<?= get_the_permalink(); ?>&t=<?= get_the_title() ?>">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                        </a>
                                        <a target="_blank"
                                           href="https://twitter.com/intent/tweet?text=<?= get_the_title() . ' ' . get_the_permalink(); ?>">
                                            <i class="fa fa-twitter" aria-hidden="true"></i>
                                        </a>
                                        <a target="_blank"
                                           href="https://www.linkedin.com/shareArticle?mini=true&url=<?= get_the_permalink(); ?>&title=<?= get_the_title() ?>&summary=<?php the_content(); ?>">
                                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                                        </a>
                                        <a target="_blank"
                                           href="https://plus.google.com/share?url=<?php the_permalink(); ?>">
                                            <i class="fa fa-google-plus" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="blogItem">
                                    <div class="blogTitleText noPic">
                                        <span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
                                        <!--<span>Categories:</span>
                                        <?php
/*                                        $category_array = get_the_category();
                                        $last_el = end($category_array);
                                        foreach ($category_array as $res_cat) {
                                            if ($res_cat->cat_name != 'Blog') {
                                                if ($last_el == $res_cat) {
                                                    */?>
                                                    <a href="<?/*= get_category_link($res_cat->term_id); */?>"><?/*= $res_cat->cat_name . ' '; */?></a>
                                                    <?php
/*                                                } else {
                                                    */?>
                                                    <a href="<?/*= get_category_link($res_cat->term_id); */?>"><?/*= $res_cat->cat_name . ', '; */?></a>
                                                    --><?php
/*                                                }
                                            }
                                        }
                                        */?>
                                       <!-- <span class="tagsLink">Tags: </span>
                                        <?php
/*                                        $tags_array = get_the_tags();
                                        $last_el = end($tags_array);
                                        foreach ($tags_array as $res) {
                                            if ($last_el == $res) {
                                                */?>
                                                <a href="<?/*= get_tag_link($res->term_id); */?>"><?/*= $res->name . ' '; */?></a>
                                                <?php
/*                                            } else {
                                                */?>
                                                <a href="<?/*= get_tag_link($res->term_id); */?>"><?/*= $res->name . ', '; */?></a>
                                                --><?php
/*                                            }
                                        }
                                        */?>
                                    </div>
                                    <!--<div class="blogComments">
                                        <a href="<?php /*the_permalink(); */?>">
                                            <span><?/*= get_comments_number(); */?></span>
                                            <span>Comments</span>
                                        </a>
                                    </div>-->
                                    <?php $content = rtrim(substr(strip_tags(get_the_content()), 0, 300), "!,.-");
                                    $content = substr($content, 0, strrpos($content, ' ')) . '… ';
                                    ?>
                                    <p><?= $content; ?></p>
                                    <a href="<?php the_permalink(); ?>">Read More ></a>
                                    <div class="clear-fix"></div>
                                    <div class="socialBlock">
                                        <a target="_blank"
                                           href="https://www.facebook.com/sharer.php?u=<?= get_the_permalink(); ?>&t=<?= get_the_title() ?>">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                        </a>
                                        <a target="_blank"
                                           href="https://twitter.com/intent/tweet?text=<?= get_the_title() . ' ' . get_the_permalink(); ?>">
                                            <i class="fa fa-twitter" aria-hidden="true"></i>
                                        </a>
                                        <a target="_blank"
                                           href="https://www.linkedin.com/shareArticle?mini=true&url=<?= get_the_permalink(); ?>&title=<?= get_the_title() ?>&summary=<?= $content; ?>">
                                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                                        </a>
                                        <a target="_blank"
                                           href="https://plus.google.com/share?url=<?php the_permalink(); ?>">
                                            <i class="fa fa-google-plus" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                                <?php
                            } ?>
                            <?php $counter++;
                        endwhile;

                    endif;
                    $args = array(
                        'end_size'     => 0,     // количество страниц на концах
                        'mid_size'     => 1,     // количество страниц вокруг текущей
                        'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
                        'prev_text'    => __('« Previous'),
                        'next_text'    => __('Next »'),
                    );
                    the_posts_pagination($args);
                    wp_reset_query(); ?>
                </div>
            </section>
            <section class="communicationsSidebar">
                <?php get_template_part('template-parts/sidebar'); ?>
            </section>
        </section>
    </selction>
</main>
<?php get_footer(); ?>
