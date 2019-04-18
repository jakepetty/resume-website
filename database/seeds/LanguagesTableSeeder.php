<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $items = [
        'HTML5',
        'CSS3',
        'JavaScript',
        'SQL',
        'PHP',
        'C/C++',
        'Python'
    ];
    public function run()
    {
        //
        foreach ($this->items as $item) {
            $db = new \App\Language();
            $db->name = $item;
            $db->save();
        }
    }
}
