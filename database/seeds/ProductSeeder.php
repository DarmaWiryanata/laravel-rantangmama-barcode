<?php

use Illuminate\Database\Seeder;

use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'BBQ CHICKEN WING MT',
            'stock' => '8'
        ]);
        
        Product::create([
            'name' => 'BBQ CHICKEN WING MT',
            'stock' => '12'
        ]);

        Product::create([
            'name' => 'BBQ CHICKEN WING RM',
            'stock' => '10'
        ]);

        Product::create([
            'name' => 'CHICKEN PANDAN MT',
            'stock' => '8'
        ]);

        Product::create([
            'name' => 'CHICKEN PANDAN RM',
            'stock' => '6'
        ]);

        Product::create([
            'name' => 'BAKSO AYAM MADU RM',
            'stock' => '15'
        ]);

        Product::create([
            'name' => 'BAKSO AYAM SUPER MT',
            'stock' => '15'
        ]);

        Product::create([
            'name' => 'BAKSO AYAM SUPER RM',
            'stock' => '20'
        ]);
    }
}
