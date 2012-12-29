<div class="tabbable">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab">Projekt (<?php echo count($mailings) ?>)</a></li>
    <li><a href="#tab2" data-toggle="tab">Uruchomione (<?php echo count($run) ?>)</a></li>
    <li><a href="#tab3" data-toggle="tab">Zakończone (<?php echo count($end) ?>)</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab1">
      
      <table class="table table-bordered table-striped">
        <tr>
          <th>Lp.</th>
          <th>Tytuł</th>    
          <th>Akcje</th>
        </tr>
        <?php if(count($mailings) > 0): ?>

        <?php else: ?>
        <tr>
        <td colspan="3">
          <h2 class="t_center"><small>Brak kreacji mailingowych</small></h2>
        </td>
        </tr>
      <?php endif; ?>
      </table>

      <a class="pull-right" href="<?php echo url_for('@mailing'); ?>">Zobacz więcej &raquo;</a>

    </div>
    <div class="tab-pane" id="tab2">
      
      <table class="table table-bordered table-striped">
        <tr>
          <th>Lp.</th>
          <th>Tytuł</th>    
          <th>Akcje</th>
        </tr>
        <?php if(count($run) > 0): ?>

        <?php else: ?>
        <tr>
        <td colspan="3">
          <h2 class="t_center"><small>Brak kreacji mailingowych</small></h2>
        </td>
        </tr>
      <?php endif; ?>
      </table>

      <a class="pull-right" href="<?php echo url_for('@mailing_run'); ?>">Zobacz więcej &raquo;</a>

    </div>
    <div class="tab-pane" id="tab3">
      
      <table class="table table-bordered table-striped">
        <tr>
          <th>Lp.</th>
          <th>Tytuł</th>    
          <th>Akcje</th>
        </tr>
        <?php if(count($end) > 0): ?>

        <?php else: ?>
        <tr>
        <td colspan="3">
          <h2 class="t_center"><small>Brak kreacji mailingowych</small></h2>
        </td>
        </tr>
      <?php endif; ?>
      </table>

      <a class="pull-right" href="<?php echo url_for('@mailing_end'); ?>">Zobacz więcej &raquo;</a>

    </div>
  </div>
</div>