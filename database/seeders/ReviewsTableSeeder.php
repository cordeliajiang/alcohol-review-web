<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            'userId' => 1,
            'itemId' => 1,
            'rating' => 5,
            'reviewContent' => "Bought this as a present for someone else. It came in an unexpectedly elegant box with velvet and a display side. Can't wait to gift it, it looks amazing. Speedy delivery too!",
            'likes' => 0,
            'dislikes' => 0,
            'created_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);

        DB::table('reviews')->insert([
            'userId' => 2,
            'itemId' => 1,
            'rating' => 5,
            'reviewContent' => "Never tasted a vodka like this. exceptionally smooth. I first tried this at the Beverly Wilshire hotel in Beverly Hills and couldn't believe when I found it on here.",
            'likes' => 0,
            'dislikes' => 0,
            'created_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);

        DB::table('reviews')->insert([
            'userId' => 3,
            'itemId' => 1,
            'rating' => 5,
            'reviewContent' => "Outstanding design, an aesthetically pleasing addition to my home bar. Smooth and thoroughly enjoyable, Elegance not only in name but also by nature.",
            'likes' => 0,
            'dislikes' => 0,
            'created_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);

        DB::table('reviews')->insert([
            'userId' => 1,
            'itemId' => 2,
            'rating' => 5,
            'reviewContent' => "I have been drinking tequila for years and as far as Blanco or Silver style goes, Patron is the best.",
            'likes' => 0,
            'dislikes' => 0,
            'created_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);

        DB::table('reviews')->insert([
            'userId' => 1,
            'itemId' => 3,
            'rating' => 4,
            'reviewContent' => "Jack Daniels I love it it all styles Old No7 Bonded Tennessee Fire What more can i say Would love to try the rare Sinatra, however this is out of my affordability.",
            'likes' => 0,
            'dislikes' => 0,
            'created_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);

        DB::table('reviews')->insert([
            'userId' => 1,
            'itemId' => 4,
            'rating' => 5,
            'reviewContent' => "These pictures don’t do this bottle justice.. beautiful bottle, better champagne! I’ve tried many out there and nothing compares to this crisp clean taste.",
            'likes' => 0,
            'dislikes' => 0,
            'created_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);

        DB::table('reviews')->insert([
            'userId' => 1,
            'itemId' => 5,
            'rating' => 5,
            'reviewContent' => "Have only started to taste a few more Rums lately and so far this one really stands out. Very smooth, great depth in flavour and is best enjoyed neat (with or without ice).",
            'likes' => 0,
            'dislikes' => 0,
            'created_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);

        DB::table('reviews')->insert([
            'userId' => 2,
            'itemId' => 5,
            'rating' => 5,
            'reviewContent' => "I first had this at a friends place with a nice cigar and since then have bought a bottle for myself. This is one of my standard go-to drinks at home. I really enjoy it on the rocks, but is great by itself too.",
            'likes' => 0,
            'dislikes' => 0,
            'created_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);

        DB::table('reviews')->insert([
            'userId' => 3,
            'itemId' => 5,
            'rating' => 4,
            'reviewContent' => "Easy on the nose with light barrel flavours, I didn’t enjoy sipping this one but it went well with coke. ",
            'likes' => 0,
            'dislikes' => 0,
            'created_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);

        DB::table('reviews')->insert([
            'userId' => 4,
            'itemId' => 5,
            'rating' => 4,
            'reviewContent' => "The first sip was just a little disappointing but the aftertaste was excellent. This is a fine rum but when I consider the price I can't give it a 5 star rating.",
            'likes' => 0,
            'dislikes' => 0,
            'created_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);

        DB::table('reviews')->insert([
            'userId' => 5,
            'itemId' => 5,
            'rating' => 1,
            'reviewContent' => "Tastes like the inside of a barrel. I was expecting a something a little sweet and light. Maybe I should have saved a few dollars and bought a bottle of Malibu instead.",
            'likes' => 0,
            'dislikes' => 0,
            'created_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
    }
}
