<?php
date_default_timezone_set('America/Sao_Paulo');
$yii = dirname(__FILE__) . '/src/yii/framework/yiilite.php';
$config = dirname(__FILE__) . '/protected/config/main.php';

$ambientesDeDesenvolvimento = ['localhost'];
defined('YII_DEBUG') or define('YII_DEBUG', in_array($_SERVER['HTTP_HOST'], $ambientesDeDesenvolvimento));
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



require_once($yii);
Yii::createWebApplication($config)->run();
