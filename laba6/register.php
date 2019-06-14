<?php 
	session_start();
	//connect to db
	$db = mysqli_connect("localhost", "root", "Agepas12091999", "authentication");
	if (!$db) {
	    die('Ошибка : ('. mysqli_connect_errno .') '. mysqli_connect_error);
	}
	if(isset($_POST['register_btn'])){
		$username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];

	if(($password == $password2)&&($username !='')&&($email!='')&&($password!='')){
		//create users
     $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
     mysqli_query($db, $sql);
	  $password = md5($password.$_SERVER['REMOTE_ADDR']); //hash password
     $_SESSION['message'] = 'Вы успешно зарегистрированны';
     $_SESSION['username'] = $username;
	 
	 if(isset($_POST['chbx']) && $_POST['chbx'] == '1') {
	 setcookie("name", $username);
	 setcookie("pass", $password);
	 }
     header("Location: home.php");//redirect to home page
    }else { //fall to connect
     $_SESSION['message'] = 'Пароли не совпадают';
	}
 }
?>

<!DOCTYPE html> 
<html> <!-- Вариант 6 -->
<head > 
<title>Регистрация</title>
<link rel="stylesheet" type="text/css" href="style.css" /> 
<meta charset="utf-8"> 
</head> 
<body>
 <div class="header">
     <h1>Regisration</h1>
 </div>
  <?php
 if(isset($_SESSION['message'])){
	 echo "<div class='error_msg'>".$_SESSION['message']."</div>";
     unset($_SESSION['message']);
 }
 ?>
<form action="register.php" method="post"> 
 <table>
   <tr>
   <td>Username:</td>
   <td><input type="text" name="username" class="textInput" value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>" pattern=".{2,255}"></td>
   </tr>
     <tr>
   <td>Email:</td>
   <td><input type="email" name="email" class="textInput" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" ></td>
   </tr>
     <tr>
   <td>Password:</td>
   <td><input type="password" name="password" class="textInput" pattern=".{5,255}"></td>
   </tr>  
   <tr>
   <td>Password again:</td>
   <td><input type="password" name="password2" class="textInput" pattern=".{5,255}"></td>
   </tr>
     <tr>
	 <td><div class="ch_st"><input id= "rembo" type="checkbox" name="chbx" value="1">
      <label  for="rembo">Remember me</label></div></td>
   <td><a href="login.php">Login</a><input type="submit" name="register_btn" value="Register"></td>
   </tr>
 </table> 
</form>
</body> 
</html>