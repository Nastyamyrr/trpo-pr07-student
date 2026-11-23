<?php
declare(strict_types=1);

function e(mixed $value): string
{
    return htmlspecialchars((string)$value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function render(string $view, array $data = []): void
{
    $viewFile = __DIR__ . '/../../views/' . $view . '.php';
    if (!is_file($viewFile)) {
        http_response_code(500);
        echo 'Представление не найдено.';
        return;
    }

    extract($data, EXTR_SKIP);
    require __DIR__ . '/../../views/layout.php';
}
