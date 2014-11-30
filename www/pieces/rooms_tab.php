<?php
include './rooms/room_list.php';

echo '<div id="quests_tab" class="tab_page tab_margin">';
echo '<div class="clearfix main_quest_list">';

foreach ($roomes as $value) {
  $tmp = $value['rstatus'] ? ' enabled' : ' disabled';
	echo "<div class='quest_mini_card$tmp' onclick=hrefExtend(this)>";
  echo '<div class="unblur" style="background-image: url(\''.$value['rimg'].'\');"></div>';
  echo '<div class="frame">';
    echo '<div class="gamers_count">';
      echo '<div class="figurines">';
        $min = $value['rmin'];
        $max = $value['rmax'];
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
        echo '<div class="img" style="background: url(\''.$value['rlogo'].'\') no-repeat;"></div>';
        echo '<div class="h2">';
          echo '<h2><a href="room.php?rid='.$value['rid'].'">'.$value['rname'].'</a><div></div></h2>';
        echo '</div>';
        echo '<div class="location_info">';
          echo '<p><span class="small_icon phone">'.$value['rphone'].'</span></p>';
          echo '<p><span class="small_icon email">'.$value['rmail'].'</span></p>';
          echo '<p><span class="small_icon address">'.$value['raddres'].'</span></p>';
  echo '</div></div></div></div>';
}

echo '</div></div>';
?>