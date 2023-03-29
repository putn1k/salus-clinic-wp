<?php /* Template Name: Акции */ ?>
<?php get_header(); ?>
<?php $actions = get_field( 'actions' ); ?>
<section class="actions">
  <div class="container">
    <h1 class="indent-reset hd hd--h2 actions__title"><?php the_title(); ?></h1>
    <?php if ( $actions ): ?>
    <ul class="list-reset actions__list">
      <?php foreach($actions as $action): ?>
      <li>
        <article class="action-card" <?php if ( $action['anchor'] ): ?> id="<?= $action['anchor']; ?>"<?php endif; ?>>
          <img class="action-card__poster"
               src="<?= get_image_url_fallback($action['poster']['url']); ?>"
               alt="<?= $action['poster']['alt']; ?>">
          <div class="action-card__wrapper-text">
            <h2 class="indent-reset hd hd--h3 action-card__title"><?= $action['title']; ?></h2>
            <?php $date_start = get_field('date_start'); ?>
            <?php $date_end = get_field('date_end'); ?>
            <?php if ($date_start && $date_end) : ?>
            <div class="small action-card__period">
              <time datetime="<?=get_format_date($date_start);?>"><?=$date_start;?></time> &ndash; <time datetime="<?=get_format_date($date_end);?>"><?=$date_end;?></time>
            </div>
            <?php endif; ?>
            <div class="action-card__descr">
              <?= $action['descr']; ?>
            </div>
          </div>
        </article>
      </li>
      <?php endforeach; ?>
    </ul>
    <?php else : ?>
    <p>На данный момент акции не проводятся</p>
    <?php endif; ?>
  </div>
</section>
<?php get_footer(); ?>
