<div class="page-header">
  <h2> Dodaj adres email <small>do listy "<?php echo $mailingList['name']; ?>"</small></h2>
</div>

<div class="content">

<?php include_component('layout', 'flash'); ?>

<ul class="breadcrumb">
  <li><a href="<?php echo url_for('homepage'); ?>">Home</a> <span class="divider">/</span></li>
  <li><a href="<?php echo url_for('mailing_list'); ?>">Lista grup mailingowych</a> <span class="divider">/</span></li>
  <li><a href="<?php echo url_for('mailing_list_show', array('hash' => $mailingList['hash'])); ?>"><?php echo $mailingList['name']; ?></a>  <span class="divider">/</span></li>
  <li class="active">Dodaj adres email</li>
</ul>

<form action="<?php echo url_for('email_new', array('hash' => $mailingList['hash'])); ?>" method="post">
<table class="table table-bordered table-striped">
	<?php echo $form; ?>
	<tr>
		<td colspan="2">
			<input type="submit" class="btn btn-primary" value="Dodaj" />
			<a href="<?php echo url_for('mailing_list_show', array('hash' => $mailingList['hash'])); ?>">Powrót do listy</a>
		</td>
	</tr>
</table>
</form>

</div>