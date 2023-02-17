<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags=Tag::all();
        return view('admin.tag.index',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate(['name'=>'required|max:100']);
      $tag=New Tag();
      $tag->name=$request->name;
      $tag->save();
      $notify[] = ['success', 'Create Successfully'];
      return back()->withNotify($notify);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(['name'=>'required|max:100']);
        $tag=Tag::findorfail($id);
        $tag->name=$request->name;
        $tag->save();
        $notify[] = ['success', 'Updated Successfully'];
        return back()->withNotify($notify);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $tag=Tag::findorfail($id);
       $tag->destroy();
        $notify[] = ['success', 'Deleted Successfully'];
        return back()->withNotify($notify);
    }
}
