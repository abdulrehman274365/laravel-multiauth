<?php

namespace App\Console\Commands\Websites;
use Illuminate\Support\Facades\DB;

use Illuminate\Console\Command;

class insert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insert:websites';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $dataToInsert = [
            ['user_id' => '1','category'=>'Ecommerce' ,'name' => 'Opticles', 'price' => 99.60, 'website' => 'https://web.whatsapp.com/', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => '1','category'=>'Chat' ,'name' => 'ChatWith', 'price' => 109.60, 'website' => 'https://web.whatsapp.com/', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => '1','category'=>'Trading' ,'name' => 'MarkXTrading', 'price' => 223, 'website' => 'https://web.whatsapp.com/', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => '1','category'=>'Books' ,'name' => 'EbookPro', 'price' => 87.60, 'website' => 'https://web.whatsapp.com/', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => '1','category'=>'Ecommerce' ,'name' => 'PayForMe', 'price' => 110.50, 'website' => 'https://web.whatsapp.com/', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => '1','category'=>'OTD' ,'name' => 'TicTic', 'price' => 148.60, 'website' => 'https://web.whatsapp.com/', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => '1','category'=>'Art' ,'name' => 'Illusion', 'price' => 99.60, 'website' => 'https://web.whatsapp.com/', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => '1','category'=>'Movies' ,'name' => 'MkMovies', 'price' => 299.60, 'website' => 'https://web.whatsapp.com/', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => '1','category'=>'Elecrtonics' ,'name' => 'E-Solutions', 'price' => 89.60, 'website' => 'https://web.whatsapp.com/', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => '1','category'=>'Services' ,'name' => 'CallUs', 'price' => 45.60, 'website' => 'https://web.whatsapp.com/', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => '1','category'=>'Construction' ,'name' => 'BURJ', 'price' => 23.60, 'website' => 'https://web.whatsapp.com/', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => '1','category'=>'Real Estate' ,'name' => 'Globe RE', 'price' => 104.60, 'website' => 'https://web.whatsapp.com/', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => '1','category'=>'Study' ,'name' => 'ReadySteadyGo', 'price' => 160, 'website' => 'https://web.whatsapp.com/', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => '1','category'=>'Learning' ,'name' => 'BrainJam', 'price' => 290, 'website' => 'https://web.whatsapp.com/', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => '1','category'=>'Games' ,'name' => 'KIDDO', 'price' => 167.30, 'website' => 'https://web.whatsapp.com/', 'created_at' => now(), 'updated_at' => now()],
        ];
        DB::table('websites')->truncate();
        DB::table('websites')->insert($dataToInsert);
        echo "Websites Inserted ! ";
    }
}
