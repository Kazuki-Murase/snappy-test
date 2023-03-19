<?php

use Illuminate\Database\Seeder;

class HeadersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Header::class, 100)->create();
    }
}
