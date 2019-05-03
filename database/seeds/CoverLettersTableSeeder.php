<?php

use Illuminate\Database\Seeder;
use App\CoverLetter;

class CoverLettersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $cl = new CoverLetter();
        $cl->name = "No Coverletter";
        $cl->body = "None";
        $cl->save();
    }
}
