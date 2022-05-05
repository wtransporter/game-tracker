## Game-Tracker app

Simple application for tracking matches:

-   Login
-   Add competition with groups (define number of groups and number of teams in group)
-   Assign clubs to a competition
-   Assign clubs to a competition group
-   Generate matches for a competition
-   View timetable
-   Edit game date and time
-   Mark game as started

## Project setup

1.  Download / clone project. Navigate to project folder.</br>
2.  Install composer dependencies

    ```
    composer install
    ```

3.  Install npm dependencies

    ```
    npm install
    ```

4.  Create .env file (copy from .env.example).</br>
    Generate application key:</br>

    ```
    php artisan key:generate
    ```

5.  Create empty DB and set up .env file with database information.</br>
6.  Run initial migrations and seeders:

    ```
    php artisan migrate --seed
    ```

    Users table contain demo user:</br>
    admin@test.com (password 12345678)</br>

7.  Create symlink

    ```
    php artisan storage:link
    ```

8.  Run server

    ```
    php artisan serve
    ```
