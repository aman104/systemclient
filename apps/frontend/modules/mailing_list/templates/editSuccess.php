<div class="page-header">
  <h2><?php echo $params['name']; ?> <small>Edytuj listę mailingową</small></h2>
</div>

<div class="content">

<?php include_component('layout', 'flash'); ?>

<ul class="breadcrumb">
  <li><a href="<?php echo url_for('homepage'); ?>">Home</a> <span class="divider">/</span></li>
  <li><a href="<?php echo url_for('mailing_list'); ?>">Lista grup mailingowych</a> <span class="divider">/</span></li>
  <li class="active"><?php echo $params['name']; ?> - Edytuj</li>
</ul>

<form  method="post" action="<?php echo url_for('mailing_list_edit', array('hash' => $params['hash'])); ?>">
<table class="table table-bordered table-striped">

	<?php echo $form; ?>
	<tr>
		<td colspan="2">
			<input type="submit" class="btn btn-primary" value="Zapisz" />
			<a href="<?php echo url_for('mailing_list'); ?>">Powrót do listy</a>
		</td>
	</tr>
</table>
</form>

</div>