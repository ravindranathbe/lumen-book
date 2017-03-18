<?php

namespace App\Http\Middleware;

use Log;
// use Monolog\Logger;
// use Monolog\Handler\StreamHandler;
use Closure;
use Illuminate\Http\Request;

class RequestLogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Create the logger
        /* $logger = new Logger('my_logger');
        $stream = new StreamHandler(__DIR__.'/../../../storage/logs/lumen.log', Logger::DEBUG);
        $logger->pushHandler($stream); */

        Log::info("Request Logged \n " . sprintf("~~~~ \n %s~~~~", (string) $request));
        // $logger->addInfo("Request Logged \n " . sprintf("~~~~ \n %s~~~~", (string) $request));

        return $next($request);
    }
}
