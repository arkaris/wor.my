<?php
$tmp = new Schedule; 
$sched = $tmp->getUserSchedule($_SESSION["user_id"]);
unset($tmp);

if (isset($sched)) {
  foreach ($sched as $data) {
    foreach ($roomes as $value) {
      if ($value['rid'] == $data['rid']) {
        $room = $value;
        break;
      }
    }
    unset($rvalue);
    
    $tmp = $value['rstatus'] ? ' enabled' : ' disabled';
    echo '<div class="clearfix main_quest_list">';
      echo "<div class='quest_mini_card$tmp' onclick=hrefExtend(this)>";
        echo '<div class="unblur" style="background-image: url(\''.$room['rimg'].'\');"></div>';
        echo '<div class="frame">';
          echo '<div class="gamers_count">';
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
          echo '</div>';
          echo '<div class="bottom">';
            echo '<div class="img" style="background: url(\''.$room['rlogo'].'\') no-repeat;"></div>';
            echo '<div class="h2">';
              echo '<h2><a href="room.php?rid='.$room['rid'].'">'.$room['rname'].'</a><div></div></h2>';
            echo '</div>';
            echo '<div class="location_info">';
              echo '<p><span class="small_icon phone">'.$room['rphone'].'</span></p>';
              echo '<p><span class="small_icon email">'.$room['rmail'].'</span></p>';
              echo '<p><span class="small_icon address">'.$room['raddres'].'</span></p>';
            echo '</div>';
          echo '</div>';
        echo '</div>';
      echo '</div>';
      
      echo "<div class='quest_mini_card'>";
        echo '<div class="unblur"></div>';
        echo '<div class="frame">';
        if ($data['time'] > time()) {
          echo '<h3>Дата: '.date('j.n.y', $data['time']).'</h3>';
          echo '<h3>Время: '.date('H:i', $data['time']).'</h3>';
          echo '<form class="ajax" method="post" action="./ajax.php" novalidate="novalidate">';
            echo '<input type="hidden" name="act" value="unbook">';
            echo '<input type="hidden" name="rid" value="'.$data['rid'].'">';
            echo '<input type="hidden" name="time" value="'.$data['time'].'">';
            echo '<button type="submit" class="round_button" onclick="false">Отменить бронь</button>';
          echo '</form>';
        } else {
          echo '<h3>Дата: '.date('j.n.y', $data['time']).'</h3>';
          echo '<h3>Время: '.date('H:i', $data['time']).'</h3>';
          if (!empty($data['result'])) echo '<h3>Победа за '.$data['result']%3600..'мин '.$data['result']%60..'сек</h3>';
        }
        echo '</div>';
      echo '</div>';
    echo '</div>';
  }
}
echo '</div>';
?>
