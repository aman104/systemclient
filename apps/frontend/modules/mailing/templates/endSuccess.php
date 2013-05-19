<div class="page-header">
  <h2>Lista kreacji mailingowych <small>zakończone kampanie</small></h2>
</div>

<div class="content">

<?php include_component('layout', 'flash'); ?>

<ul class="breadcrumb">
  <li><a href="<?php echo url_for('homepage'); ?>">Home</a> <span class="divider">/</span></li>
  <li><a href="<?php echo url_for('mailing'); ?>">Kreacje mailingowe</a> <span class="divider">/</span></li>
  <li class="active">Zakończone</li>
</ul>

<?php include_component('mailing', 'tabs', array('active' => 3)); ?>

<table class="table table-bordered table-striped">
	<tr>
		<th>Lp.</th>
		<th style="width: 300px;">Tytuł</th>		
		<th>Data zakończenia</th>
		<th>Czas trwania</th>
		<th>Akcje</th>
	</tr>
	<?php if(count($mailings) > 0): ?>
		<?php $i = 1; foreach($mailings as $mailing): ?>
		<tr class="tr_<?php echo $i; ?>">
			<td><?php echo $i; ?>.</td>
			<td><a href="<?php echo url_for('statistic_show', array('hash' =>$mailing['hash'])); ?>"><?php echo $mailing['title']; ?></a></td>
			<td><?php echo $mailing['time_end']; ?></td>
			<td>

				<?php echo Tools::CalcDiff(strtotime($mailing['time_end']),strtotime($mailing['time_start'])); ?>

			</td>	
			<td>
				<div class="btn-group">				
					<a href="<?php echo url_for('statistic_show', array('hash' =>$mailing['hash'])); ?>" class="btn btn-info btn-mini">Podsumowanie</a>				
					<a href="<?php echo url_for('mailing_delete', array('hash' => $mailing['hash'])); ?>" class="btn btn-danger btn-mini" onclick="if (confirm('Na pewno chcesz usunąć kreację mailingową?')) { return true} else {return false; }">Usuń</a>
				</div>
			</td>		
		</tr>
		<?php $i++; endforeach; ?>
	<?php else: ?>
		<td colspan="7">
			<h2 class="t_center"><small>Brak zakończonych kampanii</small></h2>
		</td>
	<?php endif; ?>
</table>




</div>