<div class="page-header">
  <h2>"<?php echo $mailingList['name']; ?>" <small>Lista adresów email</small></h2>
</div>

<div class="content">

<?php include_component('layout', 'flash'); ?>

<ul class="breadcrumb">
  <li><a href="<?php echo url_for('homepage'); ?>">Home</a> <span class="divider">/</span></li>
  <li><a href="<?php echo url_for('mailing_list'); ?>">Lista grup mailingowych</a> <span class="divider">/</span></li>
  <li class="active"><?php echo $mailingList['name']; ?></li>
</ul>

<table class="table table-bordered table-striped">
	<tr>
		<th>Lp.</th>
		<th>Email</th>
		<th>Nazwa</th>
		<th>Telefon</th>
		<th>Status</th>
		<th>Data dodania</th>
		<th>Akcje</th>
	</tr>
	<?php if(count($emails) > 0): ?>
		<?php $i = 1; foreach($emails as $email): ?>
		<tr>
			<td><?php echo $i++; ?>.</td>
			<td><a href="<?php echo url_for('email_edit', array('hash' =>  $mailingList['hash'], 'email' => $email['email']));  ?>"><?php echo $email['email']; ?></a></td>
			<td><?php echo $email['name']; ?></td>
			<td><?php echo $email['phone']; ?></td>
			<td>
				<?php
				switch($email['status'])
				{
					case 1 : echo '<span class="badge badge-warning">Do weryfikacji</span>'; break;
					case 2 : echo '<span class="badge badge-success">Zweryfikowany</span>'; break;
				}
				?>
			</td>
			<td><?php echo $email['created_at']; ?></td>
			<td>
				<div class="btn-group">
				<a href="<?php echo url_for('email_edit', array('hash' =>  $mailingList['hash'], 'email' => $email['email'])); ?>" class="btn btn-info btn-mini">Edytuj</a>
				<a href="<?php echo url_for('email_verify', array('hash' =>  $mailingList['hash'], 'email' => $email['email'])); ?>" class="btn btn-warning btn-mini">Weryfikuj</a>
				<a href="<?php echo url_for('email_delete', array('hash' =>  $mailingList['hash'], 'email' => $email['email'])); ?>" class="btn btn-danger btn-mini" onclick="if (confirm('Na pewno chcesz usunąć ten adres email?')) { return true} else {return false; }">Usuń</a>
				</div>
			</td>
		</tr>
		<?php endforeach; ?>
	<?php else: ?>
	<tr>
		<td colspan="7">
			<h2 style="text-align: center;"><small>Brak adresów email</small></h2>
		</td>
	</tr>
	<?php endif; ?>
</table>	

<a href="<?php echo url_for('email_new', array('hash' => $mailingList['hash'])); ?>" class="btn btn-primary"><i class="icon-plus icon-white"></i>&nbsp; Dodaj adres</a>
<a href="<?php echo url_for('mailing_list_new'); ?>" class="btn btn-primary"><i class="icon-upload icon-white"></i>&nbsp; Importuj</a>
<a onclick="if (confirm('Na pewno chcesz usunąć wszystkie adresy e-mail z tej grupy?')) { return true} else {return false; }" href="<?php echo url_for('mailing_list_clear', array('hash' => $mailingList['hash'])); ?>" class="btn btn-danger"><i class="icon-remove icon-white"></i>&nbsp; Wyczyść</a>

</div>
