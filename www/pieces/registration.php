<div class="tab_margin">
  <div class="auth_block clearfix">
    <div class="login">
      <div class="local_header"><h3>Вход</h3></div>
      <form class="ajax" method="post" action="./ajax.php">
        <input type="hidden" name="act" value="login">
        <div>
          <div class="field">
            <div class="label"><label for="c890_email">Email</label></div>
            <div class="input">
              <span class="round_input" data-editor="">
                <input value="" name="email" id="c890_email" type="text"></span>
              <span class="field_error" data-error="email"></span>
            </div>
          </div>
          <div class="field">
          <div class="label"><label for="c890_password">Пароль</label></div>
          <div class="input">
            <span class="round_input" data-editor="">
              <input name="password" id="c890_password" type="password" ></span>
            <span class="field_error" data-error="password"></span>
          </div>
          </div>
        </div>
        <a href=# onclick=switchHide(this)>Восстановить пароль</a>
        <button type="submit" class="round_button" onclick = false>Войти</button>
      </form>
    </div>
    
    <div class="registration" id="registration">
      <div class="local_header">
        <h3>Регистрация</h3>
      </div>
      <form class="ajax" method="post" action="./ajax.php">
        <div class="main-error alert alert-error hide"></div>
        <input type="hidden" name="act" value="register">
        <div>
          <div class="field">
            <div class="label">
              <label for="c875_username">Имя</label>
            </div>
            <div class="input">
              <span class="round_input" data-editor="">
                <input value="" name="username" id="c875_username" type="text"></span>
              <span class="field_error" data-error="username"></span>
            </div>
          </div>
          <div class="field">
            <div class="label">
              <label for="c875_email">Email</label>
            </div>
            <div class="input">
              <span class="round_input" data-editor="">
                <input value="" name="email" id="c875_email" type="text"></span>
              <span class="field_error" data-error="email"></span>
            </div>
          </div>
          <div class="field">
            <div class="label">
              <label for="c875_phone">Телефон</label>
            </div>
            <div class="input">
              <span class="round_input" data-editor="">
                <input value="" name="phone" id="c875_phone" type="text"></span>
              <span class="field_error" data-error="phone"></span>
            </div>
          </div>
          <div class="field">
            <div class="label">
              <label for="c875_password1">Пароль</label>
            </div>
            <div class="input">
              <span class="round_input" data-editor="">
                <input name="password1" id="c875_password1" type="password"></span>
              <span class="field_error" data-error="password1"></span>
            </div>
          </div>
          <div class="field">
            <div class="label">
              <label for="c875_password2">Повторите пароль</label>
            </div>
            <div class="input">
              <span class="round_input" data-editor="">
                <input name="password2" id="c875_password2" type="password"></span>
              <span class="field_error" data-error="password2"></span>
            </div>
          </div>
        </div>
        <small>
          <p>Будьте внимательны при вводе номера телефона (пример - 79031234567)</p>
        </small>
        <button type="submit" class="round_button" onclick = false>Зарегистрироваться</button>
      </form>
    </div>
    
    <div class="registration hidden" id="password">
      <div class="local_header">
        <h3>Восстановление пароля</h3>
      </div>
      <form class="ajax" method="post" action="./ajax.php">
        <div class="main-error alert alert-error hide"></div>
        <input type="hidden" name="act" value="forgotPass">
        <div>
          <div class="field">
            <div class="label">
              <label for="c875_email">Email</label>
            </div>
            <div class="input">
              <span class="round_input" data-editor="">
                <input value="" name="email" id="c875_email" type="text"></span>
              <span class="field_error" data-error="email"></span>
            </div>
          </div>
          <div class="field">
            <div class="label">
              <label for="c875_password1">Новый пароль</label>
            </div>
            <div class="input">
              <span class="round_input" data-editor="">
                <input name="password1" id="c875_password1" type="password"></span>
              <span class="field_error" data-error="password1"></span>
            </div>
          </div>
          <div class="field">
            <div class="label">
              <label for="c875_password2">Повторите пароль</label>
            </div>
            <div class="input">
              <span class="round_input" data-editor="">
                <input name="password2" id="c875_password2" type="password"></span>
              <span class="field_error" data-error="password2"></span>
            </div>
          </div>
        </div>
        <small>
          <p>Будьте внимательны при вводе номера телефона (пример - 79031234567)</p>
        </small>
        <button type="submit" class="round_button" onclick = false>Сменить пароль</button>
      </form>
    </div>
  </div>
  <div class="profile_quest_list"></div>
</div>
<?php
?>
