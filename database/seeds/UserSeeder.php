<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Role;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username'  => 'admin',
            'password'  => Hash::make('admin123'),
        ])->roles()->attach(Role::where('name', 'admin')->first());
        
        User::create([
            'username'  => 'eksekutif',
            'password'  => Hash::make('eksekutif123'),
        ])->roles()->attach(Role::where('name', 'executive')->first());
        
        User::create([
            'username'  => 'supervisor',
            'password'  => Hash::make('supervisor123'),
        ])->roles()->attach(Role::where('name', 'supervisor')->first());
        
        User::create([
            'username'  => 'marketing',
            'password'  => Hash::make('marketing123'),
        ])->roles()->attach(Role::where('name', 'marketing')->first());

        User::create([
            'username'  => 'produksi',
            'password'  => Hash::make('produksi123'),
        ])->roles()->attach(Role::where('name', 'production')->first());

        User::create([
            'username'  => 'pengiriman',
            'password'  => Hash::make('pengiriman123'),
        ])->roles()->attach(Role::where('name', 'shipping')->first());
    }
}
