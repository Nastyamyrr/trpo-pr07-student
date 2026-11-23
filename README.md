# Практическая работа №7 — PHP MVC интернет-магазин

## Описание

Учебный интернет-магазин на PHP без фреймворков. В проекте реализованы единая точка входа, Router, HomeController, CatalogController, ErrorController, чтение `pages.json` и `routes.csv`, представления главной страницы, каталога, раздела «О магазине» и ошибки 404.

## Технологии

- PHP 8.0 или новее
- HTML5
- CSS3
- JSON и CSV
- Git

## Структура проекта

```text
trpo-pr07-student/
├── assets/
│   └── images/shop-logo.svg
├── data/
│   ├── assets/shop-logo.svg
│   ├── dataset/README.md
│   ├── pages.json
│   └── routes.csv
├── public/
│   ├── assets/css/style.css
│   ├── index.php
│   └── router.php
├── src/
│   ├── Controller/
│   │   ├── CatalogController.php
│   │   ├── ErrorController.php
│   │   └── HomeController.php
│   ├── Core/
│   │   ├── Router.php
│   │   └── helpers.php
│   └── Model/
│       ├── PageRepository.php
│       └── RouteRepository.php
└── views/
    ├── catalog/index.php
    ├── errors/404.php
    ├── home/about.php
    ├── home/index.php
    └── layout.php
```

## Запуск на macOS

1. Установить PHP 8.0 или новее.
2. Открыть Terminal и перейти в папку проекта:
   ```bash
   cd путь/к/trpo-pr07-student
   ```
3. Запустить встроенный сервер PHP:
   ```bash
   php -S localhost:8000 -t public public/router.php
   ```
4. Открыть в браузере `http://localhost:8000`.

Остановить сервер можно сочетанием `Control + C`.

## Проверка маршрутов

| Метод | URL | Контроллер | Действие / результат |
|---|---|---|---|
| GET | `/` | HomeController | index — главная страница |
| GET | `/catalog` | CatalogController | index — каталог |
| GET | `/about` | HomeController | about — информация о проекте |
| GET | `/missing` | ErrorController | notFound — страница 404 |

Маршруты считываются из `data/routes.csv`. Для неизвестного адреса Router также вызывает собственную страницу 404 и устанавливает HTTP-статус 404.

## Использование dataset

- `data/pages.json` читается классом `PageRepository`. Название магазина, описание и список преимуществ выводятся на главной странице.
- `data/routes.csv` читается классом `RouteRepository`. Поля `method`, `path`, `controller`, `action` используются Router для выбора действия.
- `data/assets/shop-logo.svg` сохранён как исходный файл dataset, а его копия `assets/images/shop-logo.svg` используется как изображение на главной странице.

Каталог на данном этапе содержит тестовый массив из трёх товаров, как предусмотрено заданием. Полноценная модель товара относится к следующей работе.

## MVC и ответственность частей

- **public/index.php** — единая точка входа, подключает классы и запускает Router.
- **Router** — сопоставляет HTTP-метод и путь с контроллером и действием. Не формирует HTML.
- **Controller** — подготавливает данные и выбирает представление.
- **Repository** — читает исходные данные из JSON и CSV.
- **View** — отображает готовые данные и не определяет маршрут.
- **layout.php** — общий каркас страниц с шапкой, навигацией и подвалом.

## Ручная проверка

1. Открыть `/` — должны отображаться название, описание и преимущества из JSON.
2. Открыть `/catalog` — должна появиться таблица из трёх тестовых товаров.
3. Открыть `/about` — должна появиться информация о проекте.
4. Открыть `/missing` — должна появиться собственная страница 404.
5. Открыть `/any-unknown-page` — также должна появиться страница 404.
6. Проверить адаптивность при уменьшении ширины окна браузера.

## Контрольные вопросы

1. **Какие входные данные получает приложение?** HTTP-метод и URL поступают от браузера. Данные страниц хранятся в `pages.json`, список маршрутов — в `routes.csv`.
2. **Какой участок кода преобразует данные в интерфейс?** Контроллеры подготавливают массивы, а PHP-представления выводят их в HTML.
3. **Какое ошибочное состояние проверялось?** Неизвестный маршрут, для которого возвращается HTTP 404 и отдельная страница.
4. **Что можно изменить при увеличении проекта?** Добавить полноценные модели, репозитории, обработку запросов и дополнительные контроллеры.
5. **Как проверить после клонирования?** Установить PHP, запустить команду из раздела «Запуск» и проверить все маршруты.
6. **За что отвечают Controller, Model и View?** Controller управляет сценарием запроса, Model/Repository работает с данными, View отвечает за отображение.
7. **Почему Router не должен формировать HTML?** Чтобы маршрутизация не смешивалась с отображением и каждый компонент отвечал за свою задачу.

## Git: рекомендуемая последовательность коммитов

Для истории разработки можно фиксировать этапы отдельно:

```bash
git init
git add README.md .gitignore data assets
git commit -m "chore: add project dataset and documentation"

git add public
git commit -m "feat: add application entry point"

git add src/Core
git commit -m "feat: implement router"

git add src/Model src/Controller
git commit -m "feat: add repositories and controllers"

git add views public/assets
git commit -m "feat: add views and responsive styles"
```

После этого создать удалённый репозиторий на GitHub, привязать его и отправить проект. Коммиты следует создавать по мере выполнения этапов, а не задним числом.
