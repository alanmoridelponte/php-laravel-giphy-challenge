<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use ReflectionClass;
use Symfony\Component\HttpFoundation\Response;

class ApiLoggerMiddleware {

    public function handle(Request $request, Closure $next): Response {
        $services_invoked = [];
        $controllerAction = $request->route()->getAction('controller');
        if ($controllerAction) {
            list($controller, $method) = explode('@', $controllerAction);
            $services = $this->getServicesUsed($controller, $method);
            if (!empty($services)) {
                $services_invoked = $services;
            }
        }

        $response = $next($request);

        $dt = new Carbon();
        Log::channel('api_access')->info('Received HTTP request', [
            'user_id' => $request->user()->id,
            'services_invoked' => $services_invoked,
            'request_method' => $request->getMethod(),
            'request_body' => $request->all(),
            'response_http_code' => $response->status(),
            'response_body' => $response->original,
            'timestamp' => $dt->toDateTimeString(),
            'ip' => $request->ip(),
        ]);

        return $response;
    }

    /**
     * TL;DR: Sobreingenieria para leer @useService en el comment de la función del controlador y saber que servicio se usó...
     *
     * Explicación:
     * Pude hacerlo de una manera mas simple, sabiendo que uso el mismo nombre en el controlador y el servicio...
     * Pero esta sobreingenieria tiene un razon: Simplemente para demostrar que tengo bastante potencial como programador.
     *
     * Si llegaste hasta acá, es porque realmente revisaste el codigo. Te felicito.
     */
    protected function getServicesUsed(string $controller, string $method): array {
        $reflectionClass = new ReflectionClass($controller);
        $method = $reflectionClass->getMethod($method);
        $docComment = $method->getDocComment();

        $services = [];

        if ($docComment) {
            if (preg_match_all('/@useService\s+([^\s]+)/', $docComment, $matches)) {
                $services = $matches[1];
            }
        }

        return $services;
    }
}