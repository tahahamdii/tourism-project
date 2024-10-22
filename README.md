
# EcoTour - Sustainable Tourism Platform

EcoTour is a Laravel-based web application focused on promoting sustainable tourism. This project is designed to be deployed using Docker, providing an isolated environment for smooth development and deployment. This documentation will guide you through the setup, running the application, and other necessary configurations.

## Table of Contents

1. [Prerequisites](#prerequisites)
2. [Installation](#installation)
3. [Running the Application](#running-the-application)
4. [Docker Services](#docker-services)
5. [Environment Variables](#environment-variables)
6. [Database Configuration](#database-configuration)
7. [Testing](#testing)
8. [Additional Commands](#additional-commands)
9. [Contributing](#contributing)
10. [License](#license)

## Prerequisites

Ensure you have the following tools installed before proceeding:

- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/install/)
- [Composer](https://getcomposer.org/)
- [Node.js & NPM](https://nodejs.org/en/)

## Installation

Follow these steps to set up the project locally:

1. **Clone the repository**:
    ```bash
    git clone https://github.com/your-username/eco-tour.git
    cd eco-tour
    ```

2. **Install PHP dependencies**:
    ```bash
    composer install
    ```

3. **Install NPM dependencies**:
    ```bash
    npm install
    npm run dev
    ```

4. **Set up environment variables**:
    Copy the example environment file and modify it if needed:
    ```bash
    cp .env.example .env
    ```

5. **Generate application key**:
    ```bash
    php artisan key:generate
    ```

## Running the Application

### Using Docker Compose

This project is configured with Docker Compose to simplify running and managing services like MySQL, Redis, and Mailhog.

1. **Build and start the containers**:
    ```bash
    docker-compose up --build
    ```

2. Once the containers are up, you can access the application at [http://127.0.0.1:8000](http://127.0.0.1:8000).

To stop the containers, run:
```bash
docker-compose down
```
## Docker Services

The following services are defined in the docker-compose.yml:

App (Laravel): Runs the Laravel application.
Port 8000 on your host is mapped to port 80 in the container.
MySQL: Use your XAMPP's MySQL by setting the host to host.docker.internal.
Redis: Caching service running on port 6379.
Mailhog: Mail catching service for local development (Port: 1025).


# Dockerfile
```
FROM php:8.1-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Set working directory
WORKDIR /var/www

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy existing application directory
COPY . .

# Install composer dependencies
RUN composer install --no-scripts --no-autoloader

# Expose port 80
EXPOSE 80

# Start PHP-FPM
CMD ["php-fpm"]
```

# Environment Variables
```bash

APP_NAME=EcoTour
APP_ENV=local
APP_KEY=base64:89Tsg7HU3b+BwUM1O0eB9mp4cZEfVYRVL+oMxY0O2bU=
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=host.docker.internal
DB_PORT=3306
DB_DATABASE=HopeUi
DB_USERNAME=root
DB_PASSWORD=

CACHE_DRIVER=redis
QUEUE_CONNECTION=sync
SESSION_DRIVER=file

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

REDIS_HOST=redis
REDIS_PORT=6379
```

Ensure that you update the .env file with the correct database credentials.


# Database Configuration

This project uses MySQL as its database. The docker-compose.yml file references your local MySQL installation via host.docker.internal.

You can manage the database migrations using Laravel's built-in commands:
```bash
php artisan migrate

```
#Testing  
To run the tests, use the following command : 
```bash
php artisan test

```

# Contributing

Contributions are welcome! Please follow these steps to contribute:

Fork the project.
Create a new branch with your feature or bug fix: git checkout -b feature-name.
Commit your changes: git commit -m 'Add a new feature'.
Push to the branch: git push origin feature-name.
Submit a pull request.

# License
This project is open-source and available under the MIT License.


