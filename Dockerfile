FROM php:8.3-cli

# Installer dépendances système
RUN apt-get update && apt-get install -y \
    unzip \
    curl \
    git \
    libzip-dev \
    zip \
    npm \
    && docker-php-ext-install zip

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Dossier app
WORKDIR /app

# Copier projet
COPY . .

# Installer dépendances Laravel
RUN composer install --no-dev --optimize-autoloader

# Installer dépendances frontend
RUN npm install && npm run build

# Générer cache Laravel
RUN php artisan config:cache

# Port Render
EXPOSE 10000

# Lancer serveur
CMD php artisan serve --host=0.0.0.0 --port=10000