<?php
// set error reporting on to help with debugging
error_reporting(E_ALL);
ini_set('display_errors','1');

/* note: connection for cloud9 ... you will need to modify for your own environment */
$ip = getenv('IP');
$port = '3306';

// already changed this to connect to travel database
define('DBCONNECTION1', "mysql:host=$ip;port=$port;dbname=travel;charset=utf8mb4;");
define('DBUSER1', 'testuser');
define('DBPASS1', 'mypassword');

// auto load all classes so we don't have to explicitly include them
spl_autoload_register(function ($class) {
 $file = 'classes/' . $class . '.class.php';
 if (file_exists($file))
 include $file;
});
// connect to the database !!!What does a static method do
$connection = DatabaseHelper::createConnectionInfo(array(DBCONNECTION1, DBUSER1, DBPASS1));

// we can then pass this connection variable to other classes that need it

?>
