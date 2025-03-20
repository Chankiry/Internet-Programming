FROM php:8.2-fpm

# Ensure sources.list exists and configure repositories
RUN echo "deb http://deb.debian.org/debian bookworm main" > /etc/apt/sources.list && \
    echo "deb http://deb.debian.org/debian bookworm-updates main" >> /etc/apt/sources.list && \
    echo "deb http://security.debian.org/debian-security bookworm-security main" >> /etc/apt/sources.list

# Switch to HTTPS and install dependencies
RUN apt-get clean && \
    sed -i 's|http://deb.debian.org|https://deb.debian.org|g' /etc/apt/sources.list && \
    apt-get update && \
    apt-get install -y --fix-missing unzip curl git nodejs npm libzip-dev && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Continue with the rest of the Dockerfile
RUN docker-php-ext-install pdo pdo_mysql zip
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
WORKDIR /var/www