<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;
class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::create(['name' => 'Item 1', 'quantity' => 10, 'price' => 19.99]);
        Item::create(['name' => 'Item 2', 'quantity' => 5, 'price' => 29.99]);
        Item::create(['name' => 'Item 3', 'quantity' => 15, 'price' => 9.99]);
        Item::create(['name' => 'Item 4', 'quantity' => 7, 'price' => 14.99]);
    }
}
