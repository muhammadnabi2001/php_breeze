<?php

namespace Database\Seeders;

use App\Models\Kitob;
use App\Models\Permission;
use App\Models\PermissionGroup;
use App\Models\Post;
use App\Models\Role;
use App\Models\Talaba;
use App\Models\Telefon;
use App\Models\Universitet;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);


        for ($i = 1; $i <= 10; $i++) {
            Telefon::create([
                'model' => 'model' . $i,
                'color' => 'color' . $i,
                'price' => rand(50, 99),
                'count' => rand(15, 75)
            ]);
        }
        for ($i = 1; $i <= 10; $i++) {
            Kitob::create([
                'name' => 'kitob' . $i,
                'author' => 'author' . $i,
                'price' => rand(15, 90)
            ]);
        }
        for ($i = 1; $i < 10; $i++) {
            Post::create([
                'title' => 'title' . $i,
                'description' => 'description' . $i,
                'text' => 'text' . $i,
                'img' => 'k.jpg'
            ]);
        }
        $role1 = Role::create(['name' => 'post']);
        $role2 = Role::create(['name' => 'kitob']);
        $role3 = Role::create(['name' => 'telfon']);
        $role4 = Role::create(['name' => 'user']);

        for ($i = 1; $i < 10; $i++) {
            $user = User::create([
                'name' => 'user' . $i,
                'email' => 'email' . $i . '@gmail.com',
                'password' => Hash::make('123456789')
            ]);
            $roleIds = Role::all()->pluck('id')->toArray(); 
            $user->roles()->attach($roleIds[array_rand($roleIds)]); 
        }

        $kitobGroup = PermissionGroup::firstOrCreate(['name' => 'kitob']);
        $postGroup = PermissionGroup::firstOrCreate(['name' => 'post']);
        $userGroup = PermissionGroup::firstOrCreate(['name' => 'user']);
        $telefonGroup = PermissionGroup::firstOrCreate(['name' => 'telefon']);

        $routes = Route::getRoutes();

        foreach ($routes as $route) {
            $routeName = $route->getName();

        
            if ($routeName && !str_starts_with($routeName, 'generated::') && $routeName !== 'storage.local') {
                $name = ucfirst(str_replace('.', '-', $routeName));

                
                if (str_starts_with($routeName, 'kitob')) {
                    $permission=Permission::create([
                        'key' => $routeName,
                        'name' => $name,
                        'permission_group_id' => $kitobGroup->id, 
                    ]);
                    $role2->permissions()->attach($permission->id); 
                } elseif (str_starts_with($routeName, 'post')) {
                    $permission=Permission::create([
                        'key' => $routeName,
                        'name' => $name,
                        'permission_group_id' => $postGroup->id, 
                    ]);
                    $role1->permissions()->attach($permission->id);
                } elseif (str_starts_with($routeName, 'user')) {
                   $permission=Permission::create([
                        'key' => $routeName,
                        'name' => $name,
                        'permission_group_id' => $userGroup->id, 
                    ]);
                    $role4->permissions()->attach($permission->id);
                } elseif (str_starts_with($routeName, 'telefon')) {
                   $permission=Permission::create([
                        'key' => $routeName,
                        'name' => $name,
                        'permission_group_id' => $telefonGroup->id, 
                    ]);
                    $role3->permissions()->attach($permission->id);
                }
            }
        }
    }
}
