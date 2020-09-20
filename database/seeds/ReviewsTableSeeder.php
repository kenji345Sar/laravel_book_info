<?php

use App\Models\User;

use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('reviews')->insert([
            ['user_id' => 1,
            'title' => 'あああああ',
            'body' => 'あああああああああああああ',
            ],
            ['user_id' => 1,
            'title' => 'いいいいいい',
            'body' => 'いいいいいいいいいい',
            ],
            ['user_id' => 2,
            'title' => 'うううう',
            'body' => 'ううううううううう',
            ],
        ]);
    }
}
