<?php
/**
 * Created by PhpStorm.
 * User: moziz
 * Date: 1/30/2015
 * Time: 4:46 PM
 */

use Illuminate\Http\Response as IlluminateResponse;
use Illuminate\Pagination\Paginator;

class ApiController extends BaseController{


    const HTTP_NOT_FOUND = 404;
    protected $statusCode =200;

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param mixed $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @param string $message
     * @return mixed
     */
    public function respondNotFound($message = 'Not Found!'){

        return $this -> setStatusCode(404) -> respondWithError($message);

    }

    public function respondInternalError($message = 'Internal Error!'){

        return $this -> setStatusCode(500) -> respondWithError($message);

    }

    /**
     * @param $data
     * @param array $headers
     * @return mixed
     */
    public function respond ($data, $headers =[]){

        return Response::json($data, $this->getStatusCode(),$headers);
    }

    /**
     * @param $message
     * @return mixed
     */
    public function respondWithError($message){

        return $this -> respond([
            'error' => [

                'message' => $message,
                'status_code' => $this -> getStatusCode()
            ]
        ]);

    }

    /**
     * @param message
     * @return mixed
     */
    protected function respondCreated($message)
    {
        return $this->setStatusCode(201)->respond([

            'message' => $message
        ]);
    }


    /**
     * @param Paginator $lessons
     * @param $data
     * @return mixed
     */
    protected function respondWIthPagination(Paginator $lessons, $data)
    {
        $data = array_merge($data, [
            'paginator' => [
                'total_count' => $lessons->getTotal(),
                'total_pages' => ceil($lessons->getTotal() / $lessons->getPerPage()),
                'current_page' => $lessons->getCurrentPage(),
                'limit' => $lessons->getPerPage()
            ]
        ]);
        return $this->respond($data);
    }


}