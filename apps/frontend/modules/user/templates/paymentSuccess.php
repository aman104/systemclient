<div class="page-header">
  <h2>Płatności <small>dokonaj doładowanie konta</small></h2>
</div>

<div class="content">

<?php include_component('layout', 'flash'); ?>

<ul class="breadcrumb">
  <li><a href="<?php echo url_for('@homepage'); ?>">Home</a> <span class="divider">/</span></li>
  <li><a href="<?php echo url_for('@user'); ?>">Profil</a> <span class="divider">/</span></li>
  <li class="active">Płatności</li>
</ul>

<?php include_partial('user/menu', array('active' => 'payment')); ?>

<div class="span9">

	

</div>

<div style="clear: both"></div>

</div>