<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

Yii::setPathOfAlias('booster',dirname(__FILE__).'/../extensions/booster');
setlocale(LC_MONETARY, 'pt_BR');

return array(
        'sourceLanguage' => 'pt_br',
        'language' => 'pt_br',
	'basePath' => dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name' => 'AGIC',
        'theme' => 'bootstrap',
        
	// preloading 'log' component
	'preload'=>array('log','bootstrap'),
	// autoloading model and component classes
	'import'=>array(
            'application.models.*',
            'application.components.*',
	),

	'modules'=>array(
            // uncomment the following to enable the Gii tool
            'gii'=>array(
                'generatorPaths' => array(
                    'booster.gii'
                ),
                'class'=>'system.gii.GiiModule',
                'password'=>'root',
                // If removed, Gii defaults to localhost only. Edit carefully to taste.
                'ipFilters'=>array('127.0.0.1','::1'),
            ),
	),

	// application components
	'components'=>array(
                'bootstrap' => array(
                    'class' => 'booster.components.Booster',
                ),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
                        'showScriptName'=>false,
                        'caseSensitive'=>false,  
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
		'db'=>array(
//			'connectionString' => 'sqlsrv:Server=Vanderson-PC\MSSQLSERVER;Database=agic',
//			'emulatePrepare' => FALSE,
                        'connectionString' => 'sqlsrv:Server=localhost;Database=DW_AGIC',
			'username' => 'agic',
			'password' => 'agic',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		'adminEmail'=>'vann.nunes@gmail.com',
	),
);