# Laravel 8 Multi Role Management With Spatie

## Step: 1 Create a New Laravel 8 Application
`composer create-project laravel/laravel laravel-role-management`

After successfully create a project run some commands to generate breeze authentication.
```
composer require laravel/breeze --dev
php artisan breeze:install
npm install && npm run dev 
```

## Step: 2 Install Laravel Spatie Package
```
composer require spatie/laravel-permission
```
Optional: The service provider will automatically get registered. Or you may manually add the service provider in your `config/app.php` file

```
'providers' => [
    // ...
    Spatie\Permission\PermissionServiceProvider::class,
];
```

Publish The Package

```
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
```

## Step: 3 Add the necessary trait to your User model
```
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;

    // ...
}
```

## Step: 4 Make Migration Seeder

```
 php artisan make:seeder RolePermissionSeeder
 php artisan make:seeder UserTableSeeder
```
