<?php
/**
 * Created by PhpStorm.
 * User: moziz
 * Date: 1/30/2015
 * Time: 3:01 PM
 */

namespace Acme\Transformers;


abstract class Transformer {

    /**
     * Transform a collection of lessons
     * @param $items
     * @return array
     */
    public function transformCollection(array $items)
    {
        return array_map([$this, 'transform'], $items);
    }

    public abstract function transform($item);
}