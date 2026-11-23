<?php
declare(strict_types=1);

require_once __DIR__ . '/../src/Core/helpers.php';
require_once __DIR__ . '/../src/Model/PageRepository.php';
require_once __DIR__ . '/../src/Model/RouteRepository.php';
require_once __DIR__ . '/../src/Core/Router.php';
require_once __DIR__ . '/../src/Controller/HomeController.php';
require_once __DIR__ . '/../src/Controller/CatalogController.php';
require_once __DIR__ . '/../src/Controller/ErrorController.php';

use App\Core\Router;
use App\Model\PageRepository;
use App\Model\RouteRepository;
use App\Controller\HomeController;
use App\Controller\CatalogController;
use App\Controller\ErrorController;

$pages = new PageRepository(__DIR__ . '/../data/pages.json');
$routeRepository = new RouteRepository(__DIR__ . '/../data/routes.csv');

$homeController = new HomeController($pages);
$catalogController = new CatalogController();
$errorController = new ErrorController();

$controllers = [
    'HomeController' => $homeController,
    'CatalogController' => $catalogController,
    'ErrorController' => $errorController,
];

$router = new Router($routeRepository->all(), $controllers);
$router->dispatch($_SERVER['REQUEST_METHOD'] ?? 'GET', $_SERVER['REQUEST_URI'] ?? '/');
