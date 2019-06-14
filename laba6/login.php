<?php 
	session_start();
	//connect to db
	$db = mysqli_connect("localhost", "root", "", "authentication");
	if (!$db) {
	    die('Ошибка : ('. mysqli_connect_errno .') '. mysqli_connect_error);
	}
	if(isset($_POST['login_btn'])){
		$username = $_POST['username'];
        $password = $_POST['password'];
	    $md5password=md5($password);
	$sql="SELECT * FROM users WHERE username='$username' AND password='$password'";
	$result = mysqli_query($db, $sql);
	$sql2="SELECT * FROM users WHERE username='$username'";
	$result2 = mysqli_query($db, $sql2);
	$row2=mysqli_fetch_array($result2);
    $db_pass2=$row2['password'];
	echo $db_pass2;
	$_SESSION['username']=$username;
	if(mysqli_num_rows($result)==1){
		$_SESSION['message']="Вы авторизированны";
		if(isset($_POST['chbx']) && $_POST['chbx'] == '1') {
			setcookie("name",$username);
            setcookie("pass",md5($password.$_SERVER['REMOTE_ADDR']));
	    }
		header("location: home.php");
	}else if(md5($db_pass2.$_SERVER['REMOTE_ADDR'])===$password){
		$_SESSION['message']="Вы авторизированны";
		if(isset($_POST['chbx']) && $_POST['chbx'] == '1') {
			setcookie("name",$username);
            setcookie("pass",$password);
	    }
		header("location: home.php");
	}else{
		$_SESSION['message']="Неправильный логин/пароль";
		}
	}
?>

<!DOCTYPE html> 
<html> <!-- Вариант 6 -->
<head > 
<title>Авторизация</title>
<link rel="stylesheet" type="text/css" href="style.css" /> 
<meta charset="utf-8"> 
</head> 
<body>
 <div class="header">
     <h1>LOGIN</h1>
 </div>
  <?php
 if(isset($_SESSION['message'])){
	 echo "<div class='error_msg'>".$_SESSION['message']."</div>";
     unset($_SESSION['message']);
 }
 ?>
<form action="login.php" method="post"> 
 <table>
   <tr>
      <td>Username:</td>
      <td><input type="text" name="username" class="textInput" value="<?php  
	  if (isset($_COOKIE['name'])) 
		  echo  $_COOKIE['name'] ?>"></td>
   </tr>
   <tr>
      <td>Password:</td>
      <td><input type="password" name="password" class="textInput" value="<?php 
	  if (isset($_COOKIE['pass'])) 
		  echo  $_COOKIE['pass']  ?>" ></td>
   </tr>  
   <tr>
	  <td><div class="ch_st"><input id= "rembo" type="checkbox" name="chbx" value="1">
      <label  for="rembo">Remember me</label></div></td>
      <td><a href="register.php">Check in</a><input type="submit" name="login_btn" value="Login"></td>
   </tr>
 </table> 
</form>
</body> 
</html>