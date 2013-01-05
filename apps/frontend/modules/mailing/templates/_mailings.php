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
          <th style="width: 300px;">Tytuł</th>    
          <th>Akcje</th>
        </tr>
        <?php if(count($mailings) > 0): ?>
          <?php $i = 1; foreach($mailings as $mailing): ?>
          <tr>
            <td><?php echo $i++; ?>.</td>
            <td><a href="<?php echo url_for('mailing_edit', array('hash' =>$mailing['hash'])); ?>"><?php echo $mailing['title'] ?></a></td>
            <td>
              <div class="btn-group">
                <a href="<?php echo url_for('mailing_edit', array('hash' =>$mailing['hash'])); ?>" class="btn btn-info btn-mini">Edytuj</a>
                <a href="<?php echo url_for('mailing_test', array('hash' => $mailing['hash'])); ?>" class="btn btn-info btn-mini">Testuj</a>
                <a href="<?php echo url_for('mailing_set_run', array('hash' => $mailing['hash'])); ?>" class="btn btn-success btn-mini" onclick="if (confirm('Na pewno chcesz uruchomić kampanie? Nie bedziesz mógł już edytować kreacji.')) { return true} else {return false; }">Uruchom</a>
                <a href="<?php echo url_for('mailing_delete', array('hash' => $mailing['hash'])); ?>" class="btn btn-danger btn-mini" onclick="if (confirm('Na pewno chcesz usunąć kreację mailingową?')) { return true} else {return false; }">Usuń</a>
              </div>
            </td>
          </tr>
          <?php endforeach; ?>
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
          <th>Data uruchomienia</th>
        </tr>
        <?php if(count($run) > 0): ?>
          <?php $i = 1; foreach($run as $mailing): ?>
          <tr>
            <td><?php echo $i++; ?>.</td>
            <td><?php echo $mailing['title'] ?></td>
            <td><?php echo $mailing['time_start']; ?></td>
          </tr>
          <?php endforeach; ?>
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
          <th>Data zakończenia</th>
        </tr>
        <?php if(count($end) > 0): ?>
          <?php $i = 1; foreach($end as $mailing): ?>
          <tr>
            <td><?php echo $i++; ?>.</td>
            <td><?php echo $mailing['title'] ?></td>
            <td><?php echo $mailing['time_end']; ?></td>
          </tr>
          <?php endforeach; ?>
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