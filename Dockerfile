FROM ubuntu:22.04

# Установка временной зоны
ENV TZ=Asia/Vladivostok
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# Установка зависимостей
RUN apt-get update && \
    apt-get install -y --no-install-recommends \
    apache2 \
    php \
    php-mysqli && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*


# Копируем проект и выдаем права
WORKDIR /var/www/html
COPY src /var/www/html
RUN chmod -R 755 /var/www/html
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
CMD ["apachectl", "-D", "FOREGROUND"]