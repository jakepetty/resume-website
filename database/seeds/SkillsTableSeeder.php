<?php
use App\Skill;
use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $skills = [
        [
            'name' => 'CSS',
            'start_date' => 2003,
            'end_date' => 2019
        ],
        [
            'name' => 'HTML',
            'start_date' => 2003,
            'end_date' => 2019
        ],
        [
            'name' => 'JavaScript',
            'start_date' => 2006,
            'end_date' => 2019
        ],
        [
            'name' => 'PHP',
            'start_date' => 2005,
            'end_date' => 2019
        ],
        [
            'name' => 'MySQL',
            'start_date' => 2005,
            'end_date' => 2019
        ],
        [
            'name' => 'C++',
            'start_date' => 2013,
            'end_date' => 2019
        ],
        [
            'name' => 'C#',
            'start_date' => 2018,
            'end_date' => 2019
        ],
        [
            'name' => 'C',
            'start_date' => 2013,
            'end_date' => 2019
        ],
        [
            'name' => 'VB.net',
            'start_date' => 2009,
            'end_date' => 2011
        ],
        [
            'name' => 'Java',
            'start_date' => 2010,
            'end_date' => 2011
        ],
        [
            'name' => 'Node.js',
            'start_date' => 2014,
            'end_date' => 2015
        ],
        [
            'name' => 'jQuery',
            'start_date' => 2008,
            'end_date' => 2019
        ],
        [
            'name' => 'CakePHP',
            'start_date' => 2008,
            'end_date' => 2016
        ],
        [
            'name' => 'Laravel',
            'start_date' => 2017,
            'end_date' => 2019
        ],
        [
            'name' => 'Bootstrap',
            'start_date' => 2013,
            'end_date' => 2019
        ],
        [
            'name' => 'NGINX',
            'start_date' => 2013,
            'end_date' => 2019
        ],
        [
            'name' => 'Apache',
            'start_date' => 2005,
            'end_date' => 2014
        ],
        [
            'name' => 'Version Control',
            'start_date' => 2013,
            'end_date' => 2019
        ]
    ];
    public function run()
    {
        foreach ($this->skills as $skill) {
            $row = new Skill();
            $row->name = $skill['name'];
            $row->start_date = $skill['start_date'];
            $row->end_date = $skill['end_date'];
            $row->save();
        }
        //
    }
}
