<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table('products')->delete();

      $products = array(

            array(

              'title' => 'Wrist Watch',
              'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
              'image' => 'watch.png',
              'price' => 900.00

            ),

            array(

              'title' => 'Leather Suitcase',
              'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
              'image' => 'suitcase.png',
              'price' => 150.00

            ),

            array(

              'title' => 'Baseball Cap',
              'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
              'image' => 'cap.png',
              'price' => 6.99

            ),

            array(

              'title' => 'Leather Wallet',
              'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
              'image' => 'wallet.png',
              'price' => 60.00

            ),

            array(

              'title' => 'Sunglasses',
              'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
              'image' => 'sunglasses.png',
              'price' => 16.99

            ),

            array(

              'title' => 'Bracelet',
              'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
              'image' => 'bracelet.png',
              'price' => 10.99

            )
        );

        DB::table('products')->insert($products);

    }
}
