<?php

define('DB_USERNAME',getenv('MYSQL_USERNAME'));
define('DB_PASSWORD',getenv('MYSQL_PASSWORD'));
define('DB_HOST',getenv('MYSQL_HOST'));
define('DB_PORT',getenv('MYSQL_PORT'));
define('DB_DATABASE',getenv('MYSQL_DATABASE'));

$con = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

if(!$con)
{
	print("Not Connected<br>".mysql_error());

}
else
{
	echo("Connected");
}


?>
