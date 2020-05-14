<?php
$createDatabase=mysqli_connect ( "localhost", "root", "");
mysqli_query($createDatabase,"CREATE DATABASE IF NOT EXISTS SHPIONAJ;");
$db=mysqli_connect ( "localhost", "root", "","SHPIONAJ")or die ( "<p> Connection error!". mysql_error (). "</ p>");
if (!mysqli_set_charset($db, "utf8")) {
    printf("Ошибка при загрузке набора символов utf8: %s\n", mysqli_error($db));
    exit();
} else {
    mysqli_character_set_name($db);
}    
mysqli_select_db ($db,"BIATLON")or die ( "<p> Connection to DB ERROR!". mysql_error (). "</ p>") ;
$sql = "CREATE TABLE IF NOT EXISTS USER_1( 
    USER_1 INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    PRIZVISHE VARCHAR(255) NOT NULL,
	IMYA VARCHAR(255) NOT NULL,
	TELEFON VARCHAR(15) NOT NULL,
	EMAIL VARCHAR(255) NOT NULL
)
CREATE TABLE IF NOT EXISTS USER_2( 
USER_2 INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	VYZ VARCHAR(255) NOT NULL,
	SPECIALNIST VARCHAR(255) NOT NULL,
	KURS INT NOT NULL
)
CREATE TABLE IF NOT EXISTS USER_3( 
USER_3 INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
ZAHOPLENYA VARCHAR(255) NOT NULL
)"; 
if(mysqli_query($db, $sql)){
    echo "Table USER 1,2,3 created successfully. <br>";
} 
?>
