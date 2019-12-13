<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class toeic_exam extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $exams = [
            [
                'title'       => 'Thi thử đề TOEIC ETS 2019 #1',
                'thumbnail'   => 'de_thi_ets_2019_1.webp',
                'audio'       => 'Ets_Toeic_2019_Test_1.mp3',
                'description' => 'Đề thi Toeic ETS free',
                'status'      => 1,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title'       => 'Thi thử đề TOEIC ETS 2019 #2',
                'thumbnail'   => 'de_thi_ets_2019_2.webp',
                'audio'       => 'Ets_Toeic_2019_Test_1.mp3',
                'description' => 'Đề thi Toeic ETS free',
                'status'      => 1,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title'       => 'Thi thử đề TOEIC ETS 2019 #3',
                'thumbnail'   => 'de_thi_ets_2019_3.webp',
                'audio'       => 'Ets_Toeic_2019_Test_1.mp3',
                'description' => 'Đề thi Toeic ETS free',
                'status'      => 1,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title'       => 'Thi thử đề TOEIC ETS 2019 #4',
                'thumbnail'   => 'de_thi_ets_2019_4.webp',
                'audio'       => 'Ets_Toeic_2019_Test_1.mp3',
                'description' => 'Đề thi Toeic ETS free',
                'status'      => 1,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title'       => 'Thi thử đề TOEIC ETS 2019 #5',
                'thumbnail'   => 'de_thi_ets_2019_5.webp',
                'audio'       => 'Ets_Toeic_2019_Test_1.mp3',
                'description' => 'Đề thi Toeic ETS free',
                'status'      => 1,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ];

        foreach ($exams as $exam) {
            DB::table('toeic_exams')->insert($exam);
        }
    }
}
