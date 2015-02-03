<?php
/**
 * Created by PhpStorm.
 * User: moziz
 * Date: 2/2/2015
 * Time: 12:02 PM
 */

// Acme\Transformers\TagTransformer;

class TagTransformer extends Transformer{

    /**
     * Transform a Lesson
     *
     * @param $tag
     * @return array
     */
    public function transform($tag)
    {


        return[
            'name' => $tag['name']
        ];


    }
}