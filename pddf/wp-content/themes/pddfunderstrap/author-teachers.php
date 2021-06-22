<?php

/**
 * Template Name: Author-teachers 
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$container = get_theme_mod('understrap_container_type');

?>

<div class="main-container categories-main-padding">
    <header>
        <h1 class="category-page-title"> Teachers </h1>
    </header>
    <div class="row" style="padding-top: 2rem;">
        <?php
        $number = 4; //max display per page
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; //current number of page
        $offset = ($paged - 1) * $number; //page offset
        $users = get_users(array('role' => 'teacher')); //get all the lists of users

        $args = array(
            'offset' => $offset,
            'number' => $number,
            'role' => 'teacher',
            // 'fields' => array('ID', 'user_login', 'user_email')
        );

        $query = get_users($args); //query the maximum users that we will be displaying

        $total_users = count($users); //count total users
        $total_query = count($query); //count the maximum displayed users

        $total_pages = ($total_users / $number); // get the total pages by dividing the total users to the maximum numbers of user to be displayed    

        //Check if the total pages has a decimal we will add + 1 page
        $total_pages = is_float($total_pages) ? intval($total_users / $number) + 1 : intval($total_users / $number);

        if (is_array($query)) {
            foreach ($query as $agent_data) { ?>
                <?php
                // var_dump($agent_data);
                $author_link    = get_author_posts_url($agent_data->ID);
                $display_name = get_the_author_meta('display_name', $agent_data->ID);
                $facebook_url = get_the_author_meta('facebook', $agent_data->ID);
                $twitter_url = get_the_author_meta('twitter', $agent_data->ID);
                $linkedIn_url = get_the_author_meta('linkedIn', $agent_data->ID);
                $instagram_url = get_the_author_meta('instagram', $agent_data->ID);
                $bio = get_the_author_meta('description', $agent_data->ID);
                // var_dump($author_link)
                ?>
                <div class="col-lg-4 center-author-content">
                    <a style="width: 100%;" href="<?php echo esc_url($author_link); ?>" rel="bookmark" title="<?php echo esc_html(get_the_author_meta('display_name', $agent_data->ID)); ?>">
                        <img class="author-img-size" src="<?php echo get_avatar_url($agent_data->ID); ?>" alt="<?php echo $recent_post_title; ?>">
                    </a>

                    <p class="author-display-name"> <?php echo $display_name ?></p>
                    <div class="bioMsg">
                        <?php if (!empty($bio)) : ?>
                            <p> <?php echo $bio ?> </p>
                        <?php endif; ?>
                    </div>
                    <div class="socialc">
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
                    <button type="button" class="btn btn-outline-secondary btn-lg authors-read-more-btn">READ ARTICLES</button>
                    <hr />
                </div>
        <?php
            }
        }
        ?>
        <?php
        if ($total_users > $total_query) {
            echo '<div id="support-pagination" class="clearfix">';
            $current_page = max(1, get_query_var('paged'));
            echo paginate_links(array(
                'base' => get_pagenum_link(1) . '%_%',
                'format' => 'page/%#%/',
                'current' => $current_page,
                'total' => $total_pages,
                'prev_next' => false,
                'type' => 'list',
            ));
        }
        echo '</div>';

        ?>

    </div><!-- .row -->
</div><!-- #page-wrapper -->

<?php get_footer(); ?>