<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use \App\Post;

class PostsController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    
    public function index()
    {
       
     
      //dd($likes);
       $users = auth()->user()->following()->pluck('profiles.user_id');
       $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);
       return view('posts.index', compact('posts'));
    }



    public function create()
    {
     return view('posts.create');
    }
    public function store()
    {
     $data=request()->validate([
         'caption' => 'required',
         'image' => ['required','image'],
     ]);

     $imagePath=request('image')->store('uploads','public');
     $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200)->save();
     
     auth()->user()->posts()->create([
         'caption'=>$data['caption'],
         'image'=>$imagePath,
     ]);
    
     return redirect('/profile/'. auth()->user()->id);
    }

    public function show(\App\Post $post)
    {
      $likes=(auth()->user()) ? auth()->user()->likesPost->contains($post) : false;
      return view('posts.show',compact('post','likes'));
    }

    public function deletePosts($id)
    {
      Post::where('id',$id)->delete();
      return redirect('/profile/'. auth()->user()->id);
    }

    public function search(Request $request)
    {
      
     $search = $request->get('search');
     $users=DB::table('users')->select('username','id')->where('username','like','%'.$search.'%')->get('username','id');
     dd($users);
     
    }

}
