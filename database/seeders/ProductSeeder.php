<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            // Cappuccino
            ['name'=>'Cappuccino Classic', 'category'=>'coffee', 'image'=>'cappuccino1.jpg', 'description'=>'Classic cappuccino', 'price'=>350],
            ['name'=>'Cappuccino Mocha', 'category'=>'coffee', 'image'=>'cappuccino2.jpg', 'description'=>'Mocha flavored cappuccino', 'price'=>380],
            ['name'=>'Cappuccino Caramel', 'category'=>'coffee', 'image'=>'cappuccino3.jpg', 'description'=>'Caramel cappuccino', 'price'=>400],

            // Cold Brew
            ['name'=>'Cold Brew Vanilla', 'category'=>'coffee', 'image'=>'coldbrew1.jpg', 'description'=>'Vanilla cold brew', 'price'=>380],
            ['name'=>'Cold Brew Caramel', 'category'=>'coffee', 'image'=>'coldbrew2.jpg', 'description'=>'Caramel cold brew', 'price'=>400],

            // Mocha
            ['name'=>'Mocha Latte', 'category'=>'coffee', 'image'=>'mocha1.jpg', 'description'=>'Rich mocha latte', 'price'=>420],
            ['name'=>'Mocha Mint', 'category'=>'coffee', 'image'=>'mocha2.jpg', 'description'=>'Refreshing mint mocha', 'price'=>450],

            // Desserts
            ['name'=>'Cheesecake', 'category'=>'desserts', 'image'=>'cheesecake.jpg', 'description'=>'Creamy cheesecake', 'price'=>250],
            ['name'=>'Brownie', 'category'=>'desserts', 'image'=>'brownie.jpg', 'description'=>'Chocolate brownie', 'price'=>220],
            ['name'=>'Cupcake', 'category'=>'desserts', 'image'=>'cupcake.jpg', 'description'=>'Vanilla cupcake', 'price'=>200],

            // Tea
            ['name'=>'Green Tea', 'category'=>'tea', 'image'=>'greentea.jpg', 'description'=>'Refreshing green tea', 'price'=>200],
            ['name'=>'Chamomile Tea', 'category'=>'tea', 'image'=>'chamomile.jpg', 'description'=>'Relaxing chamomile tea', 'price'=>220],
            ['name'=>'Masala Tea', 'category'=>'tea', 'image'=>'masala.jpg', 'description'=>'Spiced masala tea', 'price'=>250],
        ];

        foreach ($products as $p) {
            Product::create($p);
        }
    }
}
