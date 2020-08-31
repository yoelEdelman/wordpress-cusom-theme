<?php get_header(); ?>

<?php if (have_posts()): ?>
        <?php while (have_posts()): the_post(); ?>
            <h1><?php the_title() ?></h1>
            <p><?php the_content(); ?></p>
            <a href="<?= get_post_type_archive_link('post') ?>">Voir les dernières actualités</a>
        <?php endwhile ?>
<?php else: ?>
    <h1>Pas d'articles</h1>
<?php endif; ?>

<?php get_footer(); ?>