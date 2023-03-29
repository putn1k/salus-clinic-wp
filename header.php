<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <meta name="viewport"
        content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible"
        content="ie=edge">
  <link rel="icon"
        type="image/png"
        sizes="16x16"
        href="/favicon-16x16.png">
  <link rel="icon"
        type="image/png"
        sizes="32x32"
        href="/favicon-32x32.png">
  <link rel="apple-touch-icon"
        sizes="180x180"
        href="/apple-touch-icon.png">
  <link rel="manifest"
        href="/site.webmanifest">
  <link rel="preload"
        href="<?=THEME_PATH?>/fonts/roboto-regular.woff2"
        as="font"
        type="font/woff2"
        crossorigin>
  <link rel="preload"
        href="<?=THEME_PATH?>/fonts/playfairdisplay-regular.woff2"
        as="font"
        type="font/woff2"
        crossorigin>
  <link rel="preload"
        href="<?=THEME_PATH?>/fonts/roboto-medium.woff2"
        as="font"
        type="font/woff2"
        crossorigin>
  <link rel="preload"
        href="<?=THEME_PATH?>/fonts/roboto-light.woff2"
        as="font"
        type="font/woff2"
        crossorigin>
  <title><?php wp_title('|'); ?></title>
  <?php wp_head(); ?>
  <?php the_field('head_code', 'options'); ?>
</head>

<body class="indent-reset site">
  <div aria-hidden="true"
       id="site-top"></div>
  <div class="site__container">
    <header class="site__header">
      <div class="header-top small">
        <div class="container header-top__container contacts">
          <div class="header-top__adress">
            <p class="indent-reset contacts__iconed contacts__iconed--adress"><?=CONTACT_ADRESS;?></p>
            <button class="btn-reset header-top__modal-btn"
                    type="button"
                    data-hystmodal="#record-modal">Записаться на прием</button>
          </div>
          <?php if(CONTACT_SOCIALS): ?>
            <ul class="list-reset header-top__socials">
              <?php foreach(CONTACT_SOCIALS as $item): ?>
              <li>
                <a class="contacts__iconed contacts__iconed--<?=$item['select']?>"
                    href="<?=$item['link']['url']?>"
                    target="_blank"
                    rel="nofollow noreferer noopener"><?=$item['link']['title']?></a>
              </li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>
        </div>
      </div>
      <div class="header-main">
        <div class="container header-main__container">
          <div class="header-main__phone"><?=get_phone(CONTACT_PHONES[0]['item']); ?></div>
          <div class="header-main__logo">
            <a href="/">
              <img src="<?=THEME_PATH?>/img/logo-full.svg"
                   width="147"
                   height="40"
                   alt="Медицинский центр «Салюс»">
            </a>
          </div>
          <div class="header-main__burger">
            <button class="btn-reset just-burger"
                    type="button"
                    aria-label="Меню"
                    id="just-burger">
              <span class="just-burger__line just-burger__line--top"></span>
              <span class="just-burger__line just-burger__line--middle"></span>
              <span class="just-burger__line just-burger__line--bottom"></span>
            </button>
          </div>
          <div class="header-main__desktop">
            <nav class="header-main__nav">
              <?php get_template_part('/template-parts/menu', 'header'); ?>
            </nav>
            <ul class="list-reset header-main__contacts contacts">
              <?php if (CONTACT_PHONES): ?>
              <li>
                <?php $phone_counter = 0; ?>
                <ul class="list-reset header-main__phones">
                  <?php foreach(CONTACT_PHONES as $phone): ?>
                  <?php if($phone_counter==2) break; ?>
                  <li>
                    <?=get_phone($phone['item'], 'contacts__iconed contacts__iconed--phone'); ?>
                  </li>
                  <?php $phone_counter++ ?>
                  <?php endforeach; ?>
                </ul>
              </li>
              <?php endif; ?>
              <li>
                <div class="small contacts__iconed contacts__iconed--shedule"><?=CONTACT_SHEDULE;?></div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="header-mobile"
           aria-hidden="true">
        <div class="header-mobile__content">
          <div class="container">
            <nav class="header-mobile__nav">
              <?php get_template_part('/template-parts/menu', 'header'); ?>
            </nav>
            <ul class="list-reset header-mobile__contacts contacts">
              <?php if (CONTACT_PHONES): ?>
              <li>
                <?php $phone_counter = 0; ?>
                <ul class="list-reset contacts__phones">
                  <?php foreach(CONTACT_PHONES as $phone): ?>
                  <?php if($phone_counter==2) break; ?>
                  <li>
                    <?=get_phone($phone['item'], 'contacts__iconed contacts__iconed--phone'); ?>
                  </li>
                  <?php $phone_counter++; ?>
                  <?php endforeach; ?>
                </ul>
              </li>
              <?php endif; ?>
              <li>
                <p class="indent-reset contacts__iconed contacts__iconed--adress"><?=CONTACT_ADRESS;?></p>
              </li>
              <li>
                <div class="small contacts__iconed contacts__iconed--shedule"><?=CONTACT_SHEDULE;?></div>
              </li>
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
                <button class="btn-reset btn contacts__rec-btn"
                        type="button"
                        data-hystmodal="#record-modal">Записаться на прием</button>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </header>
    <div class="site__content">
      <?php if ( !is_home() && !is_front_page() && !is_404() ) : ?>
      <div class="breadcrumbs"
           typeof="BreadcrumbList"
           vocab="https://schema.org/">
        <div class="container">
          <?php if( function_exists('bcn_display') ) {
                    bcn_display();
                  }?>
        </div>
      </div>
      <?php endif; ?>
      <main>
