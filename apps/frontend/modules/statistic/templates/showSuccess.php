<div class="page-header">
  <h2>Podsumowanie kampanii <small>"<?php echo $mailing['title']; ?>"</small></h2>
</div>

<div class="content" style="overflow: hidden;">

<?php include_component('layout', 'flash'); ?>

<ul class="breadcrumb">
  <li><a href="<?php echo url_for('@homepage'); ?>">Home</a> <span class="divider">/</span></li>
  <li><a href="<?php echo url_for('@statistic'); ?>">Statystyki</a> <span class="divider">/</span></li>
  <li class="active"><?php echo $mailing['title']; ?></li>
</ul>

<div class="span6">

<h5>Informacje podstawowe</h5>

<table class="table table-bordered table-striped">
	<tr>
		<th>Lp.</th>
		<th>Nazwa</th>
		<th>Wartość</th>
	</tr>
	<tr>
		<td>1.</td>
		<td>Liczba adresów e-mail</td>
		<td>100</td>
	</tr>
</table>

<h5>Kliknięcia</h5>

<table class="table table-bordered table-striped">
	<tr>
		<th>Lp.</th>
		<th>Link</th>
		<th>Kliknięcia</th>
	</tr>
	<?php if(count($links)): ?>
		<?php $i = 1; foreach($links as $link): ?>
		<tr>
			<td><?php echo $i++; ?>.</td>
			<td><?php echo $link['source']; ?></td>
			<td><?php echo $link['click']; ?></td>
		</tr>
		<?php endforeach; ?>
	<?php else: ?>
	<tr>
		<td colspan="2"><h2 class="t_center"><small>Brak adresów URL</small></h2></td>
	</tr>
	<?php endif; ?>
</table>

</div>

<div class="span5">

<h5>Statysyki adresów email</h5>

<table class="table table-bordered table-striped">
	<tr>
		<th>Lp.</th>
		<th>Adres e-amil</th>
		<th>Status</th>
	</tr>
	<tr>
		<td>1.</td>
		<td>adres@email.pl</td>
		<td><span class="badge badge-info">Otwarte</span></td>
	</tr>
</table>

</div>

<div style="cleat: both;"></div>

</div>