<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class toeic_answer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $answers = [
            [
                'A'           => 'A',
                'B'           => 'B',
                'C'           => 'C',
                'D'           => 'D',
                'id_question' => 1,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'A',
                'B'           => 'B',
                'C'           => 'C',
                'D'           => 'D',
                'id_question' => 2,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'A',
                'B'           => 'B',
                'C'           => 'C',
                'D'           => 'D',
                'id_question' => 3,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'A',
                'B'           => 'B',
                'C'           => 'C',
                'D'           => 'D',
                'id_question' => 4,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'A',
                'B'           => 'B',
                'C'           => 'C',
                'D'           => 'D',
                'id_question' => 5,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'A',
                'B'           => 'B',
                'C'           => 'C',
                'D'           => 'D',
                'id_question' => 6,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],

            // Part 2

            [
                'A'           => 'A',
                'B'           => 'B',
                'C'           => 'C',
                'id_question' => 7,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'A',
                'B'           => 'B',
                'C'           => 'C',
                'id_question' => 8,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'A',
                'B'           => 'B',
                'C'           => 'C',
                'id_question' => 9,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'A',
                'B'           => 'B',
                'C'           => 'C',
                'id_question' => 10,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'A',
                'B'           => 'B',
                'C'           => 'C',
                'id_question' => 11,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'A',
                'B'           => 'B',
                'C'           => 'C',
                'id_question' => 12,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'A',
                'B'           => 'B',
                'C'           => 'C',
                'id_question' => 13,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'A',
                'B'           => 'B',
                'C'           => 'C',
                'id_question' => 14,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'A',
                'B'           => 'B',
                'C'           => 'C',
                'id_question' => 15,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'A',
                'B'           => 'B',
                'C'           => 'C',
                'id_question' => 16,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'A',
                'B'           => 'B',
                'C'           => 'C',
                'id_question' => 17,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'A',
                'B'           => 'B',
                'C'           => 'C',
                'id_question' => 18,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'A',
                'B'           => 'B',
                'C'           => 'C',
                'id_question' => 19,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'A',
                'B'           => 'B',
                'C'           => 'C',
                'id_question' => 20,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'A',
                'B'           => 'B',
                'C'           => 'C',
                'id_question' => 21,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'A',
                'B'           => 'B',
                'C'           => 'C',
                'id_question' => 22,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'A',
                'B'           => 'B',
                'C'           => 'C',
                'id_question' => 23,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'A',
                'B'           => 'B',
                'C'           => 'C',
                'id_question' => 24,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'A',
                'B'           => 'B',
                'C'           => 'C',
                'id_question' => 25,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'A',
                'B'           => 'B',
                'C'           => 'C',
                'id_question' => 26,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'A',
                'B'           => 'B',
                'C'           => 'C',
                'id_question' => 27,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'A',
                'B'           => 'B',
                'C'           => 'C',
                'id_question' => 28,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'A',
                'B'           => 'B',
                'C'           => 'C',
                'id_question' => 29,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'A',
                'B'           => 'B',
                'C'           => 'C',
                'id_question' => 30,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'A',
                'B'           => 'B',
                'C'           => 'C',
                'id_question' => 31,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            // PART 3 
            [
                'A'           => 'To make an appointment.',
                'B'           => 'To rent a car.',
                'C'           => 'To ask about a fee.',
                'D'           => 'To apply for a position.',
                'id_question' => 32,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'Office hours.',
                'B'           => 'Job requirements.',
                'C'           => 'A Computer system.',
                'D'           => 'A company policy.',
                'id_question' => 33,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'Waive a fee.',
                'B'           => 'Reschedule a meeting.',
                'C'           => 'Sign a contract.',
                'D'           => 'Repair a vehicle.',
                'id_question' => 34,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'Health.',
                'B'           => 'Traffic.',
                'C'           => 'Sports.',
                'D'           => 'Finance.',
                'id_question' => 35,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'A staffing change.',
                'B'           => 'A rainstorm.',
                'C'           => 'A typographical error.',
                'D'           => 'A road closure.',
                'id_question' => 36,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'A commercial.',
                'B'           => 'A song.',
                'C'           => 'A weather report.',
                'D'           => 'A reading from a book.',
                'id_question' => 37,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'She is unable to meet a deadline.',
                'B'           => 'She needs a replacement laptop.',
                'C'           => 'She cannot attend a business trip.',
                'D'           => 'She is planning to give a speech.',
                'id_question' => 38,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'A corporate policy was updated.',
                'B'           => 'A supply order was mishandled.',
                'C'           => 'Client contracts were renewed.',
                'D'           => 'New employees were hired.',
                'id_question' => 39,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'Speak with a colleague.',
                'B'           => 'Conduct an interview.',
                'C'           => 'Calculate a budget.',
                'D'           => 'Draft a travel itinerary.',
                'id_question' => 40,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'Purchase an area map.',
                'B'           => 'See an event schedule.',
                'C'           => 'Cancel a hotel reservation.',
                'D'           => 'Book a bus tour',
                'id_question' => 41,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'When to arrive.',
                'B'           => 'What to visit.',
                'C'           => 'How to pay.',
                'D'           => 'What to eat',
                'id_question' => 42,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'Wearing a jacket.',
                'B'           => 'Using a credit card.',
                'C'           => 'Bringing a camera.',
                'D'           => 'Looking for a coupon.',
                'id_question' => 43, 
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'Meet in the lobby.',
                'B'           => 'Contact a receptionist',
                'C'           => 'Carry some files.',
                'D'           => 'Delay a meeting',
                'id_question' => 44,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'An office door would not lock.',
                'B'           => 'A sink was installed incorrectly.',
                'C'           => 'An elevator stopped working.',
                'D'           => 'A document was lost.',
                'id_question' => 45,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'To justify a price.',
                'B'           => 'To explain a delay.',
                'C'           => 'To illustrate a product\'s age.',
                'D'           => 'To express regret for a purchase',
                'id_question' => 46,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'Electronics.',
                'B'           => 'Office furniture.',
                'C'           => 'Calendars.',
                'D'           => 'Clothing.',
                'id_question' => 47,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'Hiring additional staff.',
                'B'           => 'Revising a budget.',
                'C'           => 'Posting some photos online.',
                'D'           => 'Reducing prices.',
                'id_question' => 48,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'Postponing a decision.',
                'B'           => 'Conducting a survey.',
                'C'           => 'Developing new products.',
                'D'           => 'Opening another location.',
                'id_question' => 49,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'A manager.',
                'B'           => 'A consultant.',
                'C'           => 'A client.',
                'D'           => 'A trainee.',
                'id_question' => 50,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'Some feedback.',
                'B'           => 'Some assistance',
                'C'           => 'Some references.',
                'D'           => 'Some dates.',
                'id_question' => 51,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'Extra time off.',
                'B'           => 'A promotion.',
                'C'           => 'Bonus pay.',
                'D'           => 'An award.',
                'id_question' => 52,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'A musical instrument.',
                'B'           => 'A kitchen appliance.',
                'C'           => 'A power tool.',
                'D'           => 'A tablet computer.',
                'id_question' => 53,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'The battery life.',
                'B'           => 'The color selection.',
                'C'           => 'The sound quality.',
                'D'           => 'The size.',
                'id_question' => 54,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'To request a schedule change.',
                'B'           => 'To explain a late arrival',
                'C'           => 'To decline an invitation.',
                'D'           => 'To recommend a musician.',
                'id_question' => 55,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'A trade show.',
                'B'           => 'An awards ceremony.',
                'C'           => 'A film festival.',
                'D'           => 'A wedding.',
                'id_question' => 56,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'Accommodations.',
                'B'           => 'Entertainment.',
                'C'           => 'Meal options.',
                'D'           => 'Outdoor seating.',
                'id_question' => 57,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'Meals.',
                'B'           => 'Internet access.',
                'C'           => 'Transportation.',
                'D'           => 'Parking.',
                'id_question' => 58,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'His car is out of fuel.',
                'B'           => 'His phone battery is empty.',
                'C'           => 'He is late for an appointment.',
                'D'           => 'He forgot his wallet.',
                'id_question' => 59,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'At a train station.',
                'B'           => 'At an electronics repair shop.',
                'C'           => 'At a furniture store.',
                'D'           => 'At a coffee shop.',
                'id_question' => 60,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'Check a Web site.',
                'B'           => 'Call a taxi.',
                'C'           => 'Return at a later time.',
                'D'           => 'Go to the library.',
                'id_question' => 61,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'Conducting a test.',
                'B'           => 'Preparing a bill.',
                'C'           => 'Contacting a patient.',
                'D'           => 'Shipping an order.',
                'id_question' => 62,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'T018.',
                'B'           => 'T019.',
                'C'           => '020.',
                'D'           => '021.',
                'id_question' => 63,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'Some patients will be transferred to another doctor.',
                'B'           => 'Some employees will join a medical practice.',
                'C'           => 'A list will be available electronically.',
                'D'           => 'A doctor will begin a medical procedure.',
                'id_question' => 64,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'Rent storage space.',
                'B'           => 'Increase production.',
                'C'           => 'Organize a fashion show.',
                'D'           => 'Update some equipment.',
                'id_question' => 65,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'Conferring with a client.',
                'B'           => 'Contacting another department.',
                'C'           => 'Photographing some designs.',
                'D'           => 'Changing suppliers.',
                'id_question' => 66,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'The logo.',
                'B'           => 'The material.',
                'C'           => 'The care instructions.',
                'D'           => 'The country of origin.',
                'id_question' => 67,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'A job interview.',
                'B'           => 'A company celebration.',
                'C'           => 'An office relocation.',
                'D'           => 'A landscaping project.',
                'id_question' => 68,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'Building 1.',
                'B'           => 'Building 2.',
                'C'           => 'Building 3.',
                'D'           => 'Building 4.',
                'id_question' => 69,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'He should park in a visitor\'s space.',
                'B'           => 'He will have to pay at a meter',
                'C'           => 'A parking pass is required.',
                'D'           => 'The parking area fills up quickly.',
                'id_question' => 70,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],

            // PART 4 
            [
                'A'           => 'A farmers market.',
                'B'           => 'A fitness center.',
                'C'           => 'A medical clinic.',
                'D'           => 'A sporting goods store.',
                'id_question' => 71,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'Use multiple locations.',
                'B'           => 'HTry free samples.',
                'C'           => 'Meet with a nutritionist.',
                'D'           => 'Enter a contest.',
                'id_question' => 72,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],

            // PART 5

            [
                'A'           => 'she',
                'B'           => 'her',
                'C'           => 'hers',
                'D'           => 'hershell',
                'id_question' => 73,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'A'           => 'know',
                'B'           => 'known',
                'C'           => 'knowledge',
                'D'           => 'knowledgeable',
                'id_question' => 74,
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],

            // PART 6

            // PART 7

        ];

        foreach ($answers as $answer) {
            DB::table('toeic_answer')->insert($answer);
        }
    }
}
