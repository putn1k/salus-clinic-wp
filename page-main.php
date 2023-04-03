<?php /* Template Name: Главная */ ?>
<?php get_header(); ?>

<?php $hero_slider = get_field( 'hero_slider' ); ?>
<?php if($hero_slider): ?>
<section class="hero-slider">
  <h1 class="visually-hidden">Медицинский центр «Салюс»</h1>

  <?php if ( count($hero_slider ) > 1 ): ?>
  <div class="hero-slider__block slider">
    <div class="swiper-wrapper slider__wrapper">
  <?php endif; ?>
      <?php foreach($hero_slider as $slide): ?>
      <div class="swiper-slide hero-slide">
        <div class=" hero-slide__banner<?php if( $slide['is_left'] ): ?> hero-slide__banner--text-left<?php endif; ?>">
          <img src="<?=get_image_url_fallback( $slide['image']['url'] ); ?>"
               alt="<?= $slide['image']['alt']; ?>">
        </div>
        <?php if ( $slide['heading'] || $slide['descr'] || $slide['link'] ): ?>
        <div class="hero-slide__text<?php if($slide['is_left']): ?> hero-slide__text--text-left<?php endif; ?>">
          <div class="container hero-slide__text-wrapper">
            <?php if( $slide['heading'] ): ?>
            <div class="hd hero-slide__heading">
              <?= $slide['heading']; ?>
            </div>
            <?php endif; ?>
            <?php if( $slide['descr'] ): ?>
            <div class="hero-slide__descr"><?= $slide['descr']; ?></div>
            <?php endif; ?>
            <?php if( $slide['link'] ): ?>
            <a class="btn hero-slide__link"
               href="<?= $slide['link']['url']; ?>"><?= $slide['link']['title']; ?></a>
            <?php endif; ?>
          </div>
        </div>
        <?php endif; ?>
      </div>
      <?php endforeach; ?>
  <?php if ( count($hero_slider ) > 1 ): ?>
    </div>
    <div class="hero-slider__control slider__control">
      <button class="btn-reset hero-slider__prev slider__nav-btn"
              type="button"
              aria-label="Предыдущий слайд">
        <svg width="21"
             height="13"
             aria-hidden="true">
          <use xlink:href="<?=THEME_PATH?>/img/sprite.svg#icon-arr-left"></use>
        </svg>
      </button>
      <button class="btn-reset hero-slider__next slider__nav-btn"
              type="button"
              aria-label="Следующий слайд">
        <svg width="21"
             height="13"
             aria-hidden="true">
          <use xlink:href="<?=THEME_PATH?>/img/sprite.svg#icon-arr-right"></use>
        </svg>
      </button>
    </div>
    <div class="container hero-slider__pagination slider__pagination"></div>
  </div>
  <?php endif; ?>

</section>
<?php else: ?>
<section class="hero-slider">
  <h1 class="visually-hidden">Медицинский центр «Салюс»</h1>
  <div class="swiper-slide hero-slide">
    <div class=" hero-slide__banner">
      <img src="<?=THEME_PATH?>/img/slide1.jpg"
            alt="Девушка-медик с планшетом">
    </div>
    <div class="hero-slide__text">
      <div class="container hero-slide__text-wrapper">
        <div class="hd hero-slide__heading">
          <span>Salus – </span>значит здравствуйте
        </div>
        <div class="hero-slide__descr">Мы желаем Вам здоровья!</div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<section class="features">
  <div class="hd hd--h2 features__banner"
       aria-hidden="true">Мы открылись</div>
  <h2 class="visually-hidden">Особенности нашего медицинского центра</h2>
  <div class="container">
    <ul class="list-reset features__list">
      <li class="features__item">
        <svg width="60"
             height="60"
             aria-hidden="true">
          <use xlink:href="<?=THEME_PATH?>/img/sprite.svg#icon-research"></use>
        </svg>
        <span>Новые кабинеты, новое оборудование для Вас и Ваших детей</span>
      </li>
      <li class="features__item">
        <svg width="60"
             height="60"
             aria-hidden="true">
          <use xlink:href="<?=THEME_PATH?>/img/sprite.svg#icon-hospital"></use>
        </svg>
        <span>Многопрофильная клиника для всей семьи</span>
      </li>
      <li class="features__item">
        <svg width="60"
             height="60"
             aria-hidden="true">
          <use xlink:href="<?=THEME_PATH?>/img/sprite.svg#icon-good-pos"></use>
        </svg>
        <span>Удобное месторасположение (рядом с областной детской больницей на Бекешской)</span>
      </li>
      <li class="features__item">
        <svg width="60"
             height="60"
             aria-hidden="true">
          <use xlink:href="<?=THEME_PATH?>/img/sprite.svg#icon-doctor"></use>
        </svg>
        <span>Оказываем помощь по всем основным медицинским направлениям</span>
      </li>
    </ul>
  </div>
</section>

<section class="advantages">
  <div class="container">
    <h2 class="indent-reset hd hd--h2 advantages__title">Преимущества лечения у нас</h2>
    <ul class="list-reset advantages__list">
      <li class="advantages__item">
        <span class="advantages__lead-text">Строго соблюдаем врачебную тайну</span>
        <span>гарантия конфиденциальности</span>
      </li>
      <li class="advantages__item">
        <span class="advantages__lead-text">Современные методы лечения</span>
        <span>эффективно и актуально</span>
      </li>
      <li class="advantages__item">
        <span class="advantages__lead-text">Врачи высшей категории</span>
        <span>повышение квалификации, основа медицины</span>
      </li>
      <li class="advantages__item">
        <span class="advantages__lead-text">Прием по основным направлениям</span>
        <span>УЗИ, гинекология, ЛОР врач, педиатрия, терапевт</span>
      </li>
    </ul>
  </div>
