<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ProjectsTest extends DuskTestCase
{
    /**
     *
     *
     * @test
     */
    public function user_can_access_projects(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/projects')
                ->assertSee('Bread free');
        });
    }

}
