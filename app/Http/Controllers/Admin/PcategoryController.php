<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pcategory;
use Illuminate\Http\Request;
use SendGrid\Mail\Category;

class PcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Pcategory::all();
         return view('admin.pcategory.index',compact('categories'));
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
            'title'=>'required|max:100',
        ]);

        $pcategory=new Pcategory();
        $pcategory->title=$request->title;
        $pcategory->slug=str_slug($request->title['en']);
        $pcategory->save();

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
        $validated = $request->validate([
            'title'=>'required|max:255',
        ]);

        $pcategory=Pcategory::findorfail($id);
        $pcategory->title=$request->title;
        $pcategory->save();

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

    }
}
