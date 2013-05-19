Liczba wysłanych mailingów: <?php echo $stats['ended']; ?> <br />
Liczba wysłanych maili: <?php echo $stats['sended_emails']; ?> <br />
Liczba otwartych maili: <?php echo $stats['opened_emails']; ?> <br />
Liczba adresów email: <?php echo $stats['emails']; ?> <br />

Liczba utworzonych grup: <?php echo $stats['mailing_list']; ?> <br />
Punkty do wykorzystania: <?php echo $stats['points']; ?> <br /><br />
<a href="<?php echo url_for('@statistic'); ?>" class="btn btn-mini">Przejdź do statystyk zaawansowanych</a>