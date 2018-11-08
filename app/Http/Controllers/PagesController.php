<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = "WELCOME TO LARAVEL";
        return View('pages.index')->with('title', $title);
    }

    public function about(){
        $title = "ABOUT";
        return View('pages.about')->with('title', $title);;
    }

    public function services(){
        $data = ['title' =>"SERVICES",
                 'services' => ['Web design', 'Programming',  'Seo']

            ];
        return View('pages.services')->with($data);
    }


}
