      </main>
      </div>
      <footer class="site__footer site-footer">
        <div class="container">
          <p class="indent-reset site-footer__attention-text">Имеются противопоказания. Необходима консультация специалиста</p>
          <div class="site-footer__copyright">
            <div class="site-footer__details">
              <img class="site-footer__logo"
                    src="<?=THEME_PATH?>/img/logo.svg"
                    width="100"
                    height="100"
                    alt="Медицинский центр «Салюс»">
              <?php if (COMPANY_DETAILS): ?>
              <table>
                <?php foreach(COMPANY_DETAILS as $detail): ?>
                <tr>
                  <td><?= $detail['item']; ?></td>
                </tr>
                <?php endforeach; ?>
              </table>
              <?php endif; ?>
            </div>
            <p class="indent-reset small site-footer__copyright-text">
              <?= get_field( 'footer_copyright', 'options' );; ?>
            </p>
          </div>
          <div class="site-footer__bottom">
            <a href="/policy/"
                target="_blank"
                rel="nofollow noreferer noopener">Политика конфиденциальности</a>
            <span>&copy; <?=date('Y') ?>г. ООО «Салюс»</span>
          </div>
        </div>
      </footer>
      <?php get_template_part('/template-parts/scroll-top'); ?>
      <?php get_template_part('/template-parts/modal'); ?>
    </div>
    <?php if ( is_page( 'main' ) || is_page( 'contacts' ) ) : ?><script src="https://api-maps.yandex.ru/2.1/?apikey=&lang=ru_RU"></script><?php endif; ?>
    <?php wp_footer(); ?>
    <?php the_field('footer_code', 'options'); ?>
  </body>

</html>
