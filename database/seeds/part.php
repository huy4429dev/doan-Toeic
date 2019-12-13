<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
class part extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $toeicparts = [
                [
                    'title'     => 'Part 1',
                    'description' => 'Mô tả hình ảnh',
                    'thumbnail' => '/uploads/toeic/2019-12-07_093350.png',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'title'     => 'Part 2',
                    'description' => 'Hỏi và đáp',
                    'thumbnail' => '/uploads/toeic/2019-12-07_095040.png',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
    
                [
                    'title'     => 'Part 3',
                    'description' => 'Đoạn hội thoại',
                    'thumbnail' => '/uploads/toeic/2019-12-07_095126.png',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
    
                [
                    'title'     => 'Part 4',
                    'description' => 'Bài nói chuyện',
                    'thumbnail' => '/uploads/toeic/2019-12-07_095205.png',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
    
                [
                    'title'     => 'Part 5',
                    'description' => 'Điền vào câu',
                    'thumbnail' => '/uploads/toeic/2019-12-07_095238.png',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'title'     => 'Part 6',
                    'description' => 'Điền vào đoạn',
                    'thumbnail' => '/uploads/toeic/2019-12-07_095310.png',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
    
                [
                    'title'     => 'Part 7',
                    'description' => 'Đọc hiểu',
                    'thumbnail' => '/uploads/toeic/2019-12-07_095350.png',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
            ];
    
            foreach ($toeicparts as $toeicpart) {
                DB::table('toeic_parts')->insert($toeicpart);
            }
        }
    }
}
