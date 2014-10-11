<?php
header ("Content-type: text/html; charset=utf-8");
if (!empty($_COOKIE['sid'])) {
  // check session id in cookies
  session_id($_COOKIE['sid']);
}
session_start();
require_once 'classes/Auth.class.php';

include 'pieces/header.php';
include 'pieces/message.php';
include 'pieces/second_navigation.php';
?>

<div style="" class="tab_page" id="schedule_tab">

        <h2>27 сентября &mdash; 26 октября</h2>

        <div id="calendar">
            <div id="today">
                <div class="round_button date">27 сентября</div>
                <span class="day">Сегодня</span>
            </div>
            <div id="line"><div class="one_day holiday booked">
            <div class="date">27</div>
            <span class="day">сб</span>
        </div><div class="one_day holiday">
            <div class="date">28</div>
            <span class="day">вс</span>
        </div><div class="one_day">
            <div class="date">29</div>
            <span class="day">пн</span>
        </div><div class="one_day">
            <div class="date">30</div>
            <span class="day">вт</span>
        </div><div class="one_day">
            <div class="date">1</div>
            <span class="day">ср</span>
        </div><div class="one_day">
            <div class="date">2</div>
            <span class="day">чт</span>
        </div><div class="one_day">
            <div class="date">3</div>
            <span class="day">пт</span>
        </div><div class="one_day holiday">
            <div class="date">4</div>
            <span class="day">сб</span>
        </div><div class="one_day holiday">
            <div class="date">5</div>
            <span class="day">вс</span>
        </div><div class="one_day">
            <div class="date">6</div>
            <span class="day">пн</span>
        </div><div class="one_day">
            <div class="date">7</div>
            <span class="day">вт</span>
        </div><div class="one_day">
            <div class="date">8</div>
            <span class="day">ср</span>
        </div><div class="one_day">
            <div class="date">9</div>
            <span class="day">чт</span>
        </div><div class="one_day">
            <div class="date">10</div>
            <span class="day">пт</span>
        </div><div class="one_day holiday">
            <div class="date">11</div>
            <span class="day">сб</span>
        </div><div class="one_day holiday">
            <div class="date">12</div>
            <span class="day">вс</span>
        </div><div class="one_day booked">
            <div class="date">13</div>
            <span class="day">пн</span>
        </div><div class="one_day booked">
            <div class="date">14</div>
            <span class="day">вт</span>
        </div><div class="one_day booked">
            <div class="date">15</div>
            <span class="day">ср</span>
        </div><div class="one_day booked">
            <div class="date">16</div>
            <span class="day">чт</span>
        </div><div class="one_day booked">
            <div class="date">17</div>
            <span class="day">пт</span>
        </div><div class="one_day holiday booked">
            <div class="date">18</div>
            <span class="day">сб</span>
        </div><div class="one_day holiday booked">
            <div class="date">19</div>
            <span class="day">вс</span>
        </div><div class="one_day booked">
            <div class="date">20</div>
            <span class="day">пн</span>
        </div><div class="one_day booked">
            <div class="date">21</div>
            <span class="day">вт</span>
        </div><div class="one_day booked">
            <div class="date">22</div>
            <span class="day">ср</span>
        </div><div class="one_day booked">
            <div class="date">23</div>
            <span class="day">чт</span>
        </div><div class="one_day booked">
            <div class="date">24</div>
            <span class="day">пт</span>
        </div><div class="one_day holiday booked">
            <div class="date">25</div>
            <span class="day">сб</span>
        </div><div class="one_day holiday booked">
            <div class="date">26</div>
            <span class="day">вс</span>
        </div><div class="selection"></div></div>
        </div>

        <div class="clearfix" id="schedule" data-baron-h="inited">
            <div class="timeslots_header">
                
                <div class="header_lines"><div class="quest_line header_line">
            <h3><a href="/30/">Убежище 13</a></h3>
            <p>2 &mdash; 4 игрока, 60 минут</p>
        </div><div class="quest_line header_line">
            <h3><a href="/21/">Отделение милиции</a></h3>
            <p>2 &mdash; 4 игрока, 60 минут</p>
        </div><div class="quest_line header_line">
            <h3><a href="/11/">Побег из Синг-Синга</a></h3>
            <p>2 &mdash; 4 игрока, 60 минут</p>
        </div><div class="quest_line header_line">
            <h3><a href="/13/">Турфирма «Альбатрос»</a></h3>
            <p>2 &mdash; 4 игрока, 60 минут</p>
        </div><div class="quest_line header_line">
            <h3><a href="/93/">Штрана:  Профессор Злых</a></h3>
            <p>2 &mdash; 4 игрока, 60 минут</p>
        </div><div class="quest_line header_line">
            <h3><a href="/18/">Средневековый замок</a></h3>
            <p>2 &mdash; 4 игрока, 60 минут</p>
        </div><div class="quest_line header_line">
            <h3><a href="/58/">Штрана: Школково</a></h3>
            <p>2 &mdash; 4 игрока, 60 минут</p>
        </div><div class="quest_line header_line">
            <h3><a href="/92/">Музей современного искусства</a></h3>
            <p>2 &mdash; 4 игрока, 60 минут</p>
        </div><div class="quest_line header_line">
            <h3><a href="/14/">Бункер №1</a></h3>
            <p>2 &mdash; 4 игрока, 60 минут</p>
        </div><div class="quest_line header_line">
            <h3><a href="/25/">Декстер</a></h3>
            <p>2 &mdash; 4 игрока, 60 минут</p>
        </div><div class="quest_line header_line">
            <h3><a href="/10/">Психиатрическая больница</a></h3>
            <p>2 &mdash; 3 игрока, 60 минут</p>
        </div><div class="quest_line header_line">
            <h3><a href="/84/">Это Вьетнам, детка!</a></h3>
            <p>2 &mdash; 4 игрока, 60 минут</p>
        </div><div class="quest_line header_line">
            <h3><a href="/40/">Салемская ведьма</a></h3>
            <p>2 &mdash; 4 игрока, 60 минут</p>
        </div><div class="quest_line header_line">
            <h3><a href="/12/">Мотель «Австралия»</a></h3>
            <p>2 &mdash; 4 игрока, 60 минут</p>
        </div><div class="quest_line header_line">
            <h3><a href="/17/">Автосервис</a></h3>
            <p>2 &mdash; 4 игрока, 60 минут</p>
        </div><div class="quest_line header_line">
            <h3><a href="/20/">Подводная лодка</a></h3>
            <p>2 &mdash; 4 игрока, 60 минут</p>
        </div><div class="quest_line header_line">
            <h3><a href="/16/">Бейкер-стрит, 221b</a></h3>
            <p>2 &mdash; 4 игрока, 60 минут</p>
        </div><div class="quest_line header_line">
            <h3><a href="/1/">Советская квартира</a></h3>
            <p>2 &mdash; 4 игрока, 60 минут</p>
        </div></div>
            </div>
            <div class="schedule_body">
                <div class="scroller" style="height: 1283px;">
                    <div class="scroller_container">
                        <div class="scroller_inner">
                            <div class="time_gradient">
                                
                                <div class="hours_wrapper">
                                    <div class="hours"><div style="left: 0.00%">00</div><div style="left: 4.12%">01</div><div style="left: 8.25%">02</div><div style="left: 12.37%">03</div><div style="left: 16.49%">04</div><div style="left: 20.62%">05</div><div style="left: 24.74%">06</div><div style="left: 28.87%">07</div><div style="left: 32.99%">08</div><div style="left: 37.11%">09</div><div style="left: 41.24%">10</div><div style="left: 45.36%">11</div><div style="left: 49.48%">12</div><div style="left: 53.61%">13</div><div style="left: 57.73%">14</div><div style="left: 61.86%">15</div><div style="left: 65.98%">16</div><div style="left: 70.10%">17</div><div style="left: 74.23%">18</div><div style="left: 78.35%">19</div><div style="left: 82.47%">20</div><div style="left: 86.60%">21</div><div style="left: 90.72%">22</div><div style="left: 94.85%">23</div><div style="left: 98.97%">00</div><div style="left: 103.09%">01</div></div>
                                </div>
                            </div>
                            <div class="schedule_lines"><div class="quest_schedule"><div class="timeslots"><div class="slot round_button booked" style="left: 0%; width: 4.12%;">00:00</div><div class="slot round_button booked" style="left: 5.15%; width: 4.12%;">01:15</div><div class="slot round_button booked" style="left: 10.31%; width: 4.12%;">02:30</div><div class="slot round_button booked" style="left: 16.49%; width: 4.12%;">04:00</div><div class="slot round_button booked" style="left: 21.65%; width: 4.12%;">05:15</div><div class="slot round_button booked" style="left: 26.8%; width: 4.12%;">06:30</div><div class="slot round_button booked" style="left: 31.96%; width: 4.12%;">07:45</div><div class="slot round_button booked" style="left: 37.11%; width: 4.12%;">09:00</div><div class="slot round_button booked" style="left: 42.27%; width: 4.12%;">10:15</div><div class="slot round_button booked" style="left: 47.42%; width: 4.12%;">11:30</div><div class="slot round_button booked" style="left: 52.58%; width: 4.12%;">12:45</div><div class="slot round_button booked" style="left: 57.73%; width: 4.12%;">14:00</div><div class="slot round_button booked" style="left: 62.89%; width: 4.12%;">15:15</div><div class="slot round_button booked" style="left: 68.04%; width: 4.12%;">16:30</div><div class="slot round_button booked" style="left: 73.2%; width: 4.12%;">17:45</div><div class="slot round_button booked" style="left: 78.35%; width: 4.12%;">19:00</div><div class="slot round_button booked" style="left: 83.51%; width: 4.12%;">20:15</div><div class="slot round_button booked" style="left: 88.66%; width: 4.12%;">21:30</div><div class="slot round_button booked" style="left: 93.81%; width: 4.12%;">22:45</div></div><div class="pricelines">

        

        </div></div><div class="quest_schedule"><div class="timeslots"><div class="slot round_button booked" style="left: 0%; width: 4.12%;">00:00</div><div class="slot round_button booked" style="left: 5.15%; width: 4.12%;">01:15</div><div class="slot round_button booked" style="left: 10.31%; width: 4.12%;">02:30</div><div class="slot round_button booked" style="left: 16.49%; width: 4.12%;">04:00</div><div class="slot round_button booked" style="left: 21.65%; width: 4.12%;">05:15</div><div class="slot round_button booked" style="left: 26.8%; width: 4.12%;">06:30</div><div class="slot round_button booked" style="left: 31.96%; width: 4.12%;">07:45</div><div class="slot round_button booked" style="left: 37.11%; width: 4.12%;">09:00</div><div class="slot round_button booked" style="left: 42.27%; width: 4.12%;">10:15</div><div class="slot round_button booked" style="left: 47.42%; width: 4.12%;">11:30</div><div class="slot round_button booked" style="left: 52.58%; width: 4.12%;">12:45</div><div class="slot round_button booked" style="left: 57.73%; width: 4.12%;">14:00</div><div class="slot round_button booked" style="left: 62.89%; width: 4.12%;">15:15</div><div class="slot round_button booked" style="left: 68.04%; width: 4.12%;">16:30</div><div class="slot round_button booked" style="left: 73.2%; width: 4.12%;">17:45</div><div class="slot round_button booked" style="left: 78.35%; width: 4.12%;">19:00</div><div class="slot round_button booked" style="left: 83.51%; width: 4.12%;">20:15</div><div class="slot round_button booked" style="left: 88.66%; width: 4.12%;">21:30</div><div class="slot round_button booked" style="left: 93.81%; width: 4.12%;">22:45</div></div><div class="pricelines">

        

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

        

        </div></div><div class="quest_schedule"><div class="timeslots"><div class="slot round_button booked" style="left: 2.06%; width: 4.12%;">00:30</div><div class="slot round_button booked" style="left: 7.22%; width: 4.12%;">01:45</div><div class="slot round_button booked" style="left: 12.37%; width: 4.12%;">03:00</div><div class="slot round_button booked" style="left: 18.56%; width: 4.12%;">04:30</div><div class="slot round_button booked" style="left: 23.71%; width: 4.12%;">05:45</div><div class="slot round_button booked" style="left: 28.87%; width: 4.12%;">07:00</div><div class="slot round_button booked" style="left: 34.02%; width: 4.12%;">08:15</div><div class="slot round_button booked" style="left: 39.18%; width: 4.12%;">09:30</div><div class="slot round_button booked" style="left: 44.33%; width: 4.12%;">10:45</div><div class="slot round_button booked" style="left: 49.48%; width: 4.12%;">12:00</div><div class="slot round_button booked" style="left: 54.64%; width: 4.12%;">13:15</div><div class="slot round_button booked" style="left: 59.79%; width: 4.12%;">14:30</div><div class="slot round_button booked" style="left: 64.95%; width: 4.12%;">15:45</div><div class="slot round_button booked" style="left: 70.1%; width: 4.12%;">17:00</div><div class="slot round_button booked" style="left: 75.26%; width: 4.12%;">18:15</div><div class="slot round_button booked" style="left: 80.41%; width: 4.12%;">19:30</div><div class="slot round_button booked" style="left: 85.57%; width: 4.12%;">20:45</div><div class="slot round_button booked" style="left: 90.72%; width: 4.12%;">22:00</div><div class="slot round_button booked" style="left: 95.88%; width: 4.12%;">23:15</div></div><div class="pricelines">

        

        </div></div></div>
                        </div>
                    </div>
                    <div class="scroller__track">
                       <div class="scroller__bar" style="width: 0px; left: 0px;"></div>
                   </div>
                </div>
            </div>
        </div>

    </div>

<?php
include 'pieces/footer.php';
?>