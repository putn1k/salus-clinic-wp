<div class="hystmodal hystmodal--simple"
     id="record-modal"
     aria-hidden="true">
  <div class="hystmodal__wrap">
    <div class="hystmodal__window hystmodal__window--form"
         role="dialog"
         aria-modal="true">
      <div class="modal">
        <button class="btn-reset modal__close"
                type="button"
                aria-label="Закрыть окно"
                data-hystclose>
          <svg class="modal__close-icon"
               width="18"
               height="18"
               aria-hidden="true">
            <use xlink:href="<?=THEME_PATH?>/img/sprite.svg#icon-cross"></use>
          </svg>
        </button>
        <p class="indent-reset hd hd--h3 modal__title">Записаться на прием</p>
        <form class="form modal__form"
              id="record-modal-form"
              data-validate>
          <div><input class="form__input"
                   type="text"
                   name="Имя"
                   placeholder="Ваше Имя *"
                   required
                   data-validate="text"></div>
          <div><input class="form__input"
                   type="tel"
                   name="Контактный&nbsp;телефон"
                   placeholder="Контактный телефон *"
                   required
                   data-validate="phone"></div>
          <div><textarea class="form__input form__textarea"
                      name="Дополнительная информация"
                      placeholder="Дополнительная информация к записи"></textarea></div>
          <div>
            <input class="form__checkbox"
                   type="checkbox"
                   id="record-modal-confirm"
                   required
                   data-validate="confirm">
            <label class="small"
                   for="record-modal-confirm"><?php get_template_part('/template-parts/confirm'); ?></label>
          </div>
          <div><button class="btn-reset btn"
                    type="submit">Отправить</button></div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php if ( is_page( 'main' ) ): ?>
<div class="hystmodal hystmodal--simple"
     id="testimonial-modal"
     aria-hidden="true">
  <div class="hystmodal__wrap">
    <div class="hystmodal__window hystmodal__window--form"
         role="dialog"
         aria-modal="true">
      <div class="modal">
        <button class="btn-reset modal__close"
                type="button"
                aria-label="Закрыть окно"
                data-hystclose>
          <svg class="modal__close-icon"
               width="18"
               height="18"
               aria-hidden="true">
            <use xlink:href="<?=THEME_PATH?>/img/sprite.svg#icon-cross"></use>
          </svg>
        </button>
        <p class="indent-reset hd hd--h3 modal__title">Оставить отзыв</p>
        <?= do_shortcode( '[testimonial_view id="1"]' ); ?>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
<div class="hystmodal hystmodal--simple"
     id="send-ok-modal"
     aria-hidden="true">
  <div class="hystmodal__wrap">
    <div class="hystmodal__window hystmodal__window--form"
         role="dialog"
         aria-modal="true">
      <div class="modal">
        <button class="btn-reset modal__close"
                type="button"
                aria-label="Закрыть окно"
                data-hystclose>
          <svg class="modal__close-icon"
               width="18"
               height="18"
               aria-hidden="true">
            <use xlink:href="<?=THEME_PATH?>/img/sprite.svg#icon-cross"></use>
          </svg>
        </button>
        <p class="indent-reset hd hd--h3 modal__title">Заявка отправлена!</p>
        <p>Наш менеджер принял заявку и свяжется с вами в ближайшее время.</p>
        <button class="btn-reset btn"
                type="button"
                data-hystclose>Хорошо</button>
      </div>
    </div>
  </div>
</div>
<div class="hystmodal hystmodal--simple"
     id="send-error-modal"
     aria-hidden="true">
  <div class="hystmodal__wrap">
    <div class="hystmodal__window hystmodal__window--form"
         role="dialog"
         aria-modal="true">
      <div class="modal">
        <button class="btn-reset modal__close"
                type="button"
                aria-label="Закрыть окно"
                data-hystclose>
          <svg class="modal__close-icon"
               width="18"
               height="18"
               aria-hidden="true">
            <use xlink:href="<?=THEME_PATH?>/img/sprite.svg#icon-cross"></use>
          </svg>
        </button>
        <p class="indent-reset hd hd--h3 modal__title">Ошибка!</p>
        <p>Возникла непредвиденная ошибка, отправка не удалась. Попробуйте отправить запрос позднее.</p>
        <button class="btn-reset btn"
                type="button"
                data-hystclose>Закрыть</button>
      </div>
    </div>
  </div>
</div>
