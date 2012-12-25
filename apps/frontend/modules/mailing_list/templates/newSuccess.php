<div class="page-header">
  <h2>Dodaj nową listę mailingową <small>dla nowej subskrycji</small></h2>
</div>

<div class="content">

<?php include_component('layout', 'flash'); ?>

<ul class="breadcrumb">
  <li><a href="<?php echo url_for('homepage'); ?>">Home</a> <span class="divider">/</span></li>
  <li><a href="<?php echo url_for('mailing_list'); ?>">Lista grup mailingowych</a> <span class="divider">/</span></li>  
  <li class="active">Dodaj nową grupę</li>
</ul>

<form action="<?php echo url_for('mailing_list_new'); ?>" method="post">
<table class="table table-bordered table-striped">
	<?php echo $form; ?>
	<tr>
		<td colspan="2">
			<input type="submit" class="btn btn-primary" value="Dodaj" />
		</td>
	</tr>
</table>
</form>

</div>