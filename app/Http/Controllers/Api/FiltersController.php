<?php

namespace App\Http\Controllers\Api;

use App\Service\Search;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FiltersController extends Controller
{
    public function search()
    {
        return (new Search())->handle();
    }

    public function filters()
    {

    }
}
