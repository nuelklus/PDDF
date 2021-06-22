<?php

/**
 * Template Name: Homepage
 * description: Page template without sidebar
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>
<section id="home-hero">
    <div class="row main-container ver-divider-bottom">
        <div class="col-lg-3 hor-divider-left">
            <div>
                <?php
                $args = array(
                    'post-type' => 'post',
                    'post-status' => 'publish',
                    'category_name' => 'education',
                    // 'cat' => '1,2,3',
                    'posts_per_page' => 1,
                );

                $arr_posts = new WP_Query($args);
                ?>

                <?php if (!empty($arr_posts)) : ?>
                    <?php $educationPosts = $arr_posts->posts ?>
                    <?php foreach ($educationPosts as $educationPost) : ?>
                        <?php
                        // echo var_dump($educationPost);
                        $mp_post_id = $educationPost->ID;
                        $mp_post_title = $educationPost->post_title;
                        $mp_post_excerpt = $educationPost->post_excerpt;
                        $mp_post_content = $educationPost->post_content;
                        $mp_thumb_id = get_post_thumbnail_id($mp_post_id);
                        $mp_image_sm = wp_get_attachment_image_src($mp_thumb_id, 'normal');
                        $ed_post_author = $educationPost->post_author;
                        $last_name = get_the_author_meta('last_name', $ed_post_author);
                        $first_name = get_the_author_meta('first_name', $ed_post_author);
                        $ed_post_category = get_the_category($mp_post_id)

                        ?>
                        <article>
                            <div class="home-featured-image">
                                <a href="<?php the_permalink($mp_post_id); ?>" rel="bookmark" title="Image for <?php echo $mp_post_title; ?>">
                                    <img src="<?php echo $mp_image_sm[0] ?>" alt="<?php echo $mp_post_title; ?>">
                                </a>
                            </div>
                            <div class="home-featured-image-category">
                                <!-- <p style="text-transform: uppercase;">
                                    <?php if (!empty($ed_post_category)) {
                                        echo '<a href="' . esc_url(get_category_link($ed_post_category[0]->term_id)) . '">' . esc_html($ed_post_category[0]->name) . '</a>';
                                    } ?>
                                </p> -->
                                <h3 class="home-titles">
                                    <a href="<?php the_permalink($mp_post_id) ?>" rel="bookmark" title="Listen <?php echo $mp_post_title; ?>">
                                        <?php echo $mp_post_title ?>
                                    </a>
                                </h3>
                                <p class="author-alignment"> <span> by </span> <?php echo $last_name, ' ', $first_name ?></p>
                            </div>
                        </article>
                    <?php endforeach; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
            <div class="home-legend-topmargin">
                <?php
                $args = array(
                    'post-type' => 'post',
                    'post-status' => 'publish',
                    'category_name' => 'education',
                    // 'cat' => '1,2,3',
                    'posts_per_page' => 1,
                );

                $arr_posts = new WP_Query($args);
                ?>

                <?php if (!empty($arr_posts)) : ?>
                    <?php $educationPosts = $arr_posts->posts ?>
                    <?php foreach ($educationPosts as $educationPost) : ?>
                        <?php
                        // echo var_dump($educationPost);
                        $mp_post_id = $educationPost->ID;
                        $mp_post_title = $educationPost->post_title;
                        $mp_post_excerpt = $educationPost->post_excerpt;
                        $mp_post_content = $educationPost->post_content;
                        $mp_thumb_id = get_post_thumbnail_id($mp_post_id);
                        $mp_image_sm = wp_get_attachment_image_src($mp_thumb_id, 'normal');
                        $ed_post_author = $educationPost->post_author;
                        $last_name = get_the_author_meta('last_name', $ed_post_author);
                        $first_name = get_the_author_meta('first_name', $ed_post_author);
                        $ed_post_category = get_the_category($mp_post_id)

                        ?>
                        <article>
                            <div class="home-featured-image">
                                <a href="<?php the_permalink($mp_post_id); ?>" rel="bookmark" title="Image for <?php echo $mp_post_title; ?>">
                                    <img src="<?php echo $mp_image_sm[0] ?>" alt="<?php echo $mp_post_title; ?>">
                                </a>
                            </div>
                            <div class="home-featured-image-category">
                                <!-- <p style="text-transform: uppercase;">
                                    <?php if (!empty($ed_post_category)) {
                                        echo '<a href="' . esc_url(get_category_link($ed_post_category[0]->term_id)) . '">' . esc_html($ed_post_category[0]->name) . '</a>';
                                    } ?>
                                </p> -->
                                <h3 class="home-titles">
                                    <a href="<?php the_permalink($mp_post_id) ?>" rel="bookmark" title="Listen <?php echo $mp_post_title; ?>">
                                        <?php echo $mp_post_title ?>
                                    </a>
                                </h3>
                                <p class="author-alignment"> <span> by </span> <?php echo $last_name, ' ', $first_name ?></p>
                            </div>
                        </article>
                    <?php endforeach; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
            <div class="home-legend-topmargin">
                <?php
                $args = array(
                    'post-type' => 'post',
                    'post-status' => 'publish',
                    'category_name' => 'education',
                    // 'cat' => '1,2,3',
                    'posts_per_page' => 1,
                );

                $arr_posts = new WP_Query($args);
                ?>

                <?php if (!empty($arr_posts)) : ?>
                    <?php $educationPosts = $arr_posts->posts ?>
                    <?php foreach ($educationPosts as $educationPost) : ?>
                        <?php
                        // echo var_dump($educationPost);
                        $mp_post_id = $educationPost->ID;
                        $mp_post_title = $educationPost->post_title;
                        $mp_post_excerpt = $educationPost->post_excerpt;
                        $mp_post_content = $educationPost->post_content;
                        $mp_thumb_id = get_post_thumbnail_id($mp_post_id);
                        $mp_image_sm = wp_get_attachment_image_src($mp_thumb_id, 'normal');
                        $ed_post_author = $educationPost->post_author;
                        $last_name = get_the_author_meta('last_name', $ed_post_author);
                        $first_name = get_the_author_meta('first_name', $ed_post_author);
                        $ed_post_category = get_the_category($mp_post_id)

                        ?>
                        <article>
                            <div class="home-featured-image">
                                <a href="<?php the_permalink($mp_post_id); ?>" rel="bookmark" title="Image for <?php echo $mp_post_title; ?>">
                                    <img src="<?php echo $mp_image_sm[0] ?>" alt="<?php echo $mp_post_title; ?>">
                                </a>
                            </div>
                            <div class="home-featured-image-category">
                                <!-- <p style="text-transform: uppercase;">
                                    <?php if (!empty($ed_post_category)) {
                                        echo '<a href="' . esc_url(get_category_link($ed_post_category[0]->term_id)) . '">' . esc_html($ed_post_category[0]->name) . '</a>';
                                    } ?>
                                </p> -->
                                <h3 class="home-titles">
                                    <a href="<?php the_permalink($mp_post_id) ?>" rel="bookmark" title="Listen <?php echo $mp_post_title; ?>">
                                        <?php echo $mp_post_title ?>
                                    </a>
                                </h3>
                                <p class="author-alignment"> <span> by </span> <?php echo $last_name, ' ', $first_name ?></p>
                            </div>
                        </article>
                    <?php endforeach; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-lg-6 center-art-home">
            <?php
            $args = array(
                'post-type' => 'post',
                'post-status' => 'publish',
                'category_name' => 'arts',
                'posts_per_page' => 1,
            );

            $arr_posts = new WP_Query($args);
            ?>

            <?php if (!empty($arr_posts)) : ?>
                <?php $artsPosts = $arr_posts->posts ?>
                <?php foreach ($artsPosts as $artsPost) : ?>
                    <?php
                    // echo var_dump($educationPost);
                    $arts_post_id = $artsPost->ID;
                    $arts_post_title = $artsPost->post_title;
                    $arts_post_excerpt = $artsPost->post_excerpt;
                    $arts_post_content = $artsPost->post_content;
                    $arts_thumb_id = get_post_thumbnail_id($arts_post_id);
                    $arts_image_sm = wp_get_attachment_image_src($arts_thumb_id, 'normal');
                    $arts_post_author = $artsPost->post_author;
                    $last_name = get_the_author_meta('last_name', $arts_post_author);
                    $first_name = get_the_author_meta('first_name', $arts_post_author);
                    $arts_post_category = get_the_category($arts_post_id)
                    ?>
                    <article class="home-center-article">
                        <p class="home-post-date">
                            May 17, 2021
                        </p>
                        <a style="width: 100%;" href="<?php the_permalink($arts_post_id); ?>" rel="bookmark" title="Image for <?php echo $arts_post_title; ?>">
                            <img class="home-art-image-size" src="<?php echo $arts_image_sm[0] ?>" alt="<?php echo $arts_post_title; ?>">
                        </a>
                        <div class="home-content-overlap">
                            <div class="home-featured-image-category">
                                <p style="text-transform: uppercase;">
                                    <?php if (!empty($arts_post_category)) {
                                        echo '<a href="' . esc_url(get_category_link($arts_post_category[0]->term_id)) . '">' . esc_html($arts_post_category[0]->name) . '</a>';
                                    } ?>
                                </p>
                                <h3 class="home-post-middle-title">
                                    <a href="<?php the_permalink($arts_post_id) ?>" rel="bookmark" title="Listen <?php echo $arts_post_title; ?>">
                                        <?php echo $arts_post_title ?>
                                    </a>
                                </h3>
                                <p class="home-post-middle-excerpt"> <?php echo $arts_post_excerpt ?> </p>
                                <p style="text-align: center;padding-top: .5rem;font-size: small;"> <span> by </span> <?php echo $last_name, ' ', $first_name ?></p>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
        <div class="col-lg-3 home-hor-divider-right">
            <!-- <div class="hor-sep-d">
                <a href="https://pddf.test/frontend-post/" role="button" class="btn btn-primary btn-lg home-create-post-btn " aria-pressed="true">Create Post</a>
            </div> -->
            <div>
                <h3 class="hor-sep-d"> Best of the Week</h3>
                <div class="vocabmain-container">
                    <P class="vocabiframe-font"> know your vocabularies </P>
                    <div class="vocabiframe-container">
                        <?php
                        $args = array(
                            'post-type' => 'post',
                            'post-status' => 'publish',
                            'cat' => '13',
                            'posts_per_page' => 1,
                        );

                        $arr_posts = new WP_Query($args);
                        // var_dump($arr_posts)
                        ?>

                        <?php if (!empty($arr_posts)) : ?>
                            <?php $vocabPosts = $arr_posts->posts ?>
                            <?php foreach ($vocabPosts as $vocabPost) : ?>
                                <?php
                                $vocab_post_id = $vocabPost->ID;
                                $vocab_post_title = $vocabPost->post_title;
                                $vocab_post_excerpt = $vocabPost->post_excerpt;
                                $vocab_post_content = $vocabPost->post_content;
                                $vocab_thumb_id = get_post_thumbnail_id($vocab_post_id);
                                $vocab_image_sm = wp_get_attachment_image_src($vocab_thumb_id, 'normal');
                                $vocab_post_author = $vocabPost->post_author;
                                $last_name = get_the_author_meta('last_name', $vocab_post_author);
                                $first_name = get_the_author_meta('first_name', $vocab_post_author);
                                $vocab_post_category = get_the_category($vocab_post_id)
                                ?>
                                <!-- src="https://www.youtube.com/embed/yIFJM5sR4jo?rel=0&modestbranding=1&showinfo=0" -->
                                <iframe id="vocabIframe" src="<?php echo $vocab_post_content ?>" frameborder="0" width="90%"></iframe>
                            <?php endforeach; ?>
                            <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="vocabmain-container">
                    <P class="vocabiframe-font"> know your vocabularies </P>
                    <div class="vocabiframe-container">
                        <?php
                        $args = array(
                            'post-type' => 'post',
                            'post-status' => 'publish',
                            'cat' => '13',
                            'posts_per_page' => 1,
                        );

                        $arr_posts = new WP_Query($args);
                        // var_dump($arr_posts)
                        ?>

                        <?php if (!empty($arr_posts)) : ?>
                            <?php $vocabPosts = $arr_posts->posts ?>
                            <?php foreach ($vocabPosts as $vocabPost) : ?>
                                <?php
                                $vocab_post_id = $vocabPost->ID;
                                $vocab_post_title = $vocabPost->post_title;
                                $vocab_post_excerpt = $vocabPost->post_excerpt;
                                $vocab_post_content = $vocabPost->post_content;
                                $vocab_thumb_id = get_post_thumbnail_id($vocab_post_id);
                                $vocab_image_sm = wp_get_attachment_image_src($vocab_thumb_id, 'normal');
                                $vocab_post_author = $vocabPost->post_author;
                                $last_name = get_the_author_meta('last_name', $vocab_post_author);
                                $first_name = get_the_author_meta('first_name', $vocab_post_author);
                                $vocab_post_category = get_the_category($vocab_post_id)
                                ?>
                                <!-- src="https://www.youtube.com/embed/yIFJM5sR4jo?rel=0&modestbranding=1&showinfo=0" -->
                                <iframe id="vocabIframe" src="<?php echo $vocab_post_content ?>" frameborder="0" width="90%"></iframe>
                            <?php endforeach; ?>
                            <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="vocabmain-container">
                    <P class="vocabiframe-font"> know your vocabularies </P>
                    <div class="vocabiframe-container">
                        <?php
                        $args = array(
                            'post-type' => 'post',
                            'post-status' => 'publish',
                            'cat' => '13',
                            'posts_per_page' => 1,
                        );

                        $arr_posts = new WP_Query($args);
                        // var_dump($arr_posts)
                        ?>

                        <?php if (!empty($arr_posts)) : ?>
                            <?php $vocabPosts = $arr_posts->posts ?>
                            <?php foreach ($vocabPosts as $vocabPost) : ?>
                                <?php
                                $vocab_post_id = $vocabPost->ID;
                                $vocab_post_title = $vocabPost->post_title;
                                $vocab_post_excerpt = $vocabPost->post_excerpt;
                                $vocab_post_content = $vocabPost->post_content;
                                $vocab_thumb_id = get_post_thumbnail_id($vocab_post_id);
                                $vocab_image_sm = wp_get_attachment_image_src($vocab_thumb_id, 'normal');
                                $vocab_post_author = $vocabPost->post_author;
                                $last_name = get_the_author_meta('last_name', $vocab_post_author);
                                $first_name = get_the_author_meta('first_name', $vocab_post_author);
                                $vocab_post_category = get_the_category($vocab_post_id)
                                ?>
                                <!-- src="https://www.youtube.com/embed/yIFJM5sR4jo?rel=0&modestbranding=1&showinfo=0" -->
                                <iframe id="vocabIframe" src="<?php echo $vocab_post_content ?>" frameborder="0" width="90%"></iframe>
                            <?php endforeach; ?>
                            <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="vocabmain-container">
                    <P class="vocabiframe-font"> know your vocabularies </P>
                    <div class="vocabiframe-container">
                        <?php
                        $args = array(
                            'post-type' => 'post',
                            'post-status' => 'publish',
                            'cat' => '13',
                            'posts_per_page' => 1,
                        );

                        $arr_posts = new WP_Query($args);
                        // var_dump($arr_posts)
                        ?>

                        <?php if (!empty($arr_posts)) : ?>
                            <?php $vocabPosts = $arr_posts->posts ?>
                            <?php foreach ($vocabPosts as $vocabPost) : ?>
                                <?php
                                $vocab_post_id = $vocabPost->ID;
                                $vocab_post_title = $vocabPost->post_title;
                                $vocab_post_excerpt = $vocabPost->post_excerpt;
                                $vocab_post_content = $vocabPost->post_content;
                                $vocab_thumb_id = get_post_thumbnail_id($vocab_post_id);
                                $vocab_image_sm = wp_get_attachment_image_src($vocab_thumb_id, 'normal');
                                $vocab_post_author = $vocabPost->post_author;
                                $last_name = get_the_author_meta('last_name', $vocab_post_author);
                                $first_name = get_the_author_meta('first_name', $vocab_post_author);
                                $vocab_post_category = get_the_category($vocab_post_id)
                                ?>
                                <!-- src="https://www.youtube.com/embed/yIFJM5sR4jo?rel=0&modestbranding=1&showinfo=0" -->
                                <iframe id="vocabIframe" src="<?php echo $vocab_post_content ?>" frameborder="0" width="90%"></iframe>
                            <?php endforeach; ?>
                            <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
<section id="home-published-recently" class="categories-main-padding">
    <div class="main-container">
        <h1 class="section-caption">Published Recently</h1>
        <div class="row">
            <?php
            $args = array(
                'posts_per_page' => 4,
                'category__in' => array(3, 4, 9, 10, 15, 16),
            );

            $arr_posts = new WP_Query($args);
            ?>

            <?php if (!empty($arr_posts)) : ?>
                <?php $recentPosts = $arr_posts->posts ?>
                <?php foreach ($recentPosts as $recentPost) : ?>
                    <?php
                    // echo var_dump($educationPost);
                    $recent_post_id = $recentPost->ID;
                    $recent_post_title = $recentPost->post_title;
                    $recent_post_excerpt = $recentPost->post_excerpt;
                    $recent_post_content = $recentPost->post_content;
                    $recent_thumb_id = get_post_thumbnail_id($recent_post_id);
                    $recent_image_sm = wp_get_attachment_image_src($recent_thumb_id, 'medium');
                    $recent_post_author = $recentPost->post_author;
                    $last_name = get_the_author_meta('last_name', $recent_post_author);
                    $first_name = get_the_author_meta('first_name', $recent_post_author);
                    $recent_post_category = get_the_category($recent_post_id)
                    ?>
                    <div class="col-lg-3">
                        <article class="home-center-article">
                            <a style="width: 100%;" href="<?php the_permalink($recent_post_id); ?>" rel="bookmark" title="Image for <?php echo $recent_post_title; ?>">
                                <img class="publishedrecently-img-size" src="<?php echo $recent_image_sm[0] ?>" alt="<?php echo $recent_post_title; ?>">
                            </a>
                            <div class="">
                                <p class="publishedrecently-category-name">
                                    <?php if (!empty($recent_post_category)) {
                                        echo '<a href="' . esc_url(get_category_link($recent_post_category[0]->term_id)) . '">' . esc_html($recent_post_category[0]->name) . '</a>';
                                    } ?>
                                </p>
                                <h2 class="">
                                    <a href="<?php the_permalink($recent_post_id) ?>" rel="bookmark" title="Listen <?php echo $recent_post_title; ?>">
                                        <?php echo $recent_post_title ?>
                                    </a>
                                </h2>
                                <p class=""> <?php echo $recent_post_excerpt ?> </p>
                                <p style="padding-top: .5rem;font-size: small;"> <span> by </span> <?php echo $last_name, ' ', $first_name ?></p>
                            </div>
                        </article>
                    </div>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>

    </div>
</section>
<section id="trendingposts" class="popularpost-section">
    <?php
    $recentpostargs = array(
        'header' => 'Popular Posts',
        'header_start' => '<h3 class="popularpost-title section-caption">',
        'header_end' => '</h3>',
        'post_html' => '<li>
        <div class="popularpost-post-padding">
        {thumb}
        <p>
        {category}
        </p>
         <a href="{url}">{text_title}</a>
        <p>{author}</p>
        <div><span style="color: white;"> <i class="fa fa-eye"></i>
        <span>{views}</span></span></div>
        </div>
        </li>',
        'thumbnail_width' => 400,
        'thumbnail_height' => 250,
        'excerpt_by_words' => 1,
        'excerpt_length' => 55,
        'limit' => 3,
        'range' => 'all',
        'freshness' => 0,
        'order_by' => 'comments',
        'stats_author' => 1,
        'stats_category' => 1,
        'stats_views' => 1,
        'wpp_start' => '<ul class="popularpost-list">',
        'wpp_end' => '</ul>'

    );

    // echo var_dump($recentpostargs);

    if (function_exists('wpp_get_mostpopular')) {
        wpp_get_mostpopular($recentpostargs);
    }
    ?>
</section>
<section id="home-artsnculture" class="categories-main-padding">
    <div class="main-container">
        <h1 class="section-caption">Arts & Culture</h1>
        <div class="row">
            <?php
            $args = array(
                'post-type' => 'post',
                'post-status' => 'publish',
                'category_name' => 'arts',
                // 'cat' => '1,2,3',
                'posts_per_page' => 4,
            );

            $arr_posts = new WP_Query($args);
            ?>

            <?php if (!empty($arr_posts)) : ?>
                <?php $artsPosts = $arr_posts->posts ?>
                <?php foreach ($artsPosts as $artsPost) : ?>
                    <?php
                    // echo var_dump($artsPost);
                    $arts_post_id = $artsPost->ID;
                    $arts_post_date = $artsPost->post_date;
                    $arts_post_title = $artsPost->post_title;
                    $arts_post_excerpt = $artsPost->post_excerpt;
                    $arts_post_content = $artsPost->post_content;
                    $arts_thumb_id = get_post_thumbnail_id($arts_post_id);
                    $arts_image_sm = wp_get_attachment_image_src($arts_thumb_id, 'normal');
                    $arts_post_author = $artsPost->post_author;
                    $last_name = get_the_author_meta('last_name', $arts_post_author);
                    $first_name = get_the_author_meta('first_name', $arts_post_author);
                    $arts_post_category = get_the_category($arts_post_id)
                    ?>
                    <div class="col-lg-3">
                        <article class="home-center-article">
                            <a style="width: 100%;" href="<?php the_permalink($arts_post_id); ?>" rel="bookmark" title="Image for <?php echo $arts_post_title; ?>">
                                <img class="publishedrecently-img-size" src="<?php echo $arts_image_sm[0] ?>" alt="<?php echo $arts_post_title; ?>">
                            </a>
                            <div class="">
                                <h2 class="home-categories-article-title">
                                    <a href="<?php the_permalink($arts_post_id) ?>" rel="bookmark" title="Listen <?php echo $arts_post_title; ?>">
                                        <?php echo $arts_post_title ?>
                                    </a>
                                </h2>
                                <p class=""> <?php echo $arts_post_excerpt ?> </p>
                                <span class="categories-bottom-span"> <span style="padding-right: .3rem;"> by </span> <?php echo ' ', $last_name, ' ', $first_name ?> </span>
                                <span class="categories-bottom-span date"><?php echo date("F d, Y", strtotime($arts_post_date)); ?></span>
                            </div>
                        </article>
                    </div>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>

    </div>
</section>
<section id="home-legend" class="categories-main-padding">
    <div class="main-container">
        <h1 class="section-caption">Legend</h1>
        <div class="row">
            <?php
            $args = array(
                'post-type' => 'post',
                'post-status' => 'publish',
                'category_name' => 'legend',
                'posts_per_page' => 4,
            );

            $arr_posts = new WP_Query($args);
            ?>

            <?php if (!empty($arr_posts)) : ?>
                <?php $legendPosts = $arr_posts->posts ?>
                <?php foreach ($legendPosts as $legendPost) : ?>
                    <?php
                    // echo var_dump($artsPost);
                    $legend_post_id = $legendPost->ID;
                    $legend_post_date = $legendPost->post_date;
                    $legend_post_title = $legendPost->post_title;
                    $legend_post_excerpt = $legendPost->post_excerpt;
                    $legend_post_content = $legendPost->post_content;
                    $legend_thumb_id = get_post_thumbnail_id($legend_post_id);
                    $legend_image_sm = wp_get_attachment_image_src($legend_thumb_id, 'normal');
                    $legend_post_author = $legendPost->post_author;
                    $last_name = get_the_author_meta('last_name', $legend_post_author);
                    $first_name = get_the_author_meta('first_name', $legend_post_author);
                    $legend_post_category = get_the_category($legend_post_id)
                    ?>
                    <div class="col-lg-3">
                        <article class="home-center-article">
                            <a style="width: 100%;" href="<?php the_permalink($legend_post_id); ?>" rel="bookmark" title="Image for <?php echo $legend_post_title; ?>">
                                <img class="publishedrecently-img-size" src="<?php echo $legend_image_sm[0] ?>" alt="<?php echo $legend_post_title; ?>">
                            </a>
                            <div class="">
                                <h2 class="home-categories-article-title">
                                    <a href="<?php the_permalink($legend_post_id) ?>" rel="bookmark" title="Listen <?php echo $legend_post_title; ?>">
                                        <?php echo $legend_post_title ?>
                                    </a>
                                </h2>
                                <p class=""> <?php echo $legend_post_excerpt ?> </p>
                                <span class="categories-bottom-span"> <span style="padding-right: .3rem;"> by </span> <?php echo ' ', $last_name, ' ', $first_name ?> </span>
                                <span class="categories-bottom-span date"><?php echo date("F d, Y", strtotime($legend_post_date)); ?></span>
                            </div>
                        </article>
                    </div>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>

    </div>
</section>
<section id="home-education" class="categories-main-padding">
    <div class="main-container">
        <h1 class="section-caption">Education</h1>
        <div class="row">
            <?php
            $args = array(
                'post-type' => 'post',
                'post-status' => 'publish',
                'category_name' => 'education',
                'posts_per_page' => 4,
            );

            $arr_posts = new WP_Query($args);
            ?>

            <?php if (!empty($arr_posts)) : ?>
                <?php $educationPosts = $arr_posts->posts ?>
                <?php foreach ($educationPosts as $educationPost) : ?>
                    <?php
                    // echo var_dump($artsPost);
                    $education_post_id = $educationPost->ID;
                    $education_post_date = $educationPost->post_date;
                    $education_post_title = $educationPost->post_title;
                    $education_post_excerpt = $educationPost->post_excerpt;
                    $education_post_content = $educationPost->post_content;
                    $education_thumb_id = get_post_thumbnail_id($education_post_id);
                    $education_image_sm = wp_get_attachment_image_src($education_thumb_id, 'normal');
                    $education_post_author = $educationPost->post_author;
                    $last_name = get_the_author_meta('last_name', $education_post_author);
                    $first_name = get_the_author_meta('first_name', $education_post_author);
                    $education_post_category = get_the_category($education_post_id)
                    ?>
                    <div class="col-lg-3">
                        <article class="home-center-article">
                            <a style="width: 100%;" href="<?php the_permalink($education_post_id); ?>" rel="bookmark" title="Image for <?php echo $education_post_title; ?>">
                                <img class="publishedrecently-img-size" src="<?php echo $education_image_sm[0] ?>" alt="<?php echo $education_post_title; ?>">
                            </a>
                            <div class="">
                                <h2 class="home-categories-article-title">
                                    <a href="<?php the_permalink($education_post_id) ?>" rel="bookmark" title="Listen <?php echo $education_post_title; ?>">
                                        <?php echo $education_post_title ?>
                                    </a>
                                </h2>
                                <p class=""> <?php echo $education_post_excerpt ?> </p>
                                <span class="categories-bottom-span"> <span style="padding-right: .3rem;"> by </span> <?php echo ' ', $last_name, ' ', $first_name ?> </span>
                                <span class="categories-bottom-span date"><?php echo date("F d, Y", strtotime($education_post_date)); ?></span>
                            </div>
                        </article>
                    </div>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>

    </div>
</section>
<section id="home-career" class="categories-main-padding">
    <div class="main-container">
        <h1 class="section-caption">Career</h1>
        <div class="row">
            <?php
            $args = array(
                'post-type' => 'post',
                'post-status' => 'publish',
                'category_name' => 'career',
                'posts_per_page' => 4,
            );

            $arr_posts = new WP_Query($args);
            ?>

            <?php if (!empty($arr_posts)) : ?>
                <?php $careerPosts = $arr_posts->posts ?>
                <?php foreach ($careerPosts as $careerPost) : ?>
                    <?php
                    // echo var_dump($artsPost);
                    $career_post_id = $careerPost->ID;
                    $career_post_date = $careerPost->post_date;
                    $career_post_title = $careerPost->post_title;
                    $career_post_excerpt = $careerPost->post_excerpt;
                    $career_post_content = $careerPost->post_content;
                    $career_thumb_id = get_post_thumbnail_id($career_post_id);
                    $career_image_sm = wp_get_attachment_image_src($career_thumb_id, 'normal');
                    $career_post_author = $careerPost->post_author;
                    $last_name = get_the_author_meta('last_name', $career_post_author);
                    $first_name = get_the_author_meta('first_name', $career_post_author);
                    $career_post_category = get_the_category($career_post_id)
                    ?>
                    <div class="col-lg-3">
                        <article class="home-center-article">
                            <a style="width: 100%;" href="<?php the_permalink($career_post_id); ?>" rel="bookmark" title="Image for <?php echo $career_post_title; ?>">
                                <img class="publishedrecently-img-size" src="<?php echo $career_image_sm[0] ?>" alt="<?php echo $career_post_title; ?>">
                            </a>
                            <div class="">
                                <h2 class="home-categories-article-title">
                                    <a href="<?php the_permalink($career_post_id) ?>" rel="bookmark" title="Listen <?php echo $career_post_title; ?>">
                                        <?php echo $career_post_title ?>
                                    </a>
                                </h2>
                                <p class=""> <?php echo $career_post_excerpt ?> </p>
                                <span class="categories-bottom-span"> <span style="padding-right: .3rem;"> by </span> <?php echo ' ', $last_name, ' ', $first_name ?> </span>
                                <span class="categories-bottom-span date"><?php echo date("F d, Y", strtotime($career_post_date)); ?></span>
                            </div>
                        </article>
                    </div>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>

    </div>
</section>
<section id="home-religion" class="categories-main-padding">
    <div class="main-container">
        <h1 class="section-caption">Religion</h1>
        <div class="row">
            <?php
            $args = array(
                'post-type' => 'post',
                'post-status' => 'publish',
                'category_name' => 'religion',
                'posts_per_page' => 4,
            );

            $arr_posts = new WP_Query($args);
            ?>

            <?php if (!empty($arr_posts)) : ?>
                <?php $religionPosts = $arr_posts->posts ?>
                <?php foreach ($religionPosts as $religionPost) : ?>
                    <?php
                    // echo var_dump($artsPost);
                    $religion_post_id = $religionPost->ID;
                    $religion_post_date = $religionPost->post_date;
                    $religion_post_title = $religionPost->post_title;
                    $religion_post_excerpt = $religionPost->post_excerpt;
                    $religion_post_content = $religionPost->post_content;
                    $religion_thumb_id = get_post_thumbnail_id($religion_post_id);
                    $religion_image_sm = wp_get_attachment_image_src($religion_thumb_id, 'normal');
                    $religion_post_author = $religionPost->post_author;
                    $last_name = get_the_author_meta('last_name', $religion_post_author);
                    $first_name = get_the_author_meta('first_name', $religion_post_author);
                    $religion_post_category = get_the_category($religion_post_id)
                    ?>
                    <div class="col-lg-3">
                        <article class="home-center-article">
                            <a style="width: 100%;" href="<?php the_permalink($religion_post_id); ?>" rel="bookmark" title="Image for <?php echo $religion_post_title; ?>">
                                <img class="publishedrecently-img-size" src="<?php echo $religion_image_sm[0] ?>" alt="<?php echo $religion_post_title; ?>">
                            </a>
                            <div class="">
                                <h2 class="home-categories-article-title">
                                    <a href="<?php the_permalink($religion_post_id) ?>" rel="bookmark" title="Listen <?php echo $religion_post_title; ?>">
                                        <?php echo $religion_post_title ?>
                                    </a>
                                </h2>
                                <p class=""> <?php echo $religion_post_excerpt ?> </p>
                                <span class="categories-bottom-span"> <span style="padding-right: .3rem;"> by </span> <?php echo ' ', $last_name, ' ', $first_name ?> </span>
                                <span class="categories-bottom-span date"><?php echo date("F d, Y", strtotime($religion_post_date)); ?></span>
                            </div>
                        </article>
                    </div>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>

    </div>
</section>
<section id="home-history" class="categories-main-padding">
    <div class="main-container">
        <h1 class="section-caption">History</h1>
        <div class="row">
            <?php
            $args = array(
                'post-type' => 'post',
                'post-status' => 'publish',
                'category_name' => 'history',
                'posts_per_page' => 4,
            );

            $arr_posts = new WP_Query($args);
            // var_dump($arr_posts->posts)
            ?>

            <?php if (!empty($arr_posts)) : ?>
                <?php $historyPosts = $arr_posts->posts ?>
                <?php foreach ($historyPosts as $historyPost) : ?>
                    <?php
                    // echo var_dump($artsPost);
                    $history_post_id = $historyPost->ID;
                    $history_post_date = $historyPost->post_date;
                    $history_post_title = $historyPost->post_title;
                    $history_post_excerpt = $historyPost->post_excerpt;
                    $history_post_content = $historyPost->post_content;
                    $history_thumb_id = get_post_thumbnail_id($history_post_id);
                    $history_image_sm = wp_get_attachment_image_src($history_thumb_id, 'normal');
                    $history_post_author = $historyPost->post_author;
                    $last_name = get_the_author_meta('last_name', $history_post_author);
                    $first_name = get_the_author_meta('first_name', $history_post_author);
                    $history_post_category = get_the_category($history_post_id)
                    ?>
                    <div class="col-lg-3">
                        <article class="home-center-article">
                            <a style="width: 100%;" href="<?php the_permalink($history_post_id); ?>" rel="bookmark" title="Image for <?php echo $history_post_title; ?>">
                                <img class="publishedrecently-img-size" src="<?php echo $history_image_sm[0] ?>" alt="<?php echo $history_post_title; ?>">
                            </a>
                            <div class="">
                                <!-- <iframe src="<?php echo $history_post_content ?>">test</iframe> -->
                                <h2 class="home-categories-article-title">
                                    <a href="<?php the_permalink($history_post_id) ?>" rel="bookmark" title="Listen <?php echo $history_post_title; ?>">
                                        <?php echo $history_post_title ?>
                                    </a>
                                </h2>
                                <p class=""> <?php echo $history_post_excerpt ?> </p>
                                <span class="categories-bottom-span"> <span style="padding-right: .3rem;"> by </span> <?php echo ' ', $last_name, ' ', $first_name ?> </span>
                                <span class="categories-bottom-span date"><?php echo date("F d, Y", strtotime($history_post_date)); ?></span>
                            </div>
                        </article>
                    </div>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>

    </div>
</section>

<?php get_footer(); ?>