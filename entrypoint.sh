#!/bin/sh

# Instala as dependências do Composer
echo "Instalando dependências do Composer..."
composer install --optimize-autoloader

# Executa as migrações
echo "Executando as migrações..."
php artisan migrate --force


# Ajusta permissões para o diretório storage e bootstrap/cache
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Inicia o PHP-FPM
echo "Iniciando o PHP-FPM..."
php-fpm &

# Inicia o worker de filas (opcional)
echo "Iniciando o worker de filas..."
php artisan queue:work &

# Inicia o Nginx
echo "Iniciando o Nginx..."
service nginx start

# Mantém o contêiner em execução
wait
