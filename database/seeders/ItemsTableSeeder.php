<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'name' => 'Elegance Vodka 750mL',
            'businessName' => 'Elegance',
            'description' => 'Elegance is an ultra-premium vodka made in Australia and 11 times distilled from Australian grapes for an incredibly smooth taste.',
            'recommendRetailPrice' => 99.99,
            'URL' => 'https://www.bevmart.com.au/products/elegance-vodka-750ml?variant=36377721700504&currency=AUD&utm_medium=product_sync&utm_source=google&utm_content=sag_organic&utm_campaign=sag_organic&gclid=EAIaIQobChMI0timmYOp8wIVEreWCh0iAwiKEAQYASABEgIJCfD_BwE'
        ]);

        DB::table('items')->insert([
            'name' => 'Patron Silver Tequila 700mL',
            'businessName' => 'Patron',
            'description' => 'Patron tequilas are handcrafted at the Hacienda Patron distillery in Jalisco, Mexico where people are the heart of the process - one that has remained the same since the very beginning. Skilled jimadors uproot only the finest 100% Weber Blue Agave with the perfect sugar content and transport the heart of the plant to Hacienda Patron.',
            'recommendRetailPrice' => 90.99,
            'URL' => 'https://liquorlegends.com.au/spirit/patron-silver-tequila-700ml?gclid=EAIaIQobChMI0timmYOp8wIVEreWCh0iAwiKEAQYAiABEgIEkPD_BwE'
        ]);

        DB::table('items')->insert([
            'name' => 'Jack Daniels Tennessee Whiskey 700mL',
            'businessName' => 'Jack Daniels',
            'description' => "This is the soul of American whiskey. Its distinct and unique taste comes from refining mellowing the freshly distilled whiskey drop by drop through 10 feet of sugar maple charcoal. The distilled whiskey is then matured in American Oak barrels hand-made by Jack Daniel's themselves. The only major distiller in the world to make their own barrels.",
            'recommendRetailPrice' => 57.99,
            'URL' => 'https://liquorlegends.com.au/spirit/jack-daniels-old-no_7-tennessee-whiskey-700ml?gclid=EAIaIQobChMI0timmYOp8wIVEreWCh0iAwiKEAQYBSABEgJ-iPD_BwE'
        ]);

        DB::table('items')->insert([
            'name' => 'Mod Selection Reserve Champagne 750mL',
            'businessName' => 'Mod Selection',
            'description' => "Mod Selection is a collaboration between Canadian superstar Drake and award-winning wine and spirits producer, Brent Hocking. Exclusively available at Bevmart, Mod Selection Reserve offers the purest expression of a balanced ‘House Style', layered with lively aromatics and vibrant white fruit.",
            'recommendRetailPrice' => 499.00,
            'URL' => 'https://www.bevmart.com.au/products/mod-selection-reserve-champagne-750ml?variant=37730559852736&currency=AUD&utm_medium=product_sync&utm_source=google&utm_content=sag_organic&utm_campaign=sag_organic&gclid=EAIaIQobChMI0timmYOp8wIVEreWCh0iAwiKEAQYByABEgKfb_D_BwE'
        ]);

        DB::table('items')->insert([
            'name' => 'Diplomatico Reserva Exclusiva Rum 700mL',
            'businessName' => 'Diplomatico',
            'description' => "Mod Selection is a collaboration between Canadian superstar Drake and award-winning wine and spirits producer, Brent Hocking. Exclusively available at Bevmart, Mod Selection Reserve offers the purest expression of a balanced ‘House Style', layered with lively aromatics and vibrant white fruit.",
            'recommendRetailPrice' => 106.99,
            'URL' => 'https://www.danmurphys.com.au/product/DM_873431/diplom-tico-reserva-exclusiva-rum-700ml?istCompanyId=72e03290-5965-42f7-8bb8-9cb18ec759c2&istFeedId=e92648bd-755e-4831-b8d0-df9c06b0776f&istItemId=xqlaqtttw&istBid=tztx&region_id=0002424&e_cid=ps:ds:GOOGLE:Shopping+%7C+Smart+%7C+Spirits+%7C+Rum:Rum:ds_keywords%3Dds_kw:PRODUCT_GROUP&gclid=EAIaIQobChMIwJeG7oSp8wIVirmWCh2wBQAyEAQYBSABEgI7GvD_BwE&gclsrc=aw.ds'
        ]);
    }
}
