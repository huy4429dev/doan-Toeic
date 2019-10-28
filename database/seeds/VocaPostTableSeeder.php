<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VocaPostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $catePost = [
            [
                'title' => 'ACCOMMODATE',
                'topic_id' => 1,
                'word_type' => 'Động từ',
                'pronounce' => '/əˈkɑːmədeɪt/',
                'use' => '...',
                'audio' => 'http://www.oxfordlearnersdictionaries.com/media/english/us_pron/a/acc/accom/accommodate__us_1.mp3',
            ],
            [
                'title' => 'HOLD',
                'topic_id' => 1,
                'word_type' => 'Động từ',
                'pronounce' => '/hoʊld/',
                'use' => '...',
                'audio' => 'http://www.oxfordlearnersdictionaries.com/media/english/us_pron/h/hol/hold_/hold__us_1.mp3',
            ]
        ];

        foreach ($catePost as $item) {
            DB::table('topics')->insert($item);
        }
    }
}
