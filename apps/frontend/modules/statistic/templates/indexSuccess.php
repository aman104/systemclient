<div class="page-header">
  <h2>Statystyki <small>zobacz statystki poszczególnych kampanii</small></h2>
</div>

<div class="content">

<?php include_component('layout', 'flash'); ?>

<ul class="breadcrumb">
  <li><a href="<?php echo url_for('@homepage'); ?>">Home</a> <span class="divider">/</span></li>
  <li class="active">Statystyki</li>
</ul>

<table class="table table-bordered table-striped">
	<tr>
		<th>Lp.</th>
		<th style="width: 400px;">Nazwa</th>
		<th>Status</th>
		<th>Liczba otwartych</th>
		<th>Akcje</th>
	</tr>
	<?php if(count($mailings) > 0): ?>
		<?php $i = 1; foreach($mailings as $mailing): ?>
		<tr class="tr_<?php echo $i; ?>">
			<td><?php echo $i; ?>.</td>
			<td><a href="<?php echo url_for('statistic_show', array('hash' =>$mailing['hash'])); ?>"><?php echo $mailing['title']; ?></a></td>
			<td>
				<?php 
					switch($mailing['status'])
					{
						case 2 : echo '<span class="badge badge-warning">W trakcie</span>'; break;
						case 3 : echo '<span class="badge badge-success">Zakończona</span>'; break;
					}
				 ?>
			</td>
			<td>//TODO</td>
			<td>
				<div class="btn-group">
					<a href="<?php echo url_for('statistic_show', array('hash' =>$mailing['hash'])); ?>" class="btn btn-info btn-mini">Podglad</a>												
				</div>
			</td>
		</tr>
		<?php $i++; endforeach; ?>
	<?php else: ?>
	<tr>
		<td colspan="5">
			<h2 class="t_center"><small>Brak kampanii mailingowych</small></h2>
		</td>
	</tr>	
	<?php endif; ?>
</table>


</div>