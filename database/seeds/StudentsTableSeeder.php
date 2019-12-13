<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'       => 'member',
                'email'      => 'member@gmail.com',
                'avatar'     => 'yasuo.jpg',
                'phone'      => '0985435431',
                'address'    => 'Vietnamese',
                'node'       => 'hashaghi !',
                'score'      => 100,
                'password'   => bcrypt('123456'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'       => 'Thai Bao',
                'email'      => 'thaibao@gmail.com',
                'avatar'     => 'skyhigh.jpeg',
                'phone'      => '0985435431',
                'address'    => 'Vietnamese',
                'node'       => 'hashaghi !',
                'score'      => 100,
                'password'   => bcrypt('123456'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'       => 'Võ Ngọc Thy',
                'email'      => 'vongocthy@gmail.com',
                'avatar'     => 'thyvo.webp',
                'phone'      => '0985435431',
                'address'    => 'Vietnamese',
                'node'       => 'hashaghi !',
                'score'      => 100,
                'password'   => bcrypt('123456'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'       => 'Hồng Hà',
                'email'      => 'hongha@gmail.com',
                'avatar'     => 'hongha2030.jpeg',
                'phone'      => '0985435431',
                'address'    => 'Vietnamese',
                'node'       => 'hashaghi !',
                'score'      => 100,
                'password'   => bcrypt('123456'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'       => 'Tuấn Anh',
                'email'      => 'tuananh@gmail.com',
                'avatar'     => 'pata.jpg',
                'phone'      => '0985435431',
                'address'    => 'Vietnamese',
                'node'       => 'hashaghi !',
                'score'      => 100,
                'password'   => bcrypt('123456'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'       => 'Uyên',
                'email'      => 'touyen@gmail.com',
                'avatar'     => 'to-uyen.jpg',
                'phone'      => '0985435431',
                'address'    => 'Vietnamese',
                'node'       => 'hashaghi !',
                'score'      => 100,
                'password'   => bcrypt('123456'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'       => 'Vy',
                'email'      => 'vy902000@gmail.com',
                'avatar'     => 'vivi.jpg',
                'phone'      => '0985435431',
                'address'    => 'Vietnamese',
                'node'       => 'hashaghi !',
                'score'      => 100,
                'password'   => bcrypt('123456'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'       => 'Tin tin',
                'email'      => 'tintin@gmail.com',
                'avatar'     => 'titin.jpg',
                'phone'      => '0985435431',
                'address'    => 'Vietnamese',
                'node'       => 'hashaghi !',
                'score'      => 100,
                'password'   => bcrypt('123456'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
         
    
         
        ];

        foreach ($users as $user) {
            DB::table('students')->insert($user);
        }
    }
}
