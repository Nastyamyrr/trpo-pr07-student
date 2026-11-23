<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($title ?? 'Учебный магазин') ?></title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<header>
    <div class="header-inner">
        <a class="brand" href="/">Учебный магазин</a>
        <nav aria-label="Основная навигация">
            <a class="<?= ($active ?? '') === 'home' ? 'active' : '' ?>" href="/">Главная</a>
            <a class="<?= ($active ?? '') === 'catalog' ? 'active' : '' ?>" href="/catalog">Каталог</a>
            <a class="<?= ($active ?? '') === 'about' ? 'active' : '' ?>" href="/about">О магазине</a>
        </nav>
    </div>
</header>
<main>
    <?php require $viewFile; ?>
</main>
<footer>Практическая работа №7 · Технологии разработки программного обеспечения</footer>
</body>
</html>
