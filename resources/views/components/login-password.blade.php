<div id="login" class="admin-div">

  <form id="form_change_password" class="any-form" action="/admin/changingThePassword" method="POST">
    @csrf

    <label class="label-text">Новый логин:</label>
    <input id="new_login_change_password" class="input-text" type="text" name="new_login">

    <label class="label-text">Новый пароль:</label>
    <input id="new_password_one_change_password" class="input-text" type="password" name="new_password_one">

    <label class="label-text">Повторите пароль:</label>
    <input id="new_password_two_change_password" class="input-text" type="password" name="new_password_two">

    <input class="button-submit" id="button_change_password" type="button" value="Изменить идентификационные данные">

  </form>
</div>
