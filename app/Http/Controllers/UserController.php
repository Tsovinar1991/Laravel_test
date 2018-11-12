<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $user =  User::query()->where('id', auth()->user()->id)->get();
//        return $user->email;
        return View('users.profile')->with('user', $user);
    }

    public function edit(){
        return View('users.edit');
    }

    public function update(Request $request){
        //return $request;


        $this->validate($request, [
            'name' => 'required|string|max:255',
            'mobile' => 'required|min:10|max:13',
            'user_image' =>'image|nullable|max:1999'
        ]);



        if($request->hasFile('user_image')){
            $fileNameWithExt = $request->file('user_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get the extension
            $extension = $request->file('user_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            //Upload Image
            $path = $request->file('user_image')->storeAs('public/user_images', $fileNameToStore);
        }
        else{
            $fileNameToStore = 'user.jpg';
        }

        $id = Auth::user()->id;
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->mobile = $request->input('mobile');
        $user->user_image = $fileNameToStore;
        $user->save();

        return redirect('profile')->with('success', 'Profile Updated');













    }






}
