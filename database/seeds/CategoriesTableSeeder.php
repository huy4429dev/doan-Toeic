<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name'     => 'Từ Vựng',
                'title'   => 'Học 600 từ vựng hay gặp trong TOEIC',
                'description' => 'được chia theo chủ đề, với đầy đủ thông tin về từ',
                'thumbnail' => '/uploads/image/600_tu_vung_toeic.png',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'     => 'Ngữ pháp',
                'title'   => 'Học ngữ pháp tiếng Anh căn bản',
                'description' => 'với Chương trình Ngữ Pháp PRO',
                'thumbnail' => '/uploads/image/ngu_phap_toeic.png',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'     => 'Nghe',
                'title'   => 'Cải thiện kĩ năng nghe tiếng Anh',
                'description' => 'được chia theo chủ đề, với đầy đủ thông tin về từ',
                'thumbnail' => '/uploads/image/luyen_nghe_toeic.png',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert($category);
        }
    }
}
