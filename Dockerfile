# Usa a imagem oficial do PHP com FPM
FROM php:8.1-fpm

# Instala dependências do sistema e PHP
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libpq-dev \
    libzip-dev \
    unzip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install pdo pdo_pgsql zip

# Define o diretório de trabalho
WORKDIR /var/www/html

# Copia o Composer do contêiner oficial
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copia os arquivos da aplicação para o contêiner
COPY . .

COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh


# Instala as dependências do Composer
RUN composer install --no-dev --optimize-autoloader

# Configura permissões para o diretório storage e bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expõe a porta 9000 para o PHP-FPM
EXPOSE 9000

# Comando para iniciar o PHP-FPM
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
