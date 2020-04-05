## Installation Steps

Follow the steps below to set up this project:

### Step 1: Clone the Repo

```
git clone https://github.com/shivanikoko/laravel-admin.git
```
check-in to the cloned directory

```
cd laravel-admin
```

### Step 2: Get the dependencies

To get all the dependencied aka vendor folder run `composer install`

```
composer install
```
```
composer update
```

    Alert!! Run composer update only on you local system never on server

### Step 3: setup env file

when you clone you only get `.env.example` file as `.env` file is always in gitignore, so create one for you with the reference of example file

```
cp .env.example .env
```

```
nano .env
```

change the DB setting 

```
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=your_db_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### Step 5: Run Migrations 

```
php artisan migrate
```

### Step 6: Run Seeders

```
php artisan db:seed
```

### Step 4: Create Super Admin

All Other Roles and Permissions will be create by Super Admin so create one first

```
php artisan create:super-admin
```    
and follow the instructions to set up super admin credentials 

### Step 6: Server as artisan

```
php artisan serve
```

## And Vola ! Login as Super Admin and created Roles for New Users

### Developers Guide
