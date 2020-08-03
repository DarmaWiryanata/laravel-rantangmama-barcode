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
            'name'  => 'Bakso Ayam Saos Madu RM',
            'price' => 28900
        ]);
        
        Product::create([
            'name'  => 'Bakso Ayam Super RM',
            'price' => 31000
        ]);
        
        Product::create([
            'name'  => 'Bakso Ayam Super "A MT',
            'price' => 13650
        ]);
        
        Product::create([
            'name'  => 'Bakso Ayam Super "B MT',
            'price' => 28518
        ]);
        
        Product::create([
            'name'  => 'Chicken Pandan RM',
            'price' => 32450
        ]);
        
        Product::create([
            'name'  => 'Chicken Pandan MT',
            'price' => 31990
        ]);
        
        Product::create([
            'name'  => 'BBQ Chicken Wings RM',
            'price' => 32300
        ]);
        
        Product::create([
            'name'  => 'BBQ Chicken Wings "A MT',
            'price' => 30950
        ]);
        
        Product::create([
            'name'  => 'BBQ Chicken Wings "B MT',
            'price' => 20790
        ]);
    }
}
