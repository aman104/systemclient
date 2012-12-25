<div class="page-header">
  <h2>"<?php echo $mailing['title']; ?>" <small>edytuj kreacje mailingową</small></h2>
</div>

<div class="content">

<?php include_component('layout', 'flash'); ?>

<ul class="breadcrumb">
  <li><a href="<?php echo url_for('@homepage'); ?>">Home</a> <span class="divider">/</span></li>
  <li><a href="<?php echo url_for('@mailing'); ?>">Kreacje mailingowe</a> <span class="divider">/</span></li>
  <li class="active"><?php echo $mailing['title']; ?> - edytuj</li>
</ul>

<?php include_partial('mailing/form', array('form' => $form, 'action' => 'edit', 'mailing' => $mailing)); ?>

</div>