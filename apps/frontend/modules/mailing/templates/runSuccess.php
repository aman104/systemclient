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
<?php echo $mailing['MailingEmails']; ?>

<table class="table table-bordered table-striped">
	<tr>
		<th style="width: 20px;">Lp.</th>
		<th style="width: 300px;">Tytuł</th>		
		<th style="width: 150px;">Data rozpoczęnia</th>
		<th style="text-align: center; width: 100px;">Ilość adresów</th>
		<th style="text-align: center;">Postęp</th>
	</tr>
	<?php if(count($mailings) > 0): ?>
		<?php $i = 1; foreach($mailings as $mailing): ?>
		<tr id="tr-<?php echo $mailing['hash']; ?>" class="tr_<?php echo $i; ?>">
			<td><?php echo $i; ?>.</td>
			<td><?php echo $mailing['title']; ?></td>
			<td><?php echo $mailing['time_start']; ?></td>
			<td style="text-align: center;"><?php echo $mailing['MailingEmails']; ?></td>
			<td>
				<div class="progress progress-striped active">
				  <div id="bar-<?php echo $mailing['hash']; ?>"class="bar" data-emails="<?php echo $mailing['MailingEmails']; ?>" style="width: 0%;"></div>
				</div>

				<script>
				$(function() {
					setInterval(function() {
      	
						$.ajax({
				  			url: 'http://api.send24mail.pl/mailingrun/<?php echo $mailing["hash"]; ?>',
				  			async: false,
							cache: false,
							type: "GET",
							success: function(sData){
								var sendEmails = parseInt(sData, 10);
								var $bar = $('#bar-<?php echo $mailing["hash"]; ?>');
								var allEmails = parseInt($bar.data('emails'), 10);
								var pr = parseInt((sendEmails / allEmails) * 100, 10);
								console.log(pr);
								if(pr == 100)
								{
									$('#bar-<?php echo $mailing["hash"]; ?>').addClass('bar-success');
								}
								$bar.css('width', pr+'%');
							}
				  		});

					}, 1000);
				});

				
				</script>

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