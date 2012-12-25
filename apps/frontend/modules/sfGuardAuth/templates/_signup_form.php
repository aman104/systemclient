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
  <div class="clearfix">
    <label for="username_in">Powrórz hasło</label>
    <div class="input">
      <?php echo $form['password_again']->render(); ?>      
    </div>
  </div>
  <div class="clearfix">
    <label for="username_in">Email</label>
    <div class="input">
      <?php echo $form['email']->render(); ?>      
    </div>
  </div>  
  <div class="clearfix">
    <label for="username_in">Imię</label>
    <div class="input">
      <?php echo $form['first_name']->render(); ?>      
    </div>
  </div>  
  <div class="clearfix">
    <label for="username_in">Nazwisko</label>
    <div class="input">
      <?php echo $form['last_name']->render(); ?>      
    </div>
  </div>
  <div class="clearfix">
    <label for="username_in">Ulica</label>
    <div class="input">
      <?php echo $form['street']->render(); ?>      
    </div>
  </div>
  <div class="clearfix">
    <label for="username_in">Kod pocztowy</label>
    <div class="input">
      <?php echo $form['post_code']->render(); ?>      
    </div>
  </div>
  <div class="clearfix">
    <label for="username_in">Miasto</label>
    <div class="input">
      <?php echo $form['city']->render(); ?>      
    </div>
  </div>
  <div class="clearfix">
    <label for="username_in">Kraj</label>
    <div class="input">
      <?php echo $form['country']->render(); ?>      
    </div>
  </div>
  <div class="clearfix">
    <label for="username_in">NIP</label>
    <div class="input">
      <?php echo $form['nip']->render(); ?>      
    </div>
  </div>
  <div class="clearfix">
    <label for="username_in">Telefon</label>
    <div class="input">
      <?php echo $form['phone']->render(); ?>      
    </div>
  </div>

  <div class='cleaner_h20'></div>

  <input style="margin-top: 5px;" type="submit" class="btn btn-primary" value="Zarejestruj się" />

</form>