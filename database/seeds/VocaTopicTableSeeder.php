<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VocaTopicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cateTopic = [
            [
                'title' => 'Conferences',
                'thumbnail' => 'conferences',
                'category_id' => 1,
            ],
            [
                'title' => 'Electronics',
                'thumbnail' => 'electronics',
                'category_id' => 1,
            ],
            [
                'title'    => 'Pharmacy',
                'thumbnail'       => 'pharmacy',
                'category_id'      => 1,
            ],
            [
                'title'    => 'Accounting',
                'thumbnail'       => 'accounting',
                'category_id'      => 1,
            ],
            [
                'title'    => 'Airlines',
                'thumbnail'       => 'airlines',
                'category_id'      => 1,
            ],
            [
                'title'    => 'Banking',
                'thumbnail'       => 'banking',
                'category_id'      => 1,
            ]
        ];

        foreach ($cateTopic as $item) {
            DB::table('topics')->insert($item);
        }
    }
}
