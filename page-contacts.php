<?php /* Template Name: Контакты */ ?>
<?php get_header(); ?>
<section class="site-contacts">
  <div class="container site-contacts__top">
    <h1 class="indent-reset hd hd--h2 site-contacts__title"><?php the_title(); ?></h1>
  </div>
  <div class="site-contacts__bottom">
    <div class="container">
      <ul class="list-reset site-contacts__block contacts">
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
