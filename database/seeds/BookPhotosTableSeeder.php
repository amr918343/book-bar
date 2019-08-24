<?php

use Illuminate\Database\Seeder;

class BookPhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('book_photos')->truncate();
        factory(\App\Models\book\BookPhoto::class, 60)->create();
    }
}
