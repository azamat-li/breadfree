<?php

namespace Tests\Browser;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ProjectsTest extends DuskTestCase
{

    use RefreshDatabase, WithFaker;

    /**  @test */
    public function user_can_access_projects(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/projects')
                ->assertSee('Bread free');
        });
    }

    //    TODO: drop database
    /**  @test */
//    public function user_sees_no_projects_yet_if_no_projects_exitst()
//    {
//        $this->browse(function (Browser $browser){
//            $browser->visit('/projects')
//                ->assertSee(' No projects yet.');
//        });
//    }

    /**  @test */
    public function user_can_access_project(): void
    {
        Project::factory()->create();

        $project = Project::find('1');

        $this->browse(function (Browser $browser) use (&$project) {
            $browser->visit('/projects/' . $project->id)
                ->assertSee('Bread free project')
                ->assertSee($project->title)
                ->assertSee($project->description);
        });

        $project->delete();
    }

    /**  @test */
    public function user_can_access_project_from_projects_page(): void
    {
        $project = Project::factory()->create();

        $this->browse(function (Browser $browser) use (&$project) {
            $browser->visit('/projects/')
                ->click("ul li a")
                ->assertSee('Bread free project');
        });
    }

}
