<?php

use yii\helpers\Url;

$this->title = 'Faqs';
?>

<div class="block-space block-space--layout--spaceship-ledge-height"></div>
<div class="block faq">
  <div class="container container--max--xl">
    <div class="faq__header">
      <h1 class="faq__header-title">Часто задаваемые вопросы</h1>
    </div>
    <div class="faq__section">
      <div class="faq__section-body">
        <?php foreach ($model as $item) { ?>
          <div class="faq__question">
            <h5 class="faq__question-title"><?= $item->title ?></h5>
            <div class="faq__question-answer">
              <div class="typography">
                <p>
                  <?= $item->text ?>
                </p>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
    <div class="faq__footer">
      <div class="faq__footer-title">Все еще есть вопросы?</div>
      <div class="faq__footer-subtitle">Мы будем рады ответить Вам на любые вопросы</div>
      <a href="/contacts" class="btn btn-primary">Написать нам</a>
    </div>
  </div>
</div>
<div class="block-space block-space--layout--before-footer"></div>
