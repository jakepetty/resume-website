<?php

use Illuminate\Database\Seeder;

class ApplicationsTableSeeder extends Seeder
{
    private $items = [
        ['name' => 'Adobe Photoshop', 'url' => 'https://www.adobe.com/products/photoshop.html'],
        ['name' => 'VSCode', 'url' => 'https://code.visualstudio.com/'],
        ['name' => 'PhpStorm', 'url' => 'https://www.jetbrains.com/phpstorm/'],
        ['name' => 'Eclipse PDT', 'url' => 'https://www.eclipse.org/pdt/'],
        ['name' => 'Qt Creator', 'url' => 'https://www.qt.io/qt-features-libraries-apis-tools-and-ide/'],
        ['name' => 'Docker', 'url' => 'https://www.docker.com/'],
        ['name' => 'Version Control (Git)', 'url' => 'https://git-scm.com/'],
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
            $db = new \App\Application();
            $db->name = $item["name"];
            $db->url = $item["url"];
            $db->save();
        }
    }
}
