<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Posts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    public function index()
    {//$posts = Posts::all();
        $posts = Posts::orderBy('id', 'desc')->paginate(6);
        return View('posts/index')->with('posts', $posts);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('posts/create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:2',
            'text' => 'required|max:1000',
            'cover_image' =>'image|nullable|max:1999'
        ]);
        if($request->hasFile('cover_image')){
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get the extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            //Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }
        Posts::create([
            'name' => request('name'),
            'text' => request('text'),
            'user_id' => Auth::user()->id,
            'cover_image' => $fileNameToStore
        ]);
//        $post = new Posts;
//        $post->name =$request->input('name');
//        $post->text =$request->input('text');
//        $post->user_id = Auth::user()->id;
//        //auth()->user()->id
//        $post->save();
        return redirect("/posts")->with('success', "Post Created");
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $post)
    {
        return View('posts/show')->with('post', $post);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $post)
    {
        if (auth()->user()->id != $post->user_id) {
            return redirect('/posts')->with('error', "Unauthorized Page");
        } else {
            return View("posts/edit")->with('post', $post);
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:2',
            'text' => 'required|max:1000',
            'cover_image' =>'image|nullable|max:1999'
        ]);
        if($request->hasFile('cover_image')){
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get the extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            //Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }
        $post = Posts::find($id);
        $post->name = $request->input('name');
        $post->text = $request->input('text');
        $post->cover_image = $fileNameToStore;
        $post->save();
        return redirect('/posts/'.$post->id)->with('success', "Post Updated");
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posts $post)
    {
        //Check for correct user
        if (auth()->user()->id != $post->user_id) {
            return redirect('/posts')->with('error', "Unauthorized Page");
        }
        if($post->cover_image !='noimage.jpg'){
            //Delete image
            Storage::delete('public/cover_images/'. $post->cover_image);
        }
        $post->delete();
        return redirect("/home");
    }
}