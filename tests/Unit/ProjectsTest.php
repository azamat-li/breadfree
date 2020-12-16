<?php

namespace Tests\Unit;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class ProjectsTest extends TestCase
{
    use RefreshDatabase;

    /**  @test */
    public function it_has_a_path()
    {
        $project = Project::factory()->create();

        self::assertEquals('/projects/' . $project->id, $project->path());
    }
}
