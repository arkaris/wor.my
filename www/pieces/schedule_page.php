<?php
$sched = new Schedule;
$sched->getDateSchedule($day);
echo '<div style="" class="tab_page" id="schedule_tab">';
  
  echo '<h2>'.date('j F', time()).' &mdash; '.date('j F', time()+(30*24*60*60)).'</h2>';
  
  echo '<div id="calendar">';
    echo '<div id="today"><div class="round_button date">'.date('d F', time()).'</div><span class="day">Сегодня</span></div>';
    echo '<div id="line">';
      for ($i=0; $i<31; $i++) {
        $tmp = time()+$i*24*60*60;
        $holiday = date('N', $tmp)>5 ? ' holiday': '';
        echo '<div class="one_day'.$holiday.'">';//booked
        echo '<div class="date">'.date('j', $tmp).'</div>';
        echo '<span class="day">'.date('D', $tmp).'</span>';
        echo '</div>';
      } unset ($i);
      $left = (date('j', $day-time())-1)*3.2+0.7;
      echo '<div class="selection" style="left: '.$left.'%"></div>';
    echo '</div>';
  echo '</div>';
  
  echo '<div class="clearfix" id="schedule" data-baron-h="inited">';
  
    echo '<div class="timeslots_header">';
      echo '<div class="header_lines">';
      foreach ($roomes as $key => $rvalue) {
        try {
          foreach ($sched->day as $dvalue) {
            if ($dvalue['rid'] == $rvalue['rid']) throw new Exception();
          }
          unset($roomes[$key]);
        } catch(exception $e) {
          echo '<div class="quest_line header_line">';
          echo '<h3><a href="room.php?rid='.$rvalue['rid'].'">'.$rvalue['rname'].'</a></h3>';
          echo '<p>'.$rvalue['rmin'].' &mdash; '.$rvalue['rmax'].' игрока, '.$rvalue['continuance'].'</p>';
          echo '</div>';
        }
      }
      echo '</div>';
    echo '</div>';
