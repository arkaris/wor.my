<div class="tab_margin">
  <div class="auth_block clearfix">
    <div class="login">
      <div class="local_header"><h3>Вход</h3></div>
      <form action="/ajax/ajax.php?act=login">
        <div>
          <div class="field">
            <div class="label"><label for="c890_email">Email</label></div>
            <div class="input">
              <span class="round_input" data-editor="">
                <input value="" name="email" id="c890_email" type="text"></span>
              <span class="field_error" data-error=""></span>
            </div>
          </div>
          <div class="field">
          <div class="label"><label for="c890_password">Пароль</label></div>
          <div class="input">
            <span class="round_input" data-editor="">
              <input name="password" id="c890_password" type="password"></span>
            <span class="field_error" data-error=""></span>
          </div>
          </div>
        </div>
        <a class="pseudo" href="/gamers/password/reset/">Восстановить пароль</a>
        <button type="submit" class="round_button">Войти</button>
      </form>
    </div>
    <div class="registration">
      <div class="local_header">
        <h3>Регистрация</h3>
      </div>
      <form action="/ajax/ajax.php?act=register">
        <div>
          <div class="field">
            <div class="label">
              <label for="c875_username">Имя</label>
            </div>
            <div class="input">
              <span class="round_input" data-editor="">
                <input value="" name="username" id="c875_username" type="text"></span>
              <span class="field_error" data-error=""></span>
            </div>
          </div>
          <div class="field">
            <div class="label">
              <label for="c875_email">Email</label>
            </div>
            <div class="input">
              <span class="round_input" data-editor="">
                <input value="" name="email" id="c875_email" type="text"></span>
              <span class="field_error" data-error=""></span>
            </div>
          </div>
          <div class="field">
            <div class="label">
              <label for="c875_phone">Телефон</label>
            </div>
            <div class="input">
              <span class="round_input" data-editor="">
                <input value="" name="phone" id="c875_phone" type="text"></span>
              <span class="field_error" data-error=""></span>
            </div>
          </div>
          <div class="field">
            <div class="label">
              <label for="c875_password">Пароль</label>
            </div>
            <div class="input">
              <span class="round_input" data-editor="">
                <input name="password" id="c875_password" type="password"></span>
              <span class="field_error" data-error=""></span>
            </div>
          </div>
        </div>
        <small>
          <p>Будьте внимательны при вводе номера телефона (пример - 79031234567)</p>
        </small>
        <button type="submit" class="round_button">Зарегистрироваться</button>
      </form>
    </div>
  </div>
  <div class="profile_quest_list"></div>
</div>
<?php
//'HTTP_REFERER'
?>
