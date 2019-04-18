<?php

use Illuminate\Database\Seeder;

class ServersTableSeeder extends Seeder
{

    private $items = [
        ['name' => 'MySQL', 'url' => 'https://www.mysql.com/'],
        ['name' => 'PostgreSQL', 'url' => 'https://www.postgresql.org/'],
        ['name' => 'NGINX', 'url' => 'https://www.nginx.com/'],
        ['name' => 'Apache', 'url' => 'https://apache.org/']
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
            $db = new \App\Server();
            $db->name = $item["name"];
            $db->url = $item["url"];
            $db->save();
        }
    }
}
