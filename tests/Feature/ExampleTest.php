<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function testLoginTest()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
    public function testRegisterTest()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }
    public function testProjectsTest()
    {
        $response = $this->get('/admin/projects');

        $response->assertStatus(302);
    }
    public function testSkillsTest()
    {
        $response = $this->get('/admin/skills');

        $response->assertStatus(302);
    }
}
