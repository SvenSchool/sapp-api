<?php

namespace App\Utilities;

use Illuminate\Http\Request;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ApiResponse
{
    /**
     * @var \Illuminate\Contracts\Routing\ResponseFactory
     */
    protected $response;

    /**
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * @var integer
     */
    private $statusCode = 200;

    /**
     * @var integer
     */
    protected $perPage = 25;

    /**
     * Instantiate the ApiResponse.
     *
     * @param \Illuminate\Contracts\Routing\ResponseFactory $response
     */
    public function __construct(ResponseFactory $response, Request $request)
    {
        $this->response = $response;
        $this->request = $request;
    }

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
    private function getStatusCode()
    {
        return $this->statusCode;
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
     * An alias for the respond method.
     *
     * @param  mixed $data
     * @param  array  $headers
     * @return \Illuminate\Http\Response
     */
    public function make(...$parameters)
    {
        return $this->respond($parameters);
    }

    /**
     * Respond with a generic error.
     *
     * @param  string $message
     * @return \Illuminate\Http\Response
     */
    private function withError($message)
    {
        return $this->respond([
            'error' => [
                'message' => $message,
                'status_code' => $this->getStatusCode(),
            ]
        ]);
    }

    /**
     * Respond with an error if the resource could not be found.
     *
     * @param  string $message
     * @return \Illuminate\Http\Response
     */
    public function notFound($message = 'The requested resource could not be found.')
    {
        return $this->setStatusCode(404)->respond()->withError($message);
    }

    /**
     * Respond with an internal server error if one occurs.
     *
     * @param  string $message
     * @return \Illuminate\Http\Response
     */
    public function internalError($message = 'The server encountered an internal error while processing your request.')
    {
        return $this->setStatusCode(500)->respond()->withError($message);
    }

    /**
     * Respond with an error if the user is not authorized to make the request.
     *
     * @param  string $message
     * @return \Illuminate\Http\Response
     */
    public function notAuthorized($message = 'You are not authorized to make this request.')
    {
        return $this->setStatusCode(401)->respond()->withError($message);
    }

    /**
     * Respond with paginated results.
     *
     * @param  array $data
     * @param  \Illuminate\Pagination\LengthAwarePaginator $items
     * @return array
     */
    public function withPagination(array $data, LengthAwarePaginator $items)
    {
        return array_merge($data, [
            'paginator' => [
                'total_count' => $items->total(),
                'total_pages' => ceil( $items->total() / $items->perPage() ),
                'current_page' => $items->currentPage(),
                'next_page' => $items->appends( $this->request->except('page') )->nextPageUrl(),
                'previous_page' => $items->appends( $this->request->except('page') )->previousPageUrl(),
            ],
        ]);
    }
}