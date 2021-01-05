<?php

namespace Tests\Browser;

use App\Models\Project;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ProjectsTest extends DuskTestCase
{

    use  WithFaker, DatabaseMigrations;

    /**  @test */
    public function user_can_access_projects(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/projects')
                ->assertSee('Bread free');
        });
    }

    /**  @test */
//    public function user_sees_no_projects_yet_if_no_projects_exitst()
//    {
//        $this->browse(function (Browser $browser){
//            $browser->visit('/projects')
//                ->assertSee(' No projects yet.');
//        });
//    }

//    TODO: refresh database
    /**  @test */
    public function user_can_access_project(): void
    {
        $project1 = Project::factory()->create();
        $project1->save();

//        $project1 = Project::find(3);

//        $project1= Project::create([
//            'title' => 'title1',
//            'description' => 'description1'
//        ]);

        $this->browse(function (Browser $browser) use ($project1) {
            $browser->visit($project1->path())
                ->assertSee('Bread free project')
                ->assertSee($project1->title)
                ->assertSee($project1->description);
        });

        $project1->delete();
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
