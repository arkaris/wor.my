<?php
$rid = stripcslashes(htmlspecialchars(trim($_REQUEST['rid'])));
$time = stripcslashes(htmlspecialchars(trim($_REQUEST['time'])));

echo '<div class="tab_page tab_margin">';
if (!empty($time) && !empty($rid)||($rid==='0')) {
  
  foreach ($roomes as $value) {
    if ($value['rid'] == $rid) {
      $room = $value;
      break;
    }
  }
  echo '<div class="clearfix main_quest_list">';
    echo "<div class='quest_mini_card'>";
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
    echo '</div></div></div></div>';
    
    echo "<div class='quest_mini_card'>";
      echo '<div class="unblur"></div>';
      echo '<div class="frame">';
        echo '<h3>Дата: '.date('j.n.y', $time).'</h3>';
        echo '<h3>Время: '.date('H:i', $time).'</h3>';
        echo '<form class="ajax" method="post" action="./ajax.php" novalidate="novalidate">';
          echo '<input type="hidden" name="act" value="book">';
          echo '<input type="hidden" name="rid" value="'.$rid.'">';
          echo '<input type="hidden" name="time" value="'.$time.'">';
          echo '<button type="submit" class="round_button" onclick="false">Забронировать</button>';
        echo '</form>';
  echo '</div></div></div>';  
}
?>