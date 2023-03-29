<?php get_header(); ?>

<section class="not-found">
  <div class="container">
    <h1 class="visually-hidden">Страница не найдена</h1>
    <div class="not-found__content">
      <img class="not-found__cover"
           src="<?=THEME_PATH?>/img/404-cover.svg"
           width="335"
           height="135"
           alt="Не найдено"
           aria-hidden="true">
      <p class="indent-reset hd hd--h2 not-found__title">Такой страницы не существует</p>
      <a href="index.html"
         id="link">Вернуться назад</a>
    </div>
    <script>
      document.querySelector( '#link' ).addEventListener( 'click', ( evt ) => {
        evt.preventDefault();
        history.go( -1 );
      } )
    </script>
  </div>
</section>

<?php get_footer(); ?>
