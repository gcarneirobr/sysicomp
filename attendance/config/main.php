<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-attendance',
    'basePath' => dirname(__DIR__),
    'sourceLanguage' => 'pt-Br',
    'language' => 'pt-Br',
    //'timeZone' => 'America/Manaus',
    'bootstrap' => ['log'],
    'controllerNamespace' => 'attendance\controllers',
    'components' => [
        'session' => [
            'name' => 'PHPATTENDANCESESSID',
            'savePath' => sys_get_temp_dir(),
        ],
		'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
			'identityCookie' => [
                'name' => '_attendanceUser', // unique for backend
            ]
        ],

        'view' => [
             'theme' => [
                 'pathMap' => [
                    //'@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app/'
                    '@app/views' => '@attendance/views/adminLTE/yiisoft/yii2-app/'
                 ],
             ],
        ],


        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'params' => $params,
];
