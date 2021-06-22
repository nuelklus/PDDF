<?php

/**
 * The template for displaying archive pages
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();

$container = get_theme_mod('understrap_container_type');
?>

<div class="main-container categories-main-padding" id="archive-wrapper">

    <header class="page-header">
        <?php
        the_archive_title('<h1 class="category-page-title">');
        ?>
    </header><!-- .page-header -->
    <!-- <div class="<?php echo esc_attr($container); ?>" id="content" tabindex="-1"> -->
    <div class="row ver-divider-bottom" style="padding-top: 2rem;">
        <?php
        $args = array(
            'post-type' => 'post',
            'post-status' => 'publish',
            'category_name' => 'religion',
            // 'cat' => '1,2,3',
            'posts_per_page' => 2,
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
                $arts_image_sm = wp_get_attachment_image_src($arts_thumb_id, 'large');
                $arts_post_author = $artsPost->post_author;
                $last_name = get_the_author_meta('last_name', $arts_post_author);
                $first_name = get_the_author_meta('first_name', $arts_post_author);
                $arts_post_category = get_the_category($arts_post_id)
                ?>
                <div class="col-lg-6 dynamiclass center-art-home">
                    <article class="home-center-article ">
                        <p class="home-post-date">
                            May 17, 2021
                        </p>
                        <a style="width: 100%;" href="<?php the_permalink($arts_post_id); ?>" rel="bookmark" title="Image for <?php echo $arts_post_title; ?>">
                            <img class="home-art-image-size" src="<?php echo $arts_image_sm[0] ?>" alt="<?php echo $arts_post_title; ?>">
                        </a>
                        <div class="home-content-overlap category-content-overlap">
                            <div class="home-featured-image-category">
                                <h3 class="home-post-middle-title category-post-tittle">
                                    <a href="<?php the_permalink($arts_post_id) ?>" rel="bookmark" title="Listen <?php echo $arts_post_title; ?>" style="color: black;">
                                        <?php echo $arts_post_title ?>
                                    </a>
                                </h3>
                                <p class="home-post-middle-excerpt category-post-excerpt"> <?php echo $arts_post_excerpt ?> </p>
                                <p class="category-post-author"> <span> by </span> <?php echo $last_name, ' ', $first_name ?></p>
                            </div>
                        </div>
                    </article>
                </div>
            <?php endforeach; ?>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>
    <div style="padding-top: 3.5rem;">
        <?php
        // $currentPa ge = get_query_var('paged');
        $args = array(
            'post-type' => 'post',
            'post-status' => 'publish',
            'category_name' => 'religion',
            // 'posts_per_page' => 2,
            // 'paged' => $currentPage
        );

        // Get current page and append to custom query parameters array
        $args['paged'] = get_query_var('paged') ? get_query_var('paged') : 1;

        $arr_posts = new WP_Query($args);
        $cat_arr = $arr_posts->posts;
        $new_post_arr = [];
        $index = 0;
        $counter = 0;
        foreach ($cat_arr as $value) {
            if ($counter === 2) {
                $counter = 0;
                $index++;
            }
            if ($counter < 2) {
                $new_post_arr[$index][] = $value;
                $counter++;
            }
        }
        // fix pagination
        $temp_query = $wp_query;
        // wipe it
        $wp_query   = NULL;
        // replace it
        $wp_query   = $arr_posts;

        ?>

        <?php if (!empty($new_post_arr)) : ?>
            <?php foreach ($new_post_arr as $artsPosts) : ?>
                <?php
                $arts_post_id_of_zero = $artsPosts[0]->ID;
                if (!isset($artsPosts[1])) {
                    $arts_post_id_of_one = null;
                } else {
                    $arts_post_id_of_one = $artsPosts[1]->ID;
                }
                // var_dump($arts_post_id_of_zero);
                // var_dump($arts_post_id_of_one);
                $arts_post_title_of_zero = $artsPosts[0]->post_title;
                // $arts_post_title_of_one = $artsPosts[1]->post_title;
                if (!isset($artsPosts[1])) {
                    $arts_post_title_of_one = null;
                } else {
                    $arts_post_title_of_one = $artsPosts[1]->post_title;
                }
                $arts_post_excerpt_of_zero = $artsPosts[0]->post_excerpt;
                // $arts_post_excerpt_of_one = $artsPosts[1]->post_excerpt;
                if (!isset($artsPosts[1])) {
                    $arts_post_excerpt_of_one = null;
                } else {
                    $arts_post_excerpt_of_one = $artsPosts[1]->post_excerpt;
                }
                $arts_post_content_of_zero = $artsPosts[0]->post_content;
                // $arts_post_content_of_one = $artsPosts[1]->post_content;
                if (!isset($artsPosts[1])) {
                    $arts_post_content_of_one = null;
                    $arts_thumb_id_of_one = null;
                    $arts_image_sm_of_one = null;
                    $last_name_of_one = null;
                    $first_name_of_one = null;
                    $arts_post_author_of_one = null;
                } else {
                    $arts_post_content_of_one = $artsPosts[1]->post_content;
                    $arts_thumb_id_of_one = get_post_thumbnail_id($arts_post_id_of_one);
                    $arts_image_sm_of_one = wp_get_attachment_image_src($arts_thumb_id_of_one, 'large');
                    $arts_post_author_of_one = $artsPosts[1]->post_author;
                    $last_name_of_one = get_the_author_meta('last_name', $arts_post_author_of_one);
                    $first_name_of_one = get_the_author_meta('first_name', $arts_post_author_of_one);
                }
                $arts_thumb_id_of_zero = get_post_thumbnail_id($arts_post_id_of_zero);
                $arts_image_sm_of_zero = wp_get_attachment_image_src($arts_thumb_id_of_zero, 'large');
                $arts_post_author_of_zero = $artsPosts[0]->post_author;
                $last_name_of_zero = get_the_author_meta('last_name', $arts_post_author_of_zero);
                $first_name_of_zero = get_the_author_meta('first_name', $arts_post_author_of_zero);

                ?>
                <article class="home-center-article">
                    <div class="row">
                        <div class="category-articles-intwo-layout">
                            <div class="col-lg-6">
                                <a style="width: 100%;" href="<?php the_permalink($arts_post_id_of_zero); ?>" rel="bookmark" title="Image for <?php echo $arts_post_title_of_zero; ?>">
                                    <img class="home-art-image-size category-image" src="<?php echo $arts_image_sm_of_zero[0] ?>" alt="<?php echo $arts_post_title_of_zero; ?>">
                                </a>
                            </div>
                            <div class="col-lg-6">
                                <div class="category-content-overlap">
                                    <div class="home-featured-image-category">
                                        <h3 class="home-post-middle-title category-post-tittle">
                                            <a href="<?php the_permalink($arts_post_id_of_zero) ?>" rel="bookmark" title="Listen <?php echo $arts_post_title_of_zero; ?>" style="color: black;">
                                                <?php echo $arts_post_title_of_zero ?>
                                            </a>
                                        </h3>
                                        <p class="home-post-middle-excerpt category-post-excerpt"> <?php echo $arts_post_excerpt_of_zero ?> </p>
                                        <p class="category-post-author"> <span> by </span> <?php echo $last_name_of_zero, ' ', $first_name_of_zero ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if (isset($artsPosts[1])) : ?>
                            <div class="category-articles-intwo-layout">
                                <div class="col-lg-6">
                                    <div class="category-content-overlap">
                                        <div class="home-featured-image-category">
                                            <h3 class="home-post-middle-title category-post-tittle">
                                                <a href="<?php the_permalink($arts_post_id_of_one) ?>" rel="bookmark" title="Listen <?php echo $arts_post_title_of_one; ?>" style="color: black;">
                                                    <?php echo $arts_post_title_of_one ?>
                                                </a>
                                            </h3>
                                            <p class="home-post-middle-excerpt category-post-excerpt"> <?php echo $arts_post_excerpt_of_one ?> </p>
                                            <p class="category-post-author"> <span> by </span> <?php echo $last_name_of_one, ' ', $first_name_of_one ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <a style="width: 100%;" href="<?php the_permalink($arts_post_id_of_one); ?>" rel="bookmark" title="Image for <?php echo $arts_post_title_of_one; ?>">
                                        <img class="home-art-image-size category-image" src="<?php echo $arts_image_sm_of_one[0] ?>" alt="<?php echo $arts_post_title_of_one; ?>">
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </article>

            <?php endforeach; ?>


        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
        <div class="pagination-layout">
            <?php echo paginate_links(array(
                'total' => $arr_posts->max_num_pages
            )); ?>
        </div>
        <?php
        // Reset main query object
        $wp_query = NULL;
        $wp_query = $temp_query;
        ?>
    </div>
</div><!-- #content -->


<?php
get_footer();
