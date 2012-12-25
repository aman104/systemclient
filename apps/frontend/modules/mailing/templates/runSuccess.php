<div class="page-header">
  <h2>Lista kreacji mailingowych <small>uruchomione wysyłki</small></h2>
</div>

<div class="content">

<?php include_component('layout', 'flash'); ?>

<ul class="breadcrumb">
  <li><a href="<?php echo url_for('homepage'); ?>">Home</a> <span class="divider">/</span></li>
  <li><a href="<?php echo url_for('mailing'); ?>">Kreacje mailingowe</a> <span class="divider">/</span></li>
  <li class="active">Uruchomione</li>
</ul>

<?php include_component('mailing', 'tabs', array('active' => 2)); ?>


<table class="table table-bordered table-striped">
	<tr>
		<th>Lp.</th>
		<th style="width: 300px;">Tytuł</th>		
		<th>Dada rozpoczęnia</th>
		<th>Ilość adresów</th>
		<th>Postęp</th>
	</tr>
	<?php if(count($mailings) > 0): ?>
		<?php $i = 1; foreach($mailings as $mailing): ?>
		<tr class="tr_<?php echo $i; ?>">
			<td><?php echo $i; ?>.</td>
			<td><?php echo $mailing['title']; ?></td>
			<td><?php echo $mailing['time_start']; ?></td>
			<td><?php echo $mailing['MailingEmails']; ?></td>
			<td>
				<div class="progress progress-striped active">
				  <div class="bar" style="width: 40%;"></div>
				</div>
			</td>
		</tr>
		<?php $i++; endforeach; ?>
	<?php else: ?>
		<td colspan="7">
			<h2 class="t_center"><small>Brak uruchomionych kampanii</small></h2>
		</td>
	<?php endif; ?>
</table>


</div>