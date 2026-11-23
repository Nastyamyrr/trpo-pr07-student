<?php
declare(strict_types=1);

namespace App\Model;

final class RouteRepository
{
    public function __construct(private string $filePath) {}

    public function all(): array
    {
        if (!is_file($this->filePath) || !($handle = fopen($this->filePath, 'rb'))) {
            return [];
        }

        $routes = [];
        $header = fgetcsv($handle, 0, ';');
        if ($header === false) {
            fclose($handle);
            return [];
        }

        // Удаляем BOM, если CSV сохранён с сигнатурой UTF-8.
        $header[0] = preg_replace('/^\xEF\xBB\xBF/', '', (string)$header[0]);

        while (($row = fgetcsv($handle, 0, ';')) !== false) {
            if (count($row) !== count($header)) {
                continue;
            }
            $item = array_combine($header, $row);
            if ($item && !empty($item['method']) && !empty($item['path'])
                && !empty($item['controller']) && !empty($item['action'])) {
                $routes[] = $item;
            }
        }

        fclose($handle);
        return $routes;
    }
}
