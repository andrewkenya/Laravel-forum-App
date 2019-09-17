<?php

use Illuminate\Database\Seeder;
use App\Reply;


class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $r1 = [

            'user_id' => 1,
            'discussion_id' => 1,
            'content' => 'Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur',

        ];


        $r2 = [

            'user_id' => 1,
            'discussion_id' => 2,
            'content' => 'Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus',

        ];


        $r3 = [

            'user_id' => 2,
            'discussion_id' => 3,
            'content' => 'Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus',

        ];

        $r4 = [

            'user_id' => 2,
            'discussion_id' => 4,
            'content' => 'Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus',

        ];

        Reply::create($r1);

        Reply::create($r2);

        Reply::create($r3);

        Reply::create($r4);



    }
}
