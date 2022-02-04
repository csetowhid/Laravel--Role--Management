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
        // Permission List as array
        $permissions = [

            [
                'group_name' => 'dashboard',
                'permissions' => [
                    'dashboard.view',
                    'dashboard.edit',
                ]
            ],
            [
                'group_name' => 'blog',
                'permissions' => [
                    // Blog Permissions
                    'blog.create',
                    'blog.view',
                    'blog.edit',
                    'blog.delete',
                    'blog.approve',
                ]
            ],
            [
                'group_name' => 'admin',
                'permissions' => [
                    // admin Permissions
                    'admin.create',
                    'admin.view',
                    'admin.edit',
                    'admin.delete',
                    'admin.approve',
                ]
            ],
            [
                'group_name' => 'role',
                'permissions' => [
                    // role Permissions
                    'role.create',
                    'role.view',
                    'role.edit',
                    'role.delete',
                    'role.approve',
                ]
            ],
            [
                'group_name' => 'profile',
                'permissions' => [
                    // profile Permissions
                    'profile.view',
                    'profile.edit',
                ]
            ],
        ];

        // Do same for the admin guard for tutorial purposes
        $roleSuperAdmin = Role::create(['name' => 'superadmin', 'guard_name' => 'admin']);

        // Create and Assign Permissions
        for ($i = 0; $i < count($permissions); $i++) {
            $permissionGroup = $permissions[$i]['group_name'];
            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
                // Create Permission
                $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup, 'guard_name' => 'admin']);
                $roleSuperAdmin->givePermissionTo($permission);
                $permission->assignRole($roleSuperAdmin);
            }
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

## Step: 6 Make Resource Roles Controller 
```
php artisan make:controller Backend/RolesController --resource
```
Add This Code in <b>RolesController</b>
```
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


public function index()
    {
        $data['roles'] = Role::all();
        return view('backend.roles.index',$data);
    }

public function create()
    {
        $data['permissions'] = Permission::all();
        $data['permissiongroups'] = DB::table('permissions')
        ->select('group_name')
        ->groupBy('group_name')
        ->get();
        return view('backend.roles.create',$data);
    }

public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $role = Role::create([
            'name' => $request->name
        ]);

        $permissions = $request->permissions;

        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
            return redirect()->route('roles.index');
        }

        return back();
    }
```

Add `group_name` in <b>CreatePermissionTables</b> Migration
```
Schema::create($tableNames['permissions'], function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');       // For MySQL 8.0 use string('name', 125);
            $table->string('guard_name'); // For MySQL 8.0 use string('guard_name', 125);
            $table->string('group_name')->nullable(); //Add This Line
            $table->timestamps();

            $table->unique(['name', 'guard_name']);
        });
```