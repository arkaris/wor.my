<div style="" class="tab_page" id="schedule_tab">

  <?php
  $sched = new Schedule;
  $sched->getDateSchedule($day);
  echo '<h2>'.date('j F', time()).' &mdash; '.date('j F', time()+(30*24*60*60)).'</h2>';
  ?>
  <div id="calendar">
    <?php
    echo '<div id="today"><div class="round_button date" onclick=(document.location.href="./schedule.php?day='.time().'")>'.date('d F', time()).'</div><span class="day">Сегодня</span></div>';
    echo '<div id="line">';
      for ($i=0; $i<31; $i++) {
        $tmp = time()+$i*24*60*60;
        $holiday = date('N', $tmp)>5 ? ' holiday': '';
        echo '<div class="one_day'.$holiday.'" onclick=(document.location.href="./schedule.php?day='.$tmp.'")>';//booked
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
          echo '<div class="quest_line header_line" onclick=hrefExtend(this)>';
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
            
            <div class="schedule_lines" action='./ajax.php'>
              <?php
              foreach ($roomes as $key => $rvalue) {
                echo '<div class="quest_schedule">';
                  echo '<div class="timeslots" rid='.$rvalue['rid'].'>';
                  foreach ($sched->day as $dvalue) {
                    if ($dvalue['rid'] == $rvalue['rid']) {
                      $left = date('B', $dvalue['time'] +10800)/10;
                      echo '<div class="slot round_button'.$dvalue['book'].'" time='.$dvalue['time'].' style="left: '.$left.'%; width: 4.12%;">'.date('H:i', $dvalue['time']).'</div>';
                    }
                  }
                  echo '</div><div class="pricelines">';
                  foreach ($sched->day as $dvalue) {
                    if ($dvalue['rid'] == $rvalue['rid']) {
                      $left = date('B', $dvalue['time'] +10800)/10;
                      echo '<div class="slot'.$dvalue['book'].'" style="left: '.$left.'%; width: 4.12%; text-align: center;">'.$dvalue['price'].'р</div>';
                    }
                  }
                echo '</div></div>';
              }
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
<script>
  function hasClass(el, cls) {
    for (var c = el.className.split(' '),i=c.length-1; i>=0; i--) {
      if (c[i] == cls) return true;
    }
    return false;
  }
  
  var schedule = document.getElementsByClassName('schedule_body')[0];
  schedule.onclick = function(event) {
    event = event || window.event;
    var target = event.target || event.srcElement;
    if (hasClass(target,'slot')) {
      if (hasClass(target,'booked')) return false;
      var link = 'act=book&rid='+target.parentNode.getAttribute('rid')+'&time='+target.getAttribute('time');
      window.location.href = './user.php?act=book&rid='+target.parentNode.getAttribute('rid')+'&time='+target.getAttribute('time');
    }
  };
</script>