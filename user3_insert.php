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
CREATE TABLE IF NOT EXISTS USER_3( 
USER_3 INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
ZAHOPLENYA VARCHAR(255) NOT NULL
*/

$ZAHOPLENYA=$_POST['ZAHOPLENYA']; 
$sql = "INSERT INTO USER_3  VALUES (NULL,'$ZAHOPLENYA')"; 
mysqli_query($db,$sql); // виконуємо запит
$result = mysqli_query($db,"SELECT * FROM USER_3  
where USER_3 = (select max(USER_3) from USER_3)");
echo "<table>
<tr>
<td>ID</td>
<td>ZAHOPLENYA</td>
</tr>";
while($a = mysqli_fetch_row($result)) {//peremenaya $a staet masivom. eslovie poka mysqli_fetch_row(mysqli_query($db,"SHOW TABLES FROM $cDatabase"))
print "<tr>
<td>&nbsp;$a[0]</td>
<td>&nbsp;$a[1]</td>
</tr>";
}echo "</table>";//!!!!!!!!!!!!!!!!!!!
mysqli_close($db); // закриємо з'єднання із сервером
include 'redirect.php';//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
</body> 
</html>