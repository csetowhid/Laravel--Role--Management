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

Add Some Code In The Seeder File

<b>UserTableSeeder</b>
```
use App\Models\User;
use Illuminate\Support\Facades\Hash;

public function run()
    {
        User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make("12345678"),
        ]);
    }
```
<b>RolePermissionSeeder</b>
```
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

public function run()
    {
        // Create Roles
        $roleSuperAdmin = Role::create(['name' => 'superadmin']);
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleEditor = Role::create(['name' => 'editor']);
        $roleUser = Role::create(['name' => 'user']);


        // Permission List as array
        $permissions = [

            // Dashboard
            'dashboard.view',

            // Blog Permissions
            'blog.create',
            'blog.view',
            'blog.edit',
            'blog.delete',
            'blog.approve',

            // Admin Permissions
            'admin.create',
            'admin.view',
            'admin.edit',
            'admin.delete',
            'admin.approve',

            // Role Permissions
            'role.create',
            'role.view',
            'role.edit',
            'role.delete',
            'role.approve',

            // Profile Permissions
            'profile.view',
            'profile.edit'
        ];

        // Create and Assign Permissions

        for ($i = 0; $i < count($permissions); $i++) {
            // Create Permission
            $permission = Permission::create(['name' => $permissions[$i]]);
            $roleSuperAdmin->givePermissionTo($permission);
            $permission->assignRole($roleSuperAdmin);
        }
    }
```

Add This Seeders In <b>DatabaseSeeder</b>


```
public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(RolePermissionSeeder::class);
    }
```
## Step: 5 Template Layouting

## Step: 6 
