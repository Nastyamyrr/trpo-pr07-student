<?php
declare(strict_types=1);

namespace App\Core;

final class Router
{
    public function __construct(
        private array $routes,
        private array $controllers
    ) {}

    public function dispatch(string $method, string $uri): void
    {
        $path = parse_url($uri, PHP_URL_PATH) ?: '/';
        $path = rtrim($path, '/') ?: '/';

        foreach ($this->routes as $route) {
            if (strtoupper($route['method']) !== strtoupper($method) || $route['path'] !== $path) {
                continue;
            }

            $controllerName = $route['controller'];
            $action = $route['action'];
            $controller = $this->controllers[$controllerName] ?? null;

            if ($controller !== null && is_callable([$controller, $action])) {
                $controller->$action();
                return;
            }
        }

        http_response_code(404);
        $errorController = $this->controllers['ErrorController'] ?? null;
        if ($errorController !== null) {
            $errorController->notFound();
            return;
        }
        echo 'Страница не найдена.';
    }
}
