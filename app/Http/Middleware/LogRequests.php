<?php 

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LogRequests
{
    public function handle(Request $request, Closure $next)
    {
        $startTime = microtime(true); // время начала запроса

        $logger = Log::build([
            'driver' => 'single',
            'path' => storage_path('logs/requests.log'),
            'level' => 'info',
        ]);

        // Логирование данных запроса
        $logger->info('Request Logged', [
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'params' => $request->all(),
            'ip' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
            'timestamp' => now()->toDateTimeString(),
        ]);
    //'timestamp' => now()->setTimezone('Europe/Moscow')->toDateTimeString(),

        // Обработка запроса
        $response = $next($request);

        // Логирование времени обработки
        $executionTime = microtime(true) - $startTime;
        $logger->info('Request Processed', [
            'url' => $request->fullUrl(),
            'execution_time' => $executionTime . ' seconds',
        ]);

        // Логирование ошибок (если есть)
        if ($response->getStatusCode() >= 400) {
            $logger->info('Request Failed', [
                'url' => $request->fullUrl(),
                'status_code' => $response->getStatusCode(),
                'error_message' => $response->getContent(),
            ]);
        }

        return $response;
    }
}
