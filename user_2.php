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
$result = mysqli_query($db,"SELECT * FROM USER_2  
where USER_2 = (select max(USER_2) from USER_2)");
while($a = mysqli_fetch_row($result)) {//peremenaya $a staet masivom. eslovie poka mysqli_fetch_row(mysqli_query($db,"SHOW TABLES FROM $cDatabase"))
	 print "<ul>
   <li>ID:&nbsp;$a[0]</li>
   <li>VYZ:&nbsp;$a[1]</li>
   <li>SPECIALNIST:&nbsp;$a[2]</li>
   <li>KURS:&nbsp;$a[3]</li>
  </ul>";
}
mysqli_close($db); // закриємо з'єднання із сервером

?>
</body> 
</html>