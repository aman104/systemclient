<?php use_helper('I18N') ?>

<form class='form-stacked' action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
  <?php echo $form->renderHiddenFields() ?>
  <div class='cleaner_h20'></div>

  <div class="clearfix">
    <label for="username_in">Login</label>
    <div class="input">
      <?php echo $form['username']->render(); ?>      
    </div>
  </div>
  <div class="clearfix">
    <label for="username_in">Hasło</label>
    <div class="input">
      <?php echo $form['password']->render(); ?>      
    </div>
  </div>

  <ul class="inputs-list">
    <li>
      <label>
        <?php echo $form['remember']->render(); ?>      
        <span style="position: relative; top: 3px;" for="remember_in">Zapamiętaj mnie</span>
      </label>
    </li>
  </ul>

  <div class='cleaner_h20'></div>

  <input style="margin-top: 5px;" type="submit" class="btn btn-primary" value="Zaloguj się" />
  <br /><br />
  <a href="<?php //echo url_for('@sf_guard_forgot_password') ?>">Zapomniałeś hasła?</a>

</form>