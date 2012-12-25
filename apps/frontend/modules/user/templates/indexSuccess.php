<div class="page-header">
  <h2>Edycja profilu <small>zmień dane do faktury</small></h2>
</div>

<div class="content">

<?php include_component('layout', 'flash'); ?>

<ul class="breadcrumb">
  <li><a href="<?php echo url_for('homepage'); ?>">Home</a> <span class="divider">/</span></li>
  <li class="active">Profil</li>
</ul>

<?php include_partial('user/menu', array('active' => 'profile')); ?>

<div class="span9">

	<form  method="post" action="<?php echo url_for('@user'); ?>">
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