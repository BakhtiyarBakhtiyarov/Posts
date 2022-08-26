<?php

namespace App\Http\Controllers;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\PostUpdateRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Posts::where('is_deleted', 0)->get();
        // dd($posts);
        return view('post.index',compact('posts'));
    }

    public function edit($id)
    {
        $posts = Posts::where('id',$id)->first();
        return view('post.edit',compact('posts'));
    }

    public function update(PostUpdateRequest $request)
    {
        // dd($request->all());
        $posts = Posts::where('id',$request->posts_id )->update([
            'title'                   => $request->posts_title,
            'description'             => $request->posts_description
        ]);
        
        
        if ($posts)
        {
            return redirect()->route('posts.index')->with('success','Post updated successfully!!!');
        }
        else{
            return redirect()->route('posts.edit')->with('errors','Error happened!!!');
        }  
    }

    public function delete(Request $request){

        $posts = Posts::where('id',$request->id)->update([
            'is_deleted'      => 1
        ]);
                if($posts){
                    return "ok";
                }
                else{
                    return "no";
                }
            }


}
