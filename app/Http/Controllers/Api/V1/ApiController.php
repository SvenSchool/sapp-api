<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Routing\ResponseFactory;

class ApiController extends Controller
{
    /**
     * @var integer
     */
    protected $statusCode = 200;

    /**
     * Set the status code of the response.
     *
     * @param integer $code
     */
    protected function setStatusCode($code)
    {
        $this->statusCode = $code;

        return $this;
    }

    /**
     * Retrieve the status code for the request.
     *
     * @return integer
     */
    protected function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Respond with an error if the resource could not be found.
     *
     * @param  string $message
     * @return \Illuminate\Http\Response
     */
    public function notFound($message = 'The requested resource could not be found.')
    {
        return $this->setStatusCode(404)->respondWithError($message);
    }

    /**
     * Respond with an internal server error if one occurs.
     *
     * @param  string $message
     * @return \Illuminate\Http\Response
     */
    public function internalError($message = 'The server encountered an internal error while processing your request.')
    {
        return $this->setStatusCode(500)->respondWithError($message);
    }

    /**
     * Respond with an error if the user is not authorized to make the request.
     *
     * @param  string $message
     * @return \Illuminate\Http\Response
     */
    public function notAuthorized($message = 'You are not authorized to make this request.')
    {
        return $this->setStatusCode(401)->respondWithError($message);
    }

    /**
     * Create a response to give back to the user.
     *
     * @param  mixed  $data
     * @param  array  $headers
     * @return \Illuminate\Http\Response
     */
    public function respond($data = null, $headers = [])
    {
        if (! $data) return $this;

        return $this->response->make($data, $this->getStatusCode(), $headers);
    }

    /**
     * Respond with an error.
     *
     * @param  string $message
     * @return \Illuminate\Http\Response
     */
    private function respondWithError($message)
    {
        return $this->respond([
            'error' => [
                'message' => $message,
                'status_code' => $this->getStatusCode(),
            ]
        ]);
    }
}
