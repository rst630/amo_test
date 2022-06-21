docker-compose -f .\data_sfera_container\docker-compose.yml up -d
docker exec DATASFERA-php php artisan migrate
