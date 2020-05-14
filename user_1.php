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
$result = mysqli_query($db,"SELECT * FROM USER_1  
where USER_1 = (select max(USER_1) from USER_1)
");
while($a = mysqli_fetch_row($result)) {//peremenaya $a staet masivom. eslovie poka mysqli_fetch_row(mysqli_query($db,"SHOW TABLES FROM $cDatabase"))
	 print "<ul>
   <li>ID:&nbsp;$a[0]</li>
   <li>PRIZVISHE:&nbsp;$a[1]</li>
   <li>IMYA:&nbsp;$a[2]</li>
   <li>TELEFON:&nbsp;$a[3]</li>
   <li>EMAIL:&nbsp;$a[4]</li>
  </ul>";
}
mysqli_close($db); // закриємо з'єднання із сервером

?>
</body> 
</html>