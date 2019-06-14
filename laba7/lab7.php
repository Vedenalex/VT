<!DOCTYPE html> 
<html> 
<head > 
<!--<link rel="stylesheet" type="text/css" href="link2.css" /> -->
<meta charset="utf-8"> 
</head> 
<body> 
<div class="header">
     <h1>REVIEW</h1>
 </div>
<a><form  action="lab7.php" method="post"> 
<link rel="stylesheet" type="text/css" href="style.css" /> 
<table>
<tr><td><label>Имя:</label></td>
<td><input type="text" name="name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>"/></td></tr>
<tr><td><label>Телефон:</label></td>
<td><input type="tel" name="telef" value="<?php echo isset($_POST['telef']) ? htmlspecialchars($_POST['telef']) : ''; ?>" pattern='\s{0,}\+{1,1}375\s{0,}\(([2]{1}([5]{1}|[9]{1}))|([3]{1}[3]{1})|([4]{1}[4]{1}))\s{0,}[0-9]{3,3}\s{0,}[0-9]{4,4}'></td></tr>
<tr><td><label>Email:</label></td>
<td><input type="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" ></td></tr>
<tr><td><label>Тема:</label></td>
<td><input type="text" name="tema" value="<?php echo isset($_POST['tema']) ? htmlspecialchars($_POST['tema']) : ''; ?>"/></td></tr>
<tr><td colspan="2"><label>Текст сообщения:</label></td></tr>
<tr><td colspan="2"><textarea rows="10" cols="31" name="message" value="<?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?>"></textarea></td></tr>
<!--<tr><td colspan="2"><div class="g-recaptcha form-group" data-sitekey ="6LerpKIUAAAAAFIEeVkCALm-zm0DuB5Z__2aXmHA"></div></td></tr>-->
</table>
<input type="submit" name="submit"/></form></a>
<!--<script src='https://www.google.com/recaptcha/api.js'></script>-->
<div> 
<?php
//$captcha;
//if ( Isset($_POST['submit']) && isset($_POST['g-recaptcha-response'])) {
//    $captcha = $_POST['g-recaptcha-response'];
//}
// Checking For correct reCAPTCHA
//$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=SECRETKEY&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
//if (!$captcha || $response.success == false) {
//    echo "Your CAPTCHA response was wrong.";
//    exit ;
//} else {
if(($_POST['name']!='') && ($_POST['telef']!='')&&($_POST['email']!='') && ($_POST['tema']!='') &&($_POST['message']!='')){
$name=htmlspecialchars($_POST['name']);
$telef=htmlspecialchars($_POST['telef']);
$email=htmlspecialchars($_POST['email']);
$tema=htmlspecialchars($_POST['tema']);	
$message=htmlspecialchars($_POST['message']);	
$message=wordwrap($message, 70, "\r\n");
echo $name.' '.$telef.' '.$email.' '.$tema.' '.$message;
$mainmessage='Hi, '.$name.'. Your comment: '."\r\n".$tema ."\r\n".$message."\r\n".
             'Comment successfully added.'."\r\n" .'Your contact: '."\r\n" .
			 'Phone: '.$telef."\r\n".
			 'Mail: '.$email."\r\n".
			 'We will respond to your feedback soon.';

$headers = 'From: Dmitry Sapega <sapega.99di@gmail.com>' . "\r\n" .
           'X-Mailer: PHP/' . phpversion().'"\r\n"'.
		   'Content-Type: text/plain; charset=windows-1251';
$subject = 'Thanks for your feedback'. "\r\n"; 
if(mail($email, $subject, $mainmessage,$headers)) {
	$db_host = "localhost"; 
    $db_user = "root"; // Логин БД
    $db_password = "Agepas12091999"; // Пароль БД
    $db_base = '7lab'; // Имя БД
    $db_table = 'comments'; // Имя Таблицы БД
	$link = mysqli_connect($db_host,$db_user,$db_password,$db_base);
	if (!$link) {
	    die('Ошибка : ('. mysqli_connect_errno .') '. mysqli_connect_error);
	}
	  $query = "INSERT INTO " .$db_table. " (Name,Phone,Mail,Subject,Message) VALUES ('$name','$telef','$email','$tema','$message')";
      $result =mysqli_query($link, $query);
    if ($result)  	  
	echo 'Отправлено и занесено в б/д';
    else echo 'Отправлено, но не занесено в б/д';
}else{
	echo 'Не отправлено';
}
}
//}
?> 
</div> 
</body> 
</html>