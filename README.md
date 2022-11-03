# notification_assessment

This has been created using React and Laravel for frontend and backend separately.

## How to run frontend?

1. Create .env.development in root folder and set REACT_APP_SERVER_URL `REACT_APP_SERVER_URL=http://127.0.0.1:8000`
2. `npm install && npm start`

## How to run backend?
1. `composer install`
2. configure .env in root folder along with database configuration
```DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=notification
DB_USERNAME=root
DB_PASSWORD=root
```
3. `php artisan migrate --seed`
4. `php artisan serve`
