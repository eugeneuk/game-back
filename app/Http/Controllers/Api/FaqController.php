<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\FaqResource;
use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    public function index()
    {
        return FaqResource::collection(Faq::get());
    }
}
