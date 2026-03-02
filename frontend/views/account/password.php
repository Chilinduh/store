<div class="block-space block-space--layout--after-header"></div>
<div class="block">
  <div class="container container--max--xl">
    <div class="row">
      <div class="col-12 col-lg-3 d-flex">
        <?php include_once(Yii::getAlias('@frontend/views/account/_navigation.php')); ?>
      </div>
      <div class="col-12 col-lg-9 mt-4 mt-lg-0">
        <div class="card">
          <div class="card-header">
            <h5>Изменить пароль</h5>
          </div>
          <div class="card-divider"></div>
          <div class="card-body card-body--padding--2">
            <div class="row no-gutters">
              <div class="col-12 col-lg-7 col-xl-6">
                <?php if(0) { ?>
                <div class="form-group">
                  <label for="password-current">Текущий пароль</label>
                  <input type="password" class="form-control" id="password-current" placeholder="">
                </div>
                <?php } ?>
                <div class="form-group">
                  <label for="password-new">Новый пароль</label>
                  <input type="password" class="form-control" id="password-new" placeholder="">
                </div>
                <div class="form-group">
                  <label for="password-confirm">Повторить пароль</label>
                  <input type="password" class="form-control" id="password-confirm" placeholder="">
                </div>
                <div class="form-group mb-0">
                  <button class="btn btn-primary mt-3">Изменить</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="block-space block-space--layout--before-footer"></div>
