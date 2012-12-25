<div class="page-header">
  <h2>Edycja profilu <small>ustaw mail weryfikacyjny</small></h2>
</div>

<div class="content">

<?php include_component('layout', 'flash'); ?>

<ul class="breadcrumb">
  <li><a href="<?php echo url_for('@homepage'); ?>">Home</a> <span class="divider">/</span></li>
  <li><a href="<?php echo url_for('@user'); ?>">Profil</a> <span class="divider">/</span></li>
  <li class="active">Mail weryfikacyjny</li>
</ul>

<?php include_partial('user/menu', array('active' => 'verify')); ?>

<div class="span9">

	<form  method="post" action="<?php echo url_for('@user_verify'); ?>">
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