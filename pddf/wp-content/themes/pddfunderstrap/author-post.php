<?php

/**
 * Template Name: Author-posts 
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$container = get_theme_mod('understrap_container_type');

?>
<?php
$current_user = wp_get_current_user();
$current_user_id = $current_user->ID;
$current_user_display = $current_user->display_name;
$bio = get_the_author_meta('description', $current_user_id);
$facebook_url = get_the_author_meta('facebook', $current_user_id);
$twitter_url = get_the_author_meta('twitter', $current_user_id);
$linkedIn_url = get_the_author_meta('linkedIn', $current_user_id);
$instagram_url = get_the_author_meta('instagram', $current_user_id);

// var_dump($twitter_url)
?>
<div class="wrapper" id="author-wrapper">
    <div class="main-container categories-main-padding">
        <div class="row" style="margin-inline: 0;">
            <div class=" profile-sidebar">
                <img style="clip-path: circle();object-fit: cover;" class="author-img-size" src="<?php echo get_avatar_url($current_user_id); ?>" alt="<?php echo $recent_post_title; ?>">
                <h3 class="author-display-name author-display-name-profile"><?php echo $current_user_display ?></h3>
                <div class="bioMsg">
                    <p style="margin: 1rem 3rem 2rem;"><?php echo $bio ?></p>
                </div>
                <div class="socialc" style="margin-bottom: 0;">
                    <?php if (!empty($facebook_url)) : ?>
                        <a href="<?php echo $facebook_url ?>"> <i class="fa fa-facebook"> </i> </a>
                    <?php endif; ?>
                    <?php if (!empty($twitter_url)) : ?>
                        <a href="<?php echo $twitter_url ?>"> <i class="fa fa-twitter"></i> </a>
                    <?php endif; ?>
                    <?php if (!empty($linkedIn_url)) : ?>
                        <a href="<?php echo $linkedIn_url ?>"> <i class="fa fa-linkedin"></i> </a>
                    <?php endif; ?>
                    <?php if (!empty($instagram_url)) : ?>
                        <a href="<?php echo $instagram_url ?>"> <i class="fa fa-instagram"></i> </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="" style="width: 70%;">
                <?php

                $args = array(
                    'post-type' => 'post',
                    'post-status' => 'publish',
                    'posts_per_page' => 10,
                    'author' => $current_user_id
                );

                $current_user_posts = new WP_Query($args);
                // echo var_dump($current_user_posts);

                ?>
                <?php if (!empty($current_user_posts)) : ?>
                    <?php $posts = $current_user_posts->posts; ?>
                    <?php foreach ($posts as $post) : ?>
                        <?php
                        $current_user_post_id = $post->ID;
                        $current_user_post_date = $post->post_date;
                        $current_user_post_title = $post->post_title;
                        // $current_user_post_excerpt = custom_the_excerpt();
                        $current_user_thumb_id = get_post_thumbnail_id($current_user_post_id);
                        $current_user_image_sm = wp_get_attachment_image_src($current_user_thumb_id, 'medium');
                        $current_user_post_array = get_the_category($current_user_post_id);
                        $current_user_post_category = $current_user_post_array[0]->cat_name;
                        // var_dump($current_user_post_category)
                        ?>
                        <div class="row category-articles-intwo-layout">
                            <div class="col-lg-6 profile-post-details">
                                <div class="home-featured-image-category">
                                    <p class="profile-post-category"><?php echo $current_user_post_category ?></p>
                                    <h2 class="profile-post-tittle">
                                        <a href="<?php the_permalink($current_user_post_id); ?>" style="color: black;">
                                            <?php echo $current_user_post_title ?>
                                        </a>
                                    </h2>
                                    <p class="profile-post-excerpt"> <?php custom_the_excerpt(100); ?>
                                        <span> <a href="<?php the_permalink($current_user_post_id); ?>">[...]</a> </span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6" style="padding: 0 0 0 3rem;">
                                <a style="width: 100%;" href="<?php the_permalink($current_user_post_id); ?>" rel="bookmark" title="Image for <?php echo $current_user_post_title; ?>">
                                    <img class="profile-post-image" src="<?php echo $current_user_image_sm[0] ?>" alt="<?php echo $current_user_post_title; ?>">
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>

            </div>
            <!-- The pagination component -->

        </div> <!-- .row -->
    </div><!-- #content -->
</div><!-- #author-wrapper -->




<?php
get_footer();
