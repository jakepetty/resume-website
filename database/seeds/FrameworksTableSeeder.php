<?php

use Illuminate\Database\Seeder;

class FrameworksTableSeeder extends Seeder
{
    private $items = [
        ['name' => 'jQuery', 'url' => 'https://jquery.com/'],
        ['name' => 'Twitter Bootstrap', 'url' => 'https://getbootstrap.com/'],
        ['name' => 'Laravel', 'url' => 'https://laravel.com/'],
        ['name' => 'CakePHP', 'url' => 'https://cakephp.org/'],
        ['name' => 'Qt', 'url' => 'https://www.qt.io/'],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        foreach ($this->items as $item) {
            $db = new \App\Framework();
            $db->name = $item["name"];
            $db->url = $item["url"];
            $db->save();
        }
    }
}
