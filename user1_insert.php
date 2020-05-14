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
CREATE TABLE IF NOT EXISTS USER_1( 
    USER_1 INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    PRIZVISHE VARCHAR(255) NOT NULL,
	IMYA VARCHAR(255) NOT NULL,
	TELEFON VARCHAR(15) NOT NULL,
	EMAIL VARCHAR(255) NOT NULL
);
*/

$PRIZVISHE=$_POST['PRIZVISHE']; 
$IMYA=$_POST['IMYA'];
$TELEFON=$_POST['TELEFON'];
$EMAIL=$_POST['EMAIL'];
$sql = "INSERT INTO USER_1  VALUES (NULL,
 '$PRIZVISHE',
 '$IMYA',
  '$TELEFON',
 '$EMAIL')"; 
mysqli_query($db,$sql); // виконуємо запит
$result = mysqli_query($db,"SELECT * FROM USER_1  
where USER_1 = (select max(USER_1) from USER_1)
");
echo "<table>
<tr>
<td>ID</td>
<td>PRIZVISHE</td>
<td>IMYA</td>
<td>TELEFON</td>
<td>EMAIL</td>
</tr>";
while($a = mysqli_fetch_row($result)) {//peremenaya $a staet masivom. eslovie poka mysqli_fetch_row(mysqli_query($db,"SHOW TABLES FROM $cDatabase"))
print "<tr>
<td>&nbsp;$a[0]</td>
<td>&nbsp;$a[1]</td>
<td>&nbsp;$a[2]</td>
<td>&nbsp;$a[3]</td>
<td>&nbsp;$a[4]</td>
</tr>";
}echo "</table>";//!!!!!!!!!!!!!!!!!!!
mysqli_close($db); // закриємо з'єднання із сервером
include 'redirect.php';//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
</body> 
</html>