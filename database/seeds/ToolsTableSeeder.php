<?php
use App\Tool;
use Illuminate\Database\Seeder;

class ToolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $tools = [
        [
            'name' => 'PhpStorm',
            'start_date' => 2012,
            'end_date' => 2018,
            'level' => 90
        ],
        [
            'name' => 'Eclipse PDT',
            'start_date' => 2010,
            'end_date' => 2012,
            'level' => 80
        ],
        [
            'name' => 'Aptana Studio',
            'start_date' => 2008,
            'end_date' => 2010,
            'level' => 90
        ],
        [
            'name' => 'MySQL Workbench',
            'start_date' => 2013,
            'end_date' => 2019,
            'level' => 80
        ],
        [
            'name' => 'Visual Studio Code',
            'start_date' => 2018,
            'end_date' => 2019,
            'level' => 60
        ],
        [
            'name' => 'Adobe Creative Suite',
            'start_date' => 2002,
            'end_date' => 2019,
            'level' => 80
        ],
        [
            'name' => 'Qt Creator',
            'start_date' => 2013,
            'end_date' => 2018,
            'level' => 90
        ],
        [
            'name' => 'Visual Studio',
            'start_date' => 2009,
            'end_date' => 2019,
            'level' => 55
        ],
        [
            'name' => 'Android Studio',
            'start_date' => 2014,
            'end_date' => 2015,
            'level' => 45
        ]
    ];
    public function run()
    {
        foreach ($this->tools as $tool) {
            $row = new Tool();
            $row->name = $tool['name'];
            $row->start_date = $tool['start_date'];
            $row->end_date = $tool['end_date'];
            $row->level = $tool['level'];
            $row->save();
        }
        //
    }
}
