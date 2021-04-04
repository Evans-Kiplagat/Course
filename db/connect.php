<?php
define('username', 'root');
define('password', '');
define('Server', 'localhost');
define('databaseName', 'coursedb');

$conn =mysqli_connect(Server,username,password,databaseName);
if ($conn) {
    echo "successful connected";	
}else{
	echo "something went wrong".mysqli_connect_error();
}



