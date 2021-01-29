<?php

define( 'ROOT_URL', '127.0.0.1/Projects/tads-treasure-hunt/th/');
define( 'AUTH_LOGIN', ROOT_URL.'login.php');
define( 'AUTH_LOGOUT', ROOT_URL.'logout.php');

define( 'DB_HOST', 'localhost');
define( 'DB_NAME', 'tads_th');
define( 'DB_USER', 'tads_th');
define( 'DB_PASS', 'yXHz*z7!RnMd');
define( 'DB_CHARSET', 'utf8mb4');

// 1. Connection
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (empty($connection)){
    echo $connection->error;
}

// 2. Charset
mysqli_set_charset( $connection, DB_CHARSET);


