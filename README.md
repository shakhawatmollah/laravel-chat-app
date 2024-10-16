## Chat/Broadcasting Application (Laravel + Reverb)

## About

This is a simple chat application built with Laravel and Reverb.

## Prerequisites (For Development)

- Laravel 11
- PHP 8.3
- Database (SQLite)
- Reverb
- Node.js

## Features

- **Real-time Messaging:** Chat messages are sent and received instantly using WebSocket technology.
- **User Authentication:** Register, login, and logout functionality for users.
- **Chat Rooms:** Users can create or join chat rooms to communicate with other users.
- **User Profiles:** View and edit user profile information.
- **Secure Communication:** Messages are transmitted securely over the network.

## Installation and Setup

Follow the instructions below to install and run the project on your local machine:

### Step 1: Clone the Repository

Clone the repository from GitHub:

```bash
git clone https://github.com/shakhawatmollah/laravel-chat-app.git
```

### Step 2: Navigate to the Project Directory

Change to the project directory:

```bash
cd laravel-chat-app
```

### Step 3: Install Dependencies

Install the required PHP and JavaScript dependencies:

```bash
composer install
npm install
```

### Step 4: Create an Environment File

Copy the `.env.example` file to a new file named `.env`:

```bash
cp .env.example .env
```

Configure the `.env` file with your database and other settings.

### Step 5: Generate an Application Key

Generate a new application key:

```bash
php artisan key:generate
```

### Step 6: Run Migrations and Seed the Database

Run the migrations to set up the database schema:

```bash
php artisan migrate
```

Seed the database with default data (if available):

```bash
php artisan db:seed
```

### Step 7: Start the WebSocket Server

To enable real-time messaging, you need to start the Reverb server:

```bash
php artisan reverb:start
```

### Step 8: Start the Application

Start the Laravel application:

```bash
php artisan serve
```

### Step 9: Access the Application

The application will run on `http://127.0.0.1:8000`

## References

- [Laravel](https://laravel.com)
- [Laravel Reverb](https://laravel.com/docs/5.9/echo#reverb)
