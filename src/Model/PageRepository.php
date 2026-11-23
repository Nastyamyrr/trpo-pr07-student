<?php
declare(strict_types=1);

namespace App\Model;

final class PageRepository
{
    public function __construct(private string $filePath) {}

    public function getHomePage(): array
    {
        if (!is_file($this->filePath)) {
            return $this->defaultData();
        }

        $json = file_get_contents($this->filePath);
        $data = is_string($json) ? json_decode($json, true) : null;

        if (!is_array($data)) {
            return $this->defaultData();
        }

        return [
            'store_name' => (string)($data['store_name'] ?? 'Учебный магазин'),
            'tagline' => (string)($data['tagline'] ?? 'Каталог учебных товаров'),
            'benefits' => is_array($data['benefits'] ?? null) ? $data['benefits'] : [],
        ];
    }

    private function defaultData(): array
    {
        return [
            'store_name' => 'Учебный магазин',
            'tagline' => 'Каталог учебных товаров',
            'benefits' => ['Простая структура', 'Понятная навигация', 'MVC-разделение'],
        ];
    }
}
