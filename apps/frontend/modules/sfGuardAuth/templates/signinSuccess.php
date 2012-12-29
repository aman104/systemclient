<br />
<h1 class="t_center">System mailingowy</h1>
<br />
<?php use_helper('I18N') ?>


<div class='row'>
	<div class="well span5 offset1">
		<h4>Zarejestruj się</h4>
		<?php echo get_partial('sfGuardAuth/signup_form', array('form' => $registerForm)) ?>
	</div>


	<div class="well span3" style="padding-left: 40px; padding-right: 40px;">

		<h4>Zaloguj się</h4>
		<?php echo get_partial('sfGuardAuth/signin_form', array('form' => $form)) ?>

	</div>

</div>

<div class='row'>
	<hr />
	© <?php echo 'System Mailingowy - wszelkie prawa zastrzeżone'; ?> <?php echo date('Y'); ?>	
	<br /><br />

	<span class="badge badge-info">v 1.0.0</span>

	<br /><br />
</div>


