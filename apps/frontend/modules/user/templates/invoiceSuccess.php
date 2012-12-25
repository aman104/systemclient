<div class="page-header">
  <h2>Twoje wpłaty <small>pobierz faktury</small></h2>
</div>

<div class="content">

<?php include_component('layout', 'flash'); ?>

<ul class="breadcrumb">
  <li><a href="<?php echo url_for('@homepage'); ?>">Home</a> <span class="divider">/</span></li>
  <li><a href="<?php echo url_for('@user'); ?>">Profil</a> <span class="divider">/</span></li>
  <li class="active">Faktury</li>
</ul>

<?php include_partial('user/menu', array('active' => 'invoice')); ?>

<div class="span9">

	

</div>

<div style="clear: both"></div>

</div>