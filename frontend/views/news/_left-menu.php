<div class="card widget widget-search hide">
  <form action="" class="widget-search__form">
    <input class="widget-search__input" type="search" placeholder="Поиск">
    <button class="widget-search__button"><svg width="20" height="20">
        <path d="M19.2,17.8c0,0-0.2,0.5-0.5,0.8c-0.4,0.4-0.9,0.6-0.9,0.6s-0.9,0.7-2.8-1.6c-1.1-1.4-2.2-2.8-3.1-3.9C10.9,14.5,9.5,15,8,15
	c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7c0,1.5-0.5,2.9-1.3,4c1.1,0.8,2.5,2,4,3.1C20,16.8,19.2,17.8,19.2,17.8z M8,3C5.2,3,3,5.2,3,8
	c0,2.8,2.2,5,5,5c2.8,0,5-2.2,5-5C13,5.2,10.8,3,8,3z" />
      </svg>
    </button>
    <div class="widget-search__field"></div>
  </form>
</div>
<div class="card widget widget-about-us hide">
  <div class="widget__header">
    <h4>Социальные сети</h4>
  </div>
  <div class="widget-about-us__body">
    <div class="widget-about-us__text">
      Некторые обновления ассортимента мы публикуем в социальных сетях. Если вы хотит первым узнавать об новинках - подписывайтесь на наши социальные группы!
    </div>
    <div class="widget-about-us__social-links social-links">
      <ul class="social-links__list">
        <li class="social-links__item social-links__item--rss">
          <a href="#" target="_blank">
            <i class="widget-social__icon fas fa-rss"></i>
          </a>
        </li>
        <li class="social-links__item social-links__item--youtube">
          <a href="#" target="_blank">
            <i class="widget-social__icon fab fa-youtube"></i>
          </a>
        </li>
        <li class="social-links__item social-links__item--facebook">
          <a href="#" target="_blank">
            <i class="widget-social__icon fab fa-facebook-f"></i>
          </a>
        </li>
        <li class="social-links__item social-links__item--twitter">
          <a href="#" target="_blank">
            <i class="widget-social__icon fab fa-twitter"></i>
          </a>
        </li>
        <li class="social-links__item social-links__item--instagram">
          <a href="#" target="_blank">
            <i class="widget-social__icon fab fa-instagram"></i>
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>
<div class="card widget widget-categories">
  <div class="widget__header">
    <h4>Категории</h4>
  </div>
  <ul class="widget-categories__list widget-categories__list--root " data-collapse data-collapse-opened-class="widget-categories__item--open">
    <?php foreach ($categories as $item) { ?>
      <li class="widget-categories__item" data-collapse-item>
        <a href="/news/<?= $item->id ?>" class="widget-categories__link">
          <?= $item->name ?>
        </a>
      </li>
    <?php } ?>

  </ul>
</div>
<?php if(0) { ?>
<div class="card widget widget-posts hide">
  <div class="widget__header">
    <h4>Последние новости</h4>
  </div>
  <ul class="widget-posts__list">
    <li class="widget-posts__item">
      <div class="widget-posts__image">
        <a href="#">
          <img src="/images/posts/post-1-70x70.jpg" alt="">
        </a>
      </div>
      <div class="widget-posts__info">
        <div class="widget-posts__name">
          <a href="#">Философия, затрагивающая такие темы, как добро</a>
        </div>
        <div class="widget-posts__date">19 октября 2019 г.</div>
      </div>
    </li>
    <li class="widget-posts__item">
      <div class="widget-posts__image">
        <a href="#">
          <img src="/images/posts/post-2-70x70.jpg" alt="">
        </a>
      </div>
      <div class="widget-posts__info">
        <div class="widget-posts__name">
          <a href="#">Обновление католога мото-запчастей</a>
        </div>
        <div class="widget-posts__date">5 сентября 2019 г.</div>
      </div>
    </li>
    <li class="widget-posts__item">
      <div class="widget-posts__image">
        <a href="#">
          <img src="/images/posts/post-3-70x70.jpg" alt="">
        </a>
      </div>
      <div class="widget-posts__info">
        <div class="widget-posts__name">
          <a href="#">Утилизация старой авто-техники</a>
        </div>
        <div class="widget-posts__date">12 августа 2019 г.</div>
      </div>
    </li>
    <li class="widget-posts__item">
      <div class="widget-posts__image">
        <a href="#">
          <img src="/images/posts/post-4-70x70.jpg" alt="">
        </a>
      </div>
      <div class="widget-posts__info">
        <div class="widget-posts__name">
          <a href="#">Разнообразие других академических и неакадемических</a>
        </div>
        <div class="widget-posts__date">30 июля 2019 г.</div>
      </div>
    </li>
  </ul>
</div>
<div class="widget widget-newsletter">
  <div class="widget-newsletter__title">
    <h4>Подписаться</h4>
  </div>
  <div class="widget-newsletter__form">
    <form action="">
      <div class="widget-newsletter__text">
        Введите ниже свой адрес электронной почты, чтобы подписаться на нашу рассылку и быть в курсе последних новостей, скидок и специальных предложений.
      </div>
      <input type="text" class="widget-newsletter__email" placeholder="Email">
      <button type="button" class="widget-newsletter__button">Подписаться</button>
    </form>
  </div>
</div>
<div class="card widget widget-comments">
  <div class="widget__header">
    <h4>Последние коментарии</h4>
  </div>
  <div class="widget-comments__body">
    <ul class="widget-comments__list">
      <li class="widget-comments__item">
        <div class="widget-comments__author"><a href="#">Илья</a></div>
        <div class="widget-comments__content">Совсем небольшая скидка ...</div>
        <div class="widget-comments__meta">
          <div class="widget-comments__date">3 минуты назад</div>
          <div class="widget-comments__name">На <a href="#" title="">Скидки на зимние шины от фирмы Michelin</a></div>
        </div>
      </li>
      <li class="widget-comments__item">
        <div class="widget-comments__author"><a href="#">Светлана Иванова</a></div>
        <div class="widget-comments__content">А на 20 колеса шиномонтаж тоже распространяется?</div>
        <div class="widget-comments__meta">
          <div class="widget-comments__date">25 минут назад</div>
          <div class="widget-comments__name">На <a href="#" title="">Шиномонтаж в подарок при покупке зимних шин MICHELIN</a></div>
        </div>
      </li>

    </ul>
  </div>
</div>
<div class="card widget-tags widget">
  <div class="widget__header">
    <h4>Тэги</h4>
  </div>
  <div class="widget-tags__body tags">
    <div class="tags__list">
      <a href="#"> Продвижение </a>
      <a href="#"> Электроинструмент </a>
      <a href="#"> Новые поступления </a>
      <a href="#"> Отвертка </a>
      <a href="#"> Гаечный ключ </a>
      <a href="#"> Крепления </a>
      <a href="#"> Электроды </a>
      <a href="#"> Бензопилы </a>
      <a href="#"> Манометры </a>
      <a href="#"> Гвозди </a>
      <a href="#"> Пневматическое оружие </a>
      <a href="#"> отрезные диски </a>
    </div>
  </div>
</div>
  <?php } ?>
