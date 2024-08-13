FROM tangramor/nginx-php8-fpm

WORKDIR /var/www/html

ENV WEBROOT /var/www/html/public

COPY . .

# RUN mkdir storage && \
#     mkdir storage/logs && \
#     mkdir storage/framework && \
#     mkdir storage/framework/cache && \
#     mkdir storage/framework/sessions && \
#     mkdir storage/framework/views && \
#     chmod -R 777 storage && \
#     chown -R www-data:www-data storage

RUN chown -R www-data:www-data storage && chmod -R 777 storage

RUN composer install --prefer-dist --no-dev --optimize-autoloader --no-interaction

# RUN echo "NODE Version:" && node --version
# RUN echo "NPM Version:" && npm --version
RUN npm install && npm run build