
      <?php

$resultA['2014-11-02']=17;
$resultA['2014-11-12']=5;
$resultA['2014-11-13']=3;
$resultA['2014-11-14']=15;
$resultA['2014-11-15']=16;



function draw_calendar($month,$year,$resultA)
{

  /* draw table */
  $calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';

  /* table headings */
  $headings = array('Sun','Mon','Tue','Wed','Thu','Fri','Sat');
  $calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';

  /* days and weeks vars now ... */
  $running_day = date('w',mktime(0,0,0,$month,1,$year));
  $days_in_month = date('t',mktime(0,0,0,$month,1,$year));
  $days_in_this_week = 1;
  $day_counter = 0;



  /* row for week one */
  $calendar.= '<tr class="calendar-row">';

  /* print "blank" days until the first of the current week */
  for($x = 0; $x < $running_day; $x++):
    $calendar.= '<td class="calendar-day-np">&nbsp;</td>';
    $days_in_this_week++;
  endfor;

  /* keep going with days.... */
  for($list_day = 1; $list_day <= $days_in_month; $list_day++):
    $calendar.= '<td class="calendar-day">';
      /* add in the day number */
      $calendar.= '<div class="day-number">'.$list_day.'</div>';

        $date=date('Y-m-d',mktime(0,0,0,$month,$list_day,$year));

        $tdHTML='';        
        if(isset($resultA[$date])) $tdHTML=$resultA[$date];

      $calendar.=$tdHTML;      

    $calendar.= '</td>';

    if($running_day == 6):
      $calendar.= '</tr>';
      if(($day_counter+1) != $days_in_month):
        $calendar.= '<tr class="calendar-row">';
      endif;
      $running_day = -1;
      $days_in_this_week = 0;
    endif;
    $days_in_this_week++; $running_day++; $day_counter++;
  endfor;

  /* finish the rest of the days in the week */
  if($days_in_this_week < 8):
    for($x = 1; $x <= (8 - $days_in_this_week); $x++):
      $calendar.= '<td class="calendar-day-np">&nbsp;</td>';
    endfor;
  endif;

  /* final row */
  $calendar.= '</tr>';

  /* end the table */
  $calendar.= '</table>';

  /* all done, return result */
  return $calendar;
}


?>

<style>
table.calendar    { border-left:1px solid #6897c3; }
td{vertical-align: top;}
tr.calendar-row  {  }
td.calendar-day  { min-height:80px; font-size:11px; position:relative; } * html div.calendar-day { height:80px; }
td.calendar-day:hover  { background:#eceff5; }
td.calendar-day-np  { background:#eee; min-height:80px; } * html div.calendar-day-np { height:80px; }
td.calendar-day-head { background:#6897c3; font-weight:bold; text-align:center; width:120px; padding:5px; border-bottom:1px solid #6897c3; border-top:1px solid #6897c3; border-right:1px solid #6897c3; color: #fff; }
div.day-number    { background:#6897c3; padding:5px; color:#fff; font-weight:bold; float:right; margin:-5px -5px 0 0; width:20px; text-align:center; }
/* shared */
td.calendar-day, td.calendar-day-np { width:120px; padding:5px; border-bottom:1px solid #6897c3; border-right:1px solid #6897c3; }

</style>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
</head>
<body>
<?php echo draw_calendar(11,2014,$resultA);  ?>
</body>
</html>