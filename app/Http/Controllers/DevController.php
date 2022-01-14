<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
// use Illuminate\Support\Facades\View;
use View;

class DevController extends Controller
{
    //
    public function index(Request $request)
    {
        $request->session()->put('req-key', 'for request');
        session(['my-key' =>'Hello session']);
        dump($request->session()->all());
        $val = Session::pull('my-key');
        dump($val);
        dump($request->session()->all());
        Session::forget('req-key');
        dump($request->session()->all());

        session()->flash('message', 'Success message');
        dump($request->session()->all());


    }

    public function show(){
        $val = session('message');

        dump($val);
        dump(session()->all());
    }
}
