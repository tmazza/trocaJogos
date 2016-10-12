<?php

require(dirname(__FILE__) . '/__config.php');

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => "SwapMeet",
    'defaultController' => 'site',
    'preload' => array('log'),
    'import' => array(
        'application.helpers.*',
        'application.models.*',
        'application.components.*',
    ),
    'language' => 'pt_br',
    'components' => array(
       'user' => array(
            'allowAutoLogin' => true,
            'loginUrl' => '/site/login',
        ),
        'db'          => require(dirname(__FILE__) . '/database.php'),
        'errorHandler' => array(
            'errorAction' => '/site/error',
        ),
    ),
);
