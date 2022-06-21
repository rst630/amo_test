# Запуск
- `1. git clone https://github.com/rst630/amo_test.git`
- `2. cd amo_test/src && composer install`
- `3. cd .. && docker-compose -f .\data_sfera_container\docker-compose.yml up -d`
- `4. docker exec DATASFERA-php php artisan migrate`
- `5. в hosts прописать 127.0.0.1	test.com`
- `6. В браузере перейти на адрес http://test.com:8585`

При первом открытии страницы будет редирект на OAuth amo, после получения токена редирект назад на главную с выхлопом таблицы собранных данных, при каждом обновлении страницы данные запрашиваются из АМО и складываются в базу.

Токен кэшируется.
