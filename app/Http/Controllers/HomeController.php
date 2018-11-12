<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::query()->orderBy('id', 'desc')
            ->where('user_id', Auth::user()->id)
            ->paginate(6);
//    var_dump($posts);
//    die();
        return View('/home')->with('posts', $posts);
    }


    public function search(Request $request){
        $category = $request->input('search');
        $query = Posts::where('name', 'LIKE', "%$category%")->get();
        return View('search')->with('query',$query);
    }


}


