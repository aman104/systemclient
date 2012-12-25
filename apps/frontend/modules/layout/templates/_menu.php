<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">System mailingowy</a>
          <div class="nav-collapse collapse">
            <ul class="nav pull-right">
              	<li class="dropdown">
              		<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-user icon-white"></i>&nbsp; Profil <b class="caret"></b></a>
              		
              		<ul class="dropdown-menu">
              			<li class=""><a href="<?php echo url_for('@user'); ?>"><i class="icon-user"></i>&nbsp; Edytuj profil</a></li>
              			<li class=""><a href="<?php echo url_for('@sf_guard_signout'); ?>"><i class="icon-share-alt"></i>&nbsp; Wyloguj</a></li>
              		</ul>
              	</li>
              	
            </ul>
            <p class="navbar-text pull-right">
              Zalogowany jako <a href="<?php echo url_for('@user'); ?>" class="navbar-link"><?php echo $sf_user->getGuardUser()->getUsername(); ?></a>              
              <?php include_component('layout', 'points'); ?>
              &nbsp;
            </p>
            <ul class="nav">
			  <li class=""><a href="<?php echo url_for('@homepage'); ?>"><i class="icon-home icon-white"></i>&nbsp; Strona główna</a></li>
			  <li class=""><a href="<?php echo url_for('@mailing'); ?>"><i class="icon-envelope icon-white"></i>&nbsp; Mailingi</a></li>
			  <li class=""><a href="<?php echo url_for('@mailing_list'); ?>"><i class="icon-list icon-white"></i>&nbsp; Listy mailingowe</a></li>
			  <li class=""><a href="<?php echo url_for('@statistic'); ?>"><i class="icon-globe icon-white"></i>&nbsp; Statystyki</a></li>
			  <li class=""><a href="<?php echo url_for('@user_payment'); ?>"><i class="icon-shopping-cart icon-white"></i>&nbsp; Płatności</a></li>			  
		  	</ul>      
          </div><!--/.nav-collapse -->
        </div>
      </div>
</div>
<br /><br />
<script>
$('.dropdown-toggle').dropdown();
</script>