<?php

use Illuminate\Database\Seeder;
use App\Tag;
class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['Font End','Back End','Laravel', 'Vue', 'React'];

        foreach($tags as $tag){
            $newTag = new Tag();
            $newTag->name = $tag;
            $newTag->slug= Str::slug($tag, '-');
            $newTag->save();
        }

    }
}
