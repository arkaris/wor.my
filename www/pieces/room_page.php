<div id="quest_page">
  <div class="quest_card">
    <div class="kom_card">
      <p>Фотографии комнат</p>
      <?php
      foreach ($room['rphoto'] as $value) {
        echo '<img src="'.$value.'" alt=""/>';
      }
      ?>
    </div>
    <?php
    echo '<img src="'.$room['rimgbig'].'" width="100%">';
    ?>
    <div class="quest_card_info_mobile">
      <?php
      echo '<img class="big-ico" src="'.$room['rlogobig'].'" alt=""/>';
      echo '<h1>'.$room['rname'].'</h1>';
      echo '<p><span class="small_icon phone">'.$room['rphone'].'</span></p>';
      echo '<p><a href="mailto:'.$room['rmail'].'"><span class="small_icon email">'.$room['rmail'].'</span></a></p>';
      echo '<p><span class="small_icon metro">'.$room['rmetro'].'</span></p>';
      echo '<p><span class="small_icon address">'.$room['raddres'].'</span></p>';
      ?>
    </div>
    <div class="quest_card_info">
      <span class="hide_for_mobile">
        <?php
        echo '<img class="big-ico" src="'.$room['rlogobig'].'" alt=""/>';
        echo '<h1>'.$room['rname'].'</h1>';
        echo '<p class="description bot">'.$room['rdesc'].'</p>';
        echo '<p class="description"><span class="small_icon phone">'.$room['rphone'].'</span></p>';
        echo '<p class="description"><a href="mailto:'.$room['rmail'].
          '"><span class="small_icon email">'.$room['rmail'].'</span></a></p>';
        echo '<p class="description"><span class="small_icon metro">'.$room['rmetro'].'</span></p>';
        echo '<p class="description"><span class="small_icon address">'.$room['raddres'].'</span></p>';
        ?>
      </span>
    </div>
    <div class="mini_map">
      <?php
      echo '<img src="'.$room['rmapmini'].'" height="130" width="130">';
      ?>
    </div> 
  </div>
  <div class="bottom-gamers">
    <div class=" bottom-box gamers_count">
      <?php
      echo '<div class="figurines">';
        $min = $room['rmin'];
        $max = $room['rmax'];
        for ($i=0; $i < $min; $i++) { 
          echo '<ins></ins>';
        }
        for ($i; $i < $max; $i++) { 
          echo '<del></del>';
        }
      echo '</div>';
      echo "<p>$min - $max игрока</p>";
      ?>
    </div>
    <div class="bottom-box time_shit">
    <?php echo '<p>Длительность квеста: '.$room['continuance'].'</p>'; ?>
    </div>
    <div class="bottom-box more_shit">
    <?php echo '<p>Минимальный возраст участников: <br/>'.$room['age'].'</p>';?>
    </div>
  </div>

  <div id="schedule_tab" class="tab_page">
    <div data-baron-h="inited" id="schedule">
      <div class="timeslots_header">
        <div class="header_lines">
        <?php
        $sched = new Schedule;
        $sched->getRoomSchedule($room['rid']);
        $tmp;
         foreach ($sched->room as $value) {
          if ( $tmp != date('j F',$value['time']) ) {
            $tmp = date('j F',$value['time']);
            if (date('N', $value['time'])<6){
              echo '<div class="day_line header_line">';
            } else {
              echo '<div class="day_line header_line holiday">';
            }
            echo '<h3>'.$tmp.'</h3>';
            echo '<p>'.date('l', $value['time']).'</p>';
            echo '</div>';
          }
        } unset($tmp);
        ?>
        </div>
      </div>
      <div class="schedule_body">
         <div style="height: 1147px;" class="scroller">
           <div class="scroller_container">
             <div class="scroller_inner">
               <div class="schedule_lines">
                 <?php
                 $tmp = date('j F',$sched->room[0]['time']);
                 echo '<div class="quest_schedule">';
                 echo '<div class="timeslots">';
                 foreach ($sched->room as $value) {
                   $left = date('B', $value['time'] +10800)/10;//-strtotime('1970-01-01T01:00:00+04:00');
                   //echo date('c', $value['time']);
                   if ( $tmp == date('j F',$value['time']) ) {
                     echo '<div style="left: '.$left.'%; width: 4.21%;" class="slot round_button'.$value['book'].'">'.date('H:i', $value['time']).'</div>';
                   } else {
                     $tmp = date('j F',$value['time']);
                     echo '</div></div><div class="quest_schedule"><div class="timeslots">';
                     echo '<div style="left: '.$left.'%; width: 4.21%;" class="slot round_button'.$value['book'].'">'.date('H:i', $value['time']).'</div>';
                   }
                 } unset($tmp);
                 echo '</div></div>';
                 ?>
              </div>
            </div>
          </div>
          <div class="scroller__track">
            <div style="width: 0px; left: 0px;" class="scroller__bar"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php/*
        <div id="winners_tab" class="tab_page tab_margin" style="display: none;">
            <table class="win_games">
                <tbody><tr>
                    <th>Дата игры</th>
                    <th>Время прохождения</th>
                </tr>
            
                <tr>
                    <td><a href="http://phobia.ru/games/50345/">27 сентября 2014</a></td>
                    <td><a href="http://phobia.ru/games/50345/">0:46:45</a></td>
                </tr>
            
                <tr>
                    <td><a href="http://phobia.ru/games/40527/">27 сентября 2014</a></td>
                    <td><a href="http://phobia.ru/games/40527/">0:39:24</a></td>
                </tr>
            </tbody></table>
        </div>
*/?>
</div>