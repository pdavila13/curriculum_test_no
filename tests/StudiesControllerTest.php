<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Input;
use Scool\Curriculum\Models\Study;
use Scool\Curriculum\Repositories\StudyRepository;

class StudiesControllerTest extends TestCase
{
    use DatabaseMigrations;

    protected $repository;

    //executar el login abans d'executar els testos
    /**
     * StudiesControllerTest constructor.
     */
    public function __construct()
    {
        //substituir objectes per obj de mentira que definirem natros
        $this->repository = Mockery::mock(StudyRepository::class);
        //$this->login();
    }

    //Executar al final dels testos
    public function tearDown()
    {
        Mockery::close();
    }

    public function testIndexNotLogged()
    {
        $this->get('studies');
        $this->assertRedirectedTo('login');
    }
    
    public function testIndex()
    {
        //Fase 1: Preparation --> isolation/mocking
        $this->login();

        //rebras le metode all una vega i jo te dic que has de retornar "per ex: una colección"
        $this->repository->shouldReceive('all')->once()->andReturn($this->createDummyStudies());
        $this->repository->shouldReceive('pushCriteria')->once();

        $this->app->instance(StudyRepository::class, $this->repository);

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

        $this->assertInstanceOf(Illuminate\Support\Collection::class,$studies);
        $this->assertEquals(count($studies),3);
    }

    public function testStore()
    {
        $this->login();
        $this->post('studies');

//        $this->post('studies')->dump();
//        $this->assertRedirectedToRoute('studies.create');        //comprovar si ha un redireccionament a una ruta
    }

    private function createDummyStudies()
    {
        $study1 = new Study();
        $study2 = new Study();
        $study3 = new Study();

        $studies = [
            $study1,
            $study2,
            $study3
        ];

        return collect($studies);
    }

    public function login()
    {
        $user = factory(App\User::class)->create();
        $this->actingAs($user);
    }
}
