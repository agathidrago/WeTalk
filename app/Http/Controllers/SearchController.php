<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request)
    {
      
      $search = $request->get('search');
     $users=DB::table('users')->select('username','id')->where('username','like','%'.$search.'%')->get('username','id');
    
     if(count($users) > 0)
        return view('posts.userlist')->withDetails($users)->withQuery($search);
    else return view ('posts.userlist')->withMessage('No Details found. Try to search again !');
    }
}
