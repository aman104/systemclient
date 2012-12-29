<div class="page-header">
  <h2>Lista kreacji mailingowych <small>przygotuj wysyłkę</small></h2>
</div>

<div class="content">

<?php include_component('layout', 'flash'); ?>

<ul class="breadcrumb">
  <li><a href="<?php echo url_for('homepage'); ?>">Home</a> <span class="divider">/</span></li>
  <li class="active">Kreacje mailingowe</li>
</ul>

<?php include_component('mailing', 'tabs', array('active' => 1)); ?>


<table class="table table-bordered table-striped">
	<tr>
		<th>Lp.</th>
		<th style="width: 300px;">Tytuł</th>		
		<th>Dada dodania</th>
		<th>Dada modyfikacji</th>
		<th>Akcje</th>
	</tr>
	<?php if(count($mailings) > 0): ?>
		<?php $i = 1; foreach($mailings as $mailing): ?>
		<tr class="tr_<?php echo $i; ?>">
			<td><?php echo $i; ?>.</td>
			<td><a href="<?php echo url_for('mailing_edit', array('hash' =>$mailing['hash'])); ?>"><?php echo $mailing['title']; ?></a></td>
			<td><?php echo $mailing['created_at']; ?></td>
			<td><?php echo $mailing['updated_at']; ?></td>
			<td>
				<div class="btn-group">
					<a href="<?php echo url_for('mailing_edit', array('hash' =>$mailing['hash'])); ?>" class="btn btn-info btn-mini">Edytuj</a>
					<a href="<?php echo url_for('mailing_test', array('hash' => $mailing['hash'])); ?>" class="btn btn-info btn-mini">Testuj</a>
					<a href="<?php echo url_for('mailing_set_run', array('hash' => $mailing['hash'])); ?>" class="btn btn-success btn-mini" onclick="if (confirm('Na pewno chcesz uruchomić kampanie? Nie bedziesz mógł już edytować kreacji.')) { return true} else {return false; }">Uruchom</a>
					<a href="<?php echo url_for('mailing_delete', array('hash' => $mailing['hash'])); ?>" class="btn btn-danger btn-mini" onclick="if (confirm('Na pewno chcesz usunąć kreację mailingową?')) { return true} else {return false; }">Usuń</a>
				</div>
			</td>
		</tr>
		<?php $i++; endforeach; ?>
	<?php else: ?>
		<tr>
		<td colspan="7">
			<h2 class="t_center"><small>Brak kreacji mailingowych</small></h2>
		</td>
		</tr>
	<?php endif; ?>
</table>		

<a href="<?php echo url_for('mailing_new'); ?>" class="btn btn-primary"><i class="icon-plus icon-white"></i>&nbsp; Dodaj nową kreacje</a>

</div>