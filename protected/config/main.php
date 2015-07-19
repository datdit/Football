<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Football',
    'defaultController' => 'home',
    'theme' => 'front',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
    ),
    'modules' => array(
    // uncomment the following to enable the Gii tool
    
      'gii'=>array(
      'class'=>'system.gii.GiiModule',
      'password'=>'123',
      // If removed, Gii defaults to localhost only. Edit carefully to taste.
      'ipFilters'=>array('127.0.0.1','::1'),
      ),
     
    ),
    // application components
    'components' => array(
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        // for image extention
        'image' => array(
            'class' => 'application.extensions.image.CImageComponent',
            'driver' => 'GD',
        ),
        // uncomment the following to enable URLs in path-format
        /*
          'urlManager'=>array(
          'urlFormat'=>'path',
          'rules'=>array(
          '<controller:\w+>/<id:\d+>'=>'<controller>/view',
          '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
          '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
          ),
          ),
         */
        'db' => array(
            //'connectionString' => 'sqlite:' . dirname(__FILE__) . '/../data/testdrive.db',
            //'connectionString' => 'mysql:host=localhost;dbname=siamwebs_pbl',
            //'username' => 'siamwebs_admin',
            //'password' => 'S123654sS$',
            'connectionString' => 'mysql:host=localhost;dbname=football',
            'username' => 'root',
            'password' => '123',
            'charset' => 'utf8',
            'emulatePrepare' => true,
            'schemaCachingDuration' => 600, // number of seconds
            'enableProfiling' => true,
            'enableParamLogging' => true, 
        ),
        // uncomment the following to use a MySQL database
        /*
          'db'=>array(
          'connectionString' => 'mysql:host=localhost;dbname=testdrive',
          'emulatePrepare' => true,
          'username' => 'root',
          'password' => '',
          'charset' => 'utf8',
          ),
         */
        // cache type
        'cache' => array(
            'class' => 'CFileCache',
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                              'web'=>array(
                                        'class'=>'CWebLogRoute',
                                        'levels'=>'trace, info, error, warning',
                                        'categories'=>'system.db.*',
                                        'showInFireBug'=>false //true/falsefirebug only - turn off otherwise
                                ),
                                'file'=>array(
                                        'class'=>'CFileLogRoute',
                                        'levels'=>'error, warning, watch',
                                        'categories'=>'system.*',
                                ),
                                'profile'=>array(
                                    'class' => 'CProfileLogRoute',
                                    'report'=>'summary',                
                                    ),
                /*
                array(
                    //'class' => 'CWebLogRoute', 'levels' => 'error, warning',
                    'class' => 'CWebLogRoute', 'levels' => 'trace, info, error, warning',
                ),
                array(
                    'class' => 'CFileLogRoute', 'levels' => 'trace, info, error, warning',
                ), // uncomment the following to show log messages on web pages
                 * 
                 */
            /*
              array(
              'class'=>'CWebLogRoute',
              ),
             */
            ),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
// using Yii::app()->params['paramName']
    'params' => array(
// this is used in contact page
        'adminEmail' => 'webmaster@example.com',
        'MyBaseURL' => 'index.php?r=',
        'fbAppId' => '440412979362688',
        //'MyBaseURL' => 'index.php?r=',
        // Add below to your config/main.php params
        'defaultPageSize' => 10,
        'pageSizeOptions' => array(10 => 10, 20 => 20, 50 => 50, 100 => 100),
    ),
);
