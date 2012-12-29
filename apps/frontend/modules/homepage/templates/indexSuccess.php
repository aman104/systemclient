<div class="content" style="overflow:hidden;">

	<div class="well span5" style="height: 140px;">

		<a style="width: 155px;" class="btn btn-primary btn-large" href="<?php echo url_for('@mailing'); ?>"><i class="icon-envelope icon-white"></i><br />Utwórz nowy mailing</a>
		<a style="width: 155px;" class="btn btn-primary btn-large" href="<?php echo url_for('@mailing_list'); ?>"><i class="icon-list icon-white"></i><br />Utwórz nową grupę</a>
		<br /><br />
		<a style="width: 155px;" class="btn btn-primary btn-large" href="<?php echo url_for('@user_payment'); ?>"><i class="icon-shopping-cart icon-white				"></i><br />Doładuj konto</a>
		<a style="width: 155px;" class="btn btn-primary btn-large" href="<?php echo url_for('@user'); ?>"><i class="icon-user icon-white"></i><br />Edytuj profil</a>

	</div>

	<div class="well span5" style="margin-left: 50px; height: 140px;">
		<h2 class="t_center">Punkty to wykorzystnia:</h2>
		
		<h1 class="t_center"><?php include_component('layout', 'points'); ?></h1>
		<a href="<?php echo url_for('@user_payment'); ?>">Doładuj konto &raquo;</a>
	</div>

	<div class="well span5">
		<?php include_component('mailing', 'mailings'); ?>
	</div>

	<div class="well span5" style="margin-left: 50px;">
		<?php include_component('layout', 'stats'); ?>
	</div>

	<div style="clear: both"></div>

</div>