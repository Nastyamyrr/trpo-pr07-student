<section class="hero">
    <div>
        <span class="eyebrow">PHP · MVC · учебный проект</span>
        <h1><?= e($page['store_name']) ?></h1>
        <p class="muted"><?= e($page['tagline']) ?></p>
        <a class="button" href="/catalog">Перейти в каталог</a>
    </div>
    <img class="hero-logo" src="/assets/images/shop-logo.svg" alt="Иллюстрация учебного магазина">
</section>

<section class="grid" aria-label="Преимущества магазина">
    <?php foreach ($page['benefits'] as $index => $benefit): ?>
        <article class="card">
            <h3><?= e($benefit) ?></h3>
            <p><?= e(['Страницы имеют понятную структуру.', 'Переходы выполняются через маршруты.', 'Логика приложения разделена на отдельные части.'][$index] ?? 'Элемент главной страницы загружен из dataset.') ?></p>
        </article>
    <?php endforeach; ?>
</section>

<section class="panel">
    <h2>Как устроено приложение</h2>
    <p class="muted">Запрос поступает в единую точку входа, Router выбирает контроллер, контроллер подготавливает данные, а представление формирует HTML.</p>
    <p><strong>Router → Controller → Model / Repository → View</strong></p>
</section>
