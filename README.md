Instructions:

1. git clone
2. cd to project root
3. Install Composer Dependencies >composer install
4. Create a copy of .env file >cp .env.example .env
5. Set up DB connection in .env
6. Generate an app encryption key >php artisan key:generate
7. Create the symbolic link >php artisan storage:link
8. Seed the DB with Factories data >php artisan db:seed
9. Run tests >php artisan test (Tests:  2 passed)
10. To start the app >php artisan serve
11. App\Services\CSVRetriever will read the file from storage/app/public, please make sure CSV file is placed there
