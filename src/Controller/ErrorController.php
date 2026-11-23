<?php
declare(strict_types=1);

namespace App\Controller;

final class ErrorController
{
    public function notFound(): void
    {
        http_response_code(404);
        render('errors/404', [
            'title' => 'Страница не найдена',
            'active' => '',
        ]);
    }
}
