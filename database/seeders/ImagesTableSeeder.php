<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            'userId' => '1',
            'itemId' => '1',
            'URL' => 'alcohol_images/eleganceVodka.png'
        ]);

        DB::table('images')->insert([
            'userId' => '2',
            'itemId' => '2',
            'URL' => 'alcohol_images/eleganceVodka.png'
        ]);

        DB::table('images')->insert([
            'userId' => '3',
            'itemId' => '3',
            'URL' => 'alcohol_images/eleganceVodka.png'
        ]);

        DB::table('images')->insert([
            'userId' => '4',
            'itemId' => '4',
            'URL' => 'alcohol_images/eleganceVodka.png'
        ]);

        DB::table('images')->insert([
            'userId' => '5',
            'itemId' => '5',
            'URL' => 'alcohol_images/eleganceVodka.png'
        ]);

        DB::table('images')->insert([
            'userId' => '6',
            'itemId' => '5',
            'URL' => 'alcohol_images/eleganceVodka.png'
        ]);
    }
}
