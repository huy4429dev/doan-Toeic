<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class toeic_question extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            [
                'content'       => 'Câu 1 part 1 - đề TOEIC ETS 2019 #51 ',
                'thumbnail'     => 'Ets_Toeic_2019_Test_1_1.png',
                'answer'        => 'A',
                'toeic_part_id' => 1,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'         => 'Câu 2 part 1 - đề TOEIC ETS 2019 #51 ',
                'thumbnail'       => 'Ets_Toeic_2019_Test_1_2.webp',
                'answer'          => 'B',
                'toeic_part_id'   => 1,
                'toeic_exam_id' => 1,
                'created_at'      => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'Câu 3 part 1 - đề TOEIC ETS 2019 #51 ',
                'thumbnail'     => 'Ets_Toeic_2019_Test_1_3.webp',
                'answer'        => 'C',
                'toeic_part_id' => 1,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'content'       => 'Câu 4 part 1 - đề TOEIC ETS 2019 #51 ',
                'thumbnail'     => 'Ets_Toeic_2019_Test_1_4.webp',
                'answer'        => 'A',
                'toeic_part_id' => 1,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'Câu 5 part 1 - đề TOEIC ETS 2019 #51 ',
                'thumbnail'     => 'Ets_Toeic_2019_Test_1_5.webp',
                'answer'        => 'A',
                'toeic_part_id' => 1,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'Câu 6 part 1 - đề TOEIC ETS 2019 #51 ',
                'thumbnail'     => 'Ets_Toeic_2019_Test_1_6.webp',
                'answer'        => 'A',
                'toeic_part_id' => 1,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],

            // PART 2 
            [
                'content'       => 'Mark your answer on your answer sheet.',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 2,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'Mark your answer on your answer sheet.',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 2,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'Mark your answer on your answer sheet.',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 2,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'Mark your answer on your answer sheet.',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 2,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'Mark your answer on your answer sheet.',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 2,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'Mark your answer on your answer sheet.',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 2,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'Mark your answer on your answer sheet.',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 2,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'Mark your answer on your answer sheet.',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 2,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'Mark your answer on your answer sheet.',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 2,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'Mark your answer on your answer sheet.',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 2,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'Mark your answer on your answer sheet.',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 2,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'Mark your answer on your answer sheet.',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 2,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'Mark your answer on your answer sheet.',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 2,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'Mark your answer on your answer sheet.',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 2,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'Mark your answer on your answer sheet.',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 2,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'Mark your answer on your answer sheet.',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 2,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'Mark your answer on your answer sheet.',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 2,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'Mark your answer on your answer sheet.',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 2,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'Mark your answer on your answer sheet.',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 2,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'Mark your answer on your answer sheet.',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 2,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'Mark your answer on your answer sheet.',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 2,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'content'       => 'Mark your answer on your answer sheet.',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 2,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'content'       => 'Mark your answer on your answer sheet.',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 2,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'content'       => 'Mark your answer on your answer sheet.',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 2,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'Mark your answer on your answer sheet.',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 2,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],

            // PART 3
            [
                'content'       => 'Why is the woman calling ?',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 3,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'According to the man, what has recently changed ?',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 3,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'What does the man agree to do ?',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 3,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'What is the topic of the conversation ?',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 3,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'What caused a problem ?',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 3,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'What will the listeners hear next ?',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 3,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'What does the woman notify the man about ?',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 3,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'According to the woman, what recently happened in her department ?',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 3,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'What does the man say he will do next ?',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 3,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'What does the man want to do ?',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 3,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'What is the man asked to choose ?',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 3,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'What does the woman suggest doing ?',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 3,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'What does the man offer to do ?',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 3,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'According to the man, what happened last week ?',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 3,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'Why does the woman say “a piece of hardware had to be custom made” ?',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 3,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'What product are the speakers discussing ?',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 3,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'What does Donna suggest ?',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 3,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'What does the man propose ?',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 3,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'Who most likely is the man ?',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 3,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'What does the woman ask the man for ?',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 3,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'What will the man receive ?',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 3,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'What type of product is being discussed ?',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 3,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'Which product feature is the man most proud of ?',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 3,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'Why does the man say, "my favorite singer is performing that night" ?',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 3,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'What type of event is being planned ?',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 3,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'What does the man ask about ?',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 3,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'What does the hotel offer for free ?',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 3,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'What problem does the man mention ?',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 3,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'Where are the speakers ?',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 3,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'What does the woman suggest the man do ?',
                'thumbnail'     => 'Ets_Toeic_2019_Test_1_62_64.webp',
                'answer'        => 'A',
                'toeic_part_id' => 3,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'What is the man having trouble with ?',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 3,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'Look at the graphic. Which code should the man use ?',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 3,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'What does the woman say will happen soon ?',
                'thumbnail'     => 'Ets_Toeic_2019_Test_1_65_67.webp',
                'answer'        => 'A',
                'toeic_part_id' => 3,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'What does the woman say they will need to do ?',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 3,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'What does the man suggest ?',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 3,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'Look at the graphic. Which section of the label will the man need to revise ?',
                'thumbnail'     => 'Ets_Toeic_2019_Test_1_68_70.webp',
                'answer'        => 'A',
                'toeic_part_id' => 3,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'What are the speakers mainly discussing ?',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 3,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'Look at the graphic. Which building is Silverby Industries located in ?',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 3,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'What does the woman tell the man about parking ?',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 3,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],

            // PART 4
            [
                'content'       => 'What type of business is being advertised ?',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 4,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'What will the listeners be able to do starting in April ?',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 4,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            // PART 5
            [
                'content'       => 'Ms. Durkin asked for volunteers to help _____ with the employee fitness program.',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 5,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'content'       => 'Lasner Electronics\' staff have extensive _____ of current hardware systems.',
                'thumbnail'     => '',
                'answer'        => 'A',
                'toeic_part_id' => 5,
                'toeic_exam_id' => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            // PART 6

            // PART 7
        ];

        foreach ($questions as $question) {
            DB::table('toeic_questions')->insert($question);
        }
    }
}
