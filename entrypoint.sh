#!/bin/sh

# Instala as dependências do Composer
echo "Instalando dependências do Composer..."
composer install --optimize-autoloader

# Executa as migrações
echo "Executando as migrações..."
php artisan migrate --force

# Executa o seeding (opcional)
echo "Executando o seeding..."
php artisan db:seed --force

chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Inicia o PHP-FPM
echo "Iniciando o PHP-FPM..."
php-fpm &

# Inicia o worker de filas (opcional)
echo "Iniciando o worker de filas..."
php artisan queue:work

# Mantém o contêiner em execução
wait
