<div class="page-header">
  <h2>Lista grup mailingowych <small>Zarządzaj swoimi grupami</small></h2>
</div>

<div class="content">

<?php include_component('layout', 'flash'); ?>

<ul class="breadcrumb">
  <li><a href="<?php echo url_for('homepage'); ?>">Home</a> <span class="divider">/</span></li>
  <li class="active">Lista grup mailingowych</li>
</ul>

<table class="table table-bordered table-striped">
	<tr>
		<th>Lp.</th>
		<th>Nazwa</th>
		<th>Kod grupy</th>
		<th>Ilość adresów email</th>	
		<th>Zweryfikowanych</th>
		<th>Dada dodania</th>
		<th>Akcje</th>
	</tr>
	<?php if(count($mailingLists) > 0): ?>
		<?php $i = 1; foreach($mailingLists as $list): ?>
		<tr class="tr_<?php echo $i; ?>">
			<td><?php echo $i; ?>.</td>
			<td><a href="<?php echo url_for('mailing_list_show', array('hash' =>$list['hash'])); ?>"><span id="name_<?php echo $i; ?>"><?php echo $list['name']; ?></span></a></td>
			<td><span id="hash_<?php echo $i ?>"><?php echo $list['hash']; ?></span> <a class="toogleModal btn btn-mini" href="#myModal" role="button"><i class="icon-download-alt"></i></a></td>
			<td class="t_center"><?php echo $list['emails']; ?></td>
			<td class="t_center"><?php echo $list['verified']; ?></td>
			<td><?php echo $list['created_at']; ?></td>
			<td>
				<div class="btn-group">
					<a href="<?php echo url_for('mailing_list_edit', array('hash' =>$list['hash'])); ?>" class="btn btn-info btn-mini">Edytuj</a>
					<a href="<?php echo url_for('mailing_list_show', array('hash' =>$list['hash'])); ?>" class="btn btn-success btn-mini">Podgląd</a>
					<a href="<?php echo url_for('mailing_list_delete', array('hash' =>$list['hash'])); ?>" class="btn btn-danger btn-mini" onclick="if (confirm('Na pewno chcesz usunąć grupę? Usunięcie grupy spowoduje usunięcie wszystkich adresów e-mail znajdujących się w niej')) { return true} else {return false; }">Usuń</a>
				</div>
			</td>
		</tr>
		<?php $i++; endforeach; ?>
	<?php else: ?>
		<td colspan="7">
			<h2 class="t_center"><small>Brak list mailingowych</small></h2>
		</td>
	<?php endif; ?>
</table>		

<a href="<?php echo url_for('mailing_list_new'); ?>" class="btn btn-primary"><i class="icon-plus icon-white"></i>&nbsp; Dodaj nowy</a>

</div>


<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel"></h3>
  </div>
  <div class="modal-body">
    <p>Skopiuj kod formularza i wklej na swoją stronę WWW:</p>
    <textarea style="width: 500px; height: 150px;">

    </textarea>
  </div>
  <div class="modal-footer">
    <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Zakmnij</button>
  </div>
</div>

<script>
$('.toogleModal').on('click', function() {
	var cl = $(this).parent('td').parent('tr').attr('class');
	cl = cl.split('_');
	cl = cl[1];
	var name = $('#name_' + cl).text();
	var hash = $('#hash_' + cl).text();

	var formtext = '<form method=\"post\" action=\"http://api.send24mail.pl/add_subscriber\">\r\n<input type=\"hidden\" name=\"sm_mailing_list_hash\" value=\"'+hash+'\">\r\n<input type=\"text\" name=\"sm_email\" id=\"sm_email\">\r\n<input type=\"submit\" value=\"Zapisz się\">\r\n</form>';

	$('#myModalLabel').html(name);
	$('.modal-body textarea').val(formtext);
	$('#myModal').modal('show');
	
});
</script>


    
