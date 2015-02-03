<?php
/**
 * Created by PhpStorm.
 * User: moziz
 * Date: 1/30/2015
 * Time: 3:36 PM
 */

namespace Acme\Transformers;


class LessonTransformer extends Transformer{

    /**
     * Transform a Lesson
     *
     * @param $lesson
     * @return array
     */
    public function transform($lesson)
    {


        return[
            'title' => $lesson['title'],
            'body' => $lesson['body'],
            'active' => (boolean) $lesson['some_bool']
        ];


    }
}