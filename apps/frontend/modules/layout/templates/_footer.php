

<footer>
	<div class="container">
	<div class="span6 pull-left">

		<div class="pull-left" style="width: 250px;">
			<h5>Wybierz:</h5>

			<a href="<?php echo url_for('@mailing'); ?>">Mailingi</a><br />
			<a href="<?php echo url_for('@mailing_list'); ?>">Listy mailingowe</a><br />
			<a href="">Statystki</a><br />
			<a href="">Płatności</a><br />
			<a href="<?php echo url_for('@user'); ?>">Profil</a><br />
		</div>

		<div class="pull-left" style="width: 150px;">
			<h5>Na skróty:</h5>

			<a href="<?php echo url_for('@mailing_new'); ?>">Utwórz nową kreacje mailingi</a><br />
			<a href="<?php echo url_for('@mailing_list_new'); ?>">Utwórz nową listę</a><br />
			<a href="">Doładuj konto</a><br />
			<a href="<?php echo url_for('@sf_guard_signout'); ?>">Wyloguj się</a><br />

		</div>

		<div class="row" style="clear: both; padding: 20px;">
		<br />
		© <?php echo 'System Mailingowy - wszelkie prawa zastrzeżone'; ?> <?php echo date('Y'); ?>	
		<br /><br />

		<span class="badge badge-info">v 1.0.0</span>
		</div>
	</div>
	<div class="span4 pull-right" style="text-align: right; font-size: 13px;">
		<h5>Podstawowe statystyki konta:</h5>
		<?php include_component('layout', 'stats'); ?>
	</div>
	</div>
</footer>