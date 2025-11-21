<?php

namespace App\Console\Commands\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;

class AddCategories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insert:categories';

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
        {
            $dataToInsert=[
            ['category_icon'=>'<i class="fa-solid fa-person"></i>','category_name' => 'Mens', 'category_type' => 'main','main_category' => NULL, 'category_status' => '1','created_at' => now(), 'updated_at' =>now()],
            ['category_icon'=>'<i class="fa-solid fa-child-reaching"></i>','category_name' => 'Kids', 'category_type' => 'main','main_category' => NULL, 'category_status' => '1','created_at' => now(), 'updated_at' =>now()],
            ['category_icon'=>'<i class="fa-solid fa-shirt"></i>','category_name' => 'Shirts-M', 'category_type' => 'sub','main_category' =>"1", 'category_status' => '1','created_at' => now(), 'updated_at' =>now()],
            ['category_icon'=>'<i class="fa-solid fa-shirt"></i>','category_name' => 'Shirts-K', 'category_type' => 'sub','main_category' =>"2", 'category_status' => '1','created_at' => now(), 'updated_at' =>now()],
            ['category_icon'=>'<i class="fa-solid fa-glasses"></i>','category_name' => 'Glasses-M', 'category_type' => 'sub','main_category' =>"1", 'category_status' => '1','created_at' => now(), 'updated_at' =>now()],
        
            ['category_icon'=>'<i class="fa-solid fa-glasses"></i>','category_name' => 'Rayban', 'category_type' => 'sub','main_category' =>"5", 'category_status' => '1','created_at' => now(), 'updated_at' =>now()],
            ['category_icon'=>'<i class="fa-solid fa-glasses"></i>','category_name' => 'Police', 'category_type' => 'sub','main_category' =>"5", 'category_status' => '1','created_at' => now(), 'updated_at' =>now()],
            ['category_icon'=>'<i class="fa-solid fa-glasses"></i>','category_name' => 'Armani', 'category_type' => 'sub','main_category' =>"5", 'category_status' => '1','created_at' => now(), 'updated_at' =>now()],
            ['category_icon'=>'<i class="fa-solid fa-glasses"></i>','category_name' => 'Bridge', 'category_type' => 'sub','main_category' =>"6", 'category_status' => '1','created_at' => now(), 'updated_at' =>now()],
            ['category_icon'=>'<i class="fa-solid fa-glasses"></i>','category_name' => 'Simple', 'category_type' => 'sub','main_category' =>"6", 'category_status' => '1','created_at' => now(), 'updated_at' =>now()],
         
            ['category_icon'=>'<i class="fa-solid fa-shirt"></i>','category_name' => 'Dress', 'category_type' => 'sub','main_category' =>"3", 'category_status' => '1','created_at' => now(), 'updated_at' =>now()],
            ['category_icon'=>'<i class="fa-solid fa-shirt"></i>','category_name' => 'Casual', 'category_type' => 'sub','main_category' =>"3", 'category_status' => '1','created_at' => now(), 'updated_at' =>now()],
            ['category_icon'=>'<i class="fa-solid fa-shirt"></i>','category_name' => 'Fancy', 'category_type' => 'sub','main_category' =>"3", 'category_status' => '1','created_at' => now(), 'updated_at' =>now()],
            ['category_icon'=>'<i class="fa-solid fa-shirt"></i>','category_name' => 'Printed', 'category_type' => 'sub','main_category' =>"3", 'category_status' => '1','created_at' => now(), 'updated_at' =>now()],
            ['category_icon'=>'<i class="fa-solid fa-shirt"></i>','category_name' => 'Funky', 'category_type' => 'sub','main_category' =>"3", 'category_status' => '1','created_at' => now(), 'updated_at' =>now()],
          
            ['category_icon'=>'<i class="fa-solid fa-shirt"></i>','category_name' => 'Round Neck', 'category_type' => 'sub','main_category' =>"15", 'category_status' => '1','created_at' => now(), 'updated_at' =>now()],
            ['category_icon'=>'<i class="fa-solid fa-shirt"></i>','category_name' => 'V - Neck', 'category_type' => 'sub','main_category' =>"15", 'category_status' => '1','created_at' => now(), 'updated_at' =>now()],
            ['category_icon'=>'<i class="fa-solid fa-shirt"></i>','category_name' => 'Henley', 'category_type' => 'sub','main_category' =>"15", 'category_status' => '1','created_at' => now(), 'updated_at' =>now()],
          
            ['category_icon'=>'<i class="fa-solid fa-shirt"></i>','category_name' => 'Full Sleeve', 'category_type' => 'sub','main_category' =>"18", 'category_status' => '1','created_at' => now(), 'updated_at' =>now()],
            ['category_icon'=>'<i class="fa-solid fa-shirt"></i>','category_name' => 'Half Sleeve', 'category_type' => 'sub','main_category' =>"18", 'category_status' => '1','created_at' => now(), 'updated_at' =>now()],
         ];
    
        DB::table('categories')->truncate();
    
          DB::table('categories')->insert($dataToInsert);
          echo "Categories Inserted ! ";
        }
    }
}
