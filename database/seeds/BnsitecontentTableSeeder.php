<?php

use Illuminate\Database\Seeder;

class BnsitecontentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [

            [
                'id' => 1,
                'title' => 'name_1',
                'content_en' => 'name: Luba',
                'content_ru' => 'имя: Люба',
                'content_ua' => 'імя: Люба',
                
            ],
            [
                'id' => 2,
                'title' => 'E-Mail',
                'content_en' => 'bn7854420@gmail.com',
                'content_ru' => 'bn7854420@gmail.com',
                'content_ua' => 'bn7854420@gmail.com',
            ],
            [
                'id' => 3,
                'title' => 'phone_1',
                'content_en' => '0684805419',
                'content_ru' => '0684805419',
                'content_ua' => '0684805419',
            ],

        ];

        foreach ($items as $item) {
            \App\Bnsitecontent::create($item);
        }
    }
    
}
