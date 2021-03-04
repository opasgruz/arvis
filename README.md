# Структура филиалов Арвис Групп

## Системные требования:
- PHP не ниже 7.2.20
- MySQL (MariaDB и др.) или PostgreSQL
- Composer
- Git

### 1. Склонировать репозиторий
```
git clone https://github.com/opasgruz/arvis.git
```

### 2. Содать базу данных, дать на неё привилегии пользователю

### 3. Скопировать .env.example в .env, указать параметры соединения с БД

### 4. Установить зависимости
```
composer install
composer dump-autoload
```

### 5. Выполнить миграции
```
php artisan migrate
```