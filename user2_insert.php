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
/*
CREATE TABLE IF NOT EXISTS USER_2( 
USER_2 INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	VYZ VARCHAR(255) NOT NULL,
	SPECIALNIST VARCHAR(255) NOT NULL,
	KURS INT NOT NULL
*/

$VYZ=$_POST['VYZ']; 
$SPECIALNIST=$_POST['SPECIALNIST'];
$KURS=$_POST['KURS'];
$sql = "INSERT INTO USER_2  VALUES (NULL,
 '$VYZ',
 '$SPECIALNIST',
  '$KURS')"; 
mysqli_query($db,$sql); // виконуємо запит
$result = mysqli_query($db,"SELECT * FROM USER_2  
where USER_2 = (select max(USER_2) from USER_2)");
echo "<table>
<tr>
<td>ID</td>
<td>VYZ</td>
<td>SPECIALNIST</td>
<td>KURS</td>
</tr>";
while($a = mysqli_fetch_row($result)) {//peremenaya $a staet masivom. eslovie poka mysqli_fetch_row(mysqli_query($db,"SHOW TABLES FROM $cDatabase"))
print "<tr>
<td>&nbsp;$a[0]</td>
<td>&nbsp;$a[1]</td>
<td>&nbsp;$a[2]</td>
<td>&nbsp;$a[3]</td>
</tr>";
}echo "</table>";//!!!!!!!!!!!!!!!!!!!
mysqli_close($db); // закриємо з'єднання із сервером
include 'redirect.php';//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
</body> 
</html>