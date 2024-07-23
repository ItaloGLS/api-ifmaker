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

chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Inicia o Supervisor
echo "Iniciando o Supervisor..."
exec supervisord -c /etc/supervisor/conf.d/supervisor.conf
