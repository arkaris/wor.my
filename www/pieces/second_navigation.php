<div class="second_navigation">
  <div class="tabs">
    <div class="tab<?php echo $_SERVER['PHP_SELF']=='/index.php'? ' selection' : ''?>" data-tab="quests_tab" onclick=hrefExtend(this)><a href="./">Квесты</a></div>
    <div class="tab<?php echo $_SERVER['PHP_SELF']=='/map.php'? ' selection' : ''?>" data-tab="map_tab" onclick=hrefExtend(this)><a href="./map.php">Карта квестов</a></div>
    <div class="tab<?php echo $_SERVER['PHP_SELF']=='/schedule.php'? ' selection' : ''?>" data-tab="schedule_tab" onclick=hrefExtend(this)><a href="./schedule.php">Расписание</a></div>
    <div class="tab<?php echo $_SERVER['PHP_SELF']=='/faq.php'? ' selection' : ''?>"  data-tab="rules_tab" onclick=hrefExtend(this)><a href="./faq.php">Правила игры</a></div>
  </div>
</div>