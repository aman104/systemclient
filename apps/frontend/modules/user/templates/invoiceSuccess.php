<div class="page-header">
  <h2>Twoje wpłaty <small>pobierz faktury</small></h2>
</div>

<div class="content">

<?php include_component('layout', 'flash'); ?>

<ul class="breadcrumb">
  <li><a href="<?php echo url_for('@homepage'); ?>">Home</a> <span class="divider">/</span></li>
  <li><a href="<?php echo url_for('@user'); ?>">Profil</a> <span class="divider">/</span></li>
  <li class="active">Faktury</li>
</ul>

<?php include_partial('user/menu', array('active' => 'invoice')); ?>

<div class="span9">

	<table class="table table-bordered table-striped">
		<tr>
			<th>Lp.</th>
			<th>Punkty</th>
			<th>Kwota</th>
			<th>Status</th>
			<th>Faktura</th>
			<th>Data</th>
		</tr>
		<?php if(count($payments) > 0): ?>
			<?php $i = 1; foreach($payments as $payment): ?>
				<tr>
					<td><?php echo $i++; ?>.</td>
					<td><?php echo $payment['points']; ?></td>
					<td><?php echo Tools::getPrice($payment['price']); ?> <?php echo $payment['symbol']; ?></td>
					<td>

						<?php
							switch($payment['status'])
							{
								case 1 : echo '<span class="badge badge-warning">Nieopłacone</span>'; break;
								case 9 : echo '<span class="badge badge-success">Opłacone</span>'; break;
							}
						?>

					</td>
					<td><?php echo $payment['invoice_id']; ?></td>
					<td><?php echo $payment['created_at']; ?></td>
				</tr>
			<?php endforeach; ?>
		<?php else: ?>
			<tr>
				<td colspan="6">
					<h2 class="t_center"><small>Nie masz jeszcze żadnych wpłat</small></h2>
				</td>
			</tr>
		<?php endif; ?>
	</table>

</div>

<div style="clear: both"></div>

</div>