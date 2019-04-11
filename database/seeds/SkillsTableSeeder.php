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
            'name' => 'HTML5',
            'start_date' => 2003,
            'end_date' => 2019,
            'is_public' => true
        ],
        [
            'name' => 'CSS3',
            'start_date' => 2003,
            'end_date' => 2019,
            'is_public' => true
        ],
        [
            'name' => 'JavaScript',
            'start_date' => 2006,
            'end_date' => 2019,
            'is_public' => true
        ],
        [
            'name' => 'PHP',
            'start_date' => 2005,
            'end_date' => 2019,
            'is_public' => true
        ],
        [
            'name' => 'CakePHP',
            'start_date' => 2008,
            'end_date' => 2016,
            'is_public' => true
        ],
        [
            'name' => 'Laravel',
            'start_date' => 2017,
            'end_date' => 2019,
            'is_public' => true
        ],
        [
            'name' => 'MySQL',
            'start_date' => 2005,
            'end_date' => 2019,
            'is_public' => true
        ],
        [
            'name' => 'SQLite',
            'start_date' => 2009,
            'end_date' => 2019,
            'is_public' => false
        ],
        [
            'name' => 'C++',
            'start_date' => 2013,
            'end_date' => 2019,
            'is_public' => true
        ],
        [
            'name' => 'C#',
            'start_date' => 2018,
            'end_date' => 2019,
            'is_public' => true
        ],
        [
            'name' => 'C',
            'start_date' => 2013,
            'end_date' => 2019,
            'is_public' => true
        ],
        [
            'name' => 'Visual Basic .NET',
            'start_date' => 2009,
            'end_date' => 2011,
            'is_public' => true
        ],
        [
            'name' => 'Java',
            'start_date' => 2010,
            'end_date' => 2011,
            'is_public' => true
        ],
        [
            'name' => 'Python',
            'start_date' => 2011,
            'end_date' => 2019,
            'is_public' => false
        ],
        [
            'name' => 'NodeJS',
            'start_date' => 2014,
            'end_date' => 2015,
            'is_public' => true
        ],
        [
            'name' => 'jQuery',
            'start_date' => 2008,
            'end_date' => 2019,
            'is_public' => true
        ],
        [
            'name' => 'Bootstrap',
            'start_date' => 2013,
            'end_date' => 2019,
            'is_public' => true
        ],
        [
            'name' => 'LESS',
            'start_date' => 2011,
            'end_date' => 2016,
            'is_public' => false
        ],
        [
            'name' => 'SCSS',
            'start_date' => 2016,
            'end_date' => 2019,
            'is_public' => false
        ],
        [
            'name' => 'Docker',
            'start_date' => 2018,
            'end_date' => 2019,
            'is_public' => true
        ],
        [
            'name' => 'NGINX',
            'start_date' => 2013,
            'end_date' => 2019,
            'is_public' => true
        ],
        [
            'name' => 'Apache',
            'start_date' => 2005,
            'end_date' => 2014,
            'is_public' => true
        ],
        [
            'name' => 'Version Control',
            'start_date' => 2013,
            'end_date' => 2019,
            'is_public' => true
        ],
        [
            'name' => 'Visual Studio Code',
            'start_date' => 2018,
            'end_date' => 2019,
            'is_public' => false
        ],
        [
            'name' => 'Visual Studio',
            'start_date' => 2007,
            'end_date' => 2019,
            'is_public' => false
        ],
        [
            'name' => 'PhpStorm',
            'start_date' => 2011,
            'end_date' => 2017,
            'is_public' => false
        ],
        [
            'name' => 'Eclipse PDT',
            'start_date' => 2008,
            'end_date' => 2009,
            'is_public' => false
        ],
        [
            'name' => 'Aptana Studio',
            'start_date' => 2009,
            'end_date' => 2013,
            'is_public' => false
        ],
        [
            'name' => 'Adobe Photoshop',
            'start_date' => 2001,
            'end_date' => 2019,
            'is_public' => false
        ]
    ];
    public function run()
    {
        foreach ($this->skills as $skill) {
            $row = new Skill();
            $row->name = $skill['name'];
            $row->start_date = $skill['start_date'];
            $row->end_date = $skill['end_date'];
            $row->is_public = $skill['is_public'];
            $row->save();
        }
        //
    }
}
