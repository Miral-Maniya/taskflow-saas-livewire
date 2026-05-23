# TaskFlow SaaS Demo

A modern Laravel 12 demo application showcasing scalable architecture, Livewire 3, Alpine.js, queues, APIs, and Laravel ecosystem integrations.

---

# Tech Stack

- Laravel 12
- PHP 8.2
- Livewire 3
- Alpine.js
- Tailwind CSS
- MySQL
- Laravel Horizon
- Laravel Scout
- TypeSense
- Laravel Cashier
- Sanctum API
- Queue Jobs
- Service Layer Architecture
- Repository Pattern

---

# Features

## Authentication

- User Registration
- Login / Logout
- Protected Dashboard

---

## Dashboard

- Task statistics
- Client statistics
- Pending task overview

---

## Task Management

- Livewire task table
- Real-time search
- Pagination
- Create task modal
- Alpine.js interactions

---

## Architecture

- Service Layer
- Repository Pattern
- Action Classes
- Queue Jobs
- Clean scalable folder structure

---

## API

- Sanctum authentication
- RESTful task endpoints

---

# Folder Structure

```bash
app/
├── Actions/
├── Http/
│   └── Controllers/
├── Jobs/
├── Livewire/
├── Models/
├── Providers/
├── Repositories/
│   ├── Eloquent/
│   └── Interfaces/
├── Services/
└── View/
    └── Components/
```

---

# Queue Example

Task creation dispatches queued jobs:

```php
SendTaskNotification::dispatch($task);
```

---

# Local Installation

## Clone Repository

```bash
git clone https://github.com/Miral-Maniya/taskflow-saas-livewire.git
```

---

## Move Into Project

```bash
cd taskflow-saas-livewire
```

---

## Install PHP Dependencies

```bash
composer install
```

---

## Install Node Dependencies

```bash
npm install
```

---

## Environment Setup

Create `.env` file:

```bash
cp .env.example .env
```

---

## Generate Application Key

```bash
php artisan key:generate
```

---

## Configure Database

Update `.env` file:

```env
APP_NAME=TaskFlow
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=taskflow
DB_USERNAME=root
DB_PASSWORD=

QUEUE_CONNECTION=database
CACHE_STORE=file
SESSION_DRIVER=file
```

---

## Run Migrations

```bash
php artisan migrate
```

---

## Seed Demo Data (Required for Demo Clients & Tasks)

```bash
php artisan db:seed
```

---

## Start Development Server

```bash
php artisan serve
```

---

## Start Vite

```bash
npm run dev
```

---

## Run Queue Worker

```bash
php artisan queue:work
```

---

# API Endpoints

## Get Tasks

```http
GET /api/tasks
```

## Create Task

```http
POST /api/tasks
```

## Update Task

```http
PUT /api/tasks/{id}
```

## Delete Task

```http
DELETE /api/tasks/{id}
```

---

# Project Highlights

- Livewire 3 SPA-like interactions
- Alpine.js modal integration
- Repository + Service architecture
- Queue architecture implementation
- RESTful API structure
- Horizon integration setup
- Scout integration structure
- Scalable folder structure
- Modern Laravel best practices

---

# Future Improvements

- Redis queue integration
- Docker environment
- Horizon dashboard monitoring
- TypeSense search indexing
- Stripe subscriptions with Cashier
- Role & permission management

# Author

Miral Maniya  
Senior PHP Laravel Developer

GitHub:  
https://github.com/Miral-Maniya/taskflow-saas-livewire