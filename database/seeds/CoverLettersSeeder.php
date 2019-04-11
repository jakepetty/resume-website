<?php

use Illuminate\Database\Seeder;

class CoverLettersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = new \App\CoverLetter();
        $user->content = "Your text here";
        $user->save();
    }
}
