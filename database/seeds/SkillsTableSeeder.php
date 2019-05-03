<?php

use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $items = [
        'HTML5' => 16,
        'CSS3' => 16,
        'JavaScript' => 13,
        'SQL' => 13,
        'PHP' => 13,
        'Python' => 8,
        'SASS' => 4,
        'LESS' => 2,
        'jQuery' => 11,
        'Twitter Bootstrap' => 5,
        'Laravel' => 3,
        'CakePHP' => 11,
        'Adobe Photoshop' => 17,
        'VSCode' => 3,
        'Docker' => 1,
        'Version Control (Git)' => 8,
        'Gulp' => 1,
        'Webpack' => 2,
        'GitHub' => 8,
        'GitLab' => 3,
        'BitBucket' => 2,
        'MySQL' => 13,
        'PostgreSQL' => 2,
        'NGINX' => 7,
        'Apache' => 6
    ];
    public function run()
    {
        //
        foreach ($this->items as $key => $value) {
            $db = new \App\Skill();
            $db->name = $key;
            $db->years = $value;
            $db->save();
        }
    }
}
