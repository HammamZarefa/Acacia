<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projectCategories=ProjectCategory::all();
        $empty_message='No Records';
        $page_title="Project Categories";
        return view('admin.project_category.index',compact('projectCategories','empty_message','page_title'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'=>'required|max:255',
        ]);

        $projectCategory=new ProjectCategory();
        $projectCategory->title=$request->title;
        $projectCategory->is_main=1;
        $projectCategory->save();

        $notify[] = ['success', 'Create Successfully'];
        return back()->withNotify($notify);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

        $projectCategory=ProjectCategory::findorfail($id);
        $projectCategory->title=$request->title;
        $projectCategory->save();

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
        $projrctCategory=ProjectCategory::findorfail($id);
        $projrctCategory->is_active = 0 ? $projrctCategory->is_active = 1 : $projrctCategory->is_active=0;
        $projrctCategory->save();
        $notify[] = ['success', 'Deleted Successfully'];
        return back()->withNotify($notify);
    }
}
