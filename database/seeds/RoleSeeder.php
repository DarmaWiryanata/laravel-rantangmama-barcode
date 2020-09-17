<?php

use Illuminate\Database\Seeder;

use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'superadmin',
            'description' => 'Super Administrator'
        ]);
        
        Role::create([
            'name' => 'admin',
            'description' => 'Administrator'
        ]);
        
        Role::create([
            'name' => 'executive',
            'description' => 'Eksekutif'
        ]);
        
        Role::create([
            'name' => 'supervisor',
            'description' => 'Supervisor Marketing'
        ]);
        
        Role::create([
            'name' => 'marketing',
            'description' => 'Marketing'
        ]);
        
        Role::create([
            'name' => 'production',
            'description' => 'Produksi'
        ]);
        
        Role::create([
            'name' => 'shipping',
            'description' => 'Pengiriman'
        ]);
    }
}
