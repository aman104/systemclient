<div class="page-header">
  <h2>Utwórz nową kreacje mailingową</h2>
</div>

<div class="content">

<?php include_component('layout', 'flash'); ?>

<ul class="breadcrumb">
  <li><a href="<?php echo url_for('@homepage'); ?>">Home</a> <span class="divider">/</span></li>
  <li><a href="<?php echo url_for('@mailing'); ?>">Kreacje mailingowe</a> <span class="divider">/</span></li>
  <li class="active">Utwórz nową</li>
</ul>

<?php include_partial('mailing/form', array('form' => $form)); ?>

</div>