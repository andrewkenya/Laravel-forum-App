<?php

use Illuminate\Database\Seeder;
use App\Discussion;

class DiscussionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $t1 = 'Implementing OAUTH2 with laravel passport';
        $t2 = 'Pagination in vuejs not working correctly';
        $t3 = 'Vue js event listeners for child components';
        $t4 =  'Laravel homestead error -undefined database';


        $d1 = [

            'title' => $t1,
            'content' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
            'channel_id' =>1,
            'user_id'=> 2,
            'slug' => str_slug($t1)

        ];

        $d2 = [

            'title' => $t2,
            'content' => 'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat',
            'channel_id' => 2,
            'user_id'=> 1,
            'slug' => str_slug($t2)

        ];



        $d3 = [

            'title' => $t3,
            'content' => 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',
            'channel_id' => 2,
            'user_id'=> 1,
            'slug' => str_slug($t3)

        ];


        $d4 = [

            'title' => $t4,
            'content' => 'Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut',
            'channel_id' => 5,
            'user_id'=> 1,
            'slug' => str_slug($t4)

        ];



        Discussion::create($d1);

        Discussion::create($d2);

        Discussion::create($d3);

        Discussion::create($d4);


    }
}
