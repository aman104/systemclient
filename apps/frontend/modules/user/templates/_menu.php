<ul class="nav nav-list span2">
  <li class="nav-header">Menu profilu</li>
  
  <li <?php echo ($active == 'profile') ? 'class="active"' : ''; ?>>
  		<a href="<?php echo url_for('@user'); ?>"><i class="icon-edit"></i>&nbsp; Edycja danych</a>
  </li>

  <li <?php echo ($active == 'password') ? 'class="active"' : ''; ?>>
  	<a href="<?php echo url_for('@user_password'); ?>"><i class="icon-pencil"></i>&nbsp; Zmień hasło</a>
  </li>

  <li <?php echo ($active == 'emails') ? 'class="active"' : ''; ?>>
  	<a href="<?php echo url_for('@user_emails'); ?>"><i class="icon-envelope"></i>&nbsp; Wysyłka testowa</a>
  </li>

  <li <?php echo ($active == 'verify') ? 'class="active"' : ''; ?>>
  	<a href="<?php echo url_for('@user_verify'); ?>"><i class="icon-list-alt"></i>&nbsp; Mail weryfikacyjny</a>
  </li>

  <li <?php echo ($active == 'payment') ? 'class="active"' : ''; ?>>
  	<a href="<?php echo url_for('@user_payment'); ?>"><i class="icon-shopping-cart"></i>&nbsp; Doładuj konto</a>
  </li>

  <li <?php echo ($active == 'invoice') ? 'class="active"' : ''; ?>>
  	<a href="<?php echo url_for('@user_invoice'); ?>"><i class="icon-file"></i>&nbsp; Wpłaty i faktury</a>
  </li>
  
  <li>
  	<a href="<?php echo url_for('@sf_guard_signout'); ?>"><i class="icon-share-alt"></i>&nbsp; Wyloguj</a>
  </li>
</ul>