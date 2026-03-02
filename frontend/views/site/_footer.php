<?php

use common\models\Pages;

?>
<footer class="site__footer">
  <div class="site-footer">

    <div class="site-footer__widgets">
      <div class="container">
        <div class="row">
          <div class="col-12 col-xl-4">
            <div class="site-footer__widget footer-contacts">
              <h5 class="footer-contacts__title">Контакты</h5>

              <address class="footer-contacts__contacts">
                <dl>
                  <dt>Телефон</dt>
                  <dd><?= Yii::$app->params['phone']??''?></dd>
                </dl>
                <dl>
                  <dt>Email</dt>
                  <dd><?= Yii::$app->params['email']??''?></dd>
                </dl>

                <dl>
                  <dt>Часы работы</dt>
                  <dd><?= Yii::$app->params['workTime']??''?></dd>
                </dl>
              </address>
            </div>
          </div>
          <div class="col-6 col-md-3 col-xl-2">
            <div class="site-footer__widget footer-links">
              <h5 class="footer-links__title">Информация</h5>
              <ul class="footer-links__list">
                <?php foreach (Yii::$app->pages->display() as $item) { ?>
                  <div class="footer-links__item"><a class="footer-links__link" href="<?= $item->url ?>"><?= $item->name ?></a></div>
                <?php } ?>
              </ul>
            </div>
          </div>
          <div class="col-6 col-md-3 col-xl-2">
            <h5 class="footer-links__title">&nbsp;</h5>
            <div class="site-footer__widget footer-links">
              <ul class="footer-links__list">
                <li class="footer-links__item"><a href="<?= Yii::$app->pages->get(Pages::PAGE_TERMS)->url??'' ?>" class="footer-links__link"><?= Yii::$app->pages->get(Pages::PAGE_TERMS)->name??'' ?></a></li>
              </ul>
            </div>
          </div>
          <?php if(!Yii::$app->user->isGuest) { ?>
          <div class="col-6 col-md-3 col-xl-2">
            <div class="site-footer__widget footer-links">
              <h5 class="footer-links__title">Мой аккаунт</h5>
              <ul class="footer-links__list">
                <li class="footer-links__item"><a href="/account/orders" class="footer-links__link">История заказов</a></li>
                <li class="footer-links__item"><a href="/favorites" class="footer-links__link">Избранное</a></li>
              </ul>
            </div>
          </div>
          <?php } ?>
          <?php if(0) { ?>
          <div class="col-12 col-md-6 col-xl-4">
            <div class="site-footer__widget footer-newsletter">
              <h5 class="footer-newsletter__title">Новости</h5>
              <div class="footer-newsletter__text">
                Хотите следить за нашими новостями? Оставьте свой Email для участия в рассылке!
              </div>
              <form action="" class="footer-newsletter__form">
                <label class="sr-only" for="footer-newsletter-address">Email</label>
                <input type="text" class="footer-newsletter__form-input" id="footer-newsletter-address" placeholder="Email">
                <button class="footer-newsletter__form-button">Подписаться</button>
              </form>
              <?php if(0) { ?>
              <div class="footer-newsletter__text footer-newsletter__text--social">
                Следите за нами с социальных сетях
              </div>
              <div class="footer-newsletter__social-links social-links">
                <ul class="social-links__list">
                  <li class="social-links__item social-links__item--facebook"><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                  <li class="social-links__item social-links__item--twitter"><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                  <li class="social-links__item social-links__item--youtube"><a href="#" target="_blank"><i class="fab fa-youtube"></i></a></li>
                  <li class="social-links__item social-links__item--instagram"><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                  <li class="social-links__item social-links__item--rss"><a href="#" target="_blank"><i class="fas fa-rss"></i></a></li>
                </ul>
              </div>
              <?php } ?>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
    <div class="site-footer__bottom">
      <div class="container">
        <div class="site-footer__bottom-row">
          <div class="site-footer__copyright">
            <!-- copyright -->
            Разработано - <a href="https://smezentsev.ru" target="_blank">SMezentsev DA</a>
            <!-- copyright / end -->
          </div>
          <?php if(0) { ?>
          <div class="site-footer__payments">
            <img src="/images/payments.png" alt="">
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</footer>
