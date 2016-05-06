
В composer.json добавляем в блок require
```json
 "vis/comments_l5": "1.0.*"
```

Выполняем
```json
composer update
```

Добавляем в app.php
```php
  Vis\Comments\CommentsServiceProvider::class,
```

Выполняем миграцию таблиц
```json
    php artisan migrate --path=vendor/vis/comments_l5/src/Migrations
```

Публикуем js файлы
```json
   php artisan vendor:publish --tag=comments --force
```

И если нужно публикуем views
```json
   php artisan vendor:publish --tag=comments_views --force
```
-----------------------------------
Использование на фронтенде:

Показываем форму для комментария на странице
```php
{!! Comments::showForm($page) !!}
```

Показываем список комментариев это страницы
```php
{!! Comments::showListComments($page) !!}
```