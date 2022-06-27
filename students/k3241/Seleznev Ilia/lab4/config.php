<?php

use PDO;
 
/** @var string название базы данных */
$dbname = 'u1699489_band';
/** @var string имя пользователя */
$username = 'u1699489';
/** @var string пароль пользователя */
$password = 'Band123';
/** @var string адрес базы данных */
$host = 'localhost';
/** @var int порт доступа к базе данных */
$port = 5432;
/** @var array дополнительные опции соединения с базой данных */
$options = [];
 
/** @var string формируем dsn для подключения */
$dsn = 'pgsql:host='.$host.';port='.$port.';dbname='.$dbname;
/** @var PDO подключение к базе данных */
$db = new PDO($dsn,$username,$password, $options);

?>