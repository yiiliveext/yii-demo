<?php

return [
    'mailer' => [
        'adminEmail' => 'admin@example.com',
    ],
    'yiisoft/yii-debug' => [
        'optionalRequests' => [
            '/debug**',
            '/assets/*',
        ],
        'enabled' => false,
        'collectors' => [
            'Yiisoft\\Yii\\Debug\\Collector\\LogCollectorInterface',
            'Yiisoft\\Yii\\Debug\\Collector\\EventCollectorInterface',
            'Yiisoft\\Yii\\Debug\\Collector\\ServiceCollectorInterface',
        ],
        'collectors.web' => [
            'Yiisoft\\Yii\\Debug\\Collector\\WebAppInfoCollector',
            'Yiisoft\\Yii\\Debug\\Collector\\RequestCollector',
            'Yiisoft\\Yii\\Debug\\Collector\\RouterCollector',
            'Yiisoft\\Yii\\Debug\\Collector\\MiddlewareCollector',
        ],
        'collectors.console' => [
            'Yiisoft\\Yii\\Debug\\Collector\\ConsoleAppInfoCollector',
            'Yiisoft\\Yii\\Debug\\Collector\\CommandCollector',
        ],
        'trackedServices' => [
            'Psr\\Log\\LoggerInterface' => [
                'Yiisoft\\Yii\\Debug\\Proxy\\LoggerInterfaceProxy',
                'Yiisoft\\Yii\\Debug\\Collector\\LogCollectorInterface',
            ],
            'Psr\\EventDispatcher\\EventDispatcherInterface' => [
                'Yiisoft\\Yii\\Debug\\Proxy\\EventDispatcherInterfaceProxy',
                'Yiisoft\\Yii\\Debug\\Collector\\EventCollectorInterface',
            ],
            'Yiisoft\\Router\\UrlMatcherInterface' => [
                'Yiisoft\\Yii\\Debug\\Proxy\\UrlMatcherInterfaceProxy',
                'Yiisoft\\Yii\\Debug\\Collector\\RouterCollectorInterface',
            ],
            0 => 'Yiisoft\\Cache\\CacheInterface',
        ],
        'logLevel' => 7,
        'path' => '@runtime/debug',
    ],
    'yiisoft/yii-debug-api' => [
        'enabled' => false,
        'allowedIPs' => [
            '127.0.0.1',
            '::1',
        ],
        'allowedHosts' => [],
    ],
    'yiisoft/yii-console' => [
        'commands' => [
            'debug/reset' => 'Yiisoft\\Yii\\Debug\\Command\\ResetCommand',
            'cycle/schema' => 'Yiisoft\\Yii\\Cycle\\Command\\Schema\\SchemaCommand',
            'cycle/schema/php' => 'Yiisoft\\Yii\\Cycle\\Command\\Schema\\SchemaPhpCommand',
            'cycle/schema/clear' => 'Yiisoft\\Yii\\Cycle\\Command\\Schema\\SchemaClearCommand',
            'cycle/schema/rebuild' => 'Yiisoft\\Yii\\Cycle\\Command\\Schema\\SchemaRebuildCommand',
            'migrate/create' => 'Yiisoft\\Yii\\Cycle\\Command\\Migration\\CreateCommand',
            'migrate/generate' => 'Yiisoft\\Yii\\Cycle\\Command\\Migration\\GenerateCommand',
            'migrate/up' => 'Yiisoft\\Yii\\Cycle\\Command\\Migration\\UpCommand',
            'migrate/down' => 'Yiisoft\\Yii\\Cycle\\Command\\Migration\\DownCommand',
            'migrate/list' => 'Yiisoft\\Yii\\Cycle\\Command\\Migration\\ListCommand',
            'serve' => 'Yiisoft\\Yii\\Console\\Command\\Serve',
            'user/create' => 'App\\User\\Console\\CreateCommand',
            'user/assignRole' => 'App\\User\\Console\\AssignRoleCommand',
            'fixture/add' => 'App\\Command\\Fixture\\AddCommand',
            'router/list' => 'App\\Command\\Router\\ListCommand',
        ],
        'id' => 'yii-console',
        'name' => 'Yii Console',
        'autoExit' => false,
        'version' => '3.0',
    ],
    'yiisoft/yii-cycle' => [
        'dbal' => [
            'query-logger' => null,
            'default' => 'default',
            'aliases' => [],
            'databases' => [
                'default' => [
                    'connection' => 'sqlite',
                ],
            ],
            'connections' => [
                'sqlite' => [
                    'driver' => 'Spiral\\Database\\Driver\\SQLite\\SQLiteDriver',
                    'connection' => 'sqlite:@runtime/database.db',
                    'username' => '',
                    'password' => '',
                ],
            ],
        ],
        'migrations' => [
            'directory' => '@root/migrations',
            'namespace' => 'App\\Migration',
            'table' => 'migration',
            'safe' => false,
        ],
        'orm-promise-factory' => null,
        'schema-providers' => [
            'Yiisoft\\Yii\\Cycle\\Schema\\Provider\\FromConveyorSchemaProvider' => [
                'generators' => [
                    'Cycle\\Schema\\Generator\\SyncTables',
                ],
            ],
        ],
        'annotated-entity-paths' => [
            '@src',
        ],
    ],
    'yiisoft/assets' => [
        'assetConverter' => [
            'command' => [
                'from' => 'scss',
                'to' => 'css',
                'command' => '@npm/.bin/sass {options} {from} {to}',
            ],
            'forceConvert' => false,
        ],
        'assetPublisher' => [
            'appendTimestamp' => false,
            'assetMap' => [],
            'basePath' => null,
            'baseUrl' => null,
            'forceCopy' => false,
            'linkAssets' => false,
        ],
        'assetManager' => [
            'bundles' => [],
            'register' => [],
        ],
    ],
    'yiisoft/user' => [
        'authUrl' => '/login',
        'cookieLogin' => [
            'addCookie' => false,
            'duration' => 'P5D',
        ],
    ],
    'yiisoft/aliases' => [
        'aliases' => [
            '@vendor' => '@root/vendor',
            '@public' => '@root/public',
            '@runtime' => '@root/runtime',
            '@bower' => '@vendor/bower-asset',
            '@npm' => '@root/node_modules',
            '@baseUrl' => '/',
            '@root' => 'C:\\usr\\www\\yii-dev-tool\\dev\\yii-demo',
            '@views' => '@root/views',
            '@resources' => '@root/resources',
            '@src' => '@root/src',
            '@assets' => '@public/assets',
            '@assetsUrl' => '@baseUrl/assets',
        ],
    ],
    'yiisoft/router-fastroute' => [
        'enableCache' => false,
        'encodeRaw' => true,
    ],
    'yiisoft/profiler' => [
        'targets' => [
            'Yiisoft\\Profiler\\Target\\LogTarget' => [
                'include' => [],
                'exclude' => [],
                'enabled' => true,
                'level' => 'debug',
            ],
            'Yiisoft\\Profiler\\Target\\FileTarget' => [
                'include' => [],
                'exclude' => [],
                'enabled' => false,
                'requestBeginTime' => 1615979286.637695,
                'filename' => '@runtime/profiling/{date}-{time}.txt',
                'directoryMode' => 509,
            ],
        ],
    ],
    'yiisoft/view' => [
        'basePath' => '@views',
        'defaultParameters' => [
            'assetManager' => unserialize('O:37:"Yiisoft\\Factory\\Definitions\\Reference":1:{s:41:"' . "\0" . 'Yiisoft\\Factory\\Definitions\\Reference' . "\0" . 'id";s:27:"Yiisoft\\Assets\\AssetManager";}'),
            'urlGenerator' => unserialize('O:37:"Yiisoft\\Factory\\Definitions\\Reference":1:{s:41:"' . "\0" . 'Yiisoft\\Factory\\Definitions\\Reference' . "\0" . 'id";s:36:"Yiisoft\\Router\\UrlGeneratorInterface";}'),
            'urlMatcher' => unserialize('O:37:"Yiisoft\\Factory\\Definitions\\Reference":1:{s:41:"' . "\0" . 'Yiisoft\\Factory\\Definitions\\Reference' . "\0" . 'id";s:34:"Yiisoft\\Router\\UrlMatcherInterface";}'),
        ],
        'theme' => [
            'pathMap' => [],
            'basePath' => '',
            'baseUrl' => '',
        ],
    ],
    'yiisoft/log-target-file' => [
        'fileTarget' => [
            'file' => '@runtime/logs/app.log',
            'levels' => [
                'emergency',
                'error',
                'warning',
                'info',
                'debug',
            ],
            'dirMode' => 493,
            'fileMode' => null,
        ],
        'fileRotator' => [
            'maxFileSize' => 10240,
            'maxFiles' => 5,
            'fileMode' => null,
            'rotateByCopy' => null,
            'compressRotatedFiles' => false,
        ],
    ],
    'yiisoft/cache-file' => [
        'fileCache' => [
            'path' => '@runtime/cache',
        ],
    ],
    'yiisoft/yii-view' => [
        'viewBasePath' => '@views',
        'layout' => '@views/layout/main',
        'injections' => [
            unserialize('O:37:"Yiisoft\\Factory\\Definitions\\Reference":1:{s:41:"' . "\0" . 'Yiisoft\\Factory\\Definitions\\Reference' . "\0" . 'id";s:38:"App\\ViewInjection\\ContentViewInjection";}'),
            unserialize('O:37:"Yiisoft\\Factory\\Definitions\\Reference":1:{s:41:"' . "\0" . 'Yiisoft\\Factory\\Definitions\\Reference' . "\0" . 'id";s:34:"Yiisoft\\Yii\\View\\CsrfViewInjection";}'),
            unserialize('O:37:"Yiisoft\\Factory\\Definitions\\Reference":1:{s:41:"' . "\0" . 'Yiisoft\\Factory\\Definitions\\Reference' . "\0" . 'id";s:37:"App\\ViewInjection\\LayoutViewInjection";}'),
            unserialize('O:37:"Yiisoft\\Factory\\Definitions\\Reference":1:{s:41:"' . "\0" . 'Yiisoft\\Factory\\Definitions\\Reference' . "\0" . 'id";s:39:"App\\ViewInjection\\LinkTagsViewInjection";}'),
            unserialize('O:37:"Yiisoft\\Factory\\Definitions\\Reference":1:{s:41:"' . "\0" . 'Yiisoft\\Factory\\Definitions\\Reference' . "\0" . 'id";s:39:"App\\ViewInjection\\MetaTagsViewInjection";}'),
        ],
    ],
    'yiisoft/form' => [
        'bootstrap5' => [
            'enabled' => true,
            'fieldConfig' => [
                'enclosedByContainer()' => [
                    true,
                    [
                        'class' => 'mb-3',
                    ],
                ],
                'errorCssClass()' => [
                    'is-invalid',
                ],
                'errorOptions()' => [
                    [
                        'class' => 'text-danger fst-italic',
                    ],
                ],
                'hintOptions()' => [
                    [
                        'class' => 'form-text',
                    ],
                ],
                'inputCssClass()' => [
                    'form-control',
                ],
                'labelOptions()' => [
                    [
                        'class' => 'form-label',
                    ],
                ],
                'successCssClass()' => [
                    'is-valid',
                ],
            ],
        ],
    ],
    'yiisoft/session' => [
        'session' => [
            'options' => [
                'cookie_secure' => 0,
            ],
            'handler' => null,
        ],
    ],
    'yiisoft/mailer' => [
        'messageBodyTemplate' => [
            'viewPath' => '@resources/mail',
        ],
        'fileMailer' => [
            'fileMailerStorage' => '@runtime/mail',
        ],
        'useSendmail' => false,
        'writeToFiles' => true,
    ],
    'swiftmailer/swiftmailer' => [
        'SwiftSmtpTransport' => [
            'host' => 'smtp.example.com',
            'port' => 25,
            'encryption' => null,
            'username' => 'admin@example.com',
            'password' => '',
        ],
    ],
    'yiisoft/csrf' => [
        'hmacToken' => [
            'secretKey' => '',
            'algorithm' => 'sha256',
            'lifetime' => null,
        ],
    ],
];