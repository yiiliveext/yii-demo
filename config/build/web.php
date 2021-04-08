<?php
$config = new class() {
	public function get($config)
	{
		return require $config . '.php';
	}
};

$params = require 'params.php';

return [
    'Yiisoft\\Rbac\\StorageInterface' => [
        '__class' => 'Yiisoft\\Rbac\\Php\\Storage',
        '__construct()' => [
            'directory' => 'C:\\usr\\www\\yii-dev-tool\\dev\\yii-demo\\resources\\rbac',
        ],
    ],
    'Yiisoft\\Rbac\\RuleFactoryInterface' => 'Yiisoft\\Rbac\\RuleFactory\\ClassNameRuleFactory',
    'Yiisoft\\Access\\AccessCheckerInterface' => 'Yiisoft\\Rbac\\Manager',
    'Yiisoft\\Router\\RouteCollectionInterface' => static function (\Yiisoft\Router\RouteCollectorInterface $collector) use ($config) {        $collector            ->middleware(\Yiisoft\Csrf\CsrfMiddleware::class)            ->middleware(\Yiisoft\DataResponse\Middleware\FormatDataResponse::class)            ->addGroup(                \Yiisoft\Router\Group::create(null)                    ->routes(...$config->get('routes'))            );        return new \Yiisoft\Router\RouteCollection($collector);    },
    'Yiisoft\\Cache\\File\\FileCache' => static fn (\Yiisoft\Aliases\Aliases $aliases) => new \Yiisoft\Cache\File\FileCache(        $aliases->get($params['yiisoft/cache-file']['fileCache']['path'])    ),
    'Psr\\Log\\LoggerInterface' => static fn (\Yiisoft\Log\Target\File\FileTarget $fileTarget) => new \Yiisoft\Log\Logger([$fileTarget]),
    'Yiisoft\\Log\\Target\\File\\FileRotatorInterface' => [
        '__class' => 'Yiisoft\\Log\\Target\\File\\FileRotator',
        '__construct()' => [
            10240,
            5,
            null,
            null,
            false,
        ],
    ],
    'Yiisoft\\Log\\Target\\File\\FileTarget' => static function (\Yiisoft\Aliases\Aliases $aliases, \Yiisoft\Log\Target\File\FileRotatorInterface $fileRotator) use ($params) {        $fileTarget = new \Yiisoft\Log\Target\File\FileTarget(            $aliases->get($params['yiisoft/log-target-file']['fileTarget']['file']),            $fileRotator,            $params['yiisoft/log-target-file']['fileTarget']['dirMode'],            $params['yiisoft/log-target-file']['fileTarget']['fileMode'],        );        $fileTarget->setLevels($params['yiisoft/log-target-file']['fileTarget']['levels']);        return $fileTarget;    },
    'Yiisoft\\Mailer\\MessageBodyRenderer' => [
        '__class' => 'Yiisoft\\Mailer\\MessageBodyRenderer',
        '__construct()' => [
            unserialize('O:37:"Yiisoft\\Factory\\Definitions\\Reference":1:{s:41:"' . "\0" . 'Yiisoft\\Factory\\Definitions\\Reference' . "\0" . 'id";s:17:"Yiisoft\\View\\View";}'),
            static fn (\Yiisoft\Aliases\Aliases $aliases) => new \Yiisoft\Mailer\MessageBodyTemplate(                        $aliases->get($params['yiisoft/mailer']['messageBodyTemplate']['viewPath']),                    ),
        ],
    ],
    'Yiisoft\\Mailer\\MessageFactoryInterface' => [
        '__class' => 'Yiisoft\\Mailer\\MessageFactory',
        '__construct()' => [
            'Yiisoft\\Mailer\\SwiftMailer\\Message',
        ],
    ],
    'Swift_SmtpTransport' => [
        '__class' => 'Swift_SmtpTransport',
        '__construct()' => [
            'smtp.example.com',
            25,
            null,
        ],
        'setUsername()' => [
            'admin@example.com',
        ],
        'setPassword()' => [
            '',
        ],
    ],
    'Swift_Transport' => 'Swift_SmtpTransport',
    'Yiisoft\\Mailer\\FileMailer' => [
        '__class' => 'Yiisoft\\Mailer\\FileMailer',
        '__construct()' => [
            'path' => fn (\Yiisoft\Aliases\Aliases $aliases) => $aliases->get(                        $params['yiisoft/mailer']['fileMailer']['fileMailerStorage']                    ),
        ],
    ],
    'Yiisoft\\Mailer\\MailerInterface' => 'Yiisoft\\Mailer\\FileMailer',
    'Spiral\\Database\\DatabaseManager' => unserialize('O:37:"Yiisoft\\Yii\\Cycle\\Factory\\DbalFactory":3:{s:49:"' . "\0" . 'Yiisoft\\Yii\\Cycle\\Factory\\DbalFactory' . "\0" . 'dbalConfig";a:4:{s:7:"default";s:7:"default";s:7:"aliases";a:0:{}s:9:"databases";a:1:{s:7:"default";a:1:{s:10:"connection";s:6:"sqlite";}}s:11:"connections";a:1:{s:6:"sqlite";a:4:{s:6:"driver";s:42:"Spiral\\Database\\Driver\\SQLite\\SQLiteDriver";s:10:"connection";s:27:"sqlite:@runtime/database.db";s:8:"username";s:0:"";s:8:"password";s:0:"";}}}s:45:"' . "\0" . 'Yiisoft\\Yii\\Cycle\\Factory\\DbalFactory' . "\0" . 'logger";N;s:48:"' . "\0" . 'Yiisoft\\Yii\\Cycle\\Factory\\DbalFactory' . "\0" . 'container";N;}'),
    'Spiral\\Database\\DatabaseProviderInterface' => static function (\Psr\Container\ContainerInterface $container) {        return $container->get(\Spiral\Database\DatabaseManager::class);    },
    'Cycle\\ORM\\ORMInterface' => unserialize('O:36:"Yiisoft\\Yii\\Cycle\\Factory\\OrmFactory":1:{s:52:"' . "\0" . 'Yiisoft\\Yii\\Cycle\\Factory\\OrmFactory' . "\0" . 'promiseFactory";N;}'),
    'Spiral\\Core\\FactoryInterface' => static function (\Psr\Container\ContainerInterface $container) {        return new \Yiisoft\Yii\Cycle\Factory\CycleDynamicFactory($container->get(\Yiisoft\Injector\Injector::class));    },
    'Cycle\\ORM\\FactoryInterface' => static function (\Psr\Container\ContainerInterface $container) {        return new \Cycle\ORM\Factory(            $container->get(\Spiral\Database\DatabaseManager::class),            null,            $container->get(\Spiral\Core\FactoryInterface::class),            $container        );    },
    'Yiisoft\\Yii\\Cycle\\Schema\\SchemaProviderInterface' => static function (\Psr\Container\ContainerInterface $container) use (&$params) {        return (new \Yiisoft\Yii\Cycle\Schema\Provider\Support\SchemaProviderPipeline($container))->withConfig($params['yiisoft/yii-cycle']['schema-providers']);    },
    'Cycle\\ORM\\SchemaInterface' => static function (\Psr\Container\ContainerInterface $container) {        $schema = $container->get(\Yiisoft\Yii\Cycle\Schema\SchemaProviderInterface::class)->read();        if ($schema === null) {            throw new \Yiisoft\Yii\Cycle\Exception\SchemaWasNotProvidedException();        }        return new \Cycle\ORM\Schema($schema);    },
    'Yiisoft\\Yii\\Cycle\\Schema\\SchemaConveyorInterface' => static function (\Psr\Container\ContainerInterface $container) use (&$params) {        $conveyor = new \Yiisoft\Yii\Cycle\Schema\Conveyor\AnnotatedSchemaConveyor($container);        $conveyor->addEntityPaths($params['yiisoft/yii-cycle']['annotated-entity-paths']);        return $conveyor;    },
    'Psr\\SimpleCache\\CacheInterface' => 'Yiisoft\\Cache\\File\\FileCache',
    'Yiisoft\\Cache\\CacheInterface' => 'Yiisoft\\Cache\\Cache',
    'Psr\\EventDispatcher\\EventDispatcherInterface' => 'Yiisoft\\EventDispatcher\\Dispatcher\\Dispatcher',
    'Psr\\EventDispatcher\\ListenerProviderInterface' => 'Yiisoft\\EventDispatcher\\Provider\\Provider',
    'Yiisoft\\Profiler\\ProfilerInterface' => static function (\Psr\Container\ContainerInterface $container, \Psr\Log\LoggerInterface $logger) use ($params) {        $params = $params['yiisoft/profiler'];        $targets = [];        foreach ($params['targets'] as $target => $targetParams) {            $targets[] = $container->get($target);        }        return new \Yiisoft\Profiler\Profiler($logger, $targets);    },
    'Yiisoft\\Profiler\\Target\\LogTarget' => static function (\Psr\Log\LoggerInterface $logger) use ($params) {        $params = $params['yiisoft/profiler']['targets'][\Yiisoft\Profiler\Target\LogTarget::class];        $target = new \Yiisoft\Profiler\Target\LogTarget($logger, $params['level']);        if ((bool)$params['enabled']) {            $target = $target->enable();        } else {            $target = $target->disable();        }        return $target->include($params['include'])->exclude($params['exclude']);    },
    'Yiisoft\\Profiler\\Target\\FileTarget' => static function (\Yiisoft\Aliases\Aliases $aliases) use ($params) {        $params = $params['yiisoft/profiler']['targets'][\Yiisoft\Profiler\Target\FileTarget::class];        $target = new \Yiisoft\Profiler\Target\FileTarget($aliases->get($params['filename']), $params['requestBeginTime'], $params['directoryMode']);        if ((bool)$params['enabled']) {            $target = $target->enable();        } else {            $target = $target->disable();        }        return $target->include($params['include'])->exclude($params['exclude']);    },
    'Yiisoft\\Yii\\Filesystem\\FilesystemInterface' => static function () use ($params) {        $aliases = $params['yiisoft/aliases']['aliases'] ?? [];        if (!isset($aliases['@root'])) {            throw new \RuntimeException('Alias of the root directory is not defined.');        }        $adapter = new \League\Flysystem\Local\LocalFilesystemAdapter(            $aliases['@root'],            \League\Flysystem\UnixVisibility\PortableVisibilityConverter::fromArray([                'file' => [                    'public' => 0644,                    'private' => 0600,                ],                'dir' => [                    'public' => 0755,                    'private' => 0700,                ],            ]),            LOCK_EX,            \League\Flysystem\Local\LocalFilesystemAdapter::DISALLOW_LINKS        );        return new \Yiisoft\Yii\Filesystem\Filesystem($adapter, $aliases);    },
    'Yiisoft\\Yii\\Filesystem\\FileStorageConfigs' => static fn () => new \Yiisoft\Yii\Filesystem\FileStorageConfigs($params['file.storage'] ?? []),
    'Yiisoft\\Aliases\\Aliases' => [
        '__class' => 'Yiisoft\\Aliases\\Aliases',
        '__construct()' => [
            [
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
    ],
    'Yiisoft\\Validator\\ValidatorInterface' => 'Yiisoft\\Validator\\Validator',
    'Yiisoft\\Validator\\FormatterInterface' => 'Yiisoft\\Validator\\Formatter',
    'Yiisoft\\View\\View' => [
        '__class' => 'Yiisoft\\View\\View',
        '__construct()' => [
            'basePath' => static fn (\Yiisoft\Aliases\Aliases $aliases) => $aliases->get($params['yiisoft/view']['basePath']),
        ],
        'setDefaultParameters()' => [
            [
                'assetManager' => unserialize('O:37:"Yiisoft\\Factory\\Definitions\\Reference":1:{s:41:"' . "\0" . 'Yiisoft\\Factory\\Definitions\\Reference' . "\0" . 'id";s:27:"Yiisoft\\Assets\\AssetManager";}'),
                'urlGenerator' => unserialize('O:37:"Yiisoft\\Factory\\Definitions\\Reference":1:{s:41:"' . "\0" . 'Yiisoft\\Factory\\Definitions\\Reference' . "\0" . 'id";s:36:"Yiisoft\\Router\\UrlGeneratorInterface";}'),
                'urlMatcher' => unserialize('O:37:"Yiisoft\\Factory\\Definitions\\Reference":1:{s:41:"' . "\0" . 'Yiisoft\\Factory\\Definitions\\Reference' . "\0" . 'id";s:34:"Yiisoft\\Router\\UrlMatcherInterface";}'),
            ],
        ],
    ],
    'Yiisoft\\Router\\RouteCollectorInterface' => unserialize('O:20:"Yiisoft\\Router\\Group":7:{s:8:"' . "\0" . '*' . "\0" . 'items";a:0:{}s:9:"' . "\0" . '*' . "\0" . 'prefix";N;s:24:"' . "\0" . '*' . "\0" . 'middlewareDefinitions";a:0:{}s:33:"' . "\0" . 'Yiisoft\\Router\\Group' . "\0" . 'routesAdded";b:0;s:37:"' . "\0" . 'Yiisoft\\Router\\Group' . "\0" . 'middlewareAdded";b:0;s:51:"' . "\0" . 'Yiisoft\\Router\\Group' . "\0" . 'disabledMiddlewareDefinitions";a:0:{}s:32:"' . "\0" . 'Yiisoft\\Router\\Group' . "\0" . 'dispatcher";N;}'),
    'Yiisoft\\Router\\UrlGeneratorInterface' => [
        '__class' => 'Yiisoft\\Router\\FastRoute\\UrlGenerator',
        'setEncodeRaw()' => [
            true,
        ],
    ],
    'Yiisoft\\Yii\\Web\\Application' => [
        '__construct()' => [
            'dispatcher' => static function (\Yiisoft\Injector\Injector $injector) {                        return ($injector->make(\Yiisoft\Middleware\Dispatcher\MiddlewareDispatcher::class))                            ->withMiddlewares(                                [                                    \Yiisoft\Router\Middleware\Router::class,                                    \Yiisoft\Session\SessionMiddleware::class,                                    \Yiisoft\ErrorHandler\Middleware\ErrorCatcher::class,                                ]                            );                    },
            'fallbackHandler' => unserialize('O:37:"Yiisoft\\Factory\\Definitions\\Reference":1:{s:41:"' . "\0" . 'Yiisoft\\Factory\\Definitions\\Reference' . "\0" . 'id";s:27:"App\\Handler\\NotFoundHandler";}'),
        ],
    ],
    'App\\Blog\\Comment\\CommentService' => static function (\Psr\Container\ContainerInterface $container) {        /**         * @var CommentRepository $repository         */        $repository = $container->get(\Cycle\ORM\ORMInterface::class)->getRepository(\App\Blog\Entity\Comment::class);        return new \App\Blog\Comment\CommentService($repository);    },
    'App\\Contact\\ContactMailer' => [
        '__class' => 'App\\Contact\\ContactMailer',
        '__construct()' => [
            'to' => 'admin@example.com',
        ],
    ],
    'Yiisoft\\Auth\\IdentityRepositoryInterface' => static function (\Psr\Container\ContainerInterface $container) {        return $container->get(\Cycle\ORM\ORMInterface::class)->getRepository(\App\User\User::class);    },
    'Psr\\Http\\Message\\RequestFactoryInterface' => 'HttpSoft\\Message\\RequestFactory',
    'Psr\\Http\\Message\\ServerRequestFactoryInterface' => 'HttpSoft\\Message\\ServerRequestFactory',
    'Psr\\Http\\Message\\ResponseFactoryInterface' => 'HttpSoft\\Message\\ResponseFactory',
    'Psr\\Http\\Message\\StreamFactoryInterface' => 'HttpSoft\\Message\\StreamFactory',
    'Psr\\Http\\Message\\UriFactoryInterface' => 'HttpSoft\\Message\\UriFactory',
    'Psr\\Http\\Message\\UploadedFileFactoryInterface' => 'HttpSoft\\Message\\UploadedFileFactory',
    'Yiisoft\\ErrorHandler\\ThrowableRendererInterface' => 'Yiisoft\\ErrorHandler\\Renderer\\HtmlRenderer',
    'Yiisoft\\User\\UserAuth' => [
        '__class' => 'Yiisoft\\User\\UserAuth',
        'withAuthUrl()' => [
            '/login',
        ],
    ],
    'Yiisoft\\Auth\\AuthenticationMethodInterface' => 'Yiisoft\\User\\UserAuth',
    'Yiisoft\\User\\Login\\Cookie\\CookieLoginMiddleware' => [
        '__construct()' => [
            'addCookie' => false,
        ],
    ],
    'Yiisoft\\User\\Login\\Cookie\\CookieLogin' => [
        '__construct()' => [
            'duration' => unserialize('O:12:"DateInterval":16:{s:1:"y";i:0;s:1:"m";i:0;s:1:"d";i:5;s:1:"h";i:0;s:1:"i";i:0;s:1:"s";i:0;s:1:"f";d:0;s:7:"weekday";i:0;s:16:"weekday_behavior";i:0;s:17:"first_last_day_of";i:0;s:6:"invert";i:0;s:4:"days";b:0;s:12:"special_type";i:0;s:14:"special_amount";i:0;s:21:"have_weekday_relative";i:0;s:21:"have_special_relative";i:0;}'),
        ],
    ],
    'Yiisoft\\Form\\Widget\\Field' => fn () => \Yiisoft\Form\Widget\Field::Widget($params['yiisoft/form']['bootstrap5']['fieldConfig']),
    'Yiisoft\\Yii\\Debug\\Api\\Repository\\CollectorRepositoryInterface' => static fn (\Yiisoft\Yii\Debug\Storage\StorageInterface $storage) => new \Yiisoft\Yii\Debug\Api\Repository\CollectorRepository($storage),
    'Yiisoft\\Assets\\AssetConverterInterface' => [
        '__class' => 'Yiisoft\\Assets\\AssetConverter',
        'setCommand()' => [
            'scss',
            'css',
            '@npm/.bin/sass {options} {from} {to}',
        ],
        'setForceConvert()' => [
            false,
        ],
    ],
    'Yiisoft\\Assets\\AssetLoaderInterface' => [
        '__class' => 'Yiisoft\\Assets\\AssetLoader',
        'setAppendTimestamp()' => [
            false,
        ],
        'setAssetMap()' => [
            [],
        ],
        'setBasePath()' => [
            null,
        ],
        'setBaseUrl()' => [
            null,
        ],
    ],
    'Yiisoft\\Assets\\AssetPublisherInterface' => [
        '__class' => 'Yiisoft\\Assets\\AssetPublisher',
        'setForceCopy()' => [
            false,
        ],
        'setLinkAssets()' => [
            false,
        ],
    ],
    'Yiisoft\\Assets\\AssetManager' => [
        '__class' => 'Yiisoft\\Assets\\AssetManager',
        '__construct()' => [
            unserialize('O:37:"Yiisoft\\Factory\\Definitions\\Reference":1:{s:41:"' . "\0" . 'Yiisoft\\Factory\\Definitions\\Reference' . "\0" . 'id";s:23:"Yiisoft\\Aliases\\Aliases";}'),
            unserialize('O:37:"Yiisoft\\Factory\\Definitions\\Reference":1:{s:41:"' . "\0" . 'Yiisoft\\Factory\\Definitions\\Reference' . "\0" . 'id";s:35:"Yiisoft\\Assets\\AssetLoaderInterface";}'),
            [],
            [],
        ],
        'setPublisher()' => [
            unserialize('O:37:"Yiisoft\\Factory\\Definitions\\Reference":1:{s:41:"' . "\0" . 'Yiisoft\\Factory\\Definitions\\Reference' . "\0" . 'id";s:38:"Yiisoft\\Assets\\AssetPublisherInterface";}'),
        ],
        'setConverter()' => [
            unserialize('O:37:"Yiisoft\\Factory\\Definitions\\Reference":1:{s:41:"' . "\0" . 'Yiisoft\\Factory\\Definitions\\Reference' . "\0" . 'id";s:38:"Yiisoft\\Assets\\AssetConverterInterface";}'),
        ],
        'register()' => [
            [],
        ],
    ],
    'Yiisoft\\Session\\SessionInterface' => [
        '__class' => 'Yiisoft\\Session\\Session',
        '__construct()' => [
            [
                'cookie_secure' => 0,
            ],
            null,
        ],
    ],
    'Yiisoft\\Session\\Flash\\FlashInterface' => 'Yiisoft\\Session\\Flash\\Flash',
    'Yiisoft\\EventDispatcher\\Provider\\ListenerCollection' => static fn (\Yiisoft\Yii\Event\ListenerCollectionFactory $factory) => $factory->create($config->get('events-web')),
    'Yiisoft\\Yii\\View\\ViewRenderer' => [
        '__construct()' => [
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
    ],
    'Yiisoft\\Csrf\\CsrfTokenInterface' => [
        '__class' => 'Yiisoft\\Csrf\\MaskedCsrfToken',
        '__construct()' => [
            'token' => unserialize('O:37:"Yiisoft\\Factory\\Definitions\\Reference":1:{s:41:"' . "\0" . 'Yiisoft\\Factory\\Definitions\\Reference' . "\0" . 'id";s:47:"Yiisoft\\Csrf\\Synchronizer\\SynchronizerCsrfToken";}'),
        ],
    ],
    'Yiisoft\\Csrf\\Synchronizer\\SynchronizerCsrfToken' => [
        '__construct()' => [
            'generator' => unserialize('O:37:"Yiisoft\\Factory\\Definitions\\Reference":1:{s:41:"' . "\0" . 'Yiisoft\\Factory\\Definitions\\Reference' . "\0" . 'id";s:60:"Yiisoft\\Csrf\\Synchronizer\\Generator\\RandomCsrfTokenGenerator";}'),
            'storage' => unserialize('O:37:"Yiisoft\\Factory\\Definitions\\Reference":1:{s:41:"' . "\0" . 'Yiisoft\\Factory\\Definitions\\Reference' . "\0" . 'id";s:57:"Yiisoft\\Csrf\\Synchronizer\\Storage\\SessionCsrfTokenStorage";}'),
        ],
    ],
    'Yiisoft\\Csrf\\Hmac\\HmacCsrfToken' => [
        '__construct()' => [
            'identityGenerator' => unserialize('O:37:"Yiisoft\\Factory\\Definitions\\Reference":1:{s:41:"' . "\0" . 'Yiisoft\\Factory\\Definitions\\Reference' . "\0" . 'id";s:69:"Yiisoft\\Csrf\\Hmac\\IdentityGenerator\\SessionCsrfTokenIdentityGenerator";}'),
            'secretKey' => '',
            'algorithm' => 'sha256',
            'lifetime' => null,
        ],
    ],
    'Yiisoft\\DataResponse\\DataResponseFormatterInterface' => 'Yiisoft\\DataResponse\\Formatter\\HtmlDataResponseFormatter',
    'Yiisoft\\DataResponse\\DataResponseFactoryInterface' => 'Yiisoft\\DataResponse\\DataResponseFactory',
    'Yiisoft\\DataResponse\\Middleware\\ContentNegotiator' => [
        '__construct()' => [
            'contentFormatters' => [
                'text/html' => unserialize('O:56:"Yiisoft\\DataResponse\\Formatter\\HtmlDataResponseFormatter":2:{s:69:"' . "\0" . 'Yiisoft\\DataResponse\\Formatter\\HtmlDataResponseFormatter' . "\0" . 'contentType";s:9:"text/html";s:66:"' . "\0" . 'Yiisoft\\DataResponse\\Formatter\\HtmlDataResponseFormatter' . "\0" . 'encoding";s:5:"UTF-8";}'),
                'application/xml' => unserialize('O:55:"Yiisoft\\DataResponse\\Formatter\\XmlDataResponseFormatter":4:{s:68:"' . "\0" . 'Yiisoft\\DataResponse\\Formatter\\XmlDataResponseFormatter' . "\0" . 'contentType";s:15:"application/xml";s:64:"' . "\0" . 'Yiisoft\\DataResponse\\Formatter\\XmlDataResponseFormatter' . "\0" . 'version";s:3:"1.0";s:65:"' . "\0" . 'Yiisoft\\DataResponse\\Formatter\\XmlDataResponseFormatter' . "\0" . 'encoding";s:5:"UTF-8";s:64:"' . "\0" . 'Yiisoft\\DataResponse\\Formatter\\XmlDataResponseFormatter' . "\0" . 'rootTag";s:8:"response";}'),
                'application/json' => unserialize('O:56:"Yiisoft\\DataResponse\\Formatter\\JsonDataResponseFormatter":2:{s:69:"' . "\0" . 'Yiisoft\\DataResponse\\Formatter\\JsonDataResponseFormatter' . "\0" . 'contentType";s:16:"application/json";s:65:"' . "\0" . 'Yiisoft\\DataResponse\\Formatter\\JsonDataResponseFormatter' . "\0" . 'options";i:320;}'),
            ],
        ],
    ],
    'Yiisoft\\View\\Theme' => static function (\Yiisoft\Aliases\Aliases $aliases) use ($params) {        $pathMap = [];        foreach ($params['yiisoft/view']['theme']['pathMap'] as $key => $value) {            $pathMap[$aliases->get($key)] = $aliases->get($value);        }        return new \Yiisoft\View\Theme(            $pathMap,            $params['yiisoft/view']['theme']['basePath'],            $params['yiisoft/view']['theme']['baseUrl']        );    },
    'Yiisoft\\View\\WebView' => [
        '__class' => 'Yiisoft\\View\\WebView',
        '__construct()' => [
            'basePath' => static fn (\Yiisoft\Aliases\Aliases $aliases) => $aliases->get($params['yiisoft/view']['basePath']),
        ],
        'setDefaultParameters()' => [
            [
                'assetManager' => unserialize('O:37:"Yiisoft\\Factory\\Definitions\\Reference":1:{s:41:"' . "\0" . 'Yiisoft\\Factory\\Definitions\\Reference' . "\0" . 'id";s:27:"Yiisoft\\Assets\\AssetManager";}'),
                'urlGenerator' => unserialize('O:37:"Yiisoft\\Factory\\Definitions\\Reference":1:{s:41:"' . "\0" . 'Yiisoft\\Factory\\Definitions\\Reference' . "\0" . 'id";s:36:"Yiisoft\\Router\\UrlGeneratorInterface";}'),
                'urlMatcher' => unserialize('O:37:"Yiisoft\\Factory\\Definitions\\Reference":1:{s:41:"' . "\0" . 'Yiisoft\\Factory\\Definitions\\Reference' . "\0" . 'id";s:34:"Yiisoft\\Router\\UrlMatcherInterface";}'),
            ],
        ],
    ],
    'Yiisoft\\Middleware\\Dispatcher\\MiddlewarePipelineInterface' => 'Yiisoft\\Middleware\\Dispatcher\\MiddlewareStack',
    'Yiisoft\\Middleware\\Dispatcher\\MiddlewareFactoryInterface' => 'Yiisoft\\Middleware\\Dispatcher\\MiddlewareFactory',
    'Yiisoft\\Router\\UrlMatcherInterface' => static function (\Yiisoft\Injector\Injector $injector) use ($params) {        $enableCache = $params['yiisoft/router-fastroute']['enableCache'] ?? true;        $arguments = [];        if ($enableCache === false) {            $arguments['cache'] = null;        }        return $injector->make(\Yiisoft\Router\FastRoute\UrlMatcher::class, $arguments);    },
];