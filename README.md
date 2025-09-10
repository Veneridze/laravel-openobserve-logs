# laravel-openobserve-logs

Setup composer.json

```json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/veneridze/laravel-openobserve-logs.git"
        }
    ]
}
```

Install package

```
composer require veneridze/laravel-openobserve-logs
```

Setup logging.php

```php
'openobserve' => [
    'driver' => 'monolog',
    'level' => env('LOG_LEVEL', 'debug'),
    'handler' => Veneridze\LaravelOpenobserveLogs\Handler\OpenObserveHandler::class,
    'handler_with' => [
        'url' => env('OPENOBSERVE_URL'),
        'username' => env('OPENOBSERVE_USERNAME'),
        'organization' => env('OPENOBSERVE_ORGANIZATION'),
        'stream' => env('OPENOBSERVE_STREAM'),
        'password' => env('OPENOBSERVE_PASSWORD'),
    ],
    'processors' => [PsrLogMessageProcessor::class],
]
```

Setup .env

```ini
LOG_CHANNEL=openobserve
LOG_LEVEL=debug
OPENOBSERVE_URL=<url>
OPENOBSERVE_ORGANIZATION=default
OPENOBSERVE_STREAM=<app_name>
OPENOBSERVE_USERNAME=<login>
OPENOBSERVE_PASSWORD=<password>
```
