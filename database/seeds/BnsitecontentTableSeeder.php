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
                'title' => 'modal_phone',
                'content_en' => 'name: Luba',
                'content_ru' => 'имя: Люба',
                'content_ua' => 'імя: Люба',
                
            ],
            [
                'id' => 2,
                'title' => 'modal_phone_2',
                'content_en' => '0684805419',
                'content_ru' => '0684805419',
                'content_ua' => '0684805419',
            ],
            [
                'id' => 3,
                'title' => 'phone_2',
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
