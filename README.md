# Curotec VB

> [!NOTE]
> This project was made as a challenge for a Job Opportunity. It required the usage of Laravel and Vue.js.
> I also used Laravel JetStream as a starting point utilizing the Inertia stack.

1. [Setup Instructions](#setup-instructions)
2. [Technical Decisions](#technical-decisions)
3. [Testing](#testing)

## Setup Instructions

- PHP 8.3
- Laravel 10
- Vue 3 with Composition API
- MySQL

> [!NOTE]
> Instructions to run this project locally:

Clone this repository:

```
git clone https://github.com/vitor-leitebraga/project-vb.git
cd project-vb
```

---

Install PHP dependencies:

```
composer install
```

---

Create the `.env` file from the example:

```
cp .env.example .env
```

---

Generate the application key:

```
php artisan key:generate
```

---

Create the database and run the migrations:

> [!IMPORTANT]
> Make sure your database is created and matches the name set in your `.env` file.

```
php artisan migrate
```

---

Install NPM dependencies:

```
npm ci
```

---

Build assets:

```
npm run build
```

---

Make sure Laravel's public/storage directory correctly serves files from storage/app/public:

```
php artisan storage:link
```

---

Run the server, the output will show the address:

> [!IMPORTANT]
> Ensure MySQL is running before starting the server.

```
php artisan serve
```

## Technical Decisions

### Backend

- Replaced traditional controllers with **Laravel Actions** (`lorisleiva/laravel-actions`) for better modularity.
- Used **middleware** to protect routes that require authentication, ensuring only logged-in users can access certain pages (e.g., `/games/create`).
- Implemented **authorization using Policies and Gate**, enforcing restrictions for actions such as editing and deleting games.

## Testing

- Integrated **PestPHP** for feature and unit testing.
- Configured a **dedicated test database** using `.env.testing` to prevent tests from affecting real data.
- Used **automatic database migrations in tests** (`RefreshDatabase`) to ensure a clean state for each test run.
- **Key test scenarios:**
	- Users **must be authenticated** to access certain pages.
	- A user **cannot edit or delete someone else's game** (tested using separate users in `Pest` feature tests).
	- File uploads are tested using `Storage::fake()` to simulate image storage.
	- API endpoints return expected responses and handle invalid inputs correctly.

To run tests:

> [!IMPORTANT]
> Make sure your database is created and matches the name set in your `.env.testing` file.
>
```
php artisan test
```

To run a specific test:
```
php artisan test --filter="user can edit their own game"
```

