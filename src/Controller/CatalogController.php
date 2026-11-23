<?php
declare(strict_types=1);

namespace App\Controller;

final class CatalogController
{
    public function index(): void
    {
        // В этой практической работе каталог пока использует тестовый массив.
        $products = [
            ['id' => 101, 'name' => 'Учебник по PHP', 'description' => 'Материалы для изучения основ PHP.', 'price' => 750, 'status' => 'В наличии'],
            ['id' => 102, 'name' => 'Практикум по HTML и CSS', 'description' => 'Практические задания по веб-разработке.', 'price' => 620, 'status' => 'В наличии'],
            ['id' => 103, 'name' => 'Справочник по MVC', 'description' => 'Краткое знакомство с архитектурой MVC.', 'price' => 890, 'status' => 'Под заказ'],
        ];

        render('catalog/index', [
            'title' => 'Каталог',
            'products' => $products,
            'active' => 'catalog',
        ]);
    }
}
