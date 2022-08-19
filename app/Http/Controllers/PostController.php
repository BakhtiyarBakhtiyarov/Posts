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
        $posts = Posts::where('id',$request->resume_id )->update([
            'title'                   => $request->resume_title,
            'description'             => $request->resume_description
        ]);

        // dd($resume);
        if ($posts)
        {
            return redirect()->route('post.index')->with('success','Post updated successfully!!!');
        }
        else{
            return redirect()->route('post.index')->with('errors','Error happened!!!');
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
