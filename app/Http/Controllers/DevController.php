<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\View;
use View;

class DevController extends Controller
{
    //
    public function index()
    {
        $name = "Mary";
        $title = "My Cool Application";
        // return view('dev.index', ['title' => "My Cool Application", 'name' => $name]);
        // return view('dev.index', compact('name', 'title'));
        // return view('dev.index')->with(['name'=>$name, 'title'=>$title]);
        // return view('dev.index')->withName($name)->withTitle($title);
        return View::make('dev.index')->withName($name)->withTitle($title);
    }
}
