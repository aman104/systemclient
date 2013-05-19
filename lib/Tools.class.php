<?php

class Tools {
	
	static function debug($data, $exit = false)
	{
		echo '<pre>';
		print_r($data);
		echo '</pre>';
		if($exit)
		{
			exit;
		}
	}

	static function getPrice($valueAsIs)
	{

	  $value = ((double)$valueAsIs/100);
      $stats = explode('.',$value);
      if(isset($stats[1]))
      {
          $return = (strlen($stats[1])==1) ? $stats[0].'.'.$stats[1].'0' : $stats[0].'.'.$stats[1];
      }
      else
      {
          $return = $stats[0].'.00';
      }

      return $return;

	}

	static function CalcDiff($currTime, $origTime)
	{


	    $showDiff = '';

	    // Set times
	    $currTime = intval($currTime);
	    $origTime = intval($origTime);
	    if ($currTime<$origTime) { $diff = $origTime-$currTime; }
	    else { $diff = $currTime-$origTime; }

	    // Start Years
	    $yrs = floor($diff/31556926); // 31556926 secs/yr
	    if ($yrs > 0)
	    {
	        $diff = $diff - ($yrs*31556926);
	        $showDiff .= "{$yrs}";
	        $showDiff .= $yrs>1 ? ' Lat ' : '';
	        $showDiff .= $yrs<2 ? ' Rok ' : '';
	    }
	    unset($yrs); // End Years

	    // Start Months
	    $mos = floor($diff/2629743.83); // 2629743.83 secs/mo
	    if ($mos > 0)
	    {
	        $diff = $diff - ($mos*2629743.83);
	        $showDiff .= empty($showDiff) ? '' : ', ';
	        $showDiff .= "{$mos}";
	        $showDiff .= 1<$mos && $mos<5 ? ' Miesiące ' : '';
	        $showDiff .= $mos>4 ? ' Miesięcy ' : '';
	        $showDiff .= $mos<2 ? ' Miesiąc ' : '';
	    }
	    unset($mos); // End Months

	    // Start Weeks
	    $wks = floor($diff/604800); // 604800 secs/wk
	    if ($wks > 0)
	    {
	        $diff = $diff - ($wks*604800);
	        $showDiff .= empty($showDiff) ? '' : ', ';
	        $showDiff .= "{$wks}";
	        $showDiff .= 1<$wks && $wks<5 ? ' Tygodnie ' : '';
	        $showDiff .= $wks>4 ? ' Tygodni ' : '';
	        $showDiff .= $wks<2 ? ' Tydzien ' : '';
	    }
	    unset($wks); // End Weeks

	    // Start Days
	    $days = floor($diff/86400); // 86400 secs/day
	    if ($days > 0)
	    {
	        $diff = $diff - ($days*86400);
	        $showDiff .= empty($showDiff) ? '' : ', ';
	        $showDiff .= "{$days}";
	        $showDiff .= $days>1 ? ' Dni ' : '';
	        $showDiff .= $days<2 ? ' Dzien ' : '';
	    }
	    unset($days); // End Days

	    // Start Hours
	    $hrs = floor($diff/3600); // 3600 secs/hr
	    if ($hrs > 0) {
	        $diff = $diff - ($hrs*3600);
	        $showDiff .= empty($showDiff) ? '' : ', ';
	        $showDiff .= "{$hrs}";
	        $showDiff .= 1<$hrs && $hrs<5 ? ' Godziny ' : '';
	        $showDiff .= $hrs<2 ? ' Godzina ' : '';
	        $showDiff .= $hrs>4 ? ' Godzin ' : '';
	    }
	    unset($hrs); // End Hours

	    // Start Minutes
	    $mins = floor($diff/60); // 60 secs/min
	    if ($mins > 0) {
	        $diff = $diff - ($mins*60);
	        $showDiff .= empty($showDiff) ? '' : ', ';
	        $showDiff .= "{$mins}";
	        $showDiff .= 1<$mins && $mins<5 ? ' min. ' : '';
	        $showDiff .= $mins<2 ? ' min.' : '';
	        $showDiff .= $mins>4 ? ' min.' : '';
	    }
	    unset($mins); // End Minutes

	    // Start Seconds
	    if ($diff > 0)
	    {
	        $showDiff .= empty($showDiff) ? '' : ' ';
	        $showDiff .= "{$diff}";
	        $showDiff .= 1<$diff && $diff<5 ? ' s. ' : '';
	        $showDiff .= $diff>4 ? ' s. ' : '';
	        $showDiff .= $diff<2 ? ' s. ' : '';
	               
	    } // End Seconds

	    unset($diff); // Free unused memory

	    // Zwraca różnice
	    if ($currTime<$origTime) { $showDiff = "- {$showDiff}"; }
	    return $showDiff;
	}


}