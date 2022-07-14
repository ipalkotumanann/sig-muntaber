## About SIG Dengue

This a Geograpical Information System to monitoring people who infected Dengue Fever.

## Development Guide

-   Clone this repository and go to cloned directory with `git clone https://gitlab.com/raya.secondary/sig-dengue.git && cd sig-dengue`
-   Install composer depedencies by running `composer install`
-   Duplicate .env file `cp .env_example .env`
-   Make sure your mysql user and password WAS SET AND CORRECT on .env file.
-   Set application key by run `php artisan key:generate`
-   Migrate tables and seed them by runnig `php artisan migrate --seed`
-   Install and build npm packages by running `npm install && npm run dev`
-   Create symlinks for laravel Storage simply by run `php artisan storage:link`
-   Serve this laravel application with `php artisan serve`
-   Go to `http://localhost:8000` on your favorite browser.
-   To dashboard page visit `http://localhost:8000/dashboard` insert email: `admin@email.com` and password `admin`
