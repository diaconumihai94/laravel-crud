echo "Installing laravel project dependencies..."
composer install

echo "Creating sump autoload..."
composer dump-autoload

echo "Creating database docker container..."
docker-compose up -d

echo "Migrating database tables structure..."
php artisan migrate

echo "Inserting test data into the database..."
php artisan db:seed --class=ProductStockTableSeeder
php artisan db:seed --class=UsersTableSeeder

echo "Starting app..."
php artisan serve
