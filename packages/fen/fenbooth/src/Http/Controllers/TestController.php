<?php

namespace Fen\Fenbooth\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function index(){
        return '<h2>Test Controller</h2>';
    }
}
