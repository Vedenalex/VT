<!DOCTYPE html> 
<html> <!-- Вариант 7  preg_match/ preg_replace-->
<head > 
<meta charset="utf-8"> 
</head> 
<body> 
<a><form  action="fourlab.php" method="post"> 
   <input type="file" name="inputfile">
<br><input type="submit" name="submit"/></a> 
</form>
<div>
<?php
if(Isset($_POST['submit'])){
$arr=array();
$temp='';
$j=0;
$str=file_get_contents(htmlspecialchars($_POST['inputfile']));
$str=$str.' ';	
for($i=0; $i<strlen($str); $i++){
	if($str[$i]!=' '){
		$temp=$temp.$str[$i];
	}else{
		$arr[$j]=$temp;
		$j++;
		$temp='';
	}
}
$count=$j;
$marr=array();
$i=0;
echo '<div style="border: 3px inset red">';
echo 'FILE:';
echo '<br>';
for($j=0; $j<$count; $j++){
if(preg_match("/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$/",$arr[$j])){
echo '<a href="mailto:'.$arr[$j].'" style="color:red" >' .$arr[$j]. '</a>'; 
echo ' ';
$marr[$i]=$arr[$j];
$i++;
} else
echo $arr[$j];
echo ' ';	
}
echo '</div>';
echo '<div style="border: 3px inset lime">';
echo 'EMAILs:';
echo '<br>';
$count=$i;
for($i=0; $i<$count; $i++){
   echo '<a href="mailto:'.$marr[$i].'" style="color:green" >' .$marr[$i]. '</a>'; 
   echo '<br>';  
}
echo '</div>';
}
?> 
</div> 
</body> 
</html>