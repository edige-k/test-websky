# Project Setup

## Command for Running the Project

To set up and run the project, follow these steps:

1. **Install Dependencies**

    ```bash
    composer install
    ```

2. **Run the Laravel Development Server**

    ```bash
    php artisan serve
    ```

## API for Searching Airports

The API endpoint for searching airports is:

http://localhost:8000/api/airports/search


### Request Payload

The request payload for the API can include the following parameters:

```json
{
    "search": "dubai",       // Optional
    "page": 1,               // Optional, minimum value is 1
    "per_page": 20           // Optional, minimum value is 30
}
