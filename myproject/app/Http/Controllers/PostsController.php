<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\StorePostRequest;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(2);
      
        $post = $posts->first();

        return view('posts.index',[

            'posts' => $posts
        ]);
    }

    public function create()
    {
        $users = User::all();

        return view('posts.create',[
            'users' => $users
        ]);
    }

    public function store(StorePostRequest $request)
    {
        // dd($request->all());
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id
        ]);
        
       return redirect(route('posts.index')); 
    }


    public function view($id)
    {
        if($id != " "){
           $post = Post::find($id);
           if ( $post){
                return view('posts.view',[ 'post' => $post ]);
           }
        }
    }

    public function edit($id)
    {
        $users = User::all();

        if($id != " "){
           $post = Post::find($id);
           if ( $post){
                return view('posts.edit',[ 'post' => $post , 'users' => $users]);
           }
        }
    }

    public function update(StorePostRequest $request, $id)
    {
        $this->validate($request, [
            'title'        => 'required',
            'description'      => 'required',
        ]);
        $users = User::all();

        $post = Post::find($id);

        $post->title= $request->input('title');
        $post->description = $request->input('description');
       $post->user_id = $request->input('user_id');
       
       $validated = $request->validated();
       
        $post->save();


        return redirect()->route('posts.index');
     }

     public function destroy($id)
     {
         $post = Post::find( $id );
 
         $post->delete();
         
         
         return redirect()->route('posts.index');
     }
 
 

}
