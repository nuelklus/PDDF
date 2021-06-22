<?php
/*
 * Template Name: Frontend Post
 * description: >-
Page template without sidebar
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>

<div class="main-container">
    <header class="page-header">
        <h1 class="category-page-title">Create Post</h1>
    </header>
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <?php if (function_exists('user_submitted_posts')) user_submitted_posts(); ?>
            <!-- <?php if (function_exists('usp_login_form')) usp_login_form(); ?> -->
        </div>
        <div class="col-lg-2"></div>
    </div>
</div>

<?php get_footer(); ?>