FROM php:fpm  AS php_builder

USER www-data

RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libzip-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# install Node.js & NPM
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

WORKDIR /var/www

COPY . .

RUN usermod -u 1000 www-data && \
    groupmod -g 1000 www-data && \
    chown -R www-data:www-data /var/www && \
    chmod -R 755 /var/www

RUN chmod -R 775 /var/www/storage /var/www/bootstrap/cache

RUN composer install --no-dev --optimize-autoloader

RUN npm install && npm run build


CMD ["php-fpm"]

FROM nginx:latest AS nginx_builder

USER www-data

COPY nginx/conf.d/ /etc/nginx/conf.d/

COPY --from=php_builder /var/www /var/www

RUN chmod 777 /var/run && \
    mkdir -p /var/run/nginx && \
    chmod 777 /var/run/nginx && \
    chown -R www-data:www-data /etc/nginx && chmod -R 755 /etc/nginx && \
    mkdir -p /var/cache/nginx && chown -R www-data:www-data /var/cache/nginx

RUN chmod -R 755 /var/www && chown -R www-data:www-data /var/www

EXPOSE 80

CMD ["nginx", "-g", "daemon off;"]