</section>

<?php $staff = get_field( 'staff' ); ?>
<?php if($staff): ?>
<section class="staff slider">
  <div class="container">
    <div class="staff__top">
      <h2 class="indent-reset hd hd--h2 staff__title">Специалисты клиники</h2>
      <div class="staff__control slider__control">
        <button class="btn-reset staff__prev slider__nav-btn"
                type="button"
                aria-label="Предыдущий слайд">
          <svg width="21"
               height="13"
               aria-hidden="true">
            <use xlink:href="<?=THEME_PATH?>/img/sprite.svg#icon-arr-left"></use>
          </svg>
        </button>
        <button class="btn-reset staff__next slider__nav-btn"
                type="button"
                aria-label="Следующий слайд">
          <svg width="21"
               height="13"
               aria-hidden="true">
            <use xlink:href="<?=THEME_PATH?>/img/sprite.svg#icon-arr-right"></use>
          </svg>
        </button>
      </div>
    </div>
    <div class="staff__slider">
      <div class="swiper-wrapper slider__wrapper">
        <?php foreach( $staff as $person ): ?>
        <div class="swiper-slide staff-person">
          <div class="staff-person__photo">
            <img src="<?=get_image_url_fallback( $person['photo']['url'] ); ?>"
                 width="245"
                 height="300"
                 alt="<?= $person['photo']['alt']; ?>">
          </div>
          <div class="staff-person__meta">
            <div class="staff-person__main">
              <span class="staff-person__name"><?= $person['name']; ?></span>
              <?php if( $person['post'] ): ?><span class="small staff-person__post"><?= $person['post']; ?></span><?php endif; ?>
              <?php if( $person['descr'] ): ?><p class="indent-reset staff-person__descr"><?= $person['descr']; ?></p><?php endif; ?>
            </div>
            <?php if( $person['link'] ): ?>
            <a class="btn staff-person__btn"
               href="<?=$person['link'] ;?>"
               target="_blank"
               rel="nofollow noreferer noopener">Записаться на прием</a>
            <?php endif; ?>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      <div class="container staff__pagination slider__pagination"></div>
    </div>
  </div>
</section>
<?php endif; ?>

<section class="price-banner">
  <div class="container">
    <h2 class="indent-reset hd hd--h2 price-banner__title">Цены</h2>
    <div class="price-banner__descr">
      <?php if( get_field( 'pricing_text', 'options' ) ): ?>
      <p class="indent-reset price-banner__text"><?= get_field( 'pricing_text', 'options' ); ?></p>
      <?php endif; ?>
      <a class="btn-reset btn btn--light price-banner__link"
         href="/pricing/">Подробнее</a>
    </div>
  </div>
</section>

<?php $site_testimonials = get_field( 'testimonials_objects' ); ?>
<section class="testimonials">
  <div class="container">
    <div class="testimonials__top">
      <h2 class="indent-reset hd hd--h2 testimonials__title">Отзывы</h2>
      <div class="testimonials__pagination"></div>
    </div>
    <?php if(  $site_testimonials ): ?>
    <div class="testimonials__slider slider">
      <div class="swiper-wrapper slider__wrapper">
        <?php foreach ( $site_testimonials as $slide ): ?>
        <div class="swiper-slide testimonials-item"
             data-swiper-autoplay="<?= get_field( 'swiper_autoplay' ); ?>">
          <?= do_shortcode('[testimonial_view id="2" post_ids="'.$slide->ID.'"]');?>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
    <?php else : ?>
      <p>Отзывов пока никто не оставил.</p>
    <?php endif; ?>
    <button class="btn-reset btn"
            type="button"
            data-hystmodal="#testimonial-modal">Написать отзыв</button>
  </div>
</section>

<section class="site-contacts">
  <div class="container site-contacts__top">
    <h2 class="indent-reset hd hd--h2 site-contacts__title">Контакты</h2>
  </div>
  <div class="site-contacts__bottom">
    <div class="container">
      <ul class="list-reset site-contacts__block site-contacts__abs-pos contacts">
        <li>
          <p class="indent-reset contacts__iconed contacts__iconed--adress"><?=CONTACT_ADRESS;?></p>
        </li>
        <li>
          <div class="small contacts__iconed contacts__iconed--shedule"><?=CONTACT_SHEDULE;?></div>
        </li>
        <?php if (CONTACT_PHONES): ?>
        <li>
          <ul class="list-reset contacts__phones">
            <?php foreach(CONTACT_PHONES as $phone): ?>
            <li>
              <?=get_phone($phone['item'], 'contacts__iconed contacts__iconed--phone'); ?>
            </li>
            <?php endforeach; ?>
          </ul>
        </li>
        <?php endif; ?>
        <?php if(CONTACT_SOCIALS): ?>
        <li>
          <ul class="list-reset contacts__socials">
            <?php foreach(CONTACT_SOCIALS as $item): ?>
            <li>
              <a class="contacts__iconed contacts__iconed--<?=$item['select']?>"
                  href="<?=$item['link']['url']?>"
                  target="_blank"
                  rel="nofollow noreferer noopener"><?=$item['link']['title']?></a>
            </li>
            <?php endforeach; ?>
          </ul>
        </li>
        <?php endif; ?>
        <li>
          <button class="btn-reset btn"
                  type="button"
                  data-hystmodal="#record-modal">Записаться на прием</button>
        </li>
      </ul>
    </div>
    <div class="site-contacts__map"
         id="company-map"></div>
  </div>
</section>

<?php get_footer(); ?>
