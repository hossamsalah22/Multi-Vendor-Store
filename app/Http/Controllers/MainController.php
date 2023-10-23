<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

class MainController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;


    public function __construct(protected $model)
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:' . $this->model . '.index')->only(['index']);
        $this->middleware('permission:' . $this->model . '.create')->only(['create', 'store']);
        $this->middleware('permission:' . $this->model . '.show')->only(['show']);
        $this->middleware('permission:' . $this->model . '.update')->only(['edit', 'update']);
        $this->middleware('permission:' . $this->model . '.delete')->only(['destroy']);
        $this->middleware('permission:' . $this->model . '.ban')->only(['ban']);
        $this->middleware('permission:' . $this->model . '.restore')->only(['restore']);
        $this->middleware('permission:' . $this->model . '.activate')->only(['activate']);
    }
}
