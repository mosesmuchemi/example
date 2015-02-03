<?php

use Acme\Transformers\LessonTransformer;

class LessonsController extends ApiController {

	/**
	 * @var Acme\Transformers\LessonTransformer
	 */
	protected $lessonTransformer;

	function __construct(LessonTransformer $lessonTransformer)
	{
		$this -> lessonTransformer = $lessonTransformer;

		$this -> beforeFilter('auth.basic', ['on' => 'post']);
	}


	/**
	 * @return mixed
     */
	public function index()
	{

		$limit = Input::get('limit') ? : 3;
		$lessons = Lesson::paginate($limit);

		return $this->respondWIthPagination($lessons, [
			'data' => $this->lessonTransformer->transformCollection($lessons->all()),
		]);

	}




	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$lesson = Lesson::find($id);

		if (! $lesson){

			return $this -> respondNotFound('Lesson does not exist.');

		}

		return $this -> respond([

			'data' => $this -> lessonTransformer -> transform($lesson)

		]);
	}

	public function store (){

		if(! Input::get('title') or ! Input::get('body')){
			//return some kind of response
			//422
			//provide message

			return $this -> setStatusCode(422) -> respondWithError('Parameters failed for validation of lesson.');


		}


		Lesson::create (Input::all());

		return $this->respondCreated('Lesson successfully created.');

	}


}
