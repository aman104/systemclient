<div class="page-header">
  <h2>Wysyłka testowa <small>ustaw testowe adresy e-mail</small></h2>
</div>

<div class="content">

<?php include_component('layout', 'flash'); ?>

<ul class="breadcrumb">
  <li><a href="<?php echo url_for('@homepage'); ?>">Home</a> <span class="divider">/</span></li>
  <li><a href="<?php echo url_for('@user'); ?>">Profil</a> <span class="divider">/</span></li>
  <li class="active">Wysyłka testowa</li>
</ul>

<?php include_partial('user/menu', array('active' => 'emails')); ?>

<div class="span9">

	<form  method="post" action="<?php echo url_for('@user_emails'); ?>">
	<table class="table table-bordered table-striped">

		<?php echo $form; ?>
		<tr>
			<td colspan="2">
				<input type="submit" class="btn btn-primary" value="Zapisz" />
			</td>
		</tr>
	</table>
	</form>

</div>

<div style="clear: both"></div>

</div>