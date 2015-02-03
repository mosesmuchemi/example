<?php
/**
 * Created by PhpStorm.
 * User: moziz
 * Date: 2/3/2015
 * Time: 9:40 AM
 */

trait Factory {


    /**
     * @var int
     */
    protected $times = 1;

    /**
     * number of times to make entities
     *
     * @param $count
     * @return $this
     */
    protected function times($count)
    {

        $this->times = $count;

        return $this;

    }

    /**
     * make a new record in the DB
     * @param $type
     * @param array $fields
     */
    protected function make($type, array $fields = []){

        while($this ->times--){

            $stub = array_merge($this -> getStub(), $fields);

            $type::create($stub);
        }

    }


    /**
     * @throws BadMethodCallException
     */
    protected function getStub(){

        throw new BadMethodCallException('Create your own getStub method to declare your own fields.');
    }


}