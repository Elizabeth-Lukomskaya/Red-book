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
  <?php
    $host = 'localhost';  
    $user = 'admin';    
    $pass = 'admin'; 
    $db_name = 'red_book';
    $link = mysqli_connect($host, $user, $pass, $db_name); 
    if (!$link) {
      echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
      exit;
    }

    if (isset($_POST["Название"])) {
      if (isset($_GET['red'])) {
        $sql = mysqli_query($link, "UPDATE `animal` SET `Название` = '{$_POST['Название']}',`Название латиница` = '{$_POST['Название латиница']}',`Отряд` = '{$_POST['Отряд']}',`Семейтво` = '{$_POST['Семейство']}',`Фото` = '{$_POST['Фото']}',`Описание` = '{$_POST['Описание']}',`Среда обитания` = '{$_POST['Среда обитания']}',`Где гнездо(координаты)` = '{$_POST['Где гнездо(координаты)']}',`Категория редкости` = '{$_POST['Категория редкости']}',`Имена всех особей с возрастом` = '{$_POST['Имена всех особей с возрастом']}',`Название латиница` = '{$_POST['Название латиница']}' WHERE `ID`={$_GET['red']}");
      } else {
        $sql = mysqli_query($link, "INSERT INTO `animal` (`Название`, `Название латиница`, `Отряд`, `Семейство`,`Фото`,`Описание`, `Среда обитания`,`Где гнездо(координаты)`, `Категория редкости`, `Имена всех особей с возрастом`) VAUES ('{$_POST['Название']}', '{$_POST['Название латиница']}','{$_POST['Отряд']}','{$_POST['Семейство']}','{$_POST['Фото']}','{$_POST['Описание']}','{$_POST['Среда обитания']}','{$_POST['Где гнездо(координаты)']}','{$_POST['Категория редкости']}','{$_POST['Имена всех особей с возрастом']}',)");
      }

      if ($sql) {
        echo '<p>Успешно!</p>';
      } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
      }
    }

    if (isset($_GET['del'])) {
      $sql = mysqli_query($link, "DELETE FROM `animal` WHERE `ID` = {$_GET['del']}");
      if ($sql) {
        echo "<p>Животное удалено.</p>";
      } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
      }
    }


    if (isset($_GET['red'])) {
      $sql = mysqli_query($link, "SELECT `ID`, `Название`, `Название латиница`, `Отряд`, `Семейство`,`Фото`,`Описание`, `Среда обитания`,`Где гнездо(координаты)`, `Категория редкости`, `Имена всех особей с возрастом` FROM `animal` WHERE `ID`={$_GET['red']}");
      $product = mysqli_fetch_array($sql);
    }
  ?>
  <form action="" method="post">
    <table>
      <tr>
        <td>Название</td>
        <td><input type="text" name="Название" value="<?= isset($_GET['red']) ? $product['Название'] : ''; ?>"></td>
      </tr>
      <tr>
        <td>Название латиница</td>
        <td><input type="text" name="Название латиница"  value="<?= isset($_GET['red']) ? $product['Название латиница'] : ''; ?>"> </td>
      </tr>
      <tr>
        <td>Отряд</td>
        <td><input type="text" name="Отряд"  value="<?= isset($_GET['red']) ? $product['Отряд'] : ''; ?>"> </td>
      </tr>
      <tr>
        <td>Семейство</td>
        <td><input type="text" name="Семейство"  value="<?= isset($_GET['red']) ? $product['Семейство'] : ''; ?>"> </td>
      </tr>
      <tr>
        <td>Фото</td>
        <td><input type="mediumblob" name="Фото"  value="<?= isset($_GET['red']) ? $product['Фото'] : ''; ?>"> </td>
      </tr>
      <tr>
        <td>Описание</td>
        <td><input type="text" name="Описание"  value="<?= isset($_GET['red']) ? $product['Описание'] : ''; ?>"> </td>
      </tr>
      <tr>
        <td>Где живет в парке</td>
        <td><input type="text" name="Где живет в парке"  value="<?= isset($_GET['red']) ? $product['Где живет в парке'] : ''; ?>"> </td>
      </tr>
      <tr>
        <td>Где гнездо(координаты)</td>
        <td><input type="text" name="Где гнездо(координаты)"  value="<?= isset($_GET['red']) ? $product['Где гнездо(координаты)'] : ''; ?>"> </tdtext>
      </tr>
      <tr>
        <td>Численность</td>
        <td><input type="text" name="Численность"  value="<?= isset($_GET['red']) ? $product['Численность'] : ''; ?>"> </td>
      </tr>
      <tr>
        <td>Категория редкости</td>
        <td><input type="int" name="Категория редкости"  value="<?= isset($_GET['red']) ? $product['Категория редкости'] : ''; ?>"> </td>
      </tr>
      <tr>
        <td>Имена всех особей с возрастом</td>
        <td><input type="text" name="Имена всех особей с возрастом"  value="<?= isset($_GET['red']) ? $product['Имена всех особей с возрастом'] : ''; ?>"> </td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" value="OK"></td>
      </tr>
    </table>
  </form>
  <?php

  $sql = mysqli_query($link, 'SELECT `ID`, `Название`, `Название латиница`, `Отряд`, `Семейство`,`Фото`,`Описание`, `Среда обитания`,`Где гнездо(координаты)`, `Категория редкости`, `Имена всех особей с возрастом` FROM `animal`');
  while ($result = mysqli_fetch_array($sql)) {
    echo "<p>{$result['ID']}) {$result['Название']} - {$result['Название латиница']} - {$result['Отряд']} - {$result['Семейство']} - {$result['Фото']} - {$result['Описание']} - {$result['Среда обитания']} - {$result['Где гнездо(координаты)']} - {$result['Категория редкости']} - {$result['Имена всех особей с возрастом']} - <a href='?del={$result['ID']}'>Удалить</a> - <a href='?red={$result['ID']}'>Редактировать</a></p>";
  }
  ?>
  <p><a href="?add=new">Добавить новое животное</a></p>
</body>
<div class="row">
© 2024|| Designed By: Komanada 
</div>
</div>
</footer>
</html>