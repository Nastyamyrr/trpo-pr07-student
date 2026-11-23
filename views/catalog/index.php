<div class="page-heading">
    <span class="eyebrow">Каталог</span>
    <h1>Учебные товары</h1>
    <p>Тестовые позиции для проверки маршрута и передачи данных в представление.</p>
</div>
<section class="panel">
    <?php if (empty($products)): ?>
        <div class="empty">В каталоге пока нет товаров.</div>
    <?php else: ?>
        <table>
            <thead><tr><th>ID</th><th>Название</th><th>Описание</th><th>Цена</th><th>Статус</th></tr></thead>
            <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= e($product['id']) ?></td>
                    <td><strong><?= e($product['name']) ?></strong></td>
                    <td><?= e($product['description']) ?></td>
                    <td class="product-price"><?= e(number_format($product['price'], 0, ',', ' ')) ?> ₽</td>
                    <td><span class="pill"><?= e($product['status']) ?></span></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</section>
