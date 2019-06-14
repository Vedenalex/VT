<?php 
	session_start();
	if(isset($_SESSION['message'])){
	 echo "<div class='error_msg'>".$_SESSION['message']."</div>";
     unset($_SESSION['message']);
 }
?>

<!DOCTYPE html> 
<html> <!-- Вариант 6 -->
<head > 
<title>Сайт</title>
<link rel="stylesheet" type="text/css" href="style.css" /> 
<meta charset="utf-8"> 
</head> 
<body>
 <div class="header">
     <h1>HOME</h1>
 </div>
 <?php
if (isset($_COOKIE['name'])) 
		  echo  'Логин: '.$_COOKIE['name'].'<br>';
if (isset($_COOKIE['pass'])) 
		  echo  'Пароль: '.$_COOKIE['pass'].'<br>';
 echo 'IP: '.$_SERVER['REMOTE_ADDR'].'<br>'; 	 
 ?>
 <img style="width:480px;" src="./hohma.gif" alt="mem">
 <div><h4>Welcome <?php echo $_SESSION['username'] ?></h4></div>
 <div><a href="logout.php">Logout</a></div>
</body> 
</html>