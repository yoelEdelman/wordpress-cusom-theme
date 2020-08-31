<?php get_header(); ?>

<h1><?= esc_html(get_queried_object()->name) ?></h1>

<?php $sports = get_terms(['taxonomy' => 'sport']) ?>
<?php if (is_array($sports)): ?>
    <ul class="nav nav-pills my-4">
        <?php foreach ($sports as $sport): ?>
            <li class="nav-item">
                <a href="<?= get_term_link($sport) ?>" class="nav-link <?= is_tax('sport', $sport->term_id) ? 'active' : '' ?>"><?= $sport->name ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php if (have_posts()): ?>
    <div class="row">
        <?php while (have_posts()): the_post(); ?>
            <div class="col-sm-4">
                <?php get_template_part('parts/card', 'post') ?>
            </div>
        <?php endwhile ?>
    </div>

    <?php \App\nalta_pagination() ?>

<?php else: ?>
    <h1>Pas d'articles</h1>
<?php endif; ?>

<?php get_footer(); ?>
