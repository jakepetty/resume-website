<?php

namespace Tests\Unit;

use App\Project;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Faker\Factory as Faker;

class ProjectTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testProjectCreation()
    {
        $faker = Faker::create();
        $data = [
            'name' =>  $faker->sentence(4),
            'language' => $faker->languageCode,
            'description' => $faker->sentence(10),
            'url' => $faker->url,
            'github_id' => $faker->numberBetween(4123, 23958925)
        ];

        $project = new Project($data);

        $this->assertInstanceOf(Project::class, $project);
        $this->assertEquals($data['name'], $project->name, 'Project Name');
        $this->assertEquals($data['language'], $project->language, 'Project language');
        $this->assertEquals($data['description'], $project->description, 'Project description');
        $this->assertEquals($data['url'], $project->url, 'Project url');
        $this->assertEquals($data['github_id'], $project->github_id, 'Project github_id');
        $this->assertTrue($project->save());
    }
}
