<?php

use Illuminate\Database\Seeder;

use Faker\Generator as Faker;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            ['id' => 1,
            'name' => 'ジョブズ',
            'email' => 'user1@example.com',
            'password' => Hash::make('password123'),
            ],
            ['id' => 2,
            'name' => 'ザッカーバーグ',
            'email' => 'user2@example.com',
            'password' => Hash::make('password123'),
            ],
        ]);
        // factory(App\Models\User::class, 5)->create()->each(function ($user) {
        //     factory(App\Models\Review::class)->create('user_id',$user->id);
        // });

    }
}
