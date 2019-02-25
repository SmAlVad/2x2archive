#Архив сайта 2x2.su
## Установка
Устанавливаем зависимости
```asp
composer install
```
```asp
npm install
```
Копируем конфигурационный фаил. Устанавливаем свои значения
```asp
cp .env.example .env
```
Генерируем ключ
```asp
php artisan key:generate
```
Устанавливаем нужные права на директории
```asp
chmod -R 777 storage && chmod -R 777 bootstrap/cache
```
Запускаем миграции
```asp
php artisan migrate
```
