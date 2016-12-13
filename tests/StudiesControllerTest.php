<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StudiesControllerTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A test StudiesControllerTest.
     *
     * @return void
     */
    public function testIndex()
    {
        //dd(route('studies.index'));
        $user = factory(App\User::class)->create();
        $this->actingAs($user);
        /*
         * Aquest dos mètodes son correctes per depurar
         *
         * dd($this->call('GET', 'studies'));
         * $this->get('studies')->dump();
         *
         */
        $this->get('studies');
        $this->assertResponseOk();

        /*
         * 1) Preparation
         * 2) Execution
         * 3) Assertion
         */
    }
}
