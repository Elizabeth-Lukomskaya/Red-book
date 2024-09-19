<?php
  $host = 'localhost';  
  $user = 'user';    
  $pass = 'user'; 
  $db_name = 'red_book';
  $link = mysqli_connect($host, $user, $pass, $db_name); 
  if (!$link) {
    echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
    exit;
  }
    $sql = mysqli_query($link, 'SELECT `Название`, `Название латиница`, `Отряд`, `Семейство`,`Фото`,`Описание`, `Среда обитания`');
    while ($result = mysqli_fetch_array($sql)) {
      echo "{$result['Название']}: {$result['Название латиница']}: {$result['Отряд']}: {$result['Семейство']}: {$result['Фото']}: {$result['Описание']}: {$result['Среда обитания']} ";
    }
?>