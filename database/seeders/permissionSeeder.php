<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class permissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissionsCustomer = [
           
            Str::snake('Booking create'),
            Str::snake('Booking read'),

            Str::snake('Service read'),
           
        ];
      
         $permissionsOwner = [
           
            Str::snake('Booking create'),
            Str::snake('Booking delete'),
            Str::snake('Booking update'),
            Str::snake('Booking read'),
            
            Str::snake('Service create'),
            Str::snake('Service update'),
            Str::snake('Service delete'),
            Str::snake('Service read'),
           
        ];
        foreach($permissionsOwner as $permission){
            if (Permission::where('name', $permission)->count() == 0) {
                Permission::create([
                    'name' => $permission,
                    'guard_name' => 'Web',
                ]);
            }
        }

        Role::firstOrCreate(['name' => 'Admin', 'guard_name' => 'Web'])->givePermissionTo(Permission::whereIn('name', $permissionsOwner)->get());

    
        $permissionsCustomer = [
           
            Str::snake('Booking create'),
            Str::snake('Booking read'),
            Str::snake('Service read'),
           
        ];
        Role::firstOrCreate(['name' => 'Customer', 'guard_name' => 'Web'])->givePermissionTo(Permission::whereIn('name', $permissionsCustomer)->get());
    }
}
