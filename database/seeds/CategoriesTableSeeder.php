<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Str;

use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categories= ['Html','Css','Php','Javascript'];
        foreach($categories as $category){
            // Create an instance
            $newCategory = new Category();
            // Populate  data
            $newCategory->name = $category;
            $newCategory->slug = Str::slug($category, '-');
            // Save data
            $newCategory->save();
        }
    }
}
