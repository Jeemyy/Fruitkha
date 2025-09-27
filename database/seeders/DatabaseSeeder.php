<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Product;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = [
            ['id' => 1 , 'name' => 'Cameras', 'description' => 'Description for Cameras', 'imagepath' => 'assets\img\images1.jpg'],
            ['id' => 2 , 'name' => 'Foods', 'description' => 'Description for Foods', 'imagepath' => 'assets\img\images2.jpg'],
            ['id' => 3 , 'name' => 'Electronics', 'description' => 'Description for Electronics', 'imagepath' => 'assets\img\images3.jpg'],
            ['id' => 4 , 'name' => 'Watches', 'description' => 'Description for Watches', 'imagepath' => 'assets\img\images4.jpg'],
            ['id' => 5 , 'name' => 'Bags' , 'description' => 'Description for Bags', 'imagepath' => 'assets\img\images5.jpg'],
            ['id' => 6 , 'name' => 'Makeup' , 'description' => 'Description for Makeup', 'imagepath' => 'assets\img\images6.jpg']
        ];
        DB::table('categories')->insertOrIgnore($categories); // is a Query Builder way
        // insertOrIgnore -> to check this data in database if in database exist don't insert it again
        // for($i=1 ; $i<=25 ; $i++){
        //     Product::create([ // is a Eloquent way
        //         'name' => 'Product '.$i,
        //         'description' => 'Description for Product '.$i,
        //         'imagepath' => 'assets\img\Cameras\image'.$i.'.jpg',
        //         'quantity' => rand(1,100),
        //         'price' => rand(10,500),
        //         'category_id' => rand(1,6)
        //     ]);
        // }
    }
}
