<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\PageRepository;

final class HomeController
{
    public function __construct(private PageRepository $pages) {}

    public function index(): void
    {
        $page = $this->pages->getHomePage();
        render('home/index', [
            'title' => $page['store_name'],
            'page' => $page,
            'active' => 'home',
        ]);
    }

    public function about(): void
    {
        render('home/about', [
            'title' => 'О магазине',
            'active' => 'about',
        ]);
    }
}
