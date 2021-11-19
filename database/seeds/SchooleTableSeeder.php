<?php

use Illuminate\Database\Seeder;

class SchooleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('schooles')->delete();

        factory(App\Models\Schoole::class, 10)->create();
    }
}
