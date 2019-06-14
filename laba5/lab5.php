<!DOCTYPE html> 
<html> <!-- Вариант 7 -->
<head > 
<link rel="stylesheet" type="text/css" href="style.css" /> 
<meta charset="utf-8"> 
</head> 
<body> 
<a><form  action="lab5.php" method="post"> 
   <input type="text" name="input" pattern="((([0-9A-Za-z]{1}[-0-9A-z\.]{1,}[0-9A-Za-z]{1})|([0-9А-Яа-я]{1}[-0-9А-я\.]{1,}[0-9А-Яа-я]{1}))@([-0-9A-Za-z]{1,}\.){1,2}[-A-Za-z]{2,4})">
<br><input type="submit" name="submit"/></a> 
</form>
<div>
<?php
// Параметры для подключения
    $db_host = "localhost"; 
    $db_user = "root"; // Логин БД
    $db_password = ""; // Пароль БД
    $db_base = 'profile'; // Имя БД
    $db_table = 'main'; // Имя Таблицы БД
    // Подключение к базе данных
$link = mysqli_connect($db_host,$db_user,$db_password,$db_base);
$result = mysqli_query($link,"SELECT * FROM`".$db_table."`");
echo "<table class='main-tab'>";
echo "<tr><td class='tab'>№</td><td class='tab'>ФИО</td><td class='tab'>Дата рождения</td><td class='tab'>e-mail</td></tr>";
while ($row=mysqli_fetch_array($result)){
$pole1=$row['Number'];
$pole2=$row['Name'];
$pole3=$row['Date'];
$pole4=$row['Mail'];
echo "<tr><td class='tab'> {$pole1} </td><td class='tab'> {$pole2} </td><td class='tab'>{$pole3}</td><td class='tab'>{$pole4}</td></tr>";
}
echo "</table><br>";
//----------------------------------------------------------------------------------------------------------------------------------------------------------//
    $db_table = 'prof_add'; // Имя Таблицы БД
	// Подключение к базе данных
$link = mysqli_connect($db_host,$db_user,$db_password,$db_base);
$result = mysqli_query($link,"SELECT * FROM`".$db_table."`");
echo "<table class='main-tab'>";
echo "<tr><td class='tab'>№</td><td class='tab'>Номер</td></tr>";
while ($row=mysqli_fetch_array($result)){
$pole1=$row['Number'];
$pole2=$row['Phone'];
echo "<tr><td class='tab'> {$pole1} </td><td class='tab'> {$pole2} </td></tr>";
}
echo "</table>";
//----------------------------------------------------------------------------------------------------------------------------------------------------------//
if(Isset($_POST['submit']) && $_POST['input']!=''){
    $input = $_POST['input'];    
    $db_base = 'tester'; // Имя БД
    $db_table = 'mytable'; // Имя Таблицы
    $link = mysqli_connect($db_host,$db_user,$db_password,$db_base);

	if (!$link) {
	    die('Ошибка : ('. mysqli_connect_errno .') '. mysqli_connect_error);
	}
	$query = "SELECT * FROM ".$db_table." WHERE mails='$input'";
	if(mysqli_num_rows(mysqli_query($link,$query))==0){
	  $query = "INSERT INTO ".$db_table." VALUES ('$input')";
      mysqli_query($link, $query); 
	  echo $input;
	  echo " занесен в б/д";
	}
    else echo "Такая запись уже существует";
}
?> 
</div> 
</body> 
</html>