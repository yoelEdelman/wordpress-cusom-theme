<?php
/**
 * Template Name: Page avec bannière
 * Template Post Type: page, post
 */
?>

<?php get_header(); ?>

Bonjour tout le monde : <?php wp_title(); ?>

<?php if (have_posts()): ?>
    <p>Ici la bannière </p>
    <?php while (have_posts()): the_post(); ?>
        <h1><?php the_title() ?></h1>
        <p>
            <img src="<?php the_post_thumbnail_url(); ?>" alt="" style="width: 100%; height: auto;">
        </p>
        <?php the_content() ?>
    <?php endwhile ?>
<?php endif; ?>

<?php get_footer(); ?>