?>
    <div class="schedule_body">
      <div class="scroller" style="height: 1283px;">
        <div class="scroller_container">
          <div class="scroller_inner">
            
            <div class="time_gradient">
              <div class="hours_wrapper">
                <div class="hours">
                  <div style="left: 0.00%">00</div>
                  <div style="left: 4.12%">01</div>
                  <div style="left: 8.25%">02</div>
                  <div style="left: 12.37%">03</div>
                  <div style="left: 16.49%">04</div>
                  <div style="left: 20.62%">05</div>
                  <div style="left: 24.74%">06</div>
                  <div style="left: 28.87%">07</div>
                  <div style="left: 32.99%">08</div>
                  <div style="left: 37.11%">09</div>
                  <div style="left: 41.24%">10</div>
                  <div style="left: 45.36%">11</div>
                  <div style="left: 49.48%">12</div>
                  <div style="left: 53.61%">13</div>
                  <div style="left: 57.73%">14</div>
                  <div style="left: 61.86%">15</div>
                  <div style="left: 65.98%">16</div>
                  <div style="left: 70.10%">17</div>
                  <div style="left: 74.23%">18</div>
                  <div style="left: 78.35%">19</div>
                  <div style="left: 82.47%">20</div>
                  <div style="left: 86.60%">21</div>
                  <div style="left: 90.72%">22</div>
                  <div style="left: 94.85%">23</div>
                </div>
              </div>
            </div>
            
            <div class="schedule_lines">
              <?php
              foreach ($roomes as $key => $rvalue) {
                echo '<div class="quest_schedule">';
                  echo '<div class="timeslots">';
                  foreach ($sched->day as $dvalue) {
                    if ($dvalue['rid'] == $rvalue['rid']) {
                      $left = date('B', $dvalue['time'] +10800)/10;
                      echo '<div class="slot round_button'.$dvalue['book'].'" style="left: '.$left.'%; width: 4.12%;">'.date('H:i', $dvalue['time']).'</div>';
                    }
                  }
                echo'</div></div>';
              }
              
              /*
              <div class="quest_schedule">
                <div class="timeslots">
                  <div class="slot round_button booked" style="left: 0%; width: 4.12%;">00:00</div>
                  <div class="slot round_button booked" style="left: 5.15%; width: 4.12%;">01:15</div>
                  <div class="slot round_button booked" style="left: 10.31%; width: 4.12%;">02:30</div>
                  <div class="slot round_button booked" style="left: 16.49%; width: 4.12%;">04:00</div>
                  <div class="slot round_button booked" style="left: 21.65%; width: 4.12%;">05:15</div>
                  <div class="slot round_button booked" style="left: 26.8%; width: 4.12%;">06:30</div>
                  <div class="slot round_button booked" style="left: 31.96%; width: 4.12%;">07:45</div>
                  <div class="slot round_button booked" style="left: 37.11%; width: 4.12%;">09:00</div>
                  <div class="slot round_button booked" style="left: 42.27%; width: 4.12%;">10:15</div>
                  <div class="slot round_button booked" style="left: 47.42%; width: 4.12%;">11:30</div>
                  <div class="slot round_button booked" style="left: 52.58%; width: 4.12%;">12:45</div>
                  <div class="slot round_button booked" style="left: 57.73%; width: 4.12%;">14:00</div>
                  <div class="slot round_button booked" style="left: 62.89%; width: 4.12%;">15:15</div>
                  <div class="slot round_button booked" style="left: 68.04%; width: 4.12%;">16:30</div>
                  <div class="slot round_button booked" style="left: 73.2%; width: 4.12%;">17:45</div>
                  <div class="slot round_button booked" style="left: 78.35%; width: 4.12%;">19:00</div>
                  <div class="slot round_button booked" style="left: 83.51%; width: 4.12%;">20:15</div>
                  <div class="slot round_button booked" style="left: 88.66%; width: 4.12%;">21:30</div>
                  <div class="slot round_button booked" style="left: 93.81%; width: 4.12%;">22:45</div>
                </div>
                <div class="pricelines"></div>
              </div>
              
              <div class="quest_schedule"><div class="timeslots"><div class="slot round_button booked" style="left: 0%; width: 4.12%;">00:00</div><div class="slot round_button booked" style="left: 5.15%; width: 4.12%;">01:15</div><div class="slot round_button booked" style="left: 10.31%; width: 4.12%;">02:30</div><div class="slot round_button booked" style="left: 16.49%; width: 4.12%;">04:00</div><div class="slot round_button booked" style="left: 21.65%; width: 4.12%;">05:15</div><div class="slot round_button booked" style="left: 26.8%; width: 4.12%;">06:30</div><div class="slot round_button booked" style="left: 31.96%; width: 4.12%;">07:45</div><div class="slot round_button booked" style="left: 37.11%; width: 4.12%;">09:00</div><div class="slot round_button booked" style="left: 42.27%; width: 4.12%;">10:15</div><div class="slot round_button booked" style="left: 47.42%; width: 4.12%;">11:30</div><div class="slot round_button booked" style="left: 52.58%; width: 4.12%;">12:45</div><div class="slot round_button booked" style="left: 57.73%; width: 4.12%;">14:00</div><div class="slot round_button booked" style="left: 62.89%; width: 4.12%;">15:15</div><div class="slot round_button booked" style="left: 68.04%; width: 4.12%;">16:30</div><div class="slot round_button booked" style="left: 73.2%; width: 4.12%;">17:45</div><div class="slot round_button booked" style="left: 78.35%; width: 4.12%;">19:00</div><div class="slot round_button booked" style="left: 83.51%; width: 4.12%;">20:15</div><div class="slot round_button booked" style="left: 88.66%; width: 4.12%;">21:30</div><div class="slot round_button booked" style="left: 93.81%; width: 4.12%;">22:45</div></div><div class="pricelines">

        

              </div></div><div class="quest_schedule"><div class="timeslots"><div class="slot round_button booked" style="left: 2.06%; width: 4.12%;">00:30</div><div class="slot round_button booked" style="left: 7.22%; width: 4.12%;">01:45</div><div class="slot round_button booked" style="left: 12.37%; width: 4.12%;">03:00</div><div class="slot round_button booked" style="left: 18.56%; width: 4.12%;">04:30</div><div class="slot round_button booked" style="left: 23.71%; width: 4.12%;">05:45</div><div class="slot round_button booked" style="left: 28.87%; width: 4.12%;">07:00</div><div class="slot round_button booked" style="left: 34.02%; width: 4.12%;">08:15</div><div class="slot round_button booked" style="left: 39.18%; width: 4.12%;">09:30</div><div class="slot round_button booked" style="left: 44.33%; width: 4.12%;">10:45</div><div class="slot round_button booked" style="left: 49.48%; width: 4.12%;">12:00</div><div class="slot round_button booked" style="left: 54.64%; width: 4.12%;">13:15</div><div class="slot round_button booked" style="left: 59.79%; width: 4.12%;">14:30</div><div class="slot round_button booked" style="left: 64.95%; width: 4.12%;">15:45</div><div class="slot round_button booked" style="left: 70.1%; width: 4.12%;">17:00</div><div class="slot round_button booked" style="left: 75.26%; width: 4.12%;">18:15</div><div class="slot round_button booked" style="left: 80.41%; width: 4.12%;">19:30</div><div class="slot round_button booked" style="left: 85.57%; width: 4.12%;">20:45</div><div class="slot round_button booked" style="left: 90.72%; width: 4.12%;">22:00</div><div class="slot round_button booked" style="left: 95.88%; width: 4.12%;">23:15</div></div><div class="pricelines">

        

              </div></div><div class="quest_schedule"><div class="timeslots"><div class="slot round_button booked" style="left: 2.06%; width: 4.12%;">00:30</div><div class="slot round_button booked" style="left: 7.22%; width: 4.12%;">01:45</div><div class="slot round_button booked" style="left: 12.37%; width: 4.12%;">03:00</div><div class="slot round_button booked" style="left: 18.56%; width: 4.12%;">04:30</div><div class="slot round_button booked" style="left: 23.71%; width: 4.12%;">05:45</div><div class="slot round_button booked" style="left: 28.87%; width: 4.12%;">07:00</div><div class="slot round_button booked" style="left: 34.02%; width: 4.12%;">08:15</div><div class="slot round_button booked" style="left: 39.18%; width: 4.12%;">09:30</div><div class="slot round_button booked" style="left: 44.33%; width: 4.12%;">10:45</div><div class="slot round_button booked" style="left: 49.48%; width: 4.12%;">12:00</div><div class="slot round_button booked" style="left: 54.64%; width: 4.12%;">13:15</div><div class="slot round_button booked" style="left: 59.79%; width: 4.12%;">14:30</div><div class="slot round_button booked" style="left: 64.95%; width: 4.12%;">15:45</div><div class="slot round_button booked" style="left: 70.1%; width: 4.12%;">17:00</div><div class="slot round_button booked" style="left: 75.26%; width: 4.12%;">18:15</div><div class="slot round_button booked" style="left: 80.41%; width: 4.12%;">19:30</div><div class="slot round_button booked" style="left: 85.57%; width: 4.12%;">20:45</div><div class="slot round_button booked" style="left: 90.72%; width: 4.12%;">22:00</div><div class="slot round_button booked" style="left: 95.88%; width: 4.12%;">23:15</div></div><div class="pricelines">

        

              </div></div><div class="quest_schedule"><div class="timeslots"><div class="slot round_button booked" style="left: 0%; width: 4.12%;">00:00</div><div class="slot round_button booked" style="left: 5.15%; width: 4.12%;">01:15</div><div class="slot round_button booked" style="left: 10.31%; width: 4.12%;">02:30</div><div class="slot round_button booked" style="left: 16.49%; width: 4.12%;">04:00</div><div class="slot round_button booked" style="left: 21.65%; width: 4.12%;">05:15</div><div class="slot round_button booked" style="left: 26.8%; width: 4.12%;">06:30</div><div class="slot round_button booked" style="left: 31.96%; width: 4.12%;">07:45</div><div class="slot round_button booked" style="left: 37.11%; width: 4.12%;">09:00</div><div class="slot round_button booked" style="left: 42.27%; width: 4.12%;">10:15</div><div class="slot round_button booked" style="left: 47.42%; width: 4.12%;">11:30</div><div class="slot round_button booked" style="left: 52.58%; width: 4.12%;">12:45</div><div class="slot round_button booked" style="left: 57.73%; width: 4.12%;">14:00</div><div class="slot round_button booked" style="left: 62.89%; width: 4.12%;">15:15</div><div class="slot round_button booked" style="left: 68.04%; width: 4.12%;">16:30</div><div class="slot round_button booked" style="left: 73.2%; width: 4.12%;">17:45</div><div class="slot round_button booked" style="left: 78.35%; width: 4.12%;">19:00</div><div class="slot round_button booked" style="left: 83.51%; width: 4.12%;">20:15</div><div class="slot round_button booked" style="left: 88.66%; width: 4.12%;">21:30</div><div class="slot round_button booked" style="left: 93.81%; width: 4.12%;">22:45</div></div><div class="pricelines">

        

        </div></div><div class="quest_schedule"><div class="timeslots"><div class="slot round_button booked" style="left: 2.06%; width: 4.12%;">00:30</div><div class="slot round_button booked" style="left: 7.22%; width: 4.12%;">01:45</div><div class="slot round_button booked" style="left: 12.37%; width: 4.12%;">03:00</div><div class="slot round_button booked" style="left: 18.56%; width: 4.12%;">04:30</div><div class="slot round_button booked" style="left: 23.71%; width: 4.12%;">05:45</div><div class="slot round_button booked" style="left: 28.87%; width: 4.12%;">07:00</div><div class="slot round_button booked" style="left: 34.02%; width: 4.12%;">08:15</div><div class="slot round_button booked" style="left: 39.18%; width: 4.12%;">09:30</div><div class="slot round_button booked" style="left: 44.33%; width: 4.12%;">10:45</div><div class="slot round_button booked" style="left: 49.48%; width: 4.12%;">12:00</div><div class="slot round_button booked" style="left: 54.64%; width: 4.12%;">13:15</div><div class="slot round_button booked" style="left: 59.79%; width: 4.12%;">14:30</div><div class="slot round_button booked" style="left: 64.95%; width: 4.12%;">15:45</div><div class="slot round_button booked" style="left: 70.1%; width: 4.12%;">17:00</div><div class="slot round_button booked" style="left: 75.26%; width: 4.12%;">18:15</div><div class="slot round_button booked" style="left: 80.41%; width: 4.12%;">19:30</div><div class="slot round_button booked" style="left: 85.57%; width: 4.12%;">20:45</div><div class="slot round_button booked" style="left: 90.72%; width: 4.12%;">22:00</div><div class="slot round_button booked" style="left: 95.88%; width: 4.12%;">23:15</div></div><div class="pricelines">

        

        </div></div><div class="quest_schedule"><div class="timeslots"><div class="slot round_button booked" style="left: 1.37%; width: 4.12%;">00:20</div><div class="slot round_button booked" style="left: 6.53%; width: 4.12%;">01:35</div><div class="slot round_button booked" style="left: 11.68%; width: 4.12%;">02:50</div><div class="slot round_button booked" style="left: 17.87%; width: 4.12%;">04:20</div><div class="slot round_button booked" style="left: 23.02%; width: 4.12%;">05:35</div><div class="slot round_button booked" style="left: 28.18%; width: 4.12%;">06:50</div><div class="slot round_button booked" style="left: 33.33%; width: 4.12%;">08:05</div><div class="slot round_button booked" style="left: 38.49%; width: 4.12%;">09:20</div><div class="slot round_button booked" style="left: 43.64%; width: 4.12%;">10:35</div><div class="slot round_button booked" style="left: 48.8%; width: 4.12%;">11:50</div><div class="slot round_button booked" style="left: 53.95%; width: 4.12%;">13:05</div><div class="slot round_button booked" style="left: 59.11%; width: 4.12%;">14:20</div><div class="slot round_button booked" style="left: 64.26%; width: 4.12%;">15:35</div><div class="slot round_button booked" style="left: 69.42%; width: 4.12%;">16:50</div><div class="slot round_button booked" style="left: 74.57%; width: 4.12%;">18:05</div><div class="slot round_button booked" style="left: 79.73%; width: 4.12%;">19:20</div><div class="slot round_button booked" style="left: 84.88%; width: 4.12%;">20:35</div><div class="slot round_button booked" style="left: 90.03%; width: 4.12%;">21:50</div><div class="slot round_button booked" style="left: 95.19%; width: 4.12%;">23:05</div></div><div class="pricelines">

        

        </div></div><div class="quest_schedule"><div class="timeslots"><div class="slot round_button booked" style="left: 0%; width: 4.12%;">00:00</div><div class="slot round_button booked" style="left: 5.15%; width: 4.12%;">01:15</div><div class="slot round_button booked" style="left: 10.31%; width: 4.12%;">02:30</div><div class="slot round_button booked" style="left: 16.49%; width: 4.12%;">04:00</div><div class="slot round_button booked" style="left: 21.65%; width: 4.12%;">05:15</div><div class="slot round_button booked" style="left: 26.8%; width: 4.12%;">06:30</div><div class="slot round_button booked" style="left: 31.96%; width: 4.12%;">07:45</div><div class="slot round_button booked" style="left: 37.11%; width: 4.12%;">09:00</div><div class="slot round_button booked" style="left: 42.27%; width: 4.12%;">10:15</div><div class="slot round_button booked" style="left: 47.42%; width: 4.12%;">11:30</div><div class="slot round_button booked" style="left: 52.58%; width: 4.12%;">12:45</div><div class="slot round_button booked" style="left: 57.73%; width: 4.12%;">14:00</div><div class="slot round_button booked" style="left: 62.89%; width: 4.12%;">15:15</div><div class="slot round_button booked" style="left: 68.04%; width: 4.12%;">16:30</div><div class="slot round_button booked" style="left: 73.2%; width: 4.12%;">17:45</div><div class="slot round_button booked" style="left: 78.35%; width: 4.12%;">19:00</div><div class="slot round_button booked" style="left: 83.51%; width: 4.12%;">20:15</div><div class="slot round_button booked" style="left: 88.66%; width: 4.12%;">21:30</div><div class="slot round_button booked" style="left: 93.81%; width: 4.12%;">22:45</div></div><div class="pricelines">

        

        </div></div><div class="quest_schedule"><div class="timeslots"><div class="slot round_button booked" style="left: 0%; width: 4.12%;">00:00</div><div class="slot round_button booked" style="left: 5.15%; width: 4.12%;">01:15</div><div class="slot round_button booked" style="left: 10.31%; width: 4.12%;">02:30</div><div class="slot round_button booked" style="left: 16.49%; width: 4.12%;">04:00</div><div class="slot round_button booked" style="left: 21.65%; width: 4.12%;">05:15</div><div class="slot round_button booked" style="left: 26.8%; width: 4.12%;">06:30</div><div class="slot round_button booked" style="left: 31.96%; width: 4.12%;">07:45</div><div class="slot round_button booked" style="left: 37.11%; width: 4.12%;">09:00</div><div class="slot round_button booked" style="left: 42.27%; width: 4.12%;">10:15</div><div class="slot round_button booked" style="left: 47.42%; width: 4.12%;">11:30</div><div class="slot round_button booked" style="left: 52.58%; width: 4.12%;">12:45</div><div class="slot round_button booked" style="left: 57.73%; width: 4.12%;">14:00</div><div class="slot round_button booked" style="left: 62.89%; width: 4.12%;">15:15</div><div class="slot round_button booked" style="left: 68.04%; width: 4.12%;">16:30</div><div class="slot round_button booked" style="left: 73.2%; width: 4.12%;">17:45</div><div class="slot round_button booked" style="left: 78.35%; width: 4.12%;">19:00</div><div class="slot round_button booked" style="left: 83.51%; width: 4.12%;">20:15</div><div class="slot round_button booked" style="left: 88.66%; width: 4.12%;">21:30</div><div class="slot round_button booked" style="left: 93.81%; width: 4.12%;">22:45</div></div><div class="pricelines">

        

        </div></div><div class="quest_schedule"><div class="timeslots"><div class="slot round_button booked" style="left: 1.03%; width: 4.12%;">00:15</div><div class="slot round_button booked" style="left: 6.19%; width: 4.12%;">01:30</div><div class="slot round_button booked" style="left: 11.34%; width: 4.12%;">02:45</div><div class="slot round_button booked" style="left: 17.53%; width: 4.12%;">04:15</div><div class="slot round_button booked" style="left: 22.68%; width: 4.12%;">05:30</div><div class="slot round_button booked" style="left: 27.84%; width: 4.12%;">06:45</div><div class="slot round_button booked" style="left: 32.99%; width: 4.12%;">08:00</div><div class="slot round_button booked" style="left: 38.14%; width: 4.12%;">09:15</div><div class="slot round_button booked" style="left: 43.3%; width: 4.12%;">10:30</div><div class="slot round_button booked" style="left: 48.45%; width: 4.12%;">11:45</div><div class="slot round_button booked" style="left: 53.61%; width: 4.12%;">13:00</div><div class="slot round_button booked" style="left: 58.76%; width: 4.12%;">14:15</div><div class="slot round_button booked" style="left: 63.92%; width: 4.12%;">15:30</div><div class="slot round_button booked" style="left: 69.07%; width: 4.12%;">16:45</div><div class="slot round_button booked" style="left: 74.23%; width: 4.12%;">18:00</div><div class="slot round_button booked" style="left: 79.38%; width: 4.12%;">19:15</div><div class="slot round_button booked" style="left: 84.54%; width: 4.12%;">20:30</div><div class="slot round_button booked" style="left: 89.69%; width: 4.12%;">21:45</div><div class="slot round_button booked" style="left: 94.85%; width: 4.12%;">23:00</div></div><div class="pricelines">
 
        </div></div><div class="quest_schedule"><div class="timeslots"><div class="slot round_button booked" style="left: 0%; width: 4.12%;">00:00</div><div class="slot round_button booked" style="left: 5.15%; width: 4.12%;">01:15</div><div class="slot round_button booked" style="left: 10.31%; width: 4.12%;">02:30</div><div class="slot round_button booked" style="left: 16.49%; width: 4.12%;">04:00</div><div class="slot round_button booked" style="left: 21.65%; width: 4.12%;">05:15</div><div class="slot round_button booked" style="left: 26.8%; width: 4.12%;">06:30</div><div class="slot round_button booked" style="left: 31.96%; width: 4.12%;">07:45</div><div class="slot round_button booked" style="left: 37.11%; width: 4.12%;">09:00</div><div class="slot round_button booked" style="left: 42.27%; width: 4.12%;">10:15</div><div class="slot round_button booked" style="left: 47.42%; width: 4.12%;">11:30</div><div class="slot round_button booked" style="left: 52.58%; width: 4.12%;">12:45</div><div class="slot round_button booked" style="left: 57.73%; width: 4.12%;">14:00</div><div class="slot round_button booked" style="left: 62.89%; width: 4.12%;">15:15</div><div class="slot round_button booked" style="left: 68.04%; width: 4.12%;">16:30</div><div class="slot round_button booked" style="left: 73.2%; width: 4.12%;">17:45</div><div class="slot round_button booked" style="left: 78.35%; width: 4.12%;">19:00</div><div class="slot round_button booked" style="left: 83.51%; width: 4.12%;">20:15</div><div class="slot round_button booked" style="left: 88.66%; width: 4.12%;">21:30</div><div class="slot round_button booked" style="left: 93.81%; width: 4.12%;">22:45</div></div><div class="pricelines">

        

        </div></div><div class="quest_schedule"><div class="timeslots"><div class="slot round_button booked" style="left: 0%; width: 4.12%;">00:00</div><div class="slot round_button booked" style="left: 5.15%; width: 4.12%;">01:15</div><div class="slot round_button booked" style="left: 10.31%; width: 4.12%;">02:30</div><div class="slot round_button booked" style="left: 16.49%; width: 4.12%;">04:00</div><div class="slot round_button booked" style="left: 21.65%; width: 4.12%;">05:15</div><div class="slot round_button booked" style="left: 26.8%; width: 4.12%;">06:30</div><div class="slot round_button booked" style="left: 31.96%; width: 4.12%;">07:45</div><div class="slot round_button booked" style="left: 37.11%; width: 4.12%;">09:00</div><div class="slot round_button booked" style="left: 42.27%; width: 4.12%;">10:15</div><div class="slot round_button booked" style="left: 47.42%; width: 4.12%;">11:30</div><div class="slot round_button booked" style="left: 52.58%; width: 4.12%;">12:45</div><div class="slot round_button booked" style="left: 57.73%; width: 4.12%;">14:00</div><div class="slot round_button booked" style="left: 62.89%; width: 4.12%;">15:15</div><div class="slot round_button booked" style="left: 68.04%; width: 4.12%;">16:30</div><div class="slot round_button booked" style="left: 73.2%; width: 4.12%;">17:45</div><div class="slot round_button booked" style="left: 78.35%; width: 4.12%;">19:00</div><div class="slot round_button booked" style="left: 83.51%; width: 4.12%;">20:15</div><div class="slot round_button booked" style="left: 88.66%; width: 4.12%;">21:30</div><div class="slot round_button booked" style="left: 93.81%; width: 4.12%;">22:45</div></div><div class="pricelines">

        

        </div></div><div class="quest_schedule"><div class="timeslots"><div class="slot round_button booked" style="left: 0%; width: 4.12%;">00:00</div><div class="slot round_button booked" style="left: 5.15%; width: 4.12%;">01:15</div><div class="slot round_button booked" style="left: 10.31%; width: 4.12%;">02:30</div><div class="slot round_button booked" style="left: 16.49%; width: 4.12%;">04:00</div><div class="slot round_button booked" style="left: 21.65%; width: 4.12%;">05:15</div><div class="slot round_button booked" style="left: 26.8%; width: 4.12%;">06:30</div><div class="slot round_button booked" style="left: 31.96%; width: 4.12%;">07:45</div><div class="slot round_button booked" style="left: 37.11%; width: 4.12%;">09:00</div><div class="slot round_button booked" style="left: 42.27%; width: 4.12%;">10:15</div><div class="slot round_button booked" style="left: 47.42%; width: 4.12%;">11:30</div><div class="slot round_button booked" style="left: 52.58%; width: 4.12%;">12:45</div><div class="slot round_button booked" style="left: 57.73%; width: 4.12%;">14:00</div><div class="slot round_button booked" style="left: 62.89%; width: 4.12%;">15:15</div><div class="slot round_button booked" style="left: 68.04%; width: 4.12%;">16:30</div><div class="slot round_button booked" style="left: 73.2%; width: 4.12%;">17:45</div><div class="slot round_button booked" style="left: 78.35%; width: 4.12%;">19:00</div><div class="slot round_button booked" style="left: 83.51%; width: 4.12%;">20:15</div><div class="slot round_button booked" style="left: 88.66%; width: 4.12%;">21:30</div><div class="slot round_button booked" style="left: 93.81%; width: 4.12%;">22:45</div></div><div class="pricelines">

        
              
        </div></div><div class="quest_schedule"><div class="timeslots"><div class="slot round_button booked" style="left: 0%; width: 4.12%;">00:00</div><div class="slot round_button booked" style="left: 5.15%; width: 4.12%;">01:15</div><div class="slot round_button booked" style="left: 10.31%; width: 4.12%;">02:30</div><div class="slot round_button booked" style="left: 16.49%; width: 4.12%;">04:00</div><div class="slot round_button booked" style="left: 21.65%; width: 4.12%;">05:15</div><div class="slot round_button booked" style="left: 26.8%; width: 4.12%;">06:30</div><div class="slot round_button booked" style="left: 31.96%; width: 4.12%;">07:45</div><div class="slot round_button booked" style="left: 37.11%; width: 4.12%;">09:00</div><div class="slot round_button booked" style="left: 42.27%; width: 4.12%;">10:15</div><div class="slot round_button booked" style="left: 47.42%; width: 4.12%;">11:30</div><div class="slot round_button booked" style="left: 52.58%; width: 4.12%;">12:45</div><div class="slot round_button booked" style="left: 57.73%; width: 4.12%;">14:00</div><div class="slot round_button booked" style="left: 62.89%; width: 4.12%;">15:15</div><div class="slot round_button booked" style="left: 68.04%; width: 4.12%;">16:30</div><div class="slot round_button booked" style="left: 73.2%; width: 4.12%;">17:45</div><div class="slot round_button booked" style="left: 78.35%; width: 4.12%;">19:00</div><div class="slot round_button booked" style="left: 83.51%; width: 4.12%;">20:15</div><div class="slot round_button booked" style="left: 88.66%; width: 4.12%;">21:30</div><div class="slot round_button booked" style="left: 93.81%; width: 4.12%;">22:45</div></div><div class="pricelines">

        

        </div></div><div class="quest_schedule"><div class="timeslots"><div class="slot round_button booked" style="left: 0%; width: 4.12%;">00:00</div><div class="slot round_button booked" style="left: 5.15%; width: 4.12%;">01:15</div><div class="slot round_button booked" style="left: 10.31%; width: 4.12%;">02:30</div><div class="slot round_button booked" style="left: 16.49%; width: 4.12%;">04:00</div><div class="slot round_button booked" style="left: 21.65%; width: 4.12%;">05:15</div><div class="slot round_button booked" style="left: 26.8%; width: 4.12%;">06:30</div><div class="slot round_button booked" style="left: 31.96%; width: 4.12%;">07:45</div><div class="slot round_button booked" style="left: 37.11%; width: 4.12%;">09:00</div><div class="slot round_button booked" style="left: 42.27%; width: 4.12%;">10:15</div><div class="slot round_button booked" style="left: 47.42%; width: 4.12%;">11:30</div><div class="slot round_button booked" style="left: 52.58%; width: 4.12%;">12:45</div><div class="slot round_button booked" style="left: 57.73%; width: 4.12%;">14:00</div><div class="slot round_button booked" style="left: 62.89%; width: 4.12%;">15:15</div><div class="slot round_button booked" style="left: 68.04%; width: 4.12%;">16:30</div><div class="slot round_button booked" style="left: 73.2%; width: 4.12%;">17:45</div><div class="slot round_button booked" style="left: 78.35%; width: 4.12%;">19:00</div><div class="slot round_button booked" style="left: 83.51%; width: 4.12%;">20:15</div><div class="slot round_button booked" style="left: 88.66%; width: 4.12%;">21:30</div><div class="slot round_button booked" style="left: 93.81%; width: 4.12%;">22:45</div></div><div class="pricelines">

        

        </div></div><div class="quest_schedule"><div class="timeslots"><div class="slot round_button booked" style="left: 0%; width: 4.12%;">00:00</div><div class="slot round_button booked" style="left: 5.15%; width: 4.12%;">01:15</div><div class="slot round_button booked" style="left: 10.31%; width: 4.12%;">02:30</div><div class="slot round_button booked" style="left: 16.49%; width: 4.12%;">04:00</div><div class="slot round_button booked" style="left: 21.65%; width: 4.12%;">05:15</div><div class="slot round_button booked" style="left: 26.8%; width: 4.12%;">06:30</div><div class="slot round_button booked" style="left: 31.96%; width: 4.12%;">07:45</div><div class="slot round_button booked" style="left: 37.11%; width: 4.12%;">09:00</div><div class="slot round_button booked" style="left: 42.27%; width: 4.12%;">10:15</div><div class="slot round_button booked" style="left: 47.42%; width: 4.12%;">11:30</div><div class="slot round_button booked" style="left: 52.58%; width: 4.12%;">12:45</div><div class="slot round_button booked" style="left: 57.73%; width: 4.12%;">14:00</div><div class="slot round_button booked" style="left: 62.89%; width: 4.12%;">15:15</div><div class="slot round_button booked" style="left: 68.04%; width: 4.12%;">16:30</div><div class="slot round_button booked" style="left: 73.2%; width: 4.12%;">17:45</div><div class="slot round_button booked" style="left: 78.35%; width: 4.12%;">19:00</div><div class="slot round_button booked" style="left: 83.51%; width: 4.12%;">20:15</div><div class="slot round_button booked" style="left: 88.66%; width: 4.12%;">21:30</div><div class="slot round_button booked" style="left: 93.81%; width: 4.12%;">22:45</div></div><div class="pricelines">

        

        </div></div><div class="quest_schedule"><div class="timeslots"><div class="slot round_button booked" style="left: 2.06%; width: 4.12%;">00:30</div><div class="slot round_button booked" style="left: 7.22%; width: 4.12%;">01:45</div><div class="slot round_button booked" style="left: 12.37%; width: 4.12%;">03:00</div><div class="slot round_button booked" style="left: 18.56%; width: 4.12%;">04:30</div><div class="slot round_button booked" style="left: 23.71%; width: 4.12%;">05:45</div><div class="slot round_button booked" style="left: 28.87%; width: 4.12%;">07:00</div><div class="slot round_button booked" style="left: 34.02%; width: 4.12%;">08:15</div><div class="slot round_button booked" style="left: 39.18%; width: 4.12%;">09:30</div><div class="slot round_button booked" style="left: 44.33%; width: 4.12%;">10:45</div><div class="slot round_button booked" style="left: 49.48%; width: 4.12%;">12:00</div><div class="slot round_button booked" style="left: 54.64%; width: 4.12%;">13:15</div><div class="slot round_button booked" style="left: 59.79%; width: 4.12%;">14:30</div><div class="slot round_button booked" style="left: 64.95%; width: 4.12%;">15:45</div><div class="slot round_button booked" style="left: 70.1%; width: 4.12%;">17:00</div><div class="slot round_button booked" style="left: 75.26%; width: 4.12%;">18:15</div><div class="slot round_button booked" style="left: 80.41%; width: 4.12%;">19:30</div><div class="slot round_button booked" style="left: 85.57%; width: 4.12%;">20:45</div><div class="slot round_button booked" style="left: 90.72%; width: 4.12%;">22:00</div><div class="slot round_button booked" style="left: 95.88%; width: 4.12%;">23:15</div></div><div class="pricelines">

        

              </div></div>
              <div class="quest_schedule">
                <div class="timeslots">
                  <div class="slot round_button booked" style="left: 2.06%; width: 4.12%;">00:30</div>
                  <div class="slot round_button booked" style="left: 7.22%; width: 4.12%;">01:45</div>
                  <div class="slot round_button booked" style="left: 12.37%; width: 4.12%;">03:00</div>
                  <div class="slot round_button booked" style="left: 18.56%; width: 4.12%;">04:30</div>
                  <div class="slot round_button booked" style="left: 23.71%; width: 4.12%;">05:45</div>
                  <div class="slot round_button booked" style="left: 28.87%; width: 4.12%;">07:00</div>
                  <div class="slot round_button booked" style="left: 34.02%; width: 4.12%;">08:15</div>
                  <div class="slot round_button booked" style="left: 39.18%; width: 4.12%;">09:30</div>
                  <div class="slot round_button booked" style="left: 44.33%; width: 4.12%;">10:45</div>
                  <div class="slot round_button booked" style="left: 49.48%; width: 4.12%;">12:00</div>
                  <div class="slot round_button booked" style="left: 54.64%; width: 4.12%;">13:15</div>
                  <div class="slot round_button booked" style="left: 59.79%; width: 4.12%;">14:30</div>
                  <div class="slot round_button booked" style="left: 64.95%; width: 4.12%;">15:45</div>
                  <div class="slot round_button booked" style="left: 70.1%; width: 4.12%;">17:00</div>
                  <div class="slot round_button booked" style="left: 75.26%; width: 4.12%;">18:15</div>
                  <div class="slot round_button booked" style="left: 80.41%; width: 4.12%;">19:30</div>
                  <div class="slot round_button booked" style="left: 85.57%; width: 4.12%;">20:45</div>
                  <div class="slot round_button booked" style="left: 90.72%; width: 4.12%;">22:00</div>
                  <div class="slot round_button booked" style="left: 95.88%; width: 4.12%;">23:15</div>
                </div>
                <div class="pricelines"></div>
              </div>
              */
              ?>
            </div>
            
          </div>
        </div>
        
        <div class="scroller__track">
                       <div class="scroller__bar" style="width: 0px; left: 0px;"></div>
                   </div>
                </div>
            </div>
        </div>

    </div>  