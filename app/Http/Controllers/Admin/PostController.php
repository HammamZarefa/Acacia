<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pcategory;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pcategories = Pcategory::all();
        $tags=Tag::all();
        return view('admin.post.create', compact('pcategories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title', 'short_desc', 'body','status','body','cover' => 'required'
        ]);
        $post = new Post();
        $this->mapping($request, $post);
        if ($request->hasFile('cover'))
           $post->cover= $this->postImagesUpload($request, $post->id);
        $post->save();
        $post->tags()->attach($request->tags);
        $notify[] = ['success', 'Create Successfully'];
        return back()->withNotify($notify);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $post=Post::findorfail($id);
        $pcategories = Pcategory::all();
        $tags=Tag::all();
        return view('admin.post.edit',compact('post','pcategories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id,Request $request)
    {
        $post=Post::findorfail($id);
        $request->validate([
            'title', 'short_desc', 'body','status','body' => 'required'
        ]);
        $this->mapping($request, $post);
        if ($request->hasFile('cover'))
            $post->cover= $this->postImagesUpload($request, $post->id);
        $post->save();
        $post->tags()->sync($request->tags);
        $notify[] = ['success', 'Updated Successfully'];
        return back()->withNotify($notify);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    private function mapping($request, $post)
    {
        $post->title = $request->title;
        $post->category_id = $request->category;
        $post->short_desc = $request->short_desc;
        $post->slug = str_slug($request->title['en']);
        $post->body = $request->body;
        $post->author = $request->author;
        $post->status = $request->status;
        $post->date = $request->date;
        $post->author== $request->author ? $request->author : auth()->user()->name;


    }

    private function postImagesUpload($request, $post)
    {
        $path = imagePath()['post']['path'];
        $size = imagePath()['post']['size'];
        $image = $request->file('cover');
            $filename = $image;
            try {
                $filename = uploadImage($image, $path, $size, $filename);
            } catch (\Exception $exp) {
                $notify[] = ['errors', 'Image could not be uploaded.'];
                return back()->withNotify($notify);
            }
        return $filename;
    }
}
