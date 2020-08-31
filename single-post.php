<?php get_header(); ?>

    Bonjour tout le monde : <?php wp_title(); ?>

<?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
        <h1><?php the_title() ?></h1>

        <?php if (get_post_meta(get_the_ID(), SponsoMetaBox::META_KEY, true) === '1'): ?>
            <div class="alert alert-info">
                Cet article est sponsorisé
            </div>
        <?php endif; ?>

        <p>
            <img src="<?php the_post_thumbnail_url(); ?>" alt="" style="width: 100%; height: auto;">
        </p>
        <?php the_content() ?>
    <?php endwhile ?>
<?php else: ?>
    <h1>Pas d'articles</h1>
<?php endif; ?>

<?php get_footer(); ?>