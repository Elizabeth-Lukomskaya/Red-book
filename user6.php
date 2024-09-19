<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link rel="stylesheet" type="text/css" href="stuly.css">
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?"link>
  <title>Красная книга ПИП</title>
</head>
<body>
<header>
  <a href="#" class="logo">Красная книга</a>
  <nav>
    <ul class="topmenu">
      <li><a href="#">Главная</a></li>
      <li><a href="#" class="submenu-link">Животные</a>
      <ul class="submenu">
        <li><a href="#">Млекопитающие</a></li>
        <li><a href="#">Птицы</a></li>
        <li><a href="#">Рыбы</a></li>
      </ul>
    </li>
    <li><a href="admin.php">ВХОД</a></li>
    <li><a href="index_en.php">EN</a></li>
    </ul>

  </nav>
</header>

</body>
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
      $sql = "SELECT `Название`,`Название латиница`,`Отряд`,`Семейство`,`Фото`,`Описание`,`Среда обитания` FROM `animal` WHERE id = \'1\';";
?>

<footer>
  <div class="footer">

<div class="row">
<ul>
<li><a href="#">Наши контакты:</a></li>
<li><a href="#">+7 (499) 739-27-08</a></li>
<li><a href="#">119192 г. Москва, Мичуринский проспект, д. 13</a></li>
<li><a href="#">mospriroda@culture.mos.ru</a></li>
</ul>
</div>

<div class="row">