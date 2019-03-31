<?php

use Illuminate\Database\Seeder;
use App\Skill;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    private $skills = [
        [
            'name' => 'CSS',
            'start_date' => 2003,
            'end_date' => 2019,
            'level' => 90
        ],
        [
            'name' => 'HTML',
            'start_date' => 2003,
            'end_date' => 2019,
            'level' => 100
        ],
        [
            'name' => 'JavaScript',
            'start_date' => 2006,
            'end_date' => 2019,
            'level' => 90
        ],
        [
            'name' => 'PHP',
            'start_date' => 2005,
            'end_date' => 2019,
            'level' => 90
        ],
        [
            'name' => 'MySQL',
            'start_date' => 2005,
            'end_date' => 2019,
            'level' => 85
        ],
        [
            'name' => 'C++',
            'start_date' => 2013,
            'end_date' => 2019,
            'level' => 80
        ],
        [
            'name' => 'C#',
            'start_date' => 2018,
            'end_date' => 2019,
            'level' => 40
        ],
        [
            'name' => 'C',
            'start_date' => 2013,
            'end_date' => 2019,
            'level' => 95
        ],
        [
            'name' => 'VB.net',
            'start_date' => 2009,
            'end_date' => 2011,
            'level' => 45
        ],
        [
            'name' => 'Java',
            'start_date' => 2010,
            'end_date' => 2011,
            'level' => 45
        ],
        [
            'name' => 'Node.js',
            'start_date' => 2014,
            'end_date' => 2015,
            'level' => 30
        ],
        [
            'name' => 'jQuery',
            'start_date' => 2008,
            'end_date' => 2019,
            'level' => 90
        ],
        [
            'name' => 'CakePHP',
            'start_date' => 2008,
            'end_date' => 2016,
            'level' => 90
        ],
        [
            'name' => 'Laravel',
            'start_date' => 2017,
            'end_date' => 2019,
            'level' => 75
        ],
        [
            'name' => 'Bootstrap',
            'start_date' => 2013,
            'end_date' => 2019,
            'level' => 70
        ],
        [
            'name' => 'NGINX',
            'start_date' => 2013,
            'end_date' => 2019,
            'level' => 70
        ],
        [
            'name' => 'Apache',
            'start_date' => 2005,
            'end_date' => 2014,
            'level' => 60
        ],
        [
            'name' => 'Version Control',
            'start_date' => 2013,
            'end_date' => 2019,
            'level' => 40
        ]
    ];
    public function run()
    {
        foreach($this->skills as $skill){
            $row = new Skill();
            $row->name = $skill['name'];
            $row->start_date = $skill['start_date'];
            $row->end_date = $skill['end_date'];
            $row->level = $skill['level'];
            $row->save();
        }
        // $this->call(UsersTableSeeder::class);
    }
}
