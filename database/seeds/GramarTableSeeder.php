<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class GramarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gramars = [
            [
                'title' => 'Động từ Khiếm khuyết',
                'thumbnail' => 'ZiPe----vi_tri_dong_tu_trong_cau.webp',
                'category_id' => 2,
                'level'      => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')

            ],
            [
                'title' => 'Chức năng của Danh từ trong câu',
                'thumbnail' => 'ZiPe----vi_tri_dong_tu_trong_cau.webp',
                'category_id' => 2,
                'level'      => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')

            ],
            [
                'title' => 'Vị trí của Động từ trong câu',
                'thumbnail' => 'bZjr----vi_tri_danh_tu_trong_cau.png',
                'category_id' => 2,
                'level'      => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')

            ],
            [
                'title' => 'Vị trí của Tính từ trong câu',
                'thumbnail' => 'bZjr----vi_tri_danh_tu_trong_cau.png',
                'category_id' => 2,
                'level'      => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')

            ],
            [
                'title' => 'Ba Thì Tiếp diễn',
                'thumbnail' => 'z3xJ----thi_hien_tai_qua_khu_tuong_lai_hoan_thanh.webp',
                'category_id' => 2,
                'level'      => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')

            ],
            [
                'title' => 'Ba Thì Hoàn thành',
                'thumbnail' => 'z3xJ----thi_hien_tai_qua_khu_tuong_lai_hoan_thanh.webp',
                'category_id' => 2,
                'level'      => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')

            ],
            [
                'title' => 'Trạng từ chỉ cách thức và mức độ',
                'thumbnail' => 'tHeu----nang_cao_hoa_hop_chu_ngu_dong_tu.webp',
                'category_id' => 2,
                'level'      => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')

            ],
             [
                'title' => 'Đại từ Sở hữu',
                'thumbnail' => 'bZjr----vi_tri_danh_tu_trong_cau.png',
                'category_id' => 2,
                'level'      => 3,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')

            ],
            [
                'title' => 'Đại từ Phản thân',
                'thumbnail' => 'z3xJ----thi_hien_tai_qua_khu_tuong_lai_hoan_thanh.webp',
                'category_id' => 2,
                'level'      => 3,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')

            ],
            [
                'title' => 'Liên từ Phụ thuộc',
                'thumbnail' => 'lien_tu_phu_thuoc.webp',
                'category_id' => 2,
                'level'      => 3,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')

            ],
            [
                'title' => 'Bị động - Chủ động',
                'thumbnail' => 'lien_tu_phu_thuoc.webp',
                'category_id' => 2,
                'level'      => 4,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')

            ],
            [
                'title' => 'Động từ Khởi phát',
                'thumbnail' => 'z3xJ----thi_hien_tai_qua_khu_tuong_lai_hoan_thanh.webp',
                'category_id' => 2,
                'level'      => 4,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')

            ],
            [
                'title' => 'Mệnh đề Quan hệ',
                'thumbnail' => 'relative_clauses.png',
                'category_id' => 2,
                'level'      => 4,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')

            ],
            [
                'title' => 'Động từ Phức',
                'thumbnail' => 'relative_clauses.png',
                'category_id' => 2,
                'level'      => 5,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')

            ],
            [
                'title' => 'Rút gọn mệnh đề quan hệ',
                'thumbnail' => 'rut_gon_menh_de_quan_he.webp',
                'category_id' => 2,
                'level'      => 5,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')

            ],
            [
                'title' => 'Rút gọn mệnh đề trạng ngữ',
                'thumbnail' => 'rut_gon_menh_de_quan_he.webp',
                'category_id' => 2,
                'level'      => 5,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')

            ],

        ];
        foreach ($gramars as $gramar) {
            DB::table('topics')->insert($gramar);
        }
    }
}
