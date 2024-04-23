<?php
use app\core\App;
require('app/core/init.php');

$host = 'localhost';
$dbname = 'HealthInsuranceDB';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$db_conn = new \PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $user, $pass);
$db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

new App($db_conn);