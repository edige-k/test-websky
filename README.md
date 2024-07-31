command for running the project:

composer install
php artisan serve

api for searching the airports:
http://localhost:8000/api/airports/search
payload:
{
    "search": "dubai" // not required
    page: 1, // not required and minimum value is 1
    per_page: 20 // not required and minimum value is 30
}