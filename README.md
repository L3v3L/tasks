## Livewire Tasks
This project showcases a simple web application for task management, built with Laravel and Livewire. It enables users to create, view, update, and delete tasks, manage their status, and interact with them in real-time. The application also includes a sample of tests to ensure reliability, along with a database seeder and factory to populate the system with sample data for testing and development purposes.

## Stack
* Laravel
* Livewire
* Tailwind CSS
* MySQL


## Installation
1. Clone the repository
```bash
git clone
```

2. Install dependencies
```bash
composer install
npm install
```

3. Copy the `.env.example` file to `.env`
```bash
cp .env.example .env
```

4. Create a new database and update the `.env` file with your database credentials

5. Run the migrations and seed the database
```bash
php artisan migrate --seed
```

6. Start the development server
```bash
php artisan serve
```

## Testing
To run the tests, use the following command:
```bash
php artisan test
```
