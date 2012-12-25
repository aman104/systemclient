<ul class="nav nav-tabs">
  <li <?php echo ($active == 1) ? 'class="active"' : ''; ?>>
    <a href="<?php echo url_for('@mailing'); ?>">W przygotowaniu (<?php echo $project; ?>)</a>
  </li>
  <li <?php echo ($active == 2) ? 'class="active"' : ''; ?>>
  	<a href="<?php echo url_for('@mailing_run'); ?>">Uruchomione (<?php echo $run; ?>)</a>
  </li>
  <li <?php echo ($active == 3) ? 'class="active"' : ''; ?>>
  	<a href="<?php echo url_for('@mailing_end'); ?>">Zakończone (<?php echo $end; ?>)</a>
  </li>
</ul>