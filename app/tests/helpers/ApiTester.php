<?php
/**
 * Created by PhpStorm.
 * User: moziz
 * Date: 2/2/2015
 * Time: 2:41 PM
 */
use Faker\Factory as Faker;

abstract class ApiTester extends TestCase{

    /**
     * @var Faker
     */
    protected $fake;


    function __construct()
    {
        $this->fake = Faker::create();
    }

    public function setUp(){

        parent::setUp();

        $this ->app['artisan']->call('migrate');
    }


    /**
     * get JSON output from API
     * @param $uri
     * @param string $method
     * @param array $parameters
     * @return mixed
     */
    protected function getJson($uri, $method = 'GET', $parameters =[])
    {

        return json_decode($this->call($method, $uri, $parameters)->getContent());
    }

    /**
     *assert object has any number of attributes
     */
    protected function assertObjectHasAttributes()
    {
        $args = func_get_args();
        $object = array_shift($args);

        foreach ($args as $attribute) {

            $this ->assertObjectHasAttribute($attribute, $object);

    }
    }

}

