# Laravel Task List App

This is a CRUD test project.

This is built on Laravel Framework 9.

## Installation

Clone the repository-
```
git clone https://github.com/petartrajkovic/laravel-crud-todo.git
```

Then cd into the folder with this command-
```
cd laravel-todo
```

Then create a environment file using this command-
```
cp .env.example .env
```

Then edit `.env` file with appropriate credential for your database server. Just edit these two parameter(`DB_USERNAME`, `DB_PASSWORD`).

Then create a database named `todos` and then do a database migration using this command-
```
php artisan migrate
```


At last generate application key, which will be used for password hashing, session and cookie encryption etc.
```
php artisan key:generate
```

## Run server

Run server using this command-
```
php artisan serve
```

Then go to `http://localhost:8000` from your browser and see the app.