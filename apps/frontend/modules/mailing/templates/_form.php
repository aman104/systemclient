<?php 
  $action = isset($action) ? $action : 'new'; 
  if($action == 'new')
  {
    $url = url_for('@mailing_new');
  }
  else
  {
    $url = url_for('mailing_edit', array('hash' => $mailing['hash']));
  }
?>

<form method="post" action="<?php echo $url; ?>">
<div class="tabbable">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab">Dane podstawowe</a></li>
    <li><a href="#tab2" data-toggle="tab">Wiadomość HTML</a></li>
    <li><a href="#tab3" data-toggle="tab">Wiadomość tekstowa</a></li>
    <li><a href="#tab4" data-toggle="tab">CSS</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab1">
      <table class="table table-bordered table-striped">
      	<?php echo $form['title']->renderRow(); ?>
        <?php echo $form['name_from']->renderRow(); ?>
        <?php echo $form['email_from']->renderRow(); ?>
      	<?php echo $form['mailing_list']->renderRow(); ?>
      </table>
    </div>
    <div class="tab-pane" id="tab2">
      <div class="well">
        <ul>
          <li><strong>{preview_link}</strong> - link do podglądu wiadomości w przeglądarce</li>
          <li><strong>{delete_link}</strong> - link do wypisania sie z listy mailingowej</li>
        </ul>
      </div>
      <table class="table table-bordered table-striped">
      	<?php echo $form['html']->renderRow(); ?>
      </table>
    </div>
    <div class="tab-pane" id="tab3">

      <table class="table table-bordered table-striped">
      	<?php echo $form['text']->renderRow(); ?>
      </table>
    </div>
    <div class="tab-pane" id="tab4">
      <table class="table table-bordered table-striped">
        <?php echo $form['css']->renderRow(); ?>
      </table>
    </div>
  </div>
</div>
<?php echo $form->renderHiddenFields(); ?>

<input type="submit" class="btn btn-primary" value="Zapisz" />
<?php if($action == 'edit'): ?>
<a href="<?php echo url_for('mailing_test', array('hash' => $mailing['hash'])); ?>" class="btn btn-info"><i class="icon-retweet icon-white"></i>&nbsp; Testuj</a>
<a onclick="if (confirm('Na pewno chcesz uruchomić kampanie? Nie bedziesz mógł już edytować kreacji.')) { return true} else {return false; }" href="<?php echo url_for('mailing_set_run', array('hash' => $mailing['hash'])); ?>" class="btn btn-success"><i class="icon-play icon-white"></i>&nbsp; Uruchom</a>
<a href="<?php echo url_for('mailing_delete', array('hash' => $mailing['hash'])); ?>" class="btn btn-danger"><i class="icon-remove icon-white"></i>&nbsp; Usuń</a>
<?php endif; ?>
<a href="<?php echo url_for('@mailing'); ?>">Powrót do listy</a>

</form>