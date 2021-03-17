<?php

return [
    (static function() {
        $class = new \ReflectionClass(\Yiisoft\Router\Route::class);
        $object = $class->newInstanceWithoutConstructor();

        (function() {
            $this->name = 'site/index';
            $this->methods = [
                'GET'
            ];
            $this->pattern = '/';
            $this->host = null;
            $this->override = false;
            $this->dispatcher = null;
            $this->middlewareDefinitions = [
                [
                    'App\\Controller\\SiteController',
                    'index'
                ]
            ];
            $this->disabledMiddlewareDefinitions = [];
            $this->defaults = [];
        })->bindTo($object, \Yiisoft\Router\Route::class)();

        return $object;
    })(),
    (static function() {
        $class = new \ReflectionClass(\Yiisoft\Router\Route::class);
        $object = $class->newInstanceWithoutConstructor();

        (function() {
            $this->name = 'site/contact';
            $this->methods = [
                'GET',
                'POST'
            ];
            $this->pattern = '/contact';
            $this->host = null;
            $this->override = false;
            $this->dispatcher = null;
            $this->middlewareDefinitions = [
                [
                    'App\\Contact\\ContactController',
                    'contact'
                ]
            ];
            $this->disabledMiddlewareDefinitions = [];
            $this->defaults = [];
        })->bindTo($object, \Yiisoft\Router\Route::class)();

        return $object;
    })(),
    (static function() {
        $class = new \ReflectionClass(\Yiisoft\Router\Route::class);
        $object = $class->newInstanceWithoutConstructor();

        (function() {
            $this->name = 'site/login';
            $this->methods = [
                'GET',
                'POST'
            ];
            $this->pattern = '/login';
            $this->host = null;
            $this->override = false;
            $this->dispatcher = null;
            $this->middlewareDefinitions = [
                [
                    'App\\Controller\\AuthController',
                    'login'
                ]
            ];
            $this->disabledMiddlewareDefinitions = [];
            $this->defaults = [];
        })->bindTo($object, \Yiisoft\Router\Route::class)();

        return $object;
    })(),
    (static function() {
        $class = new \ReflectionClass(\Yiisoft\Router\Route::class);
        $object = $class->newInstanceWithoutConstructor();

        (function() {
            $this->name = 'site/logout';
            $this->methods = [
                'POST'
            ];
            $this->pattern = '/logout';
            $this->host = null;
            $this->override = false;
            $this->dispatcher = null;
            $this->middlewareDefinitions = [
                [
                    'App\\Controller\\AuthController',
                    'logout'
                ]
            ];
            $this->disabledMiddlewareDefinitions = [];
            $this->defaults = [];
        })->bindTo($object, \Yiisoft\Router\Route::class)();

        return $object;
    })(),
    (static function() {
        $class = new \ReflectionClass(\Yiisoft\Router\Route::class);
        $object = $class->newInstanceWithoutConstructor();

        (function() {
            $this->name = 'site/signup';
            $this->methods = [
                'GET',
                'POST'
            ];
            $this->pattern = '/signup';
            $this->host = null;
            $this->override = false;
            $this->dispatcher = null;
            $this->middlewareDefinitions = [
                [
                    'App\\Controller\\SignupController',
                    'signup'
                ]
            ];
            $this->disabledMiddlewareDefinitions = [];
            $this->defaults = [];
        })->bindTo($object, \Yiisoft\Router\Route::class)();

        return $object;
    })(),
    (static function() {
        $class = new \ReflectionClass(\Yiisoft\Router\Group::class);
        $object = $class->newInstanceWithoutConstructor();

        (function() {
            $this->items = [
                (static function() {
                    $class = new \ReflectionClass(\Yiisoft\Router\Route::class);
                    $object = $class->newInstanceWithoutConstructor();

                    (function() {
                        $this->name = 'user/index';
                        $this->methods = [
                            'GET'
                        ];
                        $this->pattern = '[/page-{page:\\d+}]';
                        $this->host = null;
                        $this->override = false;
                        $this->dispatcher = null;
                        $this->middlewareDefinitions = [
                            [
                                'App\\User\\Controller\\UserController',
                                'index'
                            ]
                        ];
                        $this->disabledMiddlewareDefinitions = [];
                        $this->defaults = [];
                    })->bindTo($object, \Yiisoft\Router\Route::class)();

                    return $object;
                })(),
                (static function() {
                    $class = new \ReflectionClass(\Yiisoft\Router\Route::class);
                    $object = $class->newInstanceWithoutConstructor();

                    (function() {
                        $this->name = 'user/profile';
                        $this->methods = [
                            'GET'
                        ];
                        $this->pattern = '/{login}';
                        $this->host = null;
                        $this->override = false;
                        $this->dispatcher = null;
                        $this->middlewareDefinitions = [
                            [
                                'App\\User\\Controller\\UserController',
                                'profile'
                            ]
                        ];
                        $this->disabledMiddlewareDefinitions = [];
                        $this->defaults = [];
                    })->bindTo($object, \Yiisoft\Router\Route::class)();

                    return $object;
                })()
            ];
            $this->prefix = '/user';
            $this->middlewareDefinitions = [];
            $this->disabledMiddlewareDefinitions = [];
            $this->dispatcher = null;
        })->bindTo($object, \Yiisoft\Router\Group::class)();

        return $object;
    })(),
    (static function() {
        $class = new \ReflectionClass(\Yiisoft\Router\Group::class);
        $object = $class->newInstanceWithoutConstructor();

        (function() {
            $this->items = [
                (static function() {
                    $class = new \ReflectionClass(\Yiisoft\Router\Route::class);
                    $object = $class->newInstanceWithoutConstructor();

                    (function() {
                        $this->name = 'api/info/v1';
                        $this->methods = [
                            'GET'
                        ];
                        $this->pattern = '/info/v1';
                        $this->host = null;
                        $this->override = false;
                        $this->dispatcher = null;
                        $this->middlewareDefinitions = [
                            function (\Yiisoft\DataResponse\DataResponseFactoryInterface $responseFactory) {
                        return $responseFactory->createResponse(['version' => '1.0', 'author' => 'yiisoft']);
                    }
                        ];
                        $this->disabledMiddlewareDefinitions = [];
                        $this->defaults = [];
                    })->bindTo($object, \Yiisoft\Router\Route::class)();

                    return $object;
                })(),
                (static function() {
                    $class = new \ReflectionClass(\Yiisoft\Router\Route::class);
                    $object = $class->newInstanceWithoutConstructor();

                    (function() {
                        $this->name = 'api/info/v2';
                        $this->methods = [
                            'GET'
                        ];
                        $this->pattern = '/info/v2';
                        $this->host = null;
                        $this->override = false;
                        $this->dispatcher = null;
                        $this->middlewareDefinitions = [
                            'App\\Controller\\ApiInfo',
                            'Yiisoft\\DataResponse\\Middleware\\FormatDataResponseAsJson'
                        ];
                        $this->disabledMiddlewareDefinitions = [];
                        $this->defaults = [];
                    })->bindTo($object, \Yiisoft\Router\Route::class)();

                    return $object;
                })(),
                (static function() {
                    $class = new \ReflectionClass(\Yiisoft\Router\Route::class);
                    $object = $class->newInstanceWithoutConstructor();

                    (function() {
                        $this->name = 'api/user/index';
                        $this->methods = [
                            'GET'
                        ];
                        $this->pattern = '/user';
                        $this->host = null;
                        $this->override = false;
                        $this->dispatcher = null;
                        $this->middlewareDefinitions = [
                            [
                                'App\\User\\Controller\\ApiUserController',
                                'index'
                            ]
                        ];
                        $this->disabledMiddlewareDefinitions = [];
                        $this->defaults = [];
                    })->bindTo($object, \Yiisoft\Router\Route::class)();

                    return $object;
                })(),
                (static function() {
                    $class = new \ReflectionClass(\Yiisoft\Router\Route::class);
                    $object = $class->newInstanceWithoutConstructor();

                    (function() {
                        $this->name = 'api/user/profile';
                        $this->methods = [
                            'GET'
                        ];
                        $this->pattern = '/user/{login}';
                        $this->host = null;
                        $this->override = false;
                        $this->dispatcher = null;
                        $this->middlewareDefinitions = [
                            [
                                'App\\User\\Controller\\ApiUserController',
                                'profile'
                            ],
                            'Yiisoft\\DataResponse\\Middleware\\FormatDataResponseAsJson'
                        ];
                        $this->disabledMiddlewareDefinitions = [];
                        $this->defaults = [];
                    })->bindTo($object, \Yiisoft\Router\Route::class)();

                    return $object;
                })()
            ];
            $this->prefix = '/api';
            $this->middlewareDefinitions = [
                'App\\Middleware\\ApiDataWrapper',
                'Yiisoft\\DataResponse\\Middleware\\FormatDataResponseAsXml'
            ];
            $this->disabledMiddlewareDefinitions = [];
            $this->dispatcher = null;
        })->bindTo($object, \Yiisoft\Router\Group::class)();

        return $object;
    })(),
    (static function() {
        $class = new \ReflectionClass(\Yiisoft\Router\Group::class);
        $object = $class->newInstanceWithoutConstructor();

        (function() {
            $this->items = [
                (static function() {
                    $class = new \ReflectionClass(\Yiisoft\Router\Route::class);
                    $object = $class->newInstanceWithoutConstructor();

                    (function() {
                        $this->name = 'blog/index';
                        $this->methods = [
                            'GET'
                        ];
                        $this->pattern = '[/page{page:\\d+}]';
                        $this->host = null;
                        $this->override = false;
                        $this->dispatcher = null;
                        $this->middlewareDefinitions = [
                            [
                                'App\\Blog\\BlogController',
                                'index'
                            ]
                        ];
                        $this->disabledMiddlewareDefinitions = [];
                        $this->defaults = [];
                    })->bindTo($object, \Yiisoft\Router\Route::class)();

                    return $object;
                })(),
                (static function() {
                    $class = new \ReflectionClass(\Yiisoft\Router\Route::class);
                    $object = $class->newInstanceWithoutConstructor();

                    (function() {
                        $this->name = 'blog/add';
                        $this->methods = [
                            'GET',
                            'POST'
                        ];
                        $this->pattern = '/page/add';
                        $this->host = null;
                        $this->override = false;
                        $this->dispatcher = null;
                        $this->middlewareDefinitions = [
                            [
                                'App\\Blog\\Post\\PostController',
                                'add'
                            ],
                            'Yiisoft\\Auth\\Middleware\\Authentication'
                        ];
                        $this->disabledMiddlewareDefinitions = [];
                        $this->defaults = [];
                    })->bindTo($object, \Yiisoft\Router\Route::class)();

                    return $object;
                })(),
                (static function() {
                    $class = new \ReflectionClass(\Yiisoft\Router\Route::class);
                    $object = $class->newInstanceWithoutConstructor();

                    (function() {
                        $this->name = 'blog/edit';
                        $this->methods = [
                            'GET',
                            'POST'
                        ];
                        $this->pattern = '/page/edit/{slug}';
                        $this->host = null;
                        $this->override = false;
                        $this->dispatcher = null;
                        $this->middlewareDefinitions = [
                            [
                                'App\\Blog\\Post\\PostController',
                                'edit'
                            ],
                            'Yiisoft\\Auth\\Middleware\\Authentication',
                            function (\App\Middleware\AccessChecker $checker) {
                        return $checker->withPermission('editPost');
                    }
                        ];
                        $this->disabledMiddlewareDefinitions = [];
                        $this->defaults = [];
                    })->bindTo($object, \Yiisoft\Router\Route::class)();

                    return $object;
                })(),
                (static function() {
                    $class = new \ReflectionClass(\Yiisoft\Router\Route::class);
                    $object = $class->newInstanceWithoutConstructor();

                    (function() {
                        $this->name = 'blog/post';
                        $this->methods = [
                            'GET'
                        ];
                        $this->pattern = '/page/{slug}';
                        $this->host = null;
                        $this->override = false;
                        $this->dispatcher = null;
                        $this->middlewareDefinitions = [
                            [
                                'App\\Blog\\Post\\PostController',
                                'index'
                            ]
                        ];
                        $this->disabledMiddlewareDefinitions = [];
                        $this->defaults = [];
                    })->bindTo($object, \Yiisoft\Router\Route::class)();

                    return $object;
                })(),
                (static function() {
                    $class = new \ReflectionClass(\Yiisoft\Router\Route::class);
                    $object = $class->newInstanceWithoutConstructor();

                    (function() {
                        $this->name = 'blog/tag';
                        $this->methods = [
                            'GET'
                        ];
                        $this->pattern = '/tag/{label}[/page{page:\\d+}]';
                        $this->host = null;
                        $this->override = false;
                        $this->dispatcher = null;
                        $this->middlewareDefinitions = [
                            [
                                'App\\Blog\\Tag\\TagController',
                                'index'
                            ]
                        ];
                        $this->disabledMiddlewareDefinitions = [];
                        $this->defaults = [];
                    })->bindTo($object, \Yiisoft\Router\Route::class)();

                    return $object;
                })(),
                (static function() {
                    $class = new \ReflectionClass(\Yiisoft\Router\Group::class);
                    $object = $class->newInstanceWithoutConstructor();

                    (function() {
                        $this->items = [
                            (static function() {
                                $class = new \ReflectionClass(\Yiisoft\Router\Route::class);
                                $object = $class->newInstanceWithoutConstructor();

                                (function() {
                                    $this->name = 'blog/archive/index';
                                    $this->methods = [
                                        'GET'
                                    ];
                                    $this->pattern = '';
                                    $this->host = null;
                                    $this->override = false;
                                    $this->dispatcher = null;
                                    $this->middlewareDefinitions = [
                                        [
                                            'App\\Blog\\Archive\\ArchiveController',
                                            'index'
                                        ]
                                    ];
                                    $this->disabledMiddlewareDefinitions = [];
                                    $this->defaults = [];
                                })->bindTo($object, \Yiisoft\Router\Route::class)();

                                return $object;
                            })(),
                            (static function() {
                                $class = new \ReflectionClass(\Yiisoft\Router\Route::class);
                                $object = $class->newInstanceWithoutConstructor();

                                (function() {
                                    $this->name = 'blog/archive/year';
                                    $this->methods = [
                                        'GET'
                                    ];
                                    $this->pattern = '/{year:\\d+}';
                                    $this->host = null;
                                    $this->override = false;
                                    $this->dispatcher = null;
                                    $this->middlewareDefinitions = [
                                        [
                                            'App\\Blog\\Archive\\ArchiveController',
                                            'yearlyArchive'
                                        ]
                                    ];
                                    $this->disabledMiddlewareDefinitions = [];
                                    $this->defaults = [];
                                })->bindTo($object, \Yiisoft\Router\Route::class)();

                                return $object;
                            })(),
                            (static function() {
                                $class = new \ReflectionClass(\Yiisoft\Router\Route::class);
                                $object = $class->newInstanceWithoutConstructor();

                                (function() {
                                    $this->name = 'blog/archive/month';
                                    $this->methods = [
                                        'GET'
                                    ];
                                    $this->pattern = '/{year:\\d+}-{month:\\d+}[/page{page:\\d+}]';
                                    $this->host = null;
                                    $this->override = false;
                                    $this->dispatcher = null;
                                    $this->middlewareDefinitions = [
                                        [
                                            'App\\Blog\\Archive\\ArchiveController',
                                            'monthlyArchive'
                                        ]
                                    ];
                                    $this->disabledMiddlewareDefinitions = [];
                                    $this->defaults = [];
                                })->bindTo($object, \Yiisoft\Router\Route::class)();

                                return $object;
                            })()
                        ];
                        $this->prefix = '/archive';
                        $this->middlewareDefinitions = [];
                        $this->disabledMiddlewareDefinitions = [];
                        $this->dispatcher = null;
                    })->bindTo($object, \Yiisoft\Router\Group::class)();

                    return $object;
                })(),
                (static function() {
                    $class = new \ReflectionClass(\Yiisoft\Router\Route::class);
                    $object = $class->newInstanceWithoutConstructor();

                    (function() {
                        $this->name = 'blog/comment/index';
                        $this->methods = [
                            'GET'
                        ];
                        $this->pattern = '/comments/[next/{next}]';
                        $this->host = null;
                        $this->override = false;
                        $this->dispatcher = null;
                        $this->middlewareDefinitions = [
                            [
                                'App\\Blog\\CommentController',
                                'index'
                            ]
                        ];
                        $this->disabledMiddlewareDefinitions = [];
                        $this->defaults = [];
                    })->bindTo($object, \Yiisoft\Router\Route::class)();

                    return $object;
                })()
            ];
            $this->prefix = '/blog';
            $this->middlewareDefinitions = [];
            $this->disabledMiddlewareDefinitions = [];
            $this->dispatcher = null;
        })->bindTo($object, \Yiisoft\Router\Group::class)();

        return $object;
    })(),
    (static function() {
        $class = new \ReflectionClass(\Yiisoft\Router\Group::class);
        $object = $class->newInstanceWithoutConstructor();

        (function() {
            $this->items = [
                (static function() {
                    $class = new \ReflectionClass(\Yiisoft\Router\Route::class);
                    $object = $class->newInstanceWithoutConstructor();

                    (function() {
                        $this->name = 'swagger/index';
                        $this->methods = [
                            'GET'
                        ];
                        $this->pattern = '';
                        $this->host = null;
                        $this->override = false;
                        $this->dispatcher = null;
                        $this->middlewareDefinitions = [
                            function (\Yiisoft\Swagger\Middleware\SwaggerUi $swaggerUi) {
                        return $swaggerUi->withJsonUrl('/swagger/json-url');
                    },
                            'Yiisoft\\DataResponse\\Middleware\\FormatDataResponseAsHtml'
                        ];
                        $this->disabledMiddlewareDefinitions = [];
                        $this->defaults = [];
                    })->bindTo($object, \Yiisoft\Router\Route::class)();

                    return $object;
                })(),
                (static function() {
                    $class = new \ReflectionClass(\Yiisoft\Router\Route::class);
                    $object = $class->newInstanceWithoutConstructor();

                    (function() {
                        $this->name = null;
                        $this->methods = [
                            'GET'
                        ];
                        $this->pattern = '/json-url';
                        $this->host = null;
                        $this->override = false;
                        $this->dispatcher = null;
                        $this->middlewareDefinitions = [
                            static function (\Yiisoft\Swagger\Middleware\SwaggerJson $swaggerJson) {
                        return $swaggerJson->withAnnotationPaths(['@src/Controller']);
                    },
                            'Yiisoft\\DataResponse\\Middleware\\FormatDataResponseAsJson'
                        ];
                        $this->disabledMiddlewareDefinitions = [];
                        $this->defaults = [];
                    })->bindTo($object, \Yiisoft\Router\Route::class)();

                    return $object;
                })()
            ];
            $this->prefix = '/swagger';
            $this->middlewareDefinitions = [];
            $this->disabledMiddlewareDefinitions = [];
            $this->dispatcher = null;
        })->bindTo($object, \Yiisoft\Router\Group::class)();

        return $object;
    })(),
    (static function() {
        $class = new \ReflectionClass(\Yiisoft\Router\Group::class);
        $object = $class->newInstanceWithoutConstructor();

        (function() {
            $this->items = [
                (static function() {
                    $class = new \ReflectionClass(\Yiisoft\Router\Route::class);
                    $object = $class->newInstanceWithoutConstructor();

                    (function() {
                        $this->name = 'debug/index';
                        $this->methods = [
                            'GET',
                            'OPTIONS'
                        ];
                        $this->pattern = '[/]';
                        $this->host = null;
                        $this->override = false;
                        $this->dispatcher = null;
                        $this->middlewareDefinitions = [
                            [
                                'Yiisoft\\Yii\\Debug\\Api\\Controller\\DebugController',
                                'index'
                            ]
                        ];
                        $this->disabledMiddlewareDefinitions = [];
                        $this->defaults = [];
                    })->bindTo($object, \Yiisoft\Router\Route::class)();

                    return $object;
                })(),
                (static function() {
                    $class = new \ReflectionClass(\Yiisoft\Router\Route::class);
                    $object = $class->newInstanceWithoutConstructor();

                    (function() {
                        $this->name = 'debug/summary';
                        $this->methods = [
                            'GET',
                            'OPTIONS'
                        ];
                        $this->pattern = '/summary/{id}';
                        $this->host = null;
                        $this->override = false;
                        $this->dispatcher = null;
                        $this->middlewareDefinitions = [
                            [
                                'Yiisoft\\Yii\\Debug\\Api\\Controller\\DebugController',
                                'summary'
                            ]
                        ];
                        $this->disabledMiddlewareDefinitions = [];
                        $this->defaults = [];
                    })->bindTo($object, \Yiisoft\Router\Route::class)();

                    return $object;
                })(),
                (static function() {
                    $class = new \ReflectionClass(\Yiisoft\Router\Route::class);
                    $object = $class->newInstanceWithoutConstructor();

                    (function() {
                        $this->name = 'debug/view';
                        $this->methods = [
                            'GET',
                            'OPTIONS'
                        ];
                        $this->pattern = '/view/{id}[/{collector}]';
                        $this->host = null;
                        $this->override = false;
                        $this->dispatcher = null;
                        $this->middlewareDefinitions = [
                            [
                                'Yiisoft\\Yii\\Debug\\Api\\Controller\\DebugController',
                                'view'
                            ]
                        ];
                        $this->disabledMiddlewareDefinitions = [];
                        $this->defaults = [];
                    })->bindTo($object, \Yiisoft\Router\Route::class)();

                    return $object;
                })(),
                (static function() {
                    $class = new \ReflectionClass(\Yiisoft\Router\Route::class);
                    $object = $class->newInstanceWithoutConstructor();

                    (function() {
                        $this->name = 'debug/dump';
                        $this->methods = [
                            'GET',
                            'OPTIONS'
                        ];
                        $this->pattern = '/dump/{id}[/{collector}]';
                        $this->host = null;
                        $this->override = false;
                        $this->dispatcher = null;
                        $this->middlewareDefinitions = [
                            [
                                'Yiisoft\\Yii\\Debug\\Api\\Controller\\DebugController',
                                'dump'
                            ]
                        ];
                        $this->disabledMiddlewareDefinitions = [];
                        $this->defaults = [];
                    })->bindTo($object, \Yiisoft\Router\Route::class)();

                    return $object;
                })(),
                (static function() {
                    $class = new \ReflectionClass(\Yiisoft\Router\Route::class);
                    $object = $class->newInstanceWithoutConstructor();

                    (function() {
                        $this->name = 'debug/object';
                        $this->methods = [
                            'GET',
                            'OPTIONS'
                        ];
                        $this->pattern = '/object/{id}/{objectId}';
                        $this->host = null;
                        $this->override = false;
                        $this->dispatcher = null;
                        $this->middlewareDefinitions = [
                            [
                                'Yiisoft\\Yii\\Debug\\Api\\Controller\\DebugController',
                                'object'
                            ]
                        ];
                        $this->disabledMiddlewareDefinitions = [];
                        $this->defaults = [];
                    })->bindTo($object, \Yiisoft\Router\Route::class)();

                    return $object;
                })()
            ];
            $this->prefix = '/debug';
            $this->middlewareDefinitions = [
                'Yiisoft\\Yii\\Debug\\Api\\Middleware\\ResponseDataWrapper',
                'Yiisoft\\DataResponse\\Middleware\\FormatDataResponseAsJson',
                static function (\Psr\Http\Message\ResponseFactoryInterface $responseFactory) {
                $params = ['mailer' => ['adminEmail' => 'admin@example.com'], 'yiisoft/yii-debug' => ['optionalRequests' => ['/debug**', '/assets/*'], 'enabled' => false, 'collectors' => ['Yiisoft\\Yii\\Debug\\Collector\\LogCollectorInterface', 'Yiisoft\\Yii\\Debug\\Collector\\EventCollectorInterface', 'Yiisoft\\Yii\\Debug\\Collector\\ServiceCollectorInterface'], 'collectors.web' => ['Yiisoft\\Yii\\Debug\\Collector\\WebAppInfoCollector', 'Yiisoft\\Yii\\Debug\\Collector\\RequestCollector', 'Yiisoft\\Yii\\Debug\\Collector\\RouterCollector', 'Yiisoft\\Yii\\Debug\\Collector\\MiddlewareCollector'], 'collectors.console' => ['Yiisoft\\Yii\\Debug\\Collector\\ConsoleAppInfoCollector', 'Yiisoft\\Yii\\Debug\\Collector\\CommandCollector'], 'trackedServices' => ['Psr\\Log\\LoggerInterface' => ['Yiisoft\\Yii\\Debug\\Proxy\\LoggerInterfaceProxy', 'Yiisoft\\Yii\\Debug\\Collector\\LogCollectorInterface'], 'Psr\\EventDispatcher\\EventDispatcherInterface' => ['Yiisoft\\Yii\\Debug\\Proxy\\EventDispatcherInterfaceProxy', 'Yiisoft\\Yii\\Debug\\Collector\\EventCollectorInterface'], 'Yiisoft\\Router\\UrlMatcherInterface' => ['Yiisoft\\Yii\\Debug\\Proxy\\UrlMatcherInterfaceProxy', 'Yiisoft\\Yii\\Debug\\Collector\\RouterCollectorInterface'], 0 => 'Yiisoft\\Cache\\CacheInterface'], 'logLevel' => 7, 'path' => '@runtime/debug'], 'yiisoft/yii-debug-api' => ['enabled' => true, 'allowedIPs' => ['127.0.0.1', '::1'], 'allowedHosts' => []], 'yiisoft/yii-console' => ['commands' => ['debug/reset' => 'Yiisoft\\Yii\\Debug\\Command\\ResetCommand', 'cycle/schema' => 'Yiisoft\\Yii\\Cycle\\Command\\Schema\\SchemaCommand', 'cycle/schema/php' => 'Yiisoft\\Yii\\Cycle\\Command\\Schema\\SchemaPhpCommand', 'cycle/schema/clear' => 'Yiisoft\\Yii\\Cycle\\Command\\Schema\\SchemaClearCommand', 'cycle/schema/rebuild' => 'Yiisoft\\Yii\\Cycle\\Command\\Schema\\SchemaRebuildCommand', 'migrate/create' => 'Yiisoft\\Yii\\Cycle\\Command\\Migration\\CreateCommand', 'migrate/generate' => 'Yiisoft\\Yii\\Cycle\\Command\\Migration\\GenerateCommand', 'migrate/up' => 'Yiisoft\\Yii\\Cycle\\Command\\Migration\\UpCommand', 'migrate/down' => 'Yiisoft\\Yii\\Cycle\\Command\\Migration\\DownCommand', 'migrate/list' => 'Yiisoft\\Yii\\Cycle\\Command\\Migration\\ListCommand', 'serve' => 'Yiisoft\\Yii\\Console\\Command\\Serve', 'user/create' => 'App\\User\\Console\\CreateCommand', 'user/assignRole' => 'App\\User\\Console\\AssignRoleCommand', 'fixture/add' => 'App\\Command\\Fixture\\AddCommand', 'router/list' => 'App\\Command\\Router\\ListCommand'], 'id' => 'yii-console', 'name' => 'Yii Console', 'autoExit' => false, 'version' => '3.0'], 'yiisoft/yii-cycle' => ['dbal' => ['query-logger' => null, 'default' => 'default', 'aliases' => [], 'databases' => ['default' => ['connection' => 'sqlite']], 'connections' => ['sqlite' => ['driver' => 'Spiral\\Database\\Driver\\SQLite\\SQLiteDriver', 'connection' => 'sqlite:@runtime/database.db', 'username' => '', 'password' => '']]], 'migrations' => ['directory' => '@root/migrations', 'namespace' => 'App\\Migration', 'table' => 'migration', 'safe' => false], 'orm-promise-factory' => null, 'schema-providers' => ['Yiisoft\\Yii\\Cycle\\Schema\\Provider\\FromConveyorSchemaProvider' => ['generators' => ['Cycle\\Schema\\Generator\\SyncTables']]], 'annotated-entity-paths' => ['@src']], 'yiisoft/assets' => ['assetConverter' => ['command' => ['from' => 'scss', 'to' => 'css', 'command' => '@npm/.bin/sass {options} {from} {to}'], 'forceConvert' => false], 'assetPublisher' => ['appendTimestamp' => false, 'assetMap' => [], 'basePath' => null, 'baseUrl' => null, 'forceCopy' => false, 'linkAssets' => false], 'assetManager' => ['bundles' => [], 'register' => []]], 'yiisoft/user' => ['authUrl' => '/login', 'cookieLogin' => ['addCookie' => false, 'duration' => 'P5D']], 'yiisoft/aliases' => ['aliases' => ['@vendor' => '@root/vendor', '@public' => '@root/public', '@runtime' => '@root/runtime', '@bower' => '@vendor/bower-asset', '@npm' => '@root/node_modules', '@baseUrl' => '/', '@root' => 'C:\\usr\\www\\yii-dev-tool\\dev\\yii-demo', '@views' => '@root/views', '@resources' => '@root/resources', '@src' => '@root/src', '@assets' => '@public/assets', '@assetsUrl' => '@baseUrl/assets']], 'yiisoft/router-fastroute' => ['enableCache' => false, 'encodeRaw' => true], 'yiisoft/profiler' => ['targets' => ['Yiisoft\\Profiler\\Target\\LogTarget' => ['include' => [], 'exclude' => [], 'enabled' => true, 'level' => 'debug'], 'Yiisoft\\Profiler\\Target\\FileTarget' => ['include' => [], 'exclude' => [], 'enabled' => false, 'requestBeginTime' => 1615984535.172851, 'filename' => '@runtime/profiling/{date}-{time}.txt', 'directoryMode' => 509]]], 'yiisoft/view' => ['basePath' => '@views', 'defaultParameters' => ['assetManager' => (static function () {
                    $class = new \ReflectionClass(\Yiisoft\Factory\Definitions\Reference::class);
                    $object = $class->newInstanceWithoutConstructor();
                    (function () {
                        $this->id = 'Yiisoft\\Assets\\AssetManager';
                    })->bindTo($object, \Yiisoft\Factory\Definitions\Reference::class)();
                    return $object;
                })(), 'urlGenerator' => (static function () {
                    $class = new \ReflectionClass(\Yiisoft\Factory\Definitions\Reference::class);
                    $object = $class->newInstanceWithoutConstructor();
                    (function () {
                        $this->id = 'Yiisoft\\Router\\UrlGeneratorInterface';
                    })->bindTo($object, \Yiisoft\Factory\Definitions\Reference::class)();
                    return $object;
                })(), 'urlMatcher' => (static function () {
                    $class = new \ReflectionClass(\Yiisoft\Factory\Definitions\Reference::class);
                    $object = $class->newInstanceWithoutConstructor();
                    (function () {
                        $this->id = 'Yiisoft\\Router\\UrlMatcherInterface';
                    })->bindTo($object, \Yiisoft\Factory\Definitions\Reference::class)();
                    return $object;
                })()], 'theme' => ['pathMap' => [], 'basePath' => '', 'baseUrl' => '']], 'yiisoft/log-target-file' => ['fileTarget' => ['file' => '@runtime/logs/app.log', 'levels' => ['emergency', 'error', 'warning', 'info', 'debug'], 'dirMode' => 493, 'fileMode' => null], 'fileRotator' => ['maxFileSize' => 10240, 'maxFiles' => 5, 'fileMode' => null, 'rotateByCopy' => null, 'compressRotatedFiles' => false]], 'yiisoft/cache-file' => ['fileCache' => ['path' => '@runtime/cache']], 'yiisoft/yii-view' => ['viewBasePath' => '@views', 'layout' => '@views/layout/main', 'injections' => [(static function () {
                    $class = new \ReflectionClass(\Yiisoft\Factory\Definitions\Reference::class);
                    $object = $class->newInstanceWithoutConstructor();
                    (function () {
                        $this->id = 'App\\ViewInjection\\ContentViewInjection';
                    })->bindTo($object, \Yiisoft\Factory\Definitions\Reference::class)();
                    return $object;
                })(), (static function () {
                    $class = new \ReflectionClass(\Yiisoft\Factory\Definitions\Reference::class);
                    $object = $class->newInstanceWithoutConstructor();
                    (function () {
                        $this->id = 'Yiisoft\\Yii\\View\\CsrfViewInjection';
                    })->bindTo($object, \Yiisoft\Factory\Definitions\Reference::class)();
                    return $object;
                })(), (static function () {
                    $class = new \ReflectionClass(\Yiisoft\Factory\Definitions\Reference::class);
                    $object = $class->newInstanceWithoutConstructor();
                    (function () {
                        $this->id = 'App\\ViewInjection\\LayoutViewInjection';
                    })->bindTo($object, \Yiisoft\Factory\Definitions\Reference::class)();
                    return $object;
                })(), (static function () {
                    $class = new \ReflectionClass(\Yiisoft\Factory\Definitions\Reference::class);
                    $object = $class->newInstanceWithoutConstructor();
                    (function () {
                        $this->id = 'App\\ViewInjection\\LinkTagsViewInjection';
                    })->bindTo($object, \Yiisoft\Factory\Definitions\Reference::class)();
                    return $object;
                })(), (static function () {
                    $class = new \ReflectionClass(\Yiisoft\Factory\Definitions\Reference::class);
                    $object = $class->newInstanceWithoutConstructor();
                    (function () {
                        $this->id = 'App\\ViewInjection\\MetaTagsViewInjection';
                    })->bindTo($object, \Yiisoft\Factory\Definitions\Reference::class)();
                    return $object;
                })()]], 'yiisoft/form' => ['bootstrap5' => ['enabled' => true, 'fieldConfig' => ['enclosedByContainer()' => [true, ['class' => 'mb-3']], 'errorCssClass()' => ['is-invalid'], 'errorOptions()' => [['class' => 'text-danger fst-italic']], 'hintOptions()' => [['class' => 'form-text']], 'inputCssClass()' => ['form-control'], 'labelOptions()' => [['class' => 'form-label']], 'successCssClass()' => ['is-valid']]]], 'yiisoft/session' => ['session' => ['options' => ['cookie_secure' => 0], 'handler' => null]], 'yiisoft/mailer' => ['messageBodyTemplate' => ['viewPath' => '@resources/mail'], 'fileMailer' => ['fileMailerStorage' => '@runtime/mail'], 'useSendmail' => false, 'writeToFiles' => true], 'swiftmailer/swiftmailer' => ['SwiftSmtpTransport' => ['host' => 'smtp.example.com', 'port' => 25, 'encryption' => null, 'username' => 'admin@example.com', 'password' => '']], 'yiisoft/csrf' => ['hmacToken' => ['secretKey' => '', 'algorithm' => 'sha256', 'lifetime' => null]]];
                return new \Yiisoft\Yii\Web\Middleware\IpFilter((new \Yiisoft\Validator\Rule\Ip())->ranges($params['yiisoft/yii-debug-api']['allowedIPs']), $responseFactory);
            },
                'Tuupola\\Middleware\\CorsMiddleware'
            ];
            $this->disabledMiddlewareDefinitions = [];
            $this->dispatcher = null;
        })->bindTo($object, \Yiisoft\Router\Group::class)();

        return $object;
    })()
];