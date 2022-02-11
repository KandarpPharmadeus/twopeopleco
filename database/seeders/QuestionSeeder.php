<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
Use App\Models\Questions;


class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // php artisan db:seed --class=QuestionSeeder
        for ($i=0; $i < 20; $i++) { 
            Questions::create([
                'title' => Str::random(10),
                'content' => Str::random(100),
                'userId' => 1,
            ]);
       }
        
    }
}
