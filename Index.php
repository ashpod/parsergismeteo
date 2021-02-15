<?php
$html = file_get_contents("https://www.gismeteo.ua/weather-dnipro-5077/3-days/#1-3-days");
$now = preg_match_all("/class\=\"link\ \S{0,10}\"\>(\D{0,7}\d{0,2}\D{0,7})(<\/a><\/div><div)/", $html, $m);
//m[1] массив ближайших 9 дней от сегодня
$temp_unit_temperature=preg_match_all("/unit\ unit\_temperature\_c\"\>(\D{0,8}\d{0,3})/", $html, $un_temp);
//$un_temp[1] массив температур начиная с сегодня в порядке ночь утро день вечер
$wind_speed=preg_match_all("/\<span\ class\=\"unit\ unit\_wind\_m\_s\"\>\D+(\d+)/", $html, $wind);
//print_r($wind[1]);
    echo "<table border='2'>";
    echo "<tr>";
    echo "<th>День</th>";
    for ($i=0; $i<9; $i++){
    echo "<th colspan='4'>".$m[1][$i]."</th>";
}
    echo "</tr>";
    echo "<tr>";
    echo "<td>Время дня</td>";
    for ($i=0; $i<9; $i++){
    echo "<td>Ночь</td>";
    echo "<td>Утро</td>";
    echo "<td>День</td>";
    echo "<td>Вечер</td>";
}
    echo "</tr>";
    echo "<tr>";
    echo "<td>Температура</td>";
    for ($i=0; $i<36; $i++){
        echo "<td>".$un_temp[1][$i]."</td>";
}
    echo "</tr>";
    echo "<tr>";
    echo "<td>Скорость ветра</td>";
    for ($i=0; $i<36; $i++){
        echo "<td>".$wind[1][$i]."</td>";
}
    echo "</tr>";
    echo "</table>";