<?php

return [
    'Yiisoft\\Yii\\Web\\Event\\ApplicationStartup' => [
        static fn (\App\Timer $timer) => $timer->start('overall'),
    ],
    'Yiisoft\\Yii\\Web\\Event\\AfterEmit' => [
        [
            'Yiisoft\\Profiler\\ProfilerInterface',
            'flush',
        ],
        static function (\Psr\Log\LoggerInterface $logger): void {
            if ($logger instanceof \Yiisoft\Log\Logger) {
                $logger->flush(true);
            }
        },
    ],
];