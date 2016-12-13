<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StudiesControllerTest extends TestCase
{
    use DatabaseMigrations;

//    public function testIndexNotLogin()
//    {
//        $this->get('studies');
//        $this->assertRedirectedTo('login');
//    }

    public function testIndex()
    {
        //dd(route('studies.index'));
        //$studies = factory(Scool\Curriculum\Models\Study::class,50)->create();
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
        $this->assertViewHas('studies');         //Comprova una vista estatica

        $studies = $this->response->getOriginalContent()->getData()['studies'];
        $this->assertInstanceOf(Illuminate\Database\Eloquent\Collection::class,$studies);

        /*
         * 1) Preparation
         * 2) Execution
         * 3) Assertion
         */
    }
}
