<html>
<head>
<meta http-equiv="content-type"  content="text/html; charset=utf-8">
</head>
<body>
<?php 
error_reporting(-1);//!!!
header('Content-Type: text/html; charset=utf-8');//!!!
require 'connect.php';
mysqli_select_db ($db,'SHPIONAJ');
mysqli_query($db,$sql); // виконуємо запит
$result = mysqli_query($db,"SELECT * FROM USER_3  
where USER_3 = (select max(USER_3) from USER_3)");
while($a = mysqli_fetch_row($result)) {//peremenaya $a staet masivom. eslovie poka mysqli_fetch_row(mysqli_query($db,"SHOW TABLES FROM $cDatabase"))
	 print "<ul>
   <li>ID:&nbsp;$a[0]</li>
   <li>ZAHOPLENYA:&nbsp;$a[1]</li>
  </ul>";
}
mysqli_close($db); // закриємо з'єднання із сервером

?>
</body> 
</html>