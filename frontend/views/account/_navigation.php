<div class="account-nav flex-grow-1">
  <h4 class="account-nav__title">Меню</h4>
  <ul class="account-nav__list">
    <?php if(0) { ?>
    <li class="account-nav__item">
      <a href="/dashboard">Профиль</a>
    </li>
    <?php } ?>
    <li class="account-nav__item  <?= Yii::$app->controller->action->id == 'profile' ? 'account-nav__item--active' : '' ?>  ">
      <a href="/profile">Мои данные</a>
    </li>
    <li class="account-nav__item <?= Yii::$app->controller->action->id == 'history' ? 'account-nav__item--active' : '' ?> ">
      <a href="/account/orders">История заказов</a>
    </li>
    <?php if(0) { ?>
    <li class="account-nav__item">
      <a href="/addresses">Мои адреса</a>
    </li>
    <li class="account-nav__item ">
      <a href="/password">Изменить пароль</a>
    </li>
    <?php } ?>
    <li class="account-nav__divider" role="presentation"></li>
    <li class="account-nav__item ">
      <a href="/logout">Выйти</a>
    </li>
  </ul>
</div>
