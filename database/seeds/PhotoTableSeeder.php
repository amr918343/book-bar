<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhotoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('user_photos')->truncate();
        factory(\App\Models\user\UserPhoto::class, 100)->create();
    }
}
