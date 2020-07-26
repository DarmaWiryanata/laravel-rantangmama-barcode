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
            'name' => 'BBQ CHICKEN WING MT'
        ]);

        Product::create([
            'name' => 'BBQ CHICKEN WING RM'
        ]);

        Product::create([
            'name' => 'CHICKEN PANDAN MT'
        ]);

        Product::create([
            'name' => 'CHICKEN PANDAN RM'
        ]);

        Product::create([
            'name' => 'BAKSO AYAM MADU RM'
        ]);

        Product::create([
            'name' => 'BAKSO AYAM SUPER MT'
        ]);

        Product::create([
            'name' => 'BAKSO AYAM SUPER RM'
        ]);
    }
}
