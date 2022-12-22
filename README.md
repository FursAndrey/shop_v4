Учебный проект

- клонировать с гитхаба: 
    git clone https://github.com/FursAndrey/shop_v4.git

- загрузить Laravel:
    composer install

- копировать .env.example в .env:
    copy .env.example .env

- создать новый ключ для проекта команда:
    php artisan key:generate

- создаю базу данных для проекта

- в файле .env настроить подключение к базу данных

- в файле .env настроить подключение к почтовому сервису

- создать таблицы и заполнить их начальными данными:
    php artisan migrate --seed

- создать symlink на storage:
    php artisan storage:link

- настроить npm:
    npm install

    npm run build

- загрузить в storage/app/public/uploads любые картинки, любым удобным способом
    (в seed записаны 20 картинок с именами 1.jpg, 2.jpg, 3.jpg, ..., 19.jpg, 20.jpg)