<?php /* Template Name: Прайс-лист */ ?>
<?php get_header(); ?>
<?php $price_groups = get_field( 'price_groups' ); ?>
<section class="pricing">
  <div class="container">
    <h1 class="indent-reset hd hd--h2 pricing__title"><?php the_title(); ?></h1>
    <?php if( get_field( 'pricing_text', 'options' ) ): ?>
    <div class="pricing__descr">
      <p><?= get_field( 'pricing_text', 'options' ); ?></p>
    </div>
    <?php endif; ?>
    <?php if( $price_groups ): ?>
    <div class="pricing__list price-list">
      <label class="price-list__search pricing-search">
        <input class="pricing-search__input"
               type="search"
               placeholder="Найти процедуру">
        <span class="small pricing-search__alert"></span>
      </label>
      <div class="price-list__results">
        <p>Результаты поиска:</p>
        <table class="price-list__table">
          <tbody>
          </tbody>
        </table>
        <p class="price-list__no-results-text"></p>
      </div>

      <div class="price-list__groups">
        <?php foreach($price_groups as $group_item): ?>
        <details class="price-list__group">
          <summary class="hd hd--h4 price-list__title"><?= $group_item['group']?$group_item['group'] : 'Без названия'; ?></summary>
          <div class="price-list__content">
            <?php if( $group_item['price'] ): ?>
            <table class="price-list__table">
              <tbody>
                <?php foreach($group_item['price'] as $item): ?>
                <tr>
                  <td><?= $item['title']; ?></td>
                  <td><?= $item['cost']; ?></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <?php endif; ?>
          </div>
        </details>
        <?php endforeach; ?>
      </div>
    </div>
    <?php endif; ?>
  </div>
</section>

<template id="table-row">
  <tr>
    <td></td>
    <td></td>
  </tr>
</template>
<?php get_footer(); ?>
