<?php use_helper('I18N') ?>

<form class='form-stacked' action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
  <?php //echo $form->renderHiddenFields() ?>
  <div class='cleaner_h20'></div>

  <table class="table">
    <?php echo $form; ?>
  </table> 



  <div class='cleaner_h20'></div>

  <input style="margin-top: 5px;" type="submit" class="btn btn-primary" value="Zarejestruj się" />

</form>