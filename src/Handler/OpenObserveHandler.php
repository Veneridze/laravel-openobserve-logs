<?php
namespace Veneridze\LaravelOpenobserveLogs\Handler;

use Illuminate\Support\Arr;
use Monolog\Logger;
use Monolog\LogRecord;
use Illuminate\Support\Facades\Http;

// Custom handler for OpenObserve
class OpenObserveHandler extends \Monolog\Handler\AbstractProcessingHandler
{
    private array $config = [];
    public function __construct($level = Logger::DEBUG, $bubble = true)
    {
        $this->config = config('logging.channels.openobserve.handler_with');
        parent::__construct($level, $bubble);
    }

    // Monolog 3.x compatible write method
    protected function write(LogRecord $record): void
    {
        $endpoint = Arr::get($this->config, 'url') . "/api/" . Arr::get($this->config, 'organization') . "/" . Arr::get($this->config, 'stream') . "/_json";

        $res = Http::
            withBasicAuth(
                Arr::get($this->config, 'username'),
                Arr::get($this->config, 'password')
            )
            ->contentType('application/json')
            ->post($endpoint, $record->toArray());
        if ($res->status() != 200) {
            error_log('Failed to send log to OpenObserve');
        }
    }
}