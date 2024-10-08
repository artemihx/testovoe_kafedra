# testovoe_kafedra

# Инструкция по развертыванию:

1. Склонировать проект.
2. Перейти в папку deploy в консоли ввести:
```
docker compose up -d --build
```
3. Перейти в терминал контейнера laravel:
```
docker compose exec laravel bash
```
4. Переименовать .env.example в .env
5. Накатить миграцию с сидами:
```
composer install
```
```
php artisan migrate:fresh --seed
```
