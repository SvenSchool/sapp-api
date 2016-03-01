<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    /**
     * @var integer
     */
    protected $perPage = 25;

    /**
     * Get the amount of items to show per page for the paginator.
     *
     * @param  integer $max
     * @return integer
     */
    protected function getPerPage($max = 50)
    {
        $perPage = app('request')->get('per_page');

        return $perPage ? ($perPage > $max ? $max : $perPage) : $this->perPage;
    }
}
